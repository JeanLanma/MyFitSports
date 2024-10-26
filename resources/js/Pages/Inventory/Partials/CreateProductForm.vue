<script setup>
import { useForm } from '@inertiajs/vue3'
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useToast } from "vue-toastification";
import { router } from '@inertiajs/vue3';

const props = defineProps({
    product: {
        type: Object,
        default: () => ({
            name: null,
            cover: null,
            id: null,
        }),
    },
});

const toast = useToast();

const form = useForm({
    name: props.product.name,
    id: props.product.id,
});

const createTeam = () => {
    form.post(route('teams.store'), {
        errorBag: 'createTeam',
        preserveScroll: true,
        onSuccess: () => {
            toast.success('El equipo se ha registrado exitosamente.');
            router.get(route('teams.index'));
        },
        onError: (error) => {
            console.log(error);
            console.log(form);
            toast.error('Ha ocurrido un error al registrar el equipo. Si el problema persiste contacte al administrador. o al correo: "desarrollo.software@pcbtroniks.com"');
        },
    });
};

const Status = [
    'Activo',
    'Inactivo',
];
</script>

<template>
    <FormSection @submitted="createTeam">
        <template #title>
            Detalles el nuevo producto
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
                    placeholder="ej. Coca cola"
                />
                <InputError :message="form.errors.name" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="price" value="Precio de venta" />
                <TextInput
                    id="price"
                    v-model="form.name"
                    type="text"
                    class="block w-full mt-1"
                    placeholder="ej. $ 0.00"
                />
                <InputError :message="form.errors.name" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="cost" value="Costo de compra" />
                <TextInput
                    id="cost"
                    v-model="form.name"
                    type="text"
                    class="block w-full mt-1"
                    placeholder="ej. 123456789"
                />
                <InputError :message="form.errors.name" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="code" value="Codigo (opcional)" />
                <TextInput
                    id="code"
                    v-model="form.name"
                    type="text"
                    class="block w-full mt-1"
                    placeholder="$ 0.00"
                />
                <InputError :message="form.errors.name" class="mt-2" />
            </div>
            <br>
            <div class="col-span-6 sm:col-span-2">
                    <InputLabel for="gender" value="Estatus" />
                    <select 
                        id="gender"
                        name="gender" 
                        autocomplete="gender"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                    >
                        <option v-for="status in Status" :value="status">{{status}}</option>
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
