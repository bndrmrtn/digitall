<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

export interface SingleProduct {
    id: number;
    title: string;
    description: string;
    price: number;
    slug: string;
    images: string[];
}

interface Props {
    product: SingleProduct;
}

const props = defineProps<Props>();

const selectedImage = ref(0);

const form = useForm({
    product_id: props.product.id,
    quantity: 1,
});

const selectImage = (index: number) => {
    selectedImage.value = index;
};

const addToCart = () => {
    form.post(route('cart.add'), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset('quantity');
            form.quantity = 1;
            // Success notification will be handled by flash messages
        },
    });
};

const incrementQuantity = () => {
    form.quantity++;
};

const decrementQuantity = () => {
    if (form.quantity > 1) {
        form.quantity--;
    }
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
    <section class="py-12 md:py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:gap-12">
                <!-- Image Gallery -->
                <div class="space-y-4">
                    <!-- Main Image -->
                    <div
                        class="flex h-[500px] items-center justify-center overflow-hidden rounded-2xl bg-gray-200"
                    >
                        <img
                            v-if="product.images.length > 0"
                            :src="product.images[selectedImage]"
                            :alt="product.title"
                            class="h-auto max-h-full w-auto max-w-full object-contain"
                        />
                        <div v-else class="flex items-center justify-center">
                            <svg
                                class="h-32 w-32 text-gray-300"
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

                    <!-- Thumbnail Gallery -->
                    <div
                        v-if="product.images.length > 1"
                        class="grid grid-cols-4 gap-4"
                    >
                        <button
                            v-for="(image, index) in product.images"
                            :key="index"
                            @click="selectImage(index)"
                            :class="[
                                'overflow-hidden rounded-lg transition-all',
                                selectedImage === index
                                    ? 'ring-4 ring-blue-600'
                                    : 'ring-2 ring-gray-200 hover:ring-gray-300',
                            ]"
                        >
                            <img
                                :src="image"
                                :alt="`${product.title} - ${index + 1}`"
                                class="h-24 w-full object-cover"
                            />
                        </button>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="space-y-6">
                    <!-- Title -->
                    <h1
                        class="text-4xl font-bold text-gray-900 md:text-5xl lg:text-6xl"
                    >
                        {{ product.title }}
                    </h1>

                    <!-- Price -->
                    <div class="text-3xl font-bold text-blue-600">
                        {{ formatPrice(product.price) }}
                    </div>

                    <!-- Description -->
                    <div
                        class="prose prose-lg max-w-none text-gray-600"
                        v-html="product.description"
                    ></div>

                    <!-- Add to Cart Section -->
                    <div class="space-y-4 border-t border-gray-200 pt-6">
                        <!-- Quantity Selector -->
                        <div class="flex items-center gap-4">
                            <label class="text-sm font-medium text-gray-700">
                                Mennyiség:
                            </label>
                            <div class="flex items-center gap-3">
                                <button
                                    @click="decrementQuantity"
                                    :disabled="form.quantity <= 1"
                                    type="button"
                                    class="flex h-10 w-10 items-center justify-center rounded-lg border-2 border-gray-300 text-gray-700 transition-colors hover:border-gray-400 disabled:cursor-not-allowed disabled:opacity-50"
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
                                            d="M20 12H4"
                                        />
                                    </svg>
                                </button>
                                <span
                                    class="w-12 text-center text-lg font-semibold"
                                >
                                    {{ form.quantity }}
                                </span>
                                <button
                                    @click="incrementQuantity"
                                    type="button"
                                    class="flex h-10 w-10 items-center justify-center rounded-lg border-2 border-gray-300 text-gray-700 transition-colors hover:border-gray-400"
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
                                            d="M12 4v16m8-8H4"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Add to Cart Button -->
                        <button
                            @click="addToCart"
                            :disabled="form.processing"
                            type="button"
                            class="w-full rounded-xl bg-blue-600 px-8 py-4 text-lg font-semibold text-white transition-all hover:bg-blue-700 disabled:cursor-not-allowed disabled:opacity-50"
                        >
                            <span
                                v-if="!form.processing"
                                class="flex items-center justify-center gap-2"
                            >
                                <svg
                                    class="h-6 w-6"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                                    />
                                </svg>
                                Kosárba
                            </span>
                            <span v-else>Hozzáadás...</span>
                        </button>

                        <!-- Error Messages -->
                        <div
                            v-if="
                                form.errors.product_id || form.errors.quantity
                            "
                            class="text-sm text-red-600"
                        >
                            {{ form.errors.product_id || form.errors.quantity }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
