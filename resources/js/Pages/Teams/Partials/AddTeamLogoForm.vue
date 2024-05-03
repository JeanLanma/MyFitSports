<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import { useToast } from "vue-toastification";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { ref } from 'vue';
import { isDefaultLogo as isDefault }   from '@/utils/TeamHelpers.js';

const toast = useToast();

const props = defineProps({
    team: Object,
});

const imgInput = ref(null);
const isDefaultLogo = () => {
    return isDefault(props.team.logo);
    return (props.team.logo == '\\assets\\freetravelers-logo.jpg');
};
const form = useForm({
    name: props.team.name,
    image: null,
    image_src: null,
    image_name: props.team.name,
    image_size: null,
});
const onFileChange = (event) => {
    form.image = event.target.files[0];
    form.image_src = form.image;
    handleImage(form.image_src);
};

const updateTeamLogo = () => {
    form.post(route('media.upload.team.logo'), {
        preserveScroll: true,
        onSuccess: () => {
            resetImage();
            toast("Logo subido correctamente", { 
                type: "success",
                timeout: 3000
            });
        },
        onError: (error) => {
            resetImage();
            toast("Error al subir el logo", { 
                type: "error",
                timeout: 3000
            });
            console.log(error);
        },
    });
};

/* Image Handler */
const handleImage = (file) => {
    form.image_src = URL.createObjectURL(file);
    form.image_name = file.name.length > 20 ? file.name.substring(0, 20) + "..." : file.name;
    form.image_size =
        file.size > 1024
        ? file.size > 1048576
            ? Math.round(file.size / 1048576) + "mb"
            : Math.round(file.size / 1024) + "kb"
        : file.size + "b";
};
const resetImage = () => {
    if(!isDefaultLogo()) 
    {
        form.image = null;
        form.image_src = null;
        form.image_name = null;
        form.image_size = null;
    }
    else 
    {
        resetDefaultLogo();
    }
};

const resetDefaultLogo = () => {
    form.delete(route('media.reset.team.logo'), {
        preserveScroll: true,
        onSuccess: () => {
            toast("Logo eliminado correctamente", { 
                type: "success",
                timeout: 3000
            });
            setTimeout(() => {
                window.location.reload();
            }, 4000);
        },
        onError: (error) => {
            toast("Error al eliminar el logo", { 
                type: "error",
                timeout: 3000
            });
            console.log('error', error);
        },
    });
}

const onFileDrop = (e) => {
    e.preventDefault();
    isDraggedOver.value = false;
    form.image_src = e.dataTransfer.files[0];
    handleImage(form.image_src);
};
const isDraggedOver = ref(false);
const dragOver = (e) => {
    e.preventDefault();
    isDraggedOver.value = true;
};
const dragEnter = (e) => {
    e.preventDefault();
    isDraggedOver.value = true;
};
const dragLeave = (e) => {
    e.preventDefault();
    isDraggedOver.value = false;
};
</script>

