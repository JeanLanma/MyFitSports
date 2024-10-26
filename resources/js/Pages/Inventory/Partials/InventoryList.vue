<script setup>
import Pagination from '@/Shared/Pagination.vue';
import Format from '@/Utils/Format.js';
import { ref } from 'vue';

import NavigationButton from '@/Shared/NavigationButton.vue';

const GetStatusColor = (status) => {
    switch (status) {
        case 'Full':
            return 'text-green-500 bg-green-100 rounded-full';
        default:
            return 'text-gray-500 bg-gray-100 rounded-full';
    }
};

const inventory = ref([
    {
        id: 1,
        product: 'Cafe americano',
        unit_price: '$ 100.00',
        stock: 50,
        updated_at: '2024-10-25 09:06:45',
        status: 'Activo',
    },
    {
        id: 1,
        product: 'Paquete de galletas',
        unit_price: '$ 80.00',
        stock: 40,
        updated_at: '2024-10-27 09:06:45',
        status: 'Activo',
    },
]);
</script>

<template>
    <section class="w-full antialiased bg-gray-100 text-gray-600">
        <div class="flex flex-col justify-center h-full">
            <!-- Table -->
            <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                <header class="px-5 py-4 border-b border-gray-100 flex flex-col md:flex-row justify-between">
                    <h2 class="font-bold text-gray-800 text-2xl">Inventarios</h2>
                    <NavigationButton class="max-w-md text-sky-600">
                        Añadir nuevo
                    </NavigationButton>
                </header>
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">ID</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Producto</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Costo unitario</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Existencias</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Ultima actualización</div>
                                    </th>
                                    <th  class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">...</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody v-if="inventory.length > 0" class="text-sm divide-y divide-gray-100">
                                <tr v-for="inv in inventory" :key="inv.id" class="h-14 hover:bg-sky-300 hover:shadow-md">
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="font-bold text-gray-700">{{ inv.id }}</div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-gray-700">{{ inv.product }}</div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class=" text-gray-700">{{ inv.unit_price }}</div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap cursor-default text-indigo-400">
                                        {{ inv.stock }}
                                    </td>
                                    <td class="p-2 whitespace-nowrap cursor-default font-semibold">
                                        <span class="py-1 px-3" :class="GetStatusColor(inv.status)">
                                            {{ inv.updated_at }}
                                        </span>
                                    </td>
                                    <td class="p-2 whitespace-nowrap cursor-default">
                                        <a :href="route('inventory.show', inv.id)" class="text-left font-medium text-indigo-500 hover:text-sky-500 duration-150 hover:underline underline-offset-2">ver detalle</a>
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