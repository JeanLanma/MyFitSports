<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import BranchesList from './Partials/BranchesList.vue';

const props = defineProps({
    customers: Object,
});

</script>

<template>
    <AppLayout title="Sucursales">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Sucursales
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <BranchesList 
                    class="mt-10 sm:mt-0"
                    />
                </div>
            </div>
        </div>

    </AppLayout>
</template>
