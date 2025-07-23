<script setup>
import { useForm } from "@inertiajs/vue3";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { useToast } from "vue-toastification";
import { router } from "@inertiajs/vue3";

const props = defineProps({
    supplier: Object,
});

const toast = useToast();

const form = useForm({
    category_id: props.supplier.category_id || null,
    fiscal_name: props.supplier.fiscal_name || ``,
    trade_name: props.supplier.trade_name || ``,
    responsible_contact: props.supplier.responsible_contact || ``,
    phone: props.supplier.phone || ``,
    mail: props.supplier.mail || '',
    payment_method: props.supplier.payment_method || null,
    credit_days: props.supplier.credit_days ?? ``,
    application_type: props.supplier.application_type || null,
    seal_type: props.supplier.seal_type || null,
    web_url: props.supplier.weburl || '',
});

const SubmitProduct = () => {
    form.post(route("supplier.store"), {
        preserveScroll: true,
        onSuccess: () => {
            toast.success("Proveedor añadido correctamente");
            form.reset();
            router.push(route("supplier.index"));
        },
        onError: () => {
            toast.error("Hubo un error, recargue la página e intente de nuevo");
        },
    });
};

//Validate that the data form has sent the correct data
function showForm() {
    console.log("Estos son los datos del form: ", form);
}



</script>

<template>
    <FormSection @submitted="SubmitProduct">
        <template #title> Detalles del nuevo Provedor </template>

        <template #description> Registrar un nuevo provedor. </template>

        <template #form>
            <div class="col-span-6 sm:col-span-3">
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
            <div class="col-span-6 sm:col-span-3">
                <div class="flex justify-between items-center">
                    <InputLabel for="category" value="Familia" />
                    <button type="button" class="text-indigo-500 underline text-xs cursor-pointer hover:bg-indigo-100 rounded duration-150 ring-indigo-600 active:ring-2 active:text-indigo-600">Agregar categoría</button>
                </div>
                <select
                    required
                    v-model="form.category_id"
                    id="category"
                    autocomplete="category_id"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                    
                >
                    <option value="null" class="bg-gray-100" disabled >-- Seleccionar categoria --</option>
                    <option value="1">Carnes</option>
                    <option value="2">abarrotes</option>
                    <option value="3">Otros</option>
                </select>
                <InputError :message="form.errors.category_id" class="mt-2" />
            </div>
            <div class="col-span-6 py-3 grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <InputLabel for="trade_name" value="Nombre comercial" />
                    <TextInput
                        id="trade_name"
                        v-model="form.trade_name"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="trade_name"
                    />
                    <InputError
                        :message="form.errors.trade_name"
                        class="mt-2"
                    />
                </div>
                <div class="col-span-6 sm:col-span-3 relative">
                    <InputLabel
                        for="responsible_contact"
                        value="Contacto responsable"
                    />
                    <TextInput
                        id="responsible_contact"
                        v-model="form.responsible_contact"
                        class="mt-1 block w-full"
                        autocomplete="responsible_contact"
                    />
                    <InputError
                        :message="form.errors.responsible_contact"
                        class="mt-2"
                    />
                </div>
            </div>
            <div class="col-span-6 sm:col-span-2">
                <InputLabel for="application-type" value="Tipo de Solicitud"  />
                <select
                    required
                    v-model="form.application_type"
                    id="application-type"
                    autocomplete="application_days"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                    
                >
                    <option value="null" class="bg-gray-100" disabled>
                        -- Seleccione un tipo de solicitud --
                    </option>
                    <option value="Llamada">Llamada</option>
                    <option value="E-mail">Correo</option>
                    <option value="WhatsApp">WhatsApp</option>
                    <option value="Página">Página de Internet</option>
                </select>
                <InputError
                    :message="form.errors.application_type"
                    class="mt-2"
                />
            </div>
            <div class="col-span-6 sm:col-span-2">
                <InputLabel for="payment" value="Método de Pago" />
                <select
                    id="payment"
                    v-model="form.payment_method"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                >
                    <option value="null" class="bg-gray-100" disabled>
                        -- Seleccione un método de pago --
                    </option>
                    <option value="Efectivo">Efectivo</option>
                    <option value="Credito">Crédito</option>
                    <option value="Transferencia">Transferencia</option>
                </select>
                <InputError
                    :message="form.errors.payment_method"
                    class="mt-2"
                />
            </div>
            <div class="col-span-2 sm:col-span-2">
                <InputLabel for="credit-days" value="Dias de Crédito" />
                <input
                    type="text"
                    v-model="form.credit_days"
                    id="credit-days"
                    autocomplete="credit_days"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                />

                <InputError :message="form.errors.credit_days" class="mt-2" />
            </div>

            <div v-if="form.application_type === 'E-mail'" class="col-span-2">
                <InputLabel for="email" value="Correo Electronico" />
                <TextInput
                    id="mail"
                    v-model="form.mail"
                    type="text"
                    class="block w-full mt-1"
                />
                <InputError :message="form.errors.mail" class="mt-2" />
            </div>
            <div
                v-if=" form.application_type === 'Llamada' ||
                    form.application_type === 'WhatsApp'
                "
                class="col-span-2"
            >
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
            <div v-if="form.application_type === 'Call' || form.application_type === 'Whatsapp'" class="col-span-2">
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

            <div v-if="form.application_type === 'Página'" class="col-span-2">
                <InputLabel for="web" value="Página web" />
                <TextInput
                    id="website"
                    v-model="form.web_url"
                    type="text"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.web_url" class="mt-2" />
            </div>

            <div class="col-span-4">
                <InputLabel for="seal-type" value="Tipo de sello" />
                <select
                    id="seal-type"
                    v-model="form.seal_type"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                    
                    <option value="null" class="bg-gray-100" disabled >-- Seleccione estado de pago --</option>
                    <option value="Pagado" class="bg-green-200">RECIBIDO / PAGADO</option>
                    <option value="Pendiente de pago" class="bg-red-200">PENDIENTE DE PAGO</option>
            </select>
                <InputError :message="form.errors.seal_type" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <PrimaryButton
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Guardar
            </PrimaryButton>
        </template>
    </FormSection>
</template>
