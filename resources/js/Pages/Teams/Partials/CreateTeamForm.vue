<script setup>
import { useForm } from '@inertiajs/vue3'
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useToast } from "vue-toastification";
const toast = useToast();

const form = useForm({
    name: '',
});

const createTeam = () => {
    form.post(route('teams.store'), {
        errorBag: 'createTeam',
        preserveScroll: true,
        onSuccess: () => {
            toast.success('El equipo se ha registrado exitosamente.');
            form.reset();
        },
    });
};
</script>

<template>
    <FormSection @submitted="createTeam">
        <template #title>
            Detalles el nuevo equipo
        </template>

        <template #description>
            Registrar un nuevo equipo para colaborar juntos en nuevos proyectos.
        </template>

        <template #form>
            <div class="col-span-6">
                <InputLabel value="Administrador" />

                <div class="flex items-center mt-2">
                    <!-- <img class="object-cover w-12 h-12 rounded-full" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name"> -->

                    <div class="ml-4 leading-tight">
                        <div>{{ $page.props.auth.user.name }}</div>
                        <div class="text-sm text-gray-700">
                            {{ $page.props.auth.user.email }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Team Name -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="name" value="Nombre" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="block w-full mt-1"
                    autofocus
                />
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
