<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import AppLogo from './AppLogo.vue';

const currentYear = new Date().getFullYear();
</script>

<template>
    <footer class="bg-gray-900 text-gray-300">
        <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
            <div class="mb-8 grid grid-cols-1 gap-8 md:grid-cols-4">
                <!-- Brand Column -->
                <div class="md:col-span-2">
                    <div class="mb-4">
                        <AppLogo :size="40" :darkMode="true" />
                    </div>
                    <p class="max-w-md text-gray-400">
                        Telefonok, tabletek és elektronikai eszközök webáruháza.
                        Biztonságos vásárlás, gyors szállítás országszerte.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="mb-4 font-bold text-white">Gyors linkek</h3>
                    <ul class="space-y-2">
                        <li>
                            <Link
                                href="/products"
                                class="transition-colors hover:text-white"
                                >Termékek</Link
                            >
                        </li>
                        <li>
                            <Link
                                href="/about"
                                class="transition-colors hover:text-white"
                                >Rólunk</Link
                            >
                        </li>
                        <li>
                            <Link
                                href="/contact"
                                class="transition-colors hover:text-white"
                                >Kapcsolat</Link
                            >
                        </li>
                    </ul>
                </div>

                <!-- Social Links -->
                <div>
                    <h3 class="mb-4 font-bold text-white">Kövess minket</h3>
                    <div class="flex gap-4">
                        <a
                            href="#"
                            class="text-gray-400 transition-colors hover:text-white"
                        >
                            <svg
                                class="h-6 w-6"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"
                                />
                            </svg>
                        </a>
                        <a
                            href="#"
                            class="text-gray-400 transition-colors hover:text-white"
                        >
                            <svg
                                class="h-6 w-6"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"
                                />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div
                class="border-t border-gray-800 pt-8 text-center text-gray-500"
            >
                <p>&copy; {{ currentYear }} DigitAll. Minden jog fenntartva.</p>
            </div>
        </div>
    </footer>
</template>
