<script setup lang="ts">
interface Props {
  size?: number;
  showText?: boolean;
  darkMode?: boolean;
}

withDefaults(defineProps<Props>(), {
  size: 40,
  showText: true,
  darkMode: false,
});
</script>

<template>
  <div class="flex items-center gap-2">
    <svg
      :width="size"
      :height="size"
      viewBox="0 0 40 40"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
    >
      <defs>
        <linearGradient id="logoGradient" x1="0%" y1="0%" x2="100%" y2="100%">
          <stop
            offset="0%"
            style="stop-color: rgb(59, 130, 246); stop-opacity: 1"
          />
          <stop
            offset="100%"
            style="stop-color: rgb(139, 92, 246); stop-opacity: 1"
          />
        </linearGradient>
      </defs>
      <circle cx="20" cy="20" r="18" fill="url(#logoGradient)" />
      <rect x="13" y="10" width="3" height="3" fill="white" />
      <rect x="13" y="14" width="3" height="3" fill="white" />
      <rect x="13" y="18" width="3" height="3" fill="white" />
      <rect x="13" y="22" width="3" height="3" fill="white" />
      <rect x="13" y="26" width="3" height="3" fill="white" />
      <rect x="17" y="10" width="3" height="3" fill="white" />
      <rect x="21" y="10" width="3" height="3" fill="white" />
      <rect x="25" y="14" width="3" height="3" fill="white" />
      <rect x="25" y="18" width="3" height="3" fill="white" />
      <rect x="25" y="22" width="3" height="3" fill="white" />
      <rect x="17" y="26" width="3" height="3" fill="white" />
      <rect x="21" y="26" width="3" height="3" fill="white" />
    </svg>
    <div v-if="showText" class="flex items-baseline">
      <span
        class="bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-2xl font-bold text-transparent"
      >
        Digit
      </span>
      <span
        class="text-2xl font-bold"
        :class="{ 'text-gray-900': !darkMode, 'text-gray-100': darkMode }"
        >All</span
      >
    </div>
  </div>
</template>