<template>
    <FormSection @submitted="updateTeamLogo">
        <template #title>
            Agregar logo de la agencia
        </template>

        <template #description>
            Sube una imagen que idefintifique a la agencia, la imagen debe ser de 301 pixeles de ancho y 121 pixeles de alto.
        </template>

        <template #form>
            <!-- Upload logo -->
            <section class="col-span-6 p-8 w-full flex flex-col">
                <header @drop.prevent="onFileDrop"
                        @dragover.prevent="dragOver"
                        @dragenter.prevent="dragEnter"
                        @dragleave.prevent="dragLeave"
                        :class="{ 'bg-blue-100 border-blue-300': isDraggedOver }" class="border-dashed border-2 border-gray-400 py-12 flex flex-col justify-center items-center">
                    <p class="mb-3 font-semibold text-gray-900 flex flex-wrap justify-center">
                        <span>Arrastre y suelte su</span>&nbsp;<span>imagen donde sea o</span>
                    </p>
                    <input ref="imgInput" @change="onFileChange" id="hidden-input" type="file" multiple class="hidden" />
                    <button type="button" @click.native="imgInput.click()" class="mt-2 rounded-sm px-3 py-1 bg-gray-200 hover:bg-gray-300 focus:shadow-outline focus:outline-none">
                        Subir imagen
                    </button>
                </header>

                <h1 class="pt-8 pb-3 font-semibold sm:text-lg text-gray-900">
                    Imagenes subidas
                </h1>

                <ul v-show="form.image_src == null" class="flex flex-1 flex-wrap -m-1">
                <li id="empty" class="h-full w-full text-center flex flex-col items-center justify-center">
                    <img class="mx-auto w-32" src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png" alt="no data" />
                    <span class="text-small text-gray-500">No se ha seleccionado ninguna imagen</span>
                </li>
                </ul>
                <section v-if="form.image_src" class="col-span-6">
                    <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8">
                        <article tabindex="0" class="group hasImage w-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-transparent hover:text-white shadow-sm">
                            <img :src="form.image_src" alt="upload preview" class="img-preview w-full h-full sticky object-cover rounded-md bg-fixed" />

                            <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                <h1 class="flex-1">{{form.image_name}}</h1>
                                <div class="flex">
                                    <span class="p-1">
                                        <i>
                                        <svg class="fill-current w-4 h-4 ml-auto pt-" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z" />
                                        </svg>
                                        </i>
                                    </span>

                                    <p class="p-1 size text-xs">{{form.image_size}}</p>
                                    <button
                                        @click="resetImage"
                                        class="delete ml-auto focus:outline-none hover:text-red-500 hover:bg-gray-300 p-1 rounded-md">
                                        <svg class="pointer-events-none fill-current w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path class="pointer-events-none" d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                        </svg>
                                    </button>
                                </div>
                            </section>
                        </article>
                    </li>
                </section>
                <section v-if="!isDefaultLogo() && form.image == null" class="col-span-6">
                    <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8">
                        <article tabindex="0" class="group hasImage w-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-transparent hover:text-white shadow-sm">
                            <img :src="`/storage/${team.logo}`" alt="upload preview" class="img-preview w-full h-full sticky object-cover rounded-md bg-fixed" />

                            <section class="flex flex-col rounded-md text-xs break-words w-full h-full min-h-[4rem] z-20 absolute top-0 py-2 px-3">
                                <h1 class="flex-1">Imagen actual</h1>
                                <div class="flex">
                                    <span class="p-1">
                                        <i>
                                        <svg class="fill-current w-4 h-4 ml-auto pt-" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z" />
                                        </svg>
                                        </i>
                                    </span>

                                    <p class="p-1 size text-xs">{{form.image_size}}</p>
                                    <button
                                        type="button"
                                        @click.prevent="resetDefaultLogo"
                                        class="delete ml-auto focus:outline-none hover:text-red-500 hover:bg-gray-300 p-1 rounded-md">
                                        <svg class="pointer-events-none fill-current w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path class="pointer-events-none" d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                        </svg>
                                    </button>
                                </div>
                            </section>
                        </article>
                    </li>
                </section>
          </section>
        </template>

        <template v-if="true" #actions>
            <ActionMessage :on="form.recentlySuccessful" class="mr-3">
                Guardado.
            </ActionMessage>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Subir logo
            </PrimaryButton>
        </template>
    </FormSection>
</template>

<style scoped>
.hasImage:hover section {
  background-color: rgba(5, 5, 5, 0.4);
}
.hasImage:hover button:hover {
  background: rgba(5, 5, 5, 0.45);
}

#overlay p,
i {
  opacity: 0;
}

#overlay.draggedover {
  background-color: rgba(255, 255, 255, 0.7);
}
#overlay.draggedover p,
#overlay.draggedover i {
  opacity: 1;
}

.group:hover .group-hover\:text-blue-800 {
  color: #2b6cb0;
}
</style>
