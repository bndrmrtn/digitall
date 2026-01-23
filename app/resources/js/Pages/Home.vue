<script setup lang="ts">
import AppFooter from '@/Components/AppFooter.vue';
import AppNavbar from '@/Components/AppNavbar.vue';
import HeroSection from '@/Components/HeroSection.vue';
import ProductsGrid from '@/Components/ProductsGrid.vue';
import { Head, Link } from '@inertiajs/vue3';

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
}

defineProps<Props>();
</script>

<template>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <Head title="Home - DigitAll" />

        <AppNavbar />

        <main>
            <HeroSection />
            <ProductsGrid :products="products" />
            <div class="flex w-full items-center justify-center">
                <Link
                    :href="route('products.index')"
                    class="mb-12 transform rounded-lg bg-gradient-to-r from-blue-600 to-purple-600 px-8 py-4 font-bold text-white shadow-lg transition-all duration-200 hover:-translate-y-0.5 hover:shadow-xl"
                >
                    További termékek
                </Link>
            </div>
        </main>

        <AppFooter />
    </div>
</template>
