<script setup lang="ts">
import AppLayout from '@/Components/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Rólunk" />

    <AppLayout>
        <!-- Hero Section -->
        <section
            class="bg-gradient-to-br from-blue-50 to-indigo-100 py-16 md:py-24"
        >
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1
                        class="mb-6 text-4xl font-bold text-gray-900 md:text-5xl lg:text-6xl"
                    >
                        Rólunk
                    </h1>
                    <p class="mx-auto max-w-3xl text-xl text-gray-700">
                        Frissen indult vállalkozásként célunk, hogy a legjobb
                        minőségű termékeket kínáljuk ügyfeleink számára
                    </p>
                </div>
            </div>
        </section>

        <!-- Story Section -->
        <section class="py-16 md:py-24">
            <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
                <h2 class="mb-6 text-3xl font-bold text-gray-900 md:text-4xl">
                    Történetünk
                </h2>
                <div class="space-y-4 text-lg text-gray-600">
                    <p>
                        Cégünk 2026-ban indult útjára azzal a céllal, hogy
                        minőségi termékeket kínáljunk ügyfeleink számára
                        versenyképes árakon. Bár fiatal vállalkozás vagyunk,
                        csapatunk évtizedes tapasztalattal rendelkezik a
                        kereskedelmi szektorban.
                    </p>
                    <p>
                        Hiszünk abban, hogy a siker kulcsa a vásárlói
                        elégedettség és a minőség iránti elkötelezettség. Minden
                        egyes terméket gondosan válogatunk ki, hogy csak a
                        legjobbat kínálhassuk ügyfeleinknek.
                    </p>
                    <p>
                        Folyamatosan figyelemmel kísérjük a piaci trendeket és
                        igyekszünk a legújabb termékekkel bővíteni
                        választékunkat, hogy minden vásárlónk megtalálja azt,
                        amire szüksége van.
                    </p>
                </div>
            </div>
        </section>

        <!-- Values Section -->
        <section class="bg-gray-50 py-16 md:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mb-12 text-center">
                    <h2
                        class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl"
                    >
                        Értékeink
                    </h2>
                    <p class="mx-auto max-w-2xl text-lg text-gray-600">
                        Ezek az alapelvek vezérelnek minket mindennapi
                        munkánkban
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                    <div class="rounded-xl bg-white p-8 shadow-sm">
                        <div
                            class="mb-4 flex h-12 w-12 items-center justify-center rounded-lg bg-blue-100"
                        >
                            <svg
                                class="h-6 w-6 text-blue-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900">
                            Minőség
                        </h3>
                        <p class="text-gray-600">
                            Csak a legmagasabb minőségű termékeket kínáljuk,
                            amelyeket alaposan ellenőrzünk beszerzés előtt.
                        </p>
                    </div>

                    <div class="rounded-xl bg-white p-8 shadow-sm">
                        <div
                            class="mb-4 flex h-12 w-12 items-center justify-center rounded-lg bg-blue-100"
                        >
                            <svg
                                class="h-6 w-6 text-blue-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"
                                />
                            </svg>
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900">
                            Gyorsaság
                        </h3>
                        <p class="text-gray-600">
                            Gyors kiszállítást és hatékony ügyfélszolgálatot
                            biztosítunk minden megrendelés esetén.
                        </p>
                    </div>

                    <div class="rounded-xl bg-white p-8 shadow-sm">
                        <div
                            class="mb-4 flex h-12 w-12 items-center justify-center rounded-lg bg-blue-100"
                        >
                            <svg
                                class="h-6 w-6 text-blue-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                                />
                            </svg>
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900">
                            Ügyfélközpontúság
                        </h3>
                        <p class="text-gray-600">
                            Vásárlóink elégedettsége a legfontosabb számunkra.
                            Minden kérdésre gyors és segítőkész választ adunk.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mission Section -->
        <section class="py-16 md:py-24">
            <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
                <div
                    class="rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-700 p-8 text-white md:p-12"
                >
                    <h2 class="mb-4 text-3xl font-bold md:text-4xl">
                        Küldetésünk
                    </h2>
                    <p class="text-lg text-blue-50">
                        Célunk, hogy megbízható és innovatív partnerei legyünk
                        vásárlóinknak. Folyamatosan fejlesztjük
                        szolgáltatásainkat és bővítjük termékpalettánkat, hogy
                        mindig a legjobbat nyújthassuk. Hosszú távú
                        kapcsolatokat építünk ügyfeleinkkel, amelyek a kölcsönös
                        bizalomra és elégedettségre épülnek.
                    </p>
                </div>
            </div>
        </section>
    </AppLayout>
</template>
