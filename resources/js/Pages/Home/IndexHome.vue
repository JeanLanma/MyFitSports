<script setup>
import { Head, Link } from '@inertiajs/vue3'
</script>

<template>
  <Head title="Bienvenido" />

  <main class="bg-white font-abhaya-libre relative h-screen overflow-hidden">


    <div class="absolute inset-0 z-0">
      <img src="assets/business-team.jpg" class="w-full h-full object-cover" alt="Equipo de negocios" />
    </div>

  
    <header class="h-24 sm:h-32 items-center absolute top-0 right-0 z-20 w-full hidden">
      <div class="container mx-auto px-6 sm:px-12 flex items-center justify-end">
        <nav class="flex items-center space-x-6">
          <Link :href="route('dashboard')" class="hidden xl:block uppercase text-gray-800 tracking-wider text-lg hover:underline">Inicio</Link>
          <a href="#" class="hidden xl:block uppercase text-gray-800 tracking-wider text-lg hover:underline">Nosotros</a>
          <a href="#" class="hidden xl:block uppercase text-gray-800 tracking-wider text-lg hover:underline">Contacto</a>
        </nav>
      </div>
    </header>

    <div class="container h-screen mx-auto px-6 sm:px-12 flex flex-col sm:flex-row items-center relative z-10">
      <div class="sm:w-1/2 xl:w-2/5   flex flex-col items-start py-24 sm:py-0 bg-white/40 bg-opacity-80 p-8 rounded-lg ">
        <h1 class="text-6xl xl:text-8xl font-abhaya-libre text-red-600 font-bold leading-none">MVO</h1>
        <h2 class="text-xl xl:text-2xl text-black uppercase font-bold leading-none tracking-widest -mt-2 mb-6">Control inteligente para máquinas vending</h2>
        <p class="xl:text-lg tracking-wider text-gray-700 font-alegraya-sans max-w-md">
          Gestiona tu inventario en tiempo real, reduce pérdidas y toma decisiones basadas en datos. 
        </p>

        <div class="font-montserrat text-white text-base sm:text-xl uppercase py-3 px-6 sm:py-4 sm:px-8 rounded-full shadow-lg bg-red-500 hover:bg-red-800 mt-8 sm:mt-16 transition">
          <Link :href="route('dashboard')">Comenzar ahora</Link>
        </div>
      </div>
    </div>
  </main>
</template>
