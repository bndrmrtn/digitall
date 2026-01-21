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
          href="/products"
          class="rounded-xs mx-auto my-5 mb-12 inline-block w-max bg-blue-500 px-4 py-2 text-center text-lg font-bold text-white transition-colors duration-150 hover:bg-blue-700"
        >
          További termékek
        </Link>
      </div>
    </main>

    <AppFooter />
  </div>
</template>
