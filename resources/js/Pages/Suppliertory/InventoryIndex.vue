<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import InventoryList from './Partials/SuppliertoryList.vue';
import ProductInventoryFilters from './Partials/ProductInventoryFilters.vue';
import PaginationRounded from '@/Shared/PaginationRounded.vue';
import SuppliertoryList from './Partials/SuppliertoryList.vue';

const props = defineProps({
    products: Object,
    params: Object | Array
});
</script>

<template>
    <AppLayout title="Proveedores">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Proveedores
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <!-- <ProductInventoryFilters :params="props.params" /> -->

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <SuppliertoryList
                        :products="props.products"
                    />
                </div>

                <!-- Pagination -->
                <div class="my-4">
                    <nav class="flex justify-end" aria-label="Page navigation">
                        <PaginationRounded :PaginationObject="props.products" :Params="props.params" />
                    </nav>
                 </div>
            </div>
        </div>

    </AppLayout>
</template>
