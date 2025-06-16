<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ProductInventoryFilters from './Partials/ProductInventoryFilters.vue';
import PaginationRounded from '@/Shared/PaginationRounded.vue';
import SupplierList from './Partials/SupplierList.vue';

const props = defineProps({
    suppliers: Object,
    params: Object | Array
});

console.log(props.supplier);
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
                    <SupplierList
                        :suppliers="props.suppliers"
                    />
                </div>

                <!-- Pagination -->
                <div class="my-4">
                    <nav class="flex justify-end" aria-label="Page navigation">
                        <PaginationRounded :PaginationObject="props.suppliers" :Params="props.params" />
                    </nav>
                 </div>
            </div>
        </div>

    </AppLayout>
</template>
