<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import Pagination from '@/Utils/Pagination';
const { useQueryParams } = Pagination;
const props = defineProps({
    PaginationObject: Object,
    Params: Object,
});

const Links = () => {
    const links = ref(props.PaginationObject.links);
    links.value.pop();
    links.value.shift();
    return links.value;
}
Links();

const Results = () => {
    const from = props.PaginationObject.from;
    const to = props.PaginationObject.to;
    const total = props.PaginationObject.total;
    return `${from} - ${to} de ${total}`;
}
</script>

<template>
    <ul class="inline-flex items-center space-x-2">
        <div>
            <span :href="route('inventory.index')" class="text-gray-500 hover:text-sky-600">{{ Results() }}</span>
        </div>
        <li>
            <Link :href="useQueryParams(PaginationObject?.prev_page_url, props.Params) ?? '#'">
            <button :class="{ 'bg-white': (PaginationObject.current_page != 1) }" class="flex items-center justify-center w-10 h-10 text-sky-500 transition-colors duration-150 rounded-full focus:shadow-outline hover:bg-indigo-100">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
            </button>
            </Link>
        </li>
        <template v-for="l in PaginationObject.links">
            <li v-if="l.url != null">
                <Link :href="useQueryParams(l.url, props.Params)">
                    <button v-if="l.active" class="w-10 h-10 text-white transition-colors duration-150 bg-sky-500 border border-r-0 border-sky-500 rounded-full focus:shadow-outline">{{ l.label }}</button>
                    <button v-else class="w-10 h-10 text-sky-500 transition-colors duration-150 rounded-full focus:shadow-outline hover:bg-indigo-100">{{ l.label }}</button>
                </Link>
            </li>
        </template>
        <li>
        </li>
        <li>
            <Link :href="useQueryParams(PaginationObject?.next_page_url, props.Params) ?? '#'">
            <button :class="{ 'bg-white': (PaginationObject.current_page != PaginationObject.last_page) }" class="flex items-center justify-center w-10 h-10 text-sky-500 transition-colors duration-150 rounded-full focus:shadow-outline hover:bg-indigo-100">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
            </button>
            </Link>
        </li>
    </ul>
</template>