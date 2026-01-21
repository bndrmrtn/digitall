<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <section
    class="relative overflow-hidden bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50"
  >
    <!-- Decorative Elements -->
    <div class="absolute inset-0 overflow-hidden">
      <div
        class="animate-blob absolute -right-40 -top-40 h-80 w-80 rounded-full bg-purple-300 opacity-30 mix-blend-multiply blur-3xl filter"
      />
      <div
        class="animate-blob animation-delay-2000 absolute -bottom-40 -left-40 h-80 w-80 rounded-full bg-blue-300 opacity-30 mix-blend-multiply blur-3xl filter"
      />
      <div
        class="animate-blob animation-delay-4000 absolute left-1/2 top-1/2 h-80 w-80 -translate-x-1/2 -translate-y-1/2 transform rounded-full bg-pink-300 opacity-30 mix-blend-multiply blur-3xl filter"
      />
    </div>

    <div class="relative mx-auto max-w-7xl px-4 py-24 sm:px-6 md:py-32 lg:px-8">
      <div class="text-center">
        <h1
          class="mb-6 text-5xl font-extrabold text-gray-900 md:text-6xl lg:text-7xl"
        >
          Welcome to
          <span
            class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent"
          >
            DigitAll
          </span>
        </h1>
        <p class="mx-auto mb-10 max-w-3xl text-xl text-gray-600 md:text-2xl">
          Discover amazing digital products crafted with passion and innovation
        </p>
        <div class="flex flex-col justify-center gap-4 sm:flex-row">
          <Link
            href="/products"
            class="transform rounded-lg bg-gradient-to-r from-blue-600 to-purple-600 px-8 py-4 font-bold text-white shadow-lg transition-all duration-200 hover:-translate-y-0.5 hover:shadow-xl"
          >
            Browse Products
          </Link>
          <Link
            href="/about"
            class="transform rounded-lg bg-white px-8 py-4 font-bold text-gray-900 shadow-md transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg"
          >
            Learn More
          </Link>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
@keyframes blob {
  0%,
  100% {
    transform: translate(0, 0) scale(1);
  }
  33% {
    transform: translate(30px, -50px) scale(1.1);
  }
  66% {
    transform: translate(-20px, 20px) scale(0.9);
  }
}

.animate-blob {
  animation: blob 7s infinite;
}

.animation-delay-2000 {
  animation-delay: 2s;
}

.animation-delay-4000 {
  animation-delay: 4s;
}
</style>
