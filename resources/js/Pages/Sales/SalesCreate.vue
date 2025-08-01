<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import UpdateProfileInformationForm from '@/Pages/Sales/Partials/UpdateProfileInformationForm.vue';
import ProductsList from './Partials/ProductsList.vue';



const props = defineProps({
    sale: Object,
});
</script>

<template>
    <AppLayout title="Ventas - # 0001">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detalle de la venta
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div v-if="$page.props.jetstream.canUpdateProfileInformation">
                    <UpdateProfileInformationForm 
                    :sale="props.sale" />

                    <SectionBorder />
                </div>

                <!-- <div v-if="$page.props.jetstream.canUpdatePassword"> -->
                <div v-if="false">
                    <UpdatePasswordForm class="mt-10 sm:mt-0" />

                    <SectionBorder />
                </div>

                <div v-if="false">
                    <ConfirmationEmailForm
                        :requiresConfirmation="false"
                        class="mt-10 sm:mt-0"
                    />

                    <SectionBorder />
                </div>

                <!-- <template v-if="$page.props.jetstream.hasAccountDeletionFeatures"> -->
                <template v-if="false">
                    <SectionBorder />

                    <DeleteUserForm class="mt-10 sm:mt-0" />
                </template>
            </div>
        </div>
    </AppLayout>
</template>
