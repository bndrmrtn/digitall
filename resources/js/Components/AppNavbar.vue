<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import AppLogo from './AppLogo.vue';

interface NavLink {
  label: string;
  href: string;
}

const navLinks: NavLink[] = [
  { label: 'Products', href: '/products' },
  { label: 'About', href: '/about' },
  { label: 'Contact', href: '/contact' },
];
</script>

<template>
  <nav class="sticky top-0 z-50 border-b border-gray-200 bg-white shadow-sm">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <Link href="/">
          <AppLogo />
        </Link>

        <div class="flex gap-6 text-gray-600">
          <Link
            v-for="link in navLinks"
            :key="link.label"
            :href="link.href"
            class="font-medium transition-colors duration-200 hover:text-gray-900"
          >
            {{ link.label }}
          </Link>
        </div>
      </div>
    </div>
  </nav>
</template>
