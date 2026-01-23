<script setup lang="ts">
import ProductCard from './ProductCard.vue';

interface Product {
    id: number;
    title: string;
    description: string;
    price: number;
    slug: string;
    image_url?: string;
}

interface Props {
    products: Product[];
    title?: string;
    subtitle?: string;
}

withDefaults(defineProps<Props>(), {
    title: 'Kiemelt termékeink',
    subtitle: ' Nézd meg a folyamatosan bővülő kínálatunkat.',
});
</script>

<template>
    <section class="py-16 md:pt-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="mb-12 text-center">
                <h2 class="mb-4 text-4xl font-bold text-gray-900 md:text-5xl">
                    {{ title }}
                </h2>
                <p class="mx-auto max-w-2xl text-lg text-gray-600">
                    {{ subtitle }}
                </p>
            </div>

            <!-- Products Grid -->
            <div
                v-if="products.length > 0"
                class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3"
            >
                <ProductCard
                    v-for="product in products"
                    :key="product.id"
                    :product="product"
                />
            </div>

            <!-- Empty State -->
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
                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"
                        />
                    </svg>
                </div>
                <h3 class="mb-2 text-2xl font-semibold text-gray-600">
                    No products available
                </h3>
                <p class="text-gray-500">Check back soon for new products!</p>
            </div>
        </div>
    </section>
</template>
