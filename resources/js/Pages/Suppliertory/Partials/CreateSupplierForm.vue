<script setup>
import { useForm } from '@inertiajs/vue3'
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useToast } from "vue-toastification";
import { router } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    product: {
        type: Object,
        default: () => ({
            name: null,
            price: null,
            cost: null,
            code: null,
            status: null,
            cover: null,
            id: null,
        }),
    },
});

const toast = useToast();

const form = useForm({
    name: props.product.name,
    type: props.product.type || 'Otros',
    cost: props.product.cost,
    code: props.product.code,
    status: props.product.status || 'activo',
    id: props.product.id,
    unit: props.product.unit,
    supplier: props.product.supplier,
    stock: props.product.stock,
    physical_inventory: props.product.physical_inventory,
});

const SubmitProduct = () => {
    form.post(route('products.store'), {
        preserveScroll: true,
        onSuccess: () => {
            toast.success('Producto añadido correctamente');
            form.reset();
            router.push(route('products.index'));
        },
        onError: () => {
            toast.error('Hubo un error al añadir el producto, recargue la página e intente de nuevo');
        },
    });
}

const Status = [
    'activo',
    'inactivo',
];
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
]

// Utils
const CustomSelecetUnit = ref(false);
const CustomSelectUnitData = ref([
    'KG',
    'PAQ',
    '650ml',
]);
</script>

<template>
    <FormSection @submitted="SubmitProduct">
        <template #title>
            Detalles del nuevo Provedor
        </template>

        <template #description>
            Registrar un nuevo producto para añadir al inventario.
        </template>

        <template #form>
            <!-- Team Name -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="name" value="Nombre del producto" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="block w-full mt-1"
                    autofocus
                    placeholder="Ej. Coca cola"
                />
                <InputError :message="form.errors.name" class="mt-2" />
            </div>
            <div class="col-span-6 py-3 sm:col-span-4 grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <InputLabel for="cost" value="Costo" />
                    <TextInput
                        id="cost"
                        v-model="form.cost"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="cost"
                        placeholder="Ej. 99.00"
                    />
                    <InputError :message="form.errors.weight" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-3 relative">
                    <InputLabel for="unit" value="Unidad" />
                    <TextInput
                        id="unit"
                        v-model="form.unit"
                        class="mt-1 block w-full"
                        autocomplete="unit"
                        placeholder="Ej. KG"
                        @focus="CustomSelecetUnit = true"
                        
                    />
                    <div @mouseleave="CustomSelecetUnit = false" v-show="CustomSelecetUnit" @mouseover="CustomSelecetUnit = true" class="absolute flex flex-col cursor-pointer bg-gray-100 rounded-b-md shadow-lg w-full border border-gray-200">
                        <span v-for="item in CustomSelectUnitData" @click="form.unit = item" class="hover:bg-gray-300 font-semibold w-full p-2">{{ item }}</span>
                    </div>
                    <InputError :message="form.errors.height" class="mt-2" />
                </div>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="supplier" value="Provedor" />
                <TextInput
                    id="supplier"
                    v-model="form.supplier"
                    type="text"
                    class="block w-full mt-1"
                />
                <InputError :message="form.errors.supplier" class="mt-2" />
            </div>
            <div class="col-span-6 py-3 sm:col-span-4 grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <InputLabel for="stock" value="Disponibilidad (stock)" />
                    <TextInput
                        id="stock"
                        v-model="form.stock"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="stock"
                        placeholder=""
                    />
                    <InputError :message="form.errors.stock" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <InputLabel for="physical_inventory" value="Disponiblidad fisica" />
                    <TextInput
                        id="physical_inventory"
                        v-model="form.physical_inventory"
                        class="mt-1 block w-full"
                        autocomplete="physical_inventory"
                    />
                    <InputError :message="form.errors.physical_inventory" class="mt-2" />
                </div>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="code" value="Codigo (opcional)" />
                <TextInput
                    id="code"
                    v-model="form.code"
                    type="text"
                    class="block w-full mt-1"
                    placeholder="Ej. 0001"
                />
                <InputError :message="form.errors.code" class="mt-2" />
            </div>
            <br>
            <div class="col-span-6 sm:col-span-2">
                <InputLabel for="status" value="Estatus" />
                <select 
                    v-model="form.status"
                    id="status"
                    name="gender" 
                    autocomplete="gender"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                >
                    <option v-for="status in Status" :value="status">{{status}}</option>
                </select>
                <InputError :message="form.errors.gender" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-2">
                <InputLabel for="type" value="Categoria" />
                <select
                    required
                    v-model="form.type"
                    id="type"
                    name="gender" 
                    autocomplete="gender"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                >
                    <option v-for="type in Types" :value="type">{{type}}</option>
                </select>
                <InputError :message="form.errors.gender" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <!-- <InputLabel for="code" value="Codigo (opcional)" /> -->
                <div class="flex w-full ">
                    <div class="rounded-md border border-gray-100 bg-white p-4 shadow-md">
                        <label for="upload" class="flex flex-col items-center gap-2 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 fill-white stroke-indigo-500" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span class="text-gray-600 font-medium">Cargar imagen</span>
                        </label>
                        <input id="upload" type="file" class="hidden" />
                    </div>
                </div>
                <InputError :message="form.errors.name" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Guardar
            </PrimaryButton>
        </template>
    </FormSection>
</template>
