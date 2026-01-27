<script setup lang="ts">
import AppLayout from '@/Components/AppLayout.vue';
import ProductPagination from '@/Components/ProductPagination.vue';
import { PaginatedProducts } from '@/types';
import { Head } from '@inertiajs/vue3';

interface Props {
    pagination: PaginatedProducts;
}

defineProps<Props>();
</script>

<template>
    <Head title="Termékek" />

    <AppLayout>
        <main>
            <ProductPagination :products="pagination" />
        </main>
    </AppLayout>
</template>
