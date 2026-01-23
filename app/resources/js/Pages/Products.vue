<script setup lang="ts">
import AppFooter from '@/Components/AppFooter.vue';
import AppNavbar from '@/Components/AppNavbar.vue';
import ProductPagination from '@/Components/ProductPagination.vue';
import { PaginatedProducts } from '@/types';
import { Head } from '@inertiajs/vue3';

interface Props {
    pagination: PaginatedProducts;
}

defineProps<Props>();
</script>

<template>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <Head title="Termékek - DigitAll" />

        <AppNavbar />

        <main>
            <ProductPagination :products="pagination" />
        </main>

        <AppFooter />
    </div>
</template>
