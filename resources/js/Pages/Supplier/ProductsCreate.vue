<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CreateProductForm from '@/Pages/Inventory/Partials/CreateProductForm.vue';

const props = defineProps({
    product: {
        type: Object,
        default: () => ({
            name: null,
            price: null,
            cost: null,
            code: null,
            status: null,
            cover: null,
            id: null,
        }),
    },
});
</script>

<template>
    <AppLayout title="Añadir nuevo Proveedor">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Nuevo proveedor
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <CreateProductForm
                    :products="{}"
                />
            </div>
        </div>
    </AppLayout>
</template>
