<script setup lang="ts">
import AppFooter from '@/Components/AppFooter.vue';
import AppNavbar from '@/Components/AppNavbar.vue';
import SingleProductView, {
    type SingleProduct,
} from '@/Components/SingleProductView.vue';
import { Head } from '@inertiajs/vue3';

interface Props {
    product: SingleProduct;
}

defineProps<Props>();
</script>

<template>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <Head :title="product.title + ' - DigitAll'" />

        <AppNavbar />

        <main>
            <SingleProductView :product="product" />
        </main>

        <AppFooter />
    </div>
</template>
