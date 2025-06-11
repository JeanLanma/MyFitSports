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
    supplier: Object
});

const toast = useToast();

const form = useForm({
    category: props.supplier.category,
    fiscal_name: props.supplier.fiscal_name,
    trade_name: props.supplier.trade_name,
    responsible_contact: props.supplier.responsible_contact,
    phone: props.supplier.phone,
    mail: props.supplier.mail,
    payment_method: props.supplier.payment_method,
    credit_days: props.supplier.credit_days,
    application_type: props.supplier.application_type,
    seal_type: props.supplier.seal_type,
    id: props.supplier.id,
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
            Registrar un nuevo provedor.
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="fiscal_name" value="Razón Social" />
                <TextInput
                    id="fiscal_name"
                    v-model="form.fiscal_name"
                    type="text"
                    class="block w-full mt-1"
                    autofocus
                />
                <InputError :message="form.errors.fiscal_name" class="mt-2" />
            </div>
            <div class="col-span-6 py-3 sm:col-span-4 grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <InputLabel for="trade_name" value="Nombre comercial" />
                    <TextInput
                        id="trade_name"
                        v-model="form.trade_name"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="trade_name"
                    />
                    <InputError :message="form.errors.trade_name" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-3 relative">
                    <InputLabel for="responsible_contact" value="Contacto responsable" />
                    <TextInput
                        id="responsible_contact"
                        v-model="form.responsible_contact"
                        class="mt-1 block w-full"
                        autocomplete="responsible_contact"
                    />
                    <InputError :message="form.errors.responsible_contact" class="mt-2" />
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
                    <InputLabel for="phone" value="Teléfono" />
                    <TextInput
                        id="phone"
                        v-model="form.phone"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="phone"
                    />
                    <InputError :message="form.errors.phone" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <InputLabel for="mail" value="Correo electrónico" />
                    <TextInput
                        id="mail"
                        v-model="form.mail"
                        class="mt-1 block w-full"
                        autocomplete="mail"
                    />
                    <InputError :message="form.errors.mail" class="mt-2" />
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
