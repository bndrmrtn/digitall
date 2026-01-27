<script setup lang="ts">
import AppLogo from '@/Components/AppLogo.vue';
import Dropdown from '@/Components/Breeze/Dropdown.vue';
import DropdownLink from '@/Components/Breeze/DropdownLink.vue';
import NavLink from '@/Components/Breeze/NavLink.vue';
import ResponsiveNavLink from '@/Components/Breeze/ResponsiveNavLink.vue';
import { Link, usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

interface NavLinkItem {
    label: string;
    href: string;
    routeName?: string;
}

interface CartItem {
    name: string;
    price: number;
    quantity: number;
    image: string | null;
}

interface Cart {
    [key: string]: CartItem;
}

const navLinks: NavLinkItem[] = [
    { label: 'Főoldal', href: '/', routeName: 'home' },
    { label: 'Termékek', href: '/products', routeName: 'products.index' },
    { label: 'Rólunk', href: '/about', routeName: 'about' },
    { label: 'Kapcsolat', href: '/contact', routeName: 'contact' },
];

const page = usePage();
const user = computed(() => page.props.auth?.user);
const cart = computed(() => (page.props.cart as Cart) || {});
const showingNavigationDropdown = ref(false);

const cartCount = computed(() => {
    return Object.values(cart.value).reduce((count, item) => {
        return count + item.quantity;
    }, 0);
});
</script>

<template>
    <nav class="border-b border-gray-100 bg-white">
        <!-- Primary Navigation Menu -->
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 justify-between">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex shrink-0 items-center">
                        <Link :href="route('home')">
                            <AppLogo />
                        </Link>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <NavLink
                            v-for="link in navLinks"
                            :key="link.label"
                            :href="link.href"
                            :active="
                                link.routeName
                                    ? route().current(link.routeName)
                                    : false
                            "
                        >
                            {{ link.label }}
                        </NavLink>
                    </div>
                </div>

                <div class="hidden sm:ms-6 sm:flex sm:items-center sm:gap-4">
                    <!-- Cart Icon -->
                    <Link
                        :href="route('cart.index')"
                        class="relative inline-flex items-center rounded-md p-2 text-gray-500 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-700"
                    >
                        <svg
                            class="h-6 w-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                            />
                        </svg>
                        <span
                            v-if="cartCount > 0"
                            class="absolute -right-1 -top-1 flex h-5 w-5 items-center justify-center rounded-full bg-blue-600 text-xs font-bold text-white"
                        >
                            {{ cartCount }}
                        </span>
                    </Link>

                    <!-- Authenticated User Dropdown -->
                    <div v-if="user" class="relative">
                        <Dropdown align="right" width="48">
                            <template #trigger>
                                <span class="inline-flex rounded-md">
                                    <button
                                        type="button"
                                        class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none"
                                    >
                                        {{ user.name }}

                                        <svg
                                            class="-me-0.5 ms-2 h-4 w-4"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <DropdownLink :href="route('profile.edit')">
                                    Profil
                                </DropdownLink>
                                <DropdownLink
                                    :href="route('logout')"
                                    method="post"
                                    as="button"
                                >
                                    Kijelentkezés
                                </DropdownLink>
                            </template>
                        </Dropdown>
                    </div>

                    <!-- Guest Login/Register Links -->
                    <div v-else class="flex items-center space-x-4">
                        <Link
                            :href="route('login')"
                            class="text-sm font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-700"
                        >
                            Bejelentkezés
                        </Link>
                        <Link
                            :href="route('register')"
                            class="rounded-md bg-gray-800 px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                        >
                            Regisztráció
                        </Link>
                    </div>
                </div>

                <!-- Hamburger -->
                <div class="-me-2 flex items-center gap-2 sm:hidden">
                    <!-- Mobile Cart Icon -->
                    <Link
                        :href="route('cart.index')"
                        class="relative inline-flex items-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500"
                    >
                        <svg
                            class="h-6 w-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                            />
                        </svg>
                        <span
                            v-if="cartCount > 0"
                            class="absolute -right-1 -top-1 flex h-5 w-5 items-center justify-center rounded-full bg-blue-600 text-xs font-bold text-white"
                        >
                            {{ cartCount }}
                        </span>
                    </Link>

                    <button
                        @click="
                            showingNavigationDropdown =
                                !showingNavigationDropdown
                        "
                        class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none"
                    >
                        <svg
                            class="h-6 w-6"
                            stroke="currentColor"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <path
                                :class="{
                                    hidden: showingNavigationDropdown,
                                    'inline-flex': !showingNavigationDropdown,
                                }"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"
                            />
                            <path
                                :class="{
                                    hidden: !showingNavigationDropdown,
                                    'inline-flex': showingNavigationDropdown,
                                }"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div
            :class="{
                block: showingNavigationDropdown,
                hidden: !showingNavigationDropdown,
            }"
            class="sm:hidden"
        >
            <div class="space-y-1 pb-3 pt-2">
                <ResponsiveNavLink
                    v-for="link in navLinks"
                    :key="link.label"
                    :href="link.href"
                    :active="
                        link.routeName ? route().current(link.routeName) : false
                    "
                >
                    {{ link.label }}
                </ResponsiveNavLink>
            </div>

            <!-- Responsive Settings Options (Authenticated) -->
            <div v-if="user" class="border-t border-gray-200 pb-1 pt-4">
                <div class="px-4">
                    <div class="text-base font-medium text-gray-800">
                        {{ user.name }}
                    </div>
                    <div class="text-sm font-medium text-gray-500">
                        {{ user.email }}
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <ResponsiveNavLink :href="route('profile.edit')">
                        Profile
                    </ResponsiveNavLink>
                    <ResponsiveNavLink
                        :href="route('logout')"
                        method="post"
                        as="button"
                    >
                        Kijelentkezés
                    </ResponsiveNavLink>
                </div>
            </div>

            <!-- Responsive Guest Options -->
            <div v-else class="border-t border-gray-200 pb-1 pt-4">
                <div class="space-y-1">
                    <ResponsiveNavLink :href="route('login')">
                        Bejelentkezés
                    </ResponsiveNavLink>
                    <ResponsiveNavLink :href="route('register')">
                        Regisztráció
                    </ResponsiveNavLink>
                </div>
            </div>
        </div>
    </nav>
</template>
