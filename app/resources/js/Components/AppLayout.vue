<template>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <AppNavbar />
        <slot />
        <AppFooter />
    </div>
</template>

<script setup lang="ts">
import AppFooter from '@/Components/AppFooter.vue';
import AppNavbar from '@/Components/AppNavbar.vue';
</script>
