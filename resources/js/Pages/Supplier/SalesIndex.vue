<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import SalesList from './Partials/SalesList.vue';
import CurrencyMenu from './Partials/CurrencyMenu.vue';

const props = defineProps({
    customers: Object,
});

</script>

<template>
    <AppLayout title="Ventas">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Ventas
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <SalesList 
                    class="mt-10 sm:mt-0"
                    :customers="props.customers"
                    />
                </div>
            </div>
        </div>

    </AppLayout>
</template>
