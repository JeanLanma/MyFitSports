<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import InventoryList from './Partials/InventoryList.vue';

const props = defineProps({
    products: Object,
});

</script>

<template>
    <AppLayout title="Inventario">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Inventario
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <InventoryList 
                        class="mt-10 sm:mt-0"
                        :products="props.products"
                    />
                </div>
            </div>
        </div>

    </AppLayout>
</template>
