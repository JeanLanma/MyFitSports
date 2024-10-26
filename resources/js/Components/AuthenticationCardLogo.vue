<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    width: {
        type: String,
        default: '100',
    },
    height: {
        type: String,
        default: '100',
    },
    fill : {
        type: String,
        default: 'text-white',
    },
});
</script>

<template>
    <Link :href="'/'">
    <img :width="width" :height="height" src="/assets/store-logo.png" alt="logo">
    </Link>
</template>
