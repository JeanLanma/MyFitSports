<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CreateSupplierForm from './Partials/CreateSupplierForm.vue';

const props = defineProps({
    supplier: {
        type: Object,
        default: () => ({
            category: null,
            fiscal_name: null,
            trade_name: null,
            responsible_contact: null,
            phone: null,
            mail: null,
            payment_method: null,
            credit_days: null,
            application_type: null,
            seal_type: null,
            id: null,
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
                <CreateSupplierForm
                    :supplier="props.supplier"
                />
            </div>
        </div>
    </AppLayout>
</template>
