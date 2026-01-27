<script setup lang="ts">
import AppLayout from '@/Components/AppLayout.vue';
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
    <Head :title="product.title" />

    <AppLayout>
        <main>
            <SingleProductView :product="product" />
        </main>
    </AppLayout>
</template>
