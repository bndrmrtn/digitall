<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';

interface Product {
  id: number;
  title: string;
  description: string;
  price: number;
  slug: string;
  image_url?: string;
}

interface Props {
  product: Product;
}

const props = defineProps<Props>();

const imageUrl = computed(() => {
  return props.product.image_url;
});
</script>

<template>
  <Link :href="`/products/${product.slug}`" class="group">
    <div
      class="transform overflow-hidden rounded-xl bg-white shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-xl"
    >
      <!-- Image Container with Fixed Aspect Ratio -->
      <div class="relative aspect-[4/3] overflow-hidden bg-gray-100">
        <img
          :src="imageUrl"
          :alt="product.title"
          class="mx-auto h-full w-auto object-cover transition-transform duration-500 group-hover:scale-110"
        />
        <!-- Gradient Overlay on Hover -->
        <div
          class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100"
        />
      </div>

      <!-- Content -->
      <div class="p-6">
        <h3
          class="mb-2 text-xl font-bold text-gray-900 transition-colors duration-200 group-hover:text-blue-600"
        >
          {{ product.title }}
        </h3>

        <p>{{ product.price }} HUF</p>

        <!-- View Details Button -->
        <div class="mt-4 flex items-center text-sm font-semibold text-blue-600">
          <span class="transition-all duration-200 group-hover:mr-2"
            >View Details</span
          >
          <svg
            class="h-4 w-4 opacity-0 transition-all duration-200 group-hover:opacity-100"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M9 5l7 7-7 7"
            />
          </svg>
        </div>
      </div>
    </div>
  </Link>
</template>
