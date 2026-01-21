<script setup lang="ts">
import AppFooter from '@/Components/AppFooter.vue';
import AppNavbar from '@/Components/AppNavbar.vue';
import HeroSection from '@/Components/HeroSection.vue';
import ProductsGrid from '@/Components/ProductsGrid.vue';
import { Head } from '@inertiajs/vue3';

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
    </main>

    <AppFooter />
  </div>
</template>
