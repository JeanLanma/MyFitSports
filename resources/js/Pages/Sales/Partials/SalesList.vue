<script setup>
import Pagination from '@/Shared/Pagination.vue';
import Format from '@/Utils/Format.js';
import { ref } from 'vue';

import NavigationButton from '@/Shared/NavigationButton.vue';

const props = defineProps({
    customers: Object,
});

const GetSaleStatusColor = (status) => {
    switch (status) {
        case 'Pagado':
            return 'text-green-500';
        case 'Cotizado':
            return 'text-sky-500';
        case 'Cancelado':
            return 'text-red-500';
        default:
            return 'text-gray-500';
    }
};

const sales = ref([
    {
        id: 1,
        no_order: '0001',
        date: '25/10/2024 09:06:45',
        customer: 'Diego Gonzalez',
        seller: 'Daniel Rivera',
        branch: 'Sucursal 1',
        total: '$ 15,000.00',
        status: 'Pagado',
    },
    {
        id: 2,
        no_order: '0002',
        date: '26/10/2024 12:06:30',
        customer: 'Ariana Dias',
        seller: 'William Becerra',
        branch: 'Sucursal 1',
        total: '$ 12,000.00',
        status: 'Pagado',
    },
    {
        id: 3,
        no_order: '0003',
        date: '27/10/2024 15:06:15',
        customer: 'Francisco Hernandez',
        seller: 'Alejandro Rodriguez',
        branch: 'Sucursal 2',
        total: '$ 18,000.00',
        status: 'Cotizado',
    },
]);
</script>

<template>
    <section class="w-full antialiased bg-gray-100 text-gray-600">
        <div class="flex flex-col justify-center h-full">
            <!-- Table -->
            <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                <header class="px-5 py-4 border-b border-gray-100 flex flex-col md:flex-row justify-between">
                    <h2 class="font-bold text-gray-800 text-2xl">Ordenes de venta</h2>
                    <NavigationButton class="max-w-md text-sky-600">
                        Nueva venta
                    </NavigationButton>
                </header>
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">No. Orden</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Fecha</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Cliente</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Vendedor</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Sucursal</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Total</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Estatus</div>
                                    </th>
                                    <th  class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">...</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody v-if="sales.length > 0" class="text-sm divide-y divide-gray-100">
                                <tr v-for="sale in sales" :key="sales.id" class="h-14 hover:bg-sky-300 hover:shadow-md">
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="font-bold text-gray-800">#{{ sale.no_order }}</div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-gray-700">{{ sale.date }}</div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class=" text-gray-700">{{ sale.customer }}</div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap cursor-default">
                                        <div class="text-left ">{{ sale.seller ?? 'n/a' }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap cursor-default text-indigo-400">
                                        {{ sale.branch }}
                                    </td>
                                    <td class="p-2 whitespace-nowrap cursor-default">
                                        {{ sale.total }}
                                    </td>
                                    <td class="p-2 whitespace-nowrap cursor-default font-semibold" :class="GetSaleStatusColor(sale.status)">
                                        {{ sale.status }}
                                    </td>
                                    <td class="p-2 whitespace-nowrap cursor-default">
                                        <a :href="route('sales.show', sale.id)" class="text-left font-medium text-indigo-500 hover:text-sky-500 duration-150 hover:underline underline-offset-2">ver detalle</a>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td class="p-2 whitespace-nowrap" colspan="6">
                                        <div class="flex items-center justify-center">
                                            <p class="font-medium text-gray-800">
                                                No hay registros de clientes
                                                <a class="text-indigo-500 font-bold text-sm hover:underline hover:underline-offset-2" :href="route('customers.create')">agregar nuevo</a>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                    <div class="flex justify-center">    
                        <Pagination v-if="false" :links="props.currencies" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>