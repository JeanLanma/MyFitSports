<script setup>
import { Head, Link } from '@inertiajs/vue3'
</script>

<template>
  <Head title="Bienvenido" />

  <main class="bg-white font-sans antialiased relative h-screen overflow-hidden">

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

    <div class="container m-6 mx-auto px-6 sm:px-12 flex flex-col sm:flex-row sm:justify-end items-center relative z-10 ">
      <div class="flex flex-col items-start py-16 sm:py-24 px-8 sm:px-12 bg-white/40 md:bg-white/60 backdrop-blur-sm rounded-xl shadow-2xl max-w-full sm:max-w-lg lg:max-w-xl text-center sm:text-left">
        <h1 class="text-7xl xl:text-8xl font-extrabold text-red-700 leading-tight mb-2 mx-auto sm:mx-0">MVO</h1>
        <h2 class="text-2xl xl:text-3xl text-gray-900 uppercase font-bold leading-snug tracking-wider mb-6">Control inteligente para máquinas vending</h2>
        <p class="xl:text-lg tracking-wide text-gray-800 font-normal max-w-md mx-auto sm:mx-0">
          Gestiona tu inventario en tiempo real, reduce pérdidas y toma decisiones basadas en datos para maximizar la rentabilidad de tus operaciones de vending.
        </p>

        <div class="mt-10 sm:mt-16 w-full sm:w-auto">
          <Link :href="route('dashboard')" class="inline-flex items-center justify-center font-semibold text-white text-lg sm:text-xl uppercase py-4 px-10 rounded-full shadow-xl bg-red-600 hover:bg-red-800 transition-all duration-300 transform hover:scale-105 ">
            Comenzar ahora
          </Link>
        </div>
      </div>
    </div>
  </main>
</template>
