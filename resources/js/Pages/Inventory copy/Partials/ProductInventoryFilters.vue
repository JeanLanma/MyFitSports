<script setup>
import { useForm } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3';
import { ref } from 'vue';
const props = defineProps({
    params: Object,
});

const filterForm = useForm({
    name: props.params.name,
    type: props.params?.type || 'Todos',
    supplier: props.params.supplier,
});
const filters = ref({
    name: props.params.name,
    type: props.params?.type || 'Todos',
    supplier: props.params.supplier,
});
const Types = [
    'Carnes',
    'Cremeria',
    'Abarrotes',
    'Frutas y verduras',
    'Suministros',
    'Producciones',
    'Quimicos',
    'Odisa',
    'Eurote',
    'Acción alimentacia',
    'Delipan',
    'Delinats',
    'Coffe solutions',
    'Otros',
];

const submitFilter = (key) => {
    props.params[key] = filterForm[key];
    const Queries = {...props.params, page: 1};
    
    router.get(route('inventory.index', Queries));
}
</script>
<template>
<div class="flex gap-4 flex-col md:flex-row px-2">
    <div class="w-full">
        <label for="supplier" class="text-sm text-gray-400">Provedor</label>
        <input @change="submitFilter('supplier')" v-model="filterForm.supplier" class="w-full rounded-xl border-2 border-sky-500" type="text" name="supplier" id="supplier">
    </div>
    <div class="w-full">
        <label for="name" class="text-sm text-gray-400">Producto</label>
        <input type="text" @change="submitFilter('name')" v-model="filterForm.name" class="w-full rounded-xl border-2 border-sky-500" name="name" id="name">
    </div>
    <div class="w-full">
        <label for="type" class="text-sm text-gray-400">Categoria</label>
        <select @change="submitFilter('type')" v-model="filterForm.type" class="w-full border-2 border-sky-500 rounded-xl" name="type" id="type">
            <option v-for="type in Types" :value="type" :key="type">{{ type }}</option>
        </select>
    </div>
</div>
<div class="w-full flex gap-4 flex-col md:flex-row justify-end items-end px-2 pt-2 pb-4">
    <div>
        <a :href="route('inventory.index')" class="text-gray-400 underline underline-offset-2 hover:text-sky-600">Limpiar filtros</a>
    </div>
</div>
</template>