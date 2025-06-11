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
           <br>
            <div class="col-span-6 sm:col-span-2">
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
            <div class="col-span-6 sm:col-span-2">
                <InputLabel for="payment" value="Método de Pago" />
                <select
                    id="payment"
                    v-model="form.payment_method"
                    type="text"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                    
                    <option value="null" selected disabled>-- Seleccione un método de pago --</option>
                    <option value="">Efectivo </option>
                    <option value="">Crédito </option>
                    <option value="">Transferencia </option>
                 </select>
                <InputError :message="form.errors.payment_method" class="mt-2" />
            </div>
            <br>
            <div class="col-span-6 sm:col-span-2">
                <InputLabel for="credit-days" value="Dias de Crédito" />
                <input
                type="number"
                    v-model="form.credit_days"
                    id="credit-days"
                    autocomplete="credit_days"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                >
                    
            </input>
                <InputError :message="form.errors.credit_days" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-2">
                <InputLabel for="application-type" value="Tipo de Solicitud" />
                <select
                    required
                    v-model="form.application_type"
                    id="application-type"
                    autocomplete="application_days"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                >
                    <option value="Call">Llamada</option>
                    <option value="Email">Correo</option>
                    <option value="WhatsApp">WhatsApp</option>
                    <option value="Website">Página de Internet</option>
                    
                </select>
                <InputError :message="form.errors.application_type" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="seal-type" value="Seal type" />
                <TextInput
                    id="seal-type"
                    v-model="form.seal_type"
                    type="text"
                    class="block w-full mt-1"
                    
                />
                <InputError :message="form.errors.seal_type" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Guardar
            </PrimaryButton>
        </template>
    </FormSection>
</template>
