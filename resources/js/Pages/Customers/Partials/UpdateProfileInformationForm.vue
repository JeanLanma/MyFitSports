<script setup>
import { ref } from 'vue';
import { Link, router, useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useToast } from "vue-toastification";
const toast = useToast();

const props = defineProps({
    customer: Object,
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

const verificationLinkSent = ref(null);
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

const sendEmailVerification = () => {
    verificationLinkSent.value = true;
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
</script>

<template>
    <FormSection @submitted="updateProfileInformation">
        <template #title>
            Información de perfil
        </template>

        <template #description>
            Registra la información del cliente para poder ofrecer un mejor servicio.
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
                <InputLabel for="name" value="Nombre" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autocomplete="name"
                />
                <InputError :message="form.errors.name" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="email" value="Correo electrónico" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autocomplete="username"
                />
                <InputError :message="form.errors.email" class="mt-2" />

                <div v-if="$page.props.jetstream.hasEmailVerification && user.email_verified_at === null">
                    <p class="text-sm mt-2">
                        Tu dirección de correo electrónico no está verificada.

                        <Link
                            :href="route('verification.send')"
                            method="post"
                            as="button"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            @click.prevent="sendEmailVerification"
                        >
                            De click aquí para solicitar un enlace de verificación
                        </Link>
                    </p>

                    <div v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        Una nueva verificación ha sido enviada a tu dirección de correo electrónico.
                    </div>
                </div>
            </div>

            <!-- Phone -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="phone" value="Teléfono" />
                <TextInput
                    id="phone"
                    v-model="form.phone"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="tel"
                />
                <InputError :message="form.errors.phone" class="mt-2" />
            </div>

            <!-- Address -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="address" value="Dirección" />
                <TextInput
                    id="address"
                    v-model="form.address"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="address"
                    placeholder="Calle, número, colonia, ciudad, estado, código postal"
                />
                <InputError :message="form.errors.address" class="mt-2" />
            </div>

            <div class="col-span-6 py-3 sm:col-span-4 grid grid-cols-6 gap-6">

                <!-- Age -->
                <div class="col-span-6 sm:col-span-3">
                    <InputLabel for="age" value="Edad" />
                    <TextInput
                        id="age"
                        v-model="form.age"
                        type="number"
                        class="mt-1 block w-full"
                        autocomplete="age"
                        placeholder="Años"
                    />
                    <InputError :message="form.errors.age" class="mt-2" />
                </div>

                <!-- Gender -->
                <div class="col-span-6 sm:col-span-3">
                    <InputLabel for="gender" value="Genero" />
                    <TextInput
                        id="gender"
                        v-model="form.gender"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="gender"
                        placeholder="Masculino, Femenino, Otro..."
                    />
                    <InputError :message="form.errors.gender" class="mt-2" />
                </div>
            
            </div>

            <div class="col-span-6 py-3 sm:col-span-4 grid grid-cols-6 gap-6">
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

            <!-- Activity -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="activity" value="Actividad fisica" />
                <TextInput
                    id="activity"
                    v-model="form.activity"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="activity"
                    placeholder="Deporte que practica"
                />
                <InputError :message="form.errors.activity" class="mt-2" />
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
