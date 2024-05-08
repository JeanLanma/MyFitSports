<script setup>
import FormSection from '@/Components/FormSection.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    team: {
        type: Object,
        default: () => ({
            cover: null,
            id: null,
        }),
    },
});

const fileInput = ref(null);
const handlePreview = (file = null) => {
    const preview = (props.team.cover != null && file == null) ? `/storage/teams/${props.team.cover}` : file;
    return preview;
};
const File = ref({
    name: null,
    size: null,
    preview: handlePreview(),
});

const form = useForm({
    cover: null,
    id: props.team.id,
});

const onFileChange = (event) => {
    form.cover = event.target.files[0];
    HandleImage(form.cover);
};


const HandleImage = (file) => {
    File.value.preview = URL.createObjectURL(file);
    File.value.name = file.name.length > 20 ? file.name.substring(0, 20) + "..." : file.name;
    File.value.size =
        file.size > 1024
        ? file.size > 1048576
            ? Math.round(file.size / 1048576) + "mb"
            : Math.round(file.size / 1024) + "kb"
        : file.size + "b";
    HandleSubmit();
};

const HandleReset = () => {
    form.reset();
    File.value.preview = null;
    File.value.name = null;
    File.value.size = null;
};
const HandleSubmit = () => {
    form.post(route('teams.store'), {
        preserveScroll: true,
        onSuccess: () => {
            toast.success('Imagen actualizada exitosamente.', {
                position: 'top-right',
                timeout: 2000,
                closeOnClick: true,
                pauseOnFocusLoss: true,
                pauseOnHover: true,
                draggable: true,
                draggablePercent: 0.6,
                showCloseButtonOnHover: false,
                hideProgressBar: false,
                closeButton: 'button',
                icon: true,
            });
            
        },
    });
}
console.log(props.team);
</script>

<template>
     <FormSection @submitted="HandleSubmit">
        <template #title>
            Agregar una imagen
        </template>

        <template #description>
            Puedes añadir una imagen
        </template>

        <template #form>

            <input @change="onFileChange" ref="fileInput" :v-model="form.cover" type="file" name="file" id="file" class="hidden">

            <div class="col-span-6 md:col-span-3">
                <div @click="fileInput.click()" class="border border-dashed border-gray-400 rounded-md h-full text-center flex flex-col justify-center items-center py-8 hover:border-gray-700 hover:cursor-pointer group">
                    <template v-if="form.progress">
                        {{ form.progress.percentage }}%
                        <progress  :value="form.progress.percentage" max="100">
                            <span>Progeso: {{ form.progress.percentage }}%</span>
                        </progress>
                    </template>
                    <h3 class="text-xl font-bold text-gray-600 group-hover:text-gray-900">
                        Subir una imagen
                    </h3>
                    <svg class="w-16 h-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
            </div>

            <div class="col-span-6 md:col-span-3">
                <div v-if="File.preview" class="mt-4 md:mt-0">
                    <article class="w-full relative group">
                        <img :src="File.preview" alt="preview" class="rounded-md w-full">
                        <section class="hidden group-hover:block">
                            <p class="absolute top-0 bg-red-500 w-full hover:bg-red-800">
                                <button @click.preventDefault="HandleReset" class="px-4 py-2 font-bold text-white rounded-md text-center w-full">
                                    Eliminar
                                </button>
                            </p>
                        </section>
                        <section class="hidden group-hover:block">
                            <p class="absolute bottom-0 bg-white px-4 w-full">
                                <span >{{File.name}}</span>
                                -
                                <span class="font-bold">{{ File.size }}</span>
                            </p>
                        </section>
                    </article>
                </div>
            </div>
        </template>
     </FormSection>
</template>