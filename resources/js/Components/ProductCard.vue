<script setup lang="ts">
import type { Product } from '@/types';
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';

interface Props {
  product: Product;
}

const props = defineProps<Props>();

const imageUrl = computed(() => {
  return props.product.image_url;
});
</script>

<template>
  <Link :href="`/products/${product.slug}`" class="group block">
    <article
      class="transform overflow-hidden bg-white shadow-sm transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl"
    >
      <!-- Image Container with Fixed Aspect Ratio -->
      <div
        class="relative aspect-[4/3] overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200"
      >
        <img
          :src="imageUrl"
          :alt="product.title"
          class="mx-auto h-full w-auto transition-all duration-700 group-hover:scale-110"
        />

        <!-- Subtle Overlay -->
        <div
          class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 transition-opacity duration-500 group-hover:opacity-100"
        />

        <!-- Floating Label -->
        <div
          class="absolute bottom-4 right-4 translate-y-2 transform bg-white/95 px-4 py-2 text-sm font-bold uppercase tracking-wider text-gray-900 opacity-0 shadow-lg backdrop-blur-sm transition-all duration-300 group-hover:translate-y-0 group-hover:opacity-100"
        >
          Megtekintés
        </div>
      </div>

      <!-- Content -->
      <div class="relative p-6">
        <!-- Accent Line -->
        <div
          class="absolute left-0 top-0 h-0.5 w-0 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-500 group-hover:w-full"
        ></div>

        <h3
          class="mb-3 text-xl font-bold text-gray-900 transition-colors duration-300 group-hover:bg-gradient-to-r group-hover:from-blue-600 group-hover:to-purple-600 group-hover:bg-clip-text group-hover:text-transparent"
        >
          {{ product.title }}
        </h3>

        <div class="flex items-center justify-between">
          <p class="text-2xl font-bold text-gray-900">
            {{ product.price.toLocaleString('hu-HU') }}
            <span class="text-lg text-gray-600">Ft</span>
          </p>

          <!-- Arrow Icon -->
          <svg
            class="h-5 w-5 translate-x-0 transform text-blue-600 opacity-0 transition-all duration-300 group-hover:translate-x-2 group-hover:opacity-100"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M17 8l4 4m0 0l-4 4m4-4H3"
            />
          </svg>
        </div>
      </div>
    </article>
  </Link>
</template>
