<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CreateProductForm from '@/Pages/Inventory/Partials/CreateProductForm.vue';

const props = defineProps({
    errors: Object,
    team: {
        type: Object,
        default: () => ({
            name: '',
            slug: '',
            description: '',
            personal_team: false,
        }),
    },
});
</script>

<template>
    <AppLayout title="Añadir nuevo producto">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Nuevo producto
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <CreateProductForm
                    :product="{}"
                />
            </div>
        </div>
    </AppLayout>
</template>
