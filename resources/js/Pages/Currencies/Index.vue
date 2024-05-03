<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CurrenciesList from './Partials/CurrenciesList.vue';
import CurrencyMenu from './Partials/CurrencyMenu.vue';

const props = defineProps({
    currencies: Object,
});

</script>

<template>
    <AppLayout title="Divisas - Freetraveler">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Divisas
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <CurrenciesList 
                    class="mt-10 sm:mt-0"
                    :currencies="props.currencies"
                    />
                </div>
            </div>
        </div>

    </AppLayout>
</template>
