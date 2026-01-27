<script setup lang="ts">
import AppLayout from '@/Components/AppLayout.vue';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

interface CartItem {
    name: string;
    price: number;
    quantity: number;
    image: string | null;
}

interface Cart {
    [key: string]: CartItem;
}

const page = usePage();
const cart = computed(() => page.props.cart as Cart);

const updateForm = useForm({
    product_id: '',
    quantity: 0,
});

const removeForm = useForm({
    product_id: '',
});

const cartItems = computed(() => {
    return Object.entries(cart.value).map(([id, item]) => ({
        id,
        ...item,
    }));
});

const cartTotal = computed(() => {
    return Object.values(cart.value).reduce((total, item) => {
        return total + item.price * item.quantity;
    }, 0);
});

const cartCount = computed(() => {
    return Object.values(cart.value).reduce((count, item) => {
        return count + item.quantity;
    }, 0);
});

const updateQuantity = (productId: string, quantity: number) => {
    if (quantity < 1) return;

    updateForm.product_id = productId;
    updateForm.quantity = quantity;

    updateForm.put(route('cart.update', productId), {
        preserveScroll: true,
    });
};

const removeItem = (productId: string) => {
    removeForm.product_id = productId;

    removeForm.delete(route('cart.remove', productId), {
        preserveScroll: true,
    });
};

const formatPrice = (price: number) => {
    return new Intl.NumberFormat('hu-HU', {
        style: 'currency',
        currency: 'HUF',
        minimumFractionDigits: 0,
    }).format(price);
};
</script>

<template>
    <Head title="Kosár" />

    <AppLayout>
        <section class="py-12 md:py-16">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <!-- Page Header -->
                <div class="mb-8">
                    <h1 class="text-4xl font-bold text-gray-900 md:text-5xl">
                        Kosár
                    </h1>
                    <p class="mt-2 text-lg text-gray-600">
                        {{ cartCount }} termék a kosaradban
                    </p>
                </div>

                <div
                    v-if="cartItems.length > 0"
                    class="grid grid-cols-1 gap-8 lg:grid-cols-3"
                >
                    <!-- Cart Items -->
                    <div class="space-y-4 lg:col-span-2">
                        <div
                            v-for="item in cartItems"
                            :key="item.id"
                            class="flex gap-4 rounded-xl border border-gray-200 bg-white p-4 shadow-sm transition-shadow hover:shadow-md"
                        >
                            <!-- Product Image -->
                            <div
                                class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-lg bg-gray-100"
                            >
                                <img
                                    v-if="item.image"
                                    :src="item.image"
                                    :alt="item.name"
                                    class="h-full w-full object-cover"
                                />
                                <div
                                    v-else
                                    class="flex h-full w-full items-center justify-center"
                                >
                                    <svg
                                        class="h-12 w-12 text-gray-300"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                        />
                                    </svg>
                                </div>
                            </div>

                            <!-- Product Details -->
                            <div class="flex flex-1 flex-col justify-between">
                                <div>
                                    <h3
                                        class="text-lg font-semibold text-gray-900"
                                    >
                                        {{ item.name }}
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600">
                                        {{ formatPrice(item.price) }} / db
                                    </p>
                                </div>

                                <!-- Quantity Controls -->
                                <div class="mt-2 flex items-center gap-4">
                                    <div class="flex items-center gap-2">
                                        <button
                                            @click="
                                                updateQuantity(
                                                    item.id,
                                                    item.quantity - 1,
                                                )
                                            "
                                            :disabled="
                                                item.quantity <= 1 ||
                                                updateForm.processing
                                            "
                                            type="button"
                                            class="flex h-8 w-8 items-center justify-center rounded-lg border-2 border-gray-300 text-gray-700 transition-colors hover:border-gray-400 disabled:cursor-not-allowed disabled:opacity-50"
                                        >
                                            <svg
                                                class="h-4 w-4"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M20 12H4"
                                                />
                                            </svg>
                                        </button>
                                        <span
                                            class="w-8 text-center font-semibold"
                                        >
                                            {{ item.quantity }}
                                        </span>
                                        <button
                                            @click="
                                                updateQuantity(
                                                    item.id,
                                                    item.quantity + 1,
                                                )
                                            "
                                            :disabled="updateForm.processing"
                                            type="button"
                                            class="flex h-8 w-8 items-center justify-center rounded-lg border-2 border-gray-300 text-gray-700 transition-colors hover:border-gray-400 disabled:cursor-not-allowed disabled:opacity-50"
                                        >
                                            <svg
                                                class="h-4 w-4"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M12 4v16m8-8H4"
                                                />
                                            </svg>
                                        </button>
                                    </div>

                                    <!-- Remove Button -->
                                    <button
                                        @click="removeItem(item.id)"
                                        :disabled="removeForm.processing"
                                        type="button"
                                        class="ml-auto text-sm text-red-600 transition-colors hover:text-red-700 disabled:opacity-50"
                                    >
                                        <svg
                                            class="h-5 w-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                            />
                                        </svg>
                                    </button>
                                </div>

                                <!-- Subtotal -->
                                <div
                                    class="mt-2 text-right text-lg font-bold text-gray-900"
                                >
                                    {{
                                        formatPrice(item.price * item.quantity)
                                    }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="lg:col-span-1">
                        <div
                            class="sticky top-4 rounded-xl border border-gray-200 bg-white p-6 shadow-sm"
                        >
                            <h2 class="mb-4 text-2xl font-bold text-gray-900">
                                Összesítő
                            </h2>

                            <div
                                class="space-y-3 border-t border-gray-200 pt-4"
                            >
                                <div class="flex justify-between text-gray-600">
                                    <span>Részösszeg:</span>
                                    <span class="font-semibold">{{
                                        formatPrice(cartTotal)
                                    }}</span>
                                </div>
                                <div class="flex justify-between text-gray-600">
                                    <span>Szállítás:</span>
                                    <span class="font-semibold">Ingyenes</span>
                                </div>
                                <div
                                    class="flex justify-between border-t border-gray-200 pt-3 text-xl font-bold text-gray-900"
                                >
                                    <span>Összesen:</span>
                                    <span>{{ formatPrice(cartTotal) }}</span>
                                </div>
                            </div>

                            <Link
                                :href="route('checkout.index')"
                                class="mt-6 block w-full rounded-xl bg-blue-600 px-6 py-4 text-center text-lg font-semibold text-white transition-all hover:bg-blue-700"
                            >
                                Pénztárhoz
                            </Link>

                            <Link
                                :href="route('products.index')"
                                class="mt-3 block w-full rounded-xl border-2 border-gray-300 px-6 py-4 text-center text-lg font-semibold text-gray-700 transition-all hover:border-gray-400 hover:bg-gray-50"
                            >
                                Vásárlás folytatása
                            </Link>
                        </div>
                    </div>
                </div>

                <!-- Empty Cart State -->
                <div v-else class="rounded-2xl bg-gray-50 py-16 text-center">
                    <div class="mb-4 text-gray-400">
                        <svg
                            class="mx-auto h-24 w-24"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                            />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-2xl font-semibold text-gray-600">
                        A kosarad üres
                    </h3>
                    <p class="mb-6 text-gray-500">
                        Adj hozzá termékeket a kosárhoz a vásárlás
                        megkezdéséhez!
                    </p>
                    <Link
                        :href="route('products.index')"
                        class="inline-block rounded-xl bg-blue-600 px-8 py-4 text-lg font-semibold text-white transition-all hover:bg-blue-700"
                    >
                        Termékek böngészése
                    </Link>
                </div>
            </div>
        </section>
    </AppLayout>
</template>
