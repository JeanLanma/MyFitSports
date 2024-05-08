<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CreateTeamForm from '@/Pages/Teams/Partials/CreateTeamForm.vue';

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
    <AppLayout title="Añadir nuevo equipo">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Nuevo equipo
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <CreateTeamForm />
            </div>
        </div>
    </AppLayout>
</template>
