<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import DeleteUserForm from '@/Pages/Customers/Partials/DeleteUserForm.vue';
import UpdatePasswordForm from '@/Pages/Customers/Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from '@/Pages/Customers/Partials/UpdateProfileInformationForm.vue';

</script>

<template>
    <AppLayout title="Mi perfil de cliente">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Mi perfil de cliente
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div v-if="$page.props.jetstream.canUpdateProfileInformation">
                    <UpdateProfileInformationForm :user="$page.props.auth.user" />

                    <SectionBorder />
                </div>

                <div v-if="$page.props.jetstream.canUpdatePassword">
                    <UpdatePasswordForm class="mt-10 sm:mt-0" />

                    <SectionBorder />
                </div>

                <template v-if="$page.props.jetstream.hasAccountDeletionFeatures">
                    <SectionBorder />

                    <DeleteUserForm class="mt-10 sm:mt-0" />
                </template>
            </div>
        </div>
    </AppLayout>
</template>
