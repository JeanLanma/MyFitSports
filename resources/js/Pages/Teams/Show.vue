<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import CreateTeamForm from '@/Pages/Teams/Partials/CreateTeamForm.vue';
import AddTeamCoverForm from './Partials/AddTeamCoverForm.vue';

const props = defineProps({
    errors: Object,
    team: {
        type: Object,
        default: () => ({
            name: null,
            cover: null,
        }),
    },
});
</script>

<template>
    <AppLayout title="Añadir nuevo equipo">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ (props.team.name != null) ? 'Editar equipo' : 'Nuevo equipo'}}
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <CreateTeamForm :team="props.team" />

                <SectionBorder />

                <AddTeamCoverForm :team="props.team" class="mt-4" />
            </div>
        </div>
    </AppLayout>
</template>
