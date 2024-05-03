<script setup>
import { Link } from '@inertiajs/vue3';
const props = defineProps({
    links: Object,
    params: Object
});


const useQueryParams = (url, data = null) => {
    if(!data || url == null) return url;
    delete data.page;
    return url + '&' + propsAsString(data) ?? '';
}
function propsAsString(obj) {
  return Object.keys(obj).map(function(k) { return k + "=" + obj[k] }).join("&")
}

</script>
<template>
    <component
    v-for="l in links.links" 
    :key="l" 
    :is="!l.active ? Link : 'span'" 
    :class="'ml-2 px-3 py-1 rounded-lg hover:bg-gray-100 text-sm text-gray-500' + ( !l.active ? ' ' : ' cursor-pointer text-white bg-sky-500 hover:bg-sky-300')"
    :href="useQueryParams(l.url, props.params)"
    v-html="l.label"/>
</template>