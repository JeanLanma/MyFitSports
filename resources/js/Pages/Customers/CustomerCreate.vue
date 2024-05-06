<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import DeleteUserForm from '@/Pages/Customers/Partials/DeleteUserForm.vue';
import UpdatePasswordForm from '@/Pages/Customers/Partials/UpdatePasswordForm.vue';
import ConfirmationEmailForm from '@/Pages/Customers/Partials/ConfirmationEmailForm.vue';
import UpdateProfileInformationForm from '@/Pages/Customers/Partials/UpdateProfileInformationForm.vue';


const props = defineProps({
    customer: Object,
});
</script>

<template>
    <AppLayout title="Perfiles">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Perfil del cliente
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div v-if="$page.props.jetstream.canUpdateProfileInformation">
                    <UpdateProfileInformationForm :customer="props.customer" />

                    <SectionBorder />
                </div>

                <!-- <div v-if="$page.props.jetstream.canUpdatePassword"> -->
                <div v-if="false">
                    <UpdatePasswordForm class="mt-10 sm:mt-0" />

                    <SectionBorder />
                </div>

                <div v-if="true">
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
