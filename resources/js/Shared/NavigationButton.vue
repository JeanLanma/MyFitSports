<script setup>
import { router } from '@inertiajs/vue3'

const props = defineProps({
    visit: {
        type: String,
        required: false,
    },
});

const GoToRoute = (route) => {
    if(route)
    {

        router.visit(route);
    }
};
</script>

<template>
    <button @click.native="GoToRoute(props.visit)" class="w-full text-gray-600 font-bold rounded-xl border-2 border-sky-500 px-3 py-2 hover:bg-white/70 hover:shadow-md active:ring-2 active:ring-sky-300 active:ring-offset-1 active:shadow-sky-200 active:text-gray-800 duration-200">
        <slot></slot>
    </button>
</template>