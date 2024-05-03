<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { ErrorAlert } from '@/Services/Alerts.js';
import { Inertia } from '@inertiajs/inertia'
import { ref } from 'vue';
import ConfirmationModal from '@/Components/ConfirmationModal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';

const props = defineProps({
    currency: Object,
});

const confirmingCurrencyDeletion = ref(false);

const form = useForm({
    name: props.currency?.name || null,
    conversion_rate: props.currency?.conversion_rate || null,
    symbol: props.currency?.symbol || null,
    code: props.currency?.code || null,
});

const submit = () => {
    form.post(route('localisation.currencies.store'), {
        preserveScroll: true,
        onSuccess: () => {
            Inertia.visit(route('localisation.currencies.index'));
        },
        onError: (errors) => {
            console.log(errors);
            const text = Object.values(errors).flat().join(' - ');
            ErrorAlert('Error al agregar la divisa', text);
        },
    });
};

const submitDeleteCurrency = () => {
    form.delete(route('localisation.currencies.destroy', { currency: props.currency.id }), {
        preserveScroll: true,
        onSuccess: () => {
            Inertia.visit(route('localisation.currencies.index'));
        },
        onError: (errors) => {
            console.log(errors);
            const text = Object.values(errors).flat().join(' - ');
            ErrorAlert('Error al eliminar la divisa', text);
        },
    });
};
</script>

<template>

<!-- Confirm Delete modal -->
<ConfirmationModal :show="confirmingCurrencyDeletion && props.currency?.id" @close="confirmingCurrencyDeletion = false">
    <template #title>
        Se eliminara la divisa <span class="text-sm text-gray-500 font-bold">{{ props.currency?.name }} ({{ props.currency?.code }})</span>
    </template>

    <template #content>
        <p class="text-sm">
            ¿Estás seguro de que deseas eliminar esta divisa? Una vez eliminada, no se podrá recuperar.
        </p>
    </template>

    <template #footer>
        <SecondaryButton @click.native="confirmingCurrencyDeletion = false">
            Cancelar operación
        </SecondaryButton>

        <DangerButton class="ml-2" @click.native="submitDeleteCurrency" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
            Eliminar divisa
        </DangerButton>
    </template>
</ConfirmationModal>
<!-- Confirm Delete modal -->
    <FormSection @submitted="submit">
        <template #title>
            Divisa
        </template>

        <template #description>
            Las monedas o divisas son utilizadas para el manejo de precios en la plataforma.
            Su funcion es la de poder manejar precios en diferentes monedas.
            Puedes 
            <span v-if="!props.currency?.id">
                <a :href="route('localisation.currencies.index')" class="text-blue-500">ver todas las divisas</a>
            </span>
            <span v-else>
                <a :href="route('localisation.currencies.show')" class="text-blue-500">agregar una nueva divisa</a>
            </span>
        </template>

        <template #form>

            <div v-if="props.currency?.id" class="col-span-6 sm:col-span-4 flex justify-end">
                <button type="button" @click.prevent="confirmingCurrencyDeletion = true" class="border-2 border-red-500 text-red-500 hover:bg-red-500 hover:text-white py-1 px-4 rounded-xl duration-150 hover:shadow-md hover:shadow-red-600">Eliminar divisa</button>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="adult_low_price" value="Nombre" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    placeholder="Nombre de la moneda"
                    type="text"
                    class="mt-1 block w-full"
                    spellcheck="false"
                />
                <InputError :message="form.errors.adult_low_price" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="adult_low_price" value="Tasa de conversión" />
                <TextInput
                    id="conversion_rate"
                    v-model="form.conversion_rate"
                    pattern="[0-9]+([,\.][0-9]+)?"
                    type="text"
                    placeholder="0.01, 1.16..."
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.adult_low_price" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="adult_low_price" value="Codigo de moneda" />
                <TextInput
                    id="code"
                    v-model="form.code"
                    placeholder=""
                    type="text"
                    class="mt-1 block w-full"
                    spellcheck="false"
                />
                <InputError :message="form.errors.adult_low_price" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="adult_low_price" value="Simbolo" />
                <TextInput
                    id="symbol"
                    v-model="form.symbol"
                    placeholder=""
                    type="text"
                    class="mt-1 block w-full"
                    spellcheck="false"
                />
                <InputError :message="form.errors.adult_low_price" class="mt-2" />
            </div>

        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="mr-3">
                Guardado.
            </ActionMessage>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Guardar
            </PrimaryButton>
        </template>
    </FormSection>
</template>
