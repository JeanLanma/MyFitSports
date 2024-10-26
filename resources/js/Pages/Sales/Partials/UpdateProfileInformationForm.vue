<script setup>
import SecondaryButton from '@/Components/SecondaryButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import ActionMessage from '@/Components/ActionMessage.vue';
import { Link, router, useForm } from '@inertiajs/vue3';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { useToast } from "vue-toastification";
import { ref } from 'vue';

const toast = useToast();

const props = defineProps({
    customer: Object,
    sale: Object,
});
console.log(props.customer);
const form = useForm({
    _method: 'POST',
    name: props.customer?.name ?? null,
    email: props.customer?.email ?? null,
    phone: props.customer?.phone ?? null,
    address: props.customer?.address ?? null,
    age: props.customer?.age ?? null,
    weight: props.customer?.weight ?? null,
    height: props.customer?.height ?? null,
    gender: props.customer?.gender ?? null,
    size: props.customer?.size ?? null,
    activity: props.customer?.activity ?? null,
    status: null,
    photo: null,
});

const photoPreview = ref(null);
const photoInput = ref(null);

const updateProfileInformation = () => {
    if (photoInput.value) {
        form.photo = photoInput.value.files[0];
    }

    form.post(route('customers.store'), {
        errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => {
            clearPhotoFileInput(),
            form.reset(),
            toast.success('Cliente registrado con éxito.');
        },
    });
};

const selectNewPhoto = () => {
    photoInput.value.click();
};

const updatePhotoPreview = () => {
    const photo = photoInput.value.files[0];

    if (! photo) return;

    const reader = new FileReader();

    reader.onload = (e) => {
        photoPreview.value = e.target.result;
    };

    reader.readAsDataURL(photo);
};

const deletePhoto = () => {
    router.delete(route('current-user-photo.destroy'), {
        preserveScroll: true,
        onSuccess: () => {
            photoPreview.value = null;
            clearPhotoFileInput();
        },
    });
};

const clearPhotoFileInput = () => {
    if (photoInput.value?.value) {
        photoInput.value.value = null;
    }
};
/** */
const Status = {
    'pagada': 'Pagada',
    'pendiente': 'Pendiente',
    'cancelada': 'Cancelada',
    'entregada': 'Entregada',
    'cotizada': 'Cotizada',   
}
</script>

<template>
    <FormSection @submitted="updateProfileInformation">
        <template #title>
            Información de la venta
        </template>

        <template #description>
            Mas detalles sobre la orden de venta
        </template>

        <template #form>
            <!-- Profile Photo -->
            <div v-if="$page.props.jetstream.managesProfilePhotos" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input
                    id="photo"
                    ref="photoInput"
                    type="file"
                    class="hidden"
                    @change="updatePhotoPreview"
                >

                <InputLabel for="photo" value="Foto" />

                <!-- Current Profile Photo -->
                <div v-show="! photoPreview" class="mt-2">
                    <img :src="user.profile_photo_url" :alt="user.name" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div v-show="photoPreview" class="mt-2">
                    <span
                        class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        :style="'background-image: url(\'' + photoPreview + '\');'"
                    />
                </div>

                <SecondaryButton class="mt-2 me-2" type="button" @click.prevent="selectNewPhoto">
                    Seleccione una nueva foto
                </SecondaryButton>

                <SecondaryButton
                    v-if="user.profile_photo_path"
                    type="button"
                    class="mt-2"
                    @click.prevent="deletePhoto"
                >
                    Quitar foto
                </SecondaryButton>

                <InputError :message="form.errors.photo" class="mt-2" />
            </div>

            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="name" value="# Numero de orden" />
                <TextInput
                    id="name"
                    v-model="sale.no_order"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    aria-disabled="true"
                    disabled="true"
                    autocomplete="name"
                />
                <InputError :message="form.errors.name" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="email" value="Cliente" />
                <TextInput
                    id="email"
                    v-model="sale.customer"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autocomplete="username"
                />
                <InputError :message="form.errors.email" class="mt-2" />
            </div>

            <!-- Phone -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="phone" value="Vendedor" />
                <TextInput
                    id="phone"
                    v-model="sale.seller"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="tel"
                />
                <InputError :message="form.errors.phone" class="mt-2" />
            </div>

            <!-- Address -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="address" value="Sucursal" />
                <TextInput
                    id="address"
                    v-model="sale.branch"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="address"
                    disabled="true"
                    placeholder="Calle, número, colonia, ciudad, estado, código postal"
                />
                <InputError :message="form.errors.address" class="mt-2" />
            </div>

            <div class="col-span-6 py-3 sm:col-span-4 grid grid-cols-6 gap-6">

                <!-- Age -->
                <div class="col-span-6 sm:col-span-3">
                    <InputLabel for="age" value="Fecha" />
                    <TextInput
                        id="age"
                        v-model="sale.date"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="age"
                        placeholder="Fecha"
                    />
                    <InputError :message="form.errors.age" class="mt-2" />
                </div>

                <!-- Gender -->
                <div class="col-span-6 sm:col-span-3">
                    <InputLabel for="gender" value="Estatus" />
                    <select 
                        id="gender"
                        name="gender" 
                        autocomplete="gender"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                    >
                        <option v-for="status in Status" :value="status" :selected="sale.status == status">{{status}}</option>
                    </select>
                    <InputError :message="form.errors.gender" class="mt-2" />
                </div>
            
            </div>

            <div class="hidden col-span-6 py-3 sm:col-span-4 grid grid-cols-6 gap-6">
                <!-- Weight -->
                <div class="col-span-6 sm:col-span-3">
                    <InputLabel for="weight" value="Peso" />
                    <TextInput
                        id="weight"
                        v-model="form.weight"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="weight"
                        placeholder="kg"
                    />
                    <InputError :message="form.errors.weight" class="mt-2" />
                </div>

                <!-- Height -->
                <div class="col-span-6 sm:col-span-3">
                    <InputLabel for="height" value="Altura" />
                    <TextInput
                        id="height"
                        v-model="form.height"
                        type="number"
                        class="mt-1 block w-full"
                        autocomplete="height"
                        placeholder="cm"
                    />
                    <InputError :message="form.errors.height" class="mt-2" />
                </div>

                <!-- Size -->
                <div class="col-span-6 sm:col-span-3">
                    <InputLabel for="size" value="Talla" />
                    <TextInput
                        id="size"
                        v-model="form.size"
                        type="number"
                        class="mt-1 block w-full"
                        autocomplete="size"
                        placeholder="cm"
                    />
                    <InputError :message="form.errors.size" class="mt-2" />
                </div>
            
            </div>
            
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="me-3">
                Guardado.
            </ActionMessage>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Guardar
            </PrimaryButton>
        </template>
    </FormSection>
</template>
