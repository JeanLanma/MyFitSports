<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import TeamsList from './Partials/ProductsList.vue';

const props = defineProps({
    teams: Object,
});

</script>

<template>
    <AppLayout title="Productos">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Productos
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <TeamsList 
                    class="mt-10 sm:mt-0"
                    :teams="props.teams"
                    />
                </div>
            </div>
        </div>

    </AppLayout>
</template>
