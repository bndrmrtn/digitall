<script setup lang="ts">
import AppLayout from '@/Components/AppLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    subject: '',
    message: '',
});

const submitForm = () => {
    form.post(route('contact.submit'), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
        },
    });
};
</script>

<template>
    <Head title="Kapcsolat" />

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
                        Kapcsolat
                    </h1>
                    <p class="mx-auto max-w-3xl text-xl text-gray-700">
                        Kérdése van? Lépjen velünk kapcsolatba, szívesen
                        segítünk!
                    </p>
                </div>
            </div>
        </section>

        <!-- Contact Content -->
        <section class="py-16 md:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-12 lg:grid-cols-2">
                    <!-- Contact Form -->
                    <div>
                        <h2 class="mb-6 text-3xl font-bold text-gray-900">
                            Küldjön üzenetet
                        </h2>
                        <form @submit.prevent="submitForm" class="space-y-6">
                            <div>
                                <label
                                    for="name"
                                    class="mb-2 block text-sm font-medium text-gray-700"
                                >
                                    Név *
                                </label>
                                <input
                                    id="name"
                                    v-model="form.name"
                                    type="text"
                                    required
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="Az Ön neve"
                                />
                                <div
                                    v-if="form.errors.name"
                                    class="mt-1 text-sm text-red-600"
                                >
                                    {{ form.errors.name }}
                                </div>
                            </div>

                            <div>
                                <label
                                    for="email"
                                    class="mb-2 block text-sm font-medium text-gray-700"
                                >
                                    Email cím *
                                </label>
                                <input
                                    id="email"
                                    v-model="form.email"
                                    type="email"
                                    required
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="pelda@email.com"
                                />
                                <div
                                    v-if="form.errors.email"
                                    class="mt-1 text-sm text-red-600"
                                >
                                    {{ form.errors.email }}
                                </div>
                            </div>

                            <div>
                                <label
                                    for="subject"
                                    class="mb-2 block text-sm font-medium text-gray-700"
                                >
                                    Tárgy *
                                </label>
                                <input
                                    id="subject"
                                    v-model="form.subject"
                                    type="text"
                                    required
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="Miben segíthetünk?"
                                />
                                <div
                                    v-if="form.errors.subject"
                                    class="mt-1 text-sm text-red-600"
                                >
                                    {{ form.errors.subject }}
                                </div>
                            </div>

                            <div>
                                <label
                                    for="message"
                                    class="mb-2 block text-sm font-medium text-gray-700"
                                >
                                    Üzenet *
                                </label>
                                <textarea
                                    id="message"
                                    v-model="form.message"
                                    required
                                    rows="6"
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="Írja le üzenetét..."
                                ></textarea>
                                <div
                                    v-if="form.errors.message"
                                    class="mt-1 text-sm text-red-600"
                                >
                                    {{ form.errors.message }}
                                </div>
                            </div>

                            <button
                                type="submit"
                                :disabled="form.processing"
                                class="w-full rounded-xl bg-blue-600 px-8 py-4 text-lg font-semibold text-white transition-all hover:bg-blue-700 disabled:cursor-not-allowed disabled:opacity-50"
                            >
                                <span v-if="!form.processing"
                                    >Üzenet küldése</span
                                >
                                <span v-else>Küldés...</span>
                            </button>
                        </form>
                    </div>

                    <!-- Contact Information -->
                    <div class="space-y-8">
                        <div>
                            <h2 class="mb-6 text-3xl font-bold text-gray-900">
                                Elérhetőségek
                            </h2>
                            <div class="space-y-6">
                                <div class="flex gap-4">
                                    <div
                                        class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-lg bg-blue-100"
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
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                            />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3
                                            class="mb-1 font-semibold text-gray-900"
                                        >
                                            Email
                                        </h3>
                                        <a
                                            href="mailto:info@example.com"
                                            class="text-gray-600 hover:text-blue-600"
                                        >
                                            info@example.com
                                        </a>
                                    </div>
                                </div>

                                <div class="flex gap-4">
                                    <div
                                        class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-lg bg-blue-100"
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
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                                            />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3
                                            class="mb-1 font-semibold text-gray-900"
                                        >
                                            Telefon
                                        </h3>
                                        <a
                                            href="tel:+36301234567"
                                            class="text-gray-600 hover:text-blue-600"
                                        >
                                            +36 30 123 4567
                                        </a>
                                    </div>
                                </div>

                                <div class="flex gap-4">
                                    <div
                                        class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-lg bg-blue-100"
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
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                            />
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                            />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3
                                            class="mb-1 font-semibold text-gray-900"
                                        >
                                            Cím
                                        </h3>
                                        <p class="text-gray-600">
                                            1234 Budapest<br />
                                            Példa utca 12.
                                        </p>
                                    </div>
                                </div>

                                <div class="flex gap-4">
                                    <div
                                        class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-lg bg-blue-100"
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
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                            />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3
                                            class="mb-1 font-semibold text-gray-900"
                                        >
                                            Nyitvatartás
                                        </h3>
                                        <p class="text-gray-600">
                                            Hétfő - Péntek: 9:00 - 18:00<br />
                                            Szombat - Vasárnap: Zárva
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ -->
                        <div class="rounded-xl bg-blue-50 p-6">
                            <h3 class="mb-4 text-xl font-bold text-gray-900">
                                Gyors válaszok
                            </h3>
                            <div class="space-y-3 text-sm text-gray-700">
                                <p>
                                    <strong>Mennyi a szállítási idő?</strong
                                    ><br />
                                    Általában 2-3 munkanapon belül kiszállítjuk
                                    a megrendeléseket.
                                </p>
                                <p>
                                    <strong
                                        >Van lehetőség személyes
                                        átvételre?</strong
                                    ><br />
                                    Igen, üzletünkben személyesen is átvehetők a
                                    termékek.
                                </p>
                                <p>
                                    <strong
                                        >Milyen fizetési módokat fogadnak
                                        el?</strong
                                    ><br />
                                    Bankkártyás fizetés, átutalás és utánvét is
                                    elérhető.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </AppLayout>
</template>
