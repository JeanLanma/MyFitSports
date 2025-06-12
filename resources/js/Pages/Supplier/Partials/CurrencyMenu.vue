<script setup>
/** Delete component 25.03.2024 **/
import NavigationButton from '@/Shared/NavigationButton.vue';

</script>
<template>
<div class="flex gap-4 flex-col md:flex-row px-2">

    <div class="w-full">
        <NavigationButton @click.native="GoToRoute('localisation.currencies.show')">
            Agregar divisa
        </NavigationButton>
    </div>
    <div class="w-full">
        <NavigationButton class="text-sky-600">
            Ver todas
        </NavigationButton>
    </div>
    
</div>
</template>