<script setup>
import Pagination from '@/Shared/Pagination.vue';
import Format from '@/utils/Format.js';
import { Inertia } from '@inertiajs/inertia';

import NavigationButton from '@/Shared/NavigationButton.vue';

const props = defineProps({
    currencies: Object,
});
const GoToRoute = (routeName, params = {}) => {
    Inertia.visit(route(routeName, params));
};
</script>

<template>
    <section class="w-full antialiased bg-gray-100 text-gray-600">
        <div class="flex flex-col justify-center h-full">
            <!-- Table -->
            <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                <header class="px-5 py-4 border-b border-gray-100 flex flex-col md:flex-row justify-between">
                    <h2 class="font-bold text-gray-800 text-2xl">Divisas</h2>
                    <NavigationButton class="max-w-md text-sky-600" @click.native="GoToRoute('localisation.currencies.show')">
                        Agregar divisa
                    </NavigationButton>
                </header>
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Codigo</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Nombre</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Tasa de conversion</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Simbolo</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Ultima actualización</div>
                                    </th>
                                    <th  class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">...</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody v-if="props.currencies.data.length > 0" class="text-sm divide-y divide-gray-100">
                                <tr v-for="currency in props.currencies.data" :key="currency.id" class="h-14 hover:bg-sky-300">
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="font-bold text-gray-700">{{ currency.code }}</div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="font-medium text-gray-800">{{ currency.name }}</div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap cursor-default text-indigo-400 font-bold">
                                        {{ currency.conversion_rate }}
                                    </td>
                                    <td class="p-2 whitespace-nowrap cursor-default">
                                        <div class="text-left font-bold">{{ currency.symbol }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap cursor-default">
                                        {{ Format.TimestampToDate(currency.created_at) }}
                                    </td>
                                    <td class="p-2 whitespace-nowrap cursor-default">
                                        <a :href="route('localisation.currencies.show', {currency: currency.id})" class="text-left font-medium text-indigo-500 hover:text-sky-500 duration-150 hover:underline underline-offset-2">ver detalle</a>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td class="p-2 whitespace-nowrap" colspan="6">
                                        <div class="flex items-center justify-center">
                                            <p class="font-medium text-gray-800">
                                                No hay divisas registradas
                                                <a class="text-indigo-500 font-bold text-sm hover:underline hover:underline-offset-2" :href="route('localisation.currencies.show')">agregar una nueva divisa</a>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                    <div class="flex justify-center">    
                        <Pagination :links="props.currencies" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>