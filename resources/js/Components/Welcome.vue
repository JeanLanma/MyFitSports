<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <div class="min-h-screen bg-gray-50 font-sans antialiased">

        <div class="p-8 lg:p-12 bg-gray-800 shadow-lg rounded-b-xl">

            <!-- <ApplicationLogo class="block h-16 w-auto text-indigo-600 mb-6" /> -->

            <h1 class="mt-4 text-4xl font-semibold text-white leading-tight">
                Bienvenido al Panel de Administración de <span class="font-extrabold"> MVO</span>
            </h1>
            

            <p class="mt-6 text-lg text-gray-300 leading-relaxed">
                Desde aquí, gestiona de manera eficiente todas las operaciones de tu empresa de vending. Este panel te proporciona acceso rápido a las herramientas esenciales para optimizar ventas, controlar inventarios, administrar proveedores y sucursales, y realizar un seguimiento detallado.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12 p-8 lg:p-12 bg-gray-200">

            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray">
                <div class="flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-10 h-10 stroke-red-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                    <h2 class="ms-4 text-2xl font-bold text-gray-900">
                        <a :href="route('customers.index')" class="hover:text-indigo-700 transition-colors duration-200">Gestión de Ventas</a>
                    </h2>
                </div>
                <p class="mt-4 text-gray-600 text-base leading-relaxed">
                    Accede a un historial completo de transacciones, analiza el rendimiento y genera informes detallados para optimizar tus estrategias de venta.
                </p>
                <p class="mt-6 text-base">
                    <a :href="route('customers.index')" class="inline-flex items-center font-semibold text-indigo-600 hover:text-indigo-800 transition-colors duration-200">
                        Explorar registros de ventas
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-2 w-5 h-5 fill-indigo-500">
                            <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </p>
            </div>


            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100">
                <div class="flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-10 h-10 stroke-red-600">
                        <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                    </svg>
                    <h2 class="ms-4 text-2xl font-bold text-gray-900">
                        <a :href="route('teams.create')" class="hover:text-indigo-700 transition-colors duration-200">Control de Inventario</a>
                    </h2>
                </div>
                <p class="mt-4 text-gray-600 text-base leading-relaxed">
                    Mantén un control preciso del stock de productos en cada una de tus almacenes. Gestiona recargas, monitorea niveles y evita desabastecimientos.
                </p>
                <p class="mt-6 text-base">
                    <a :href="route('teams.create')" class="inline-flex items-center font-semibold text-indigo-600 hover:text-indigo-800 transition-colors duration-200">
                        Administrar inventario
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-2 w-5 h-5 fill-indigo-500">
                            <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </p>
            </div>
            

            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100">
                <div class="flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-10 h-10 stroke-red-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                    <h2 class="ms-4 text-2xl font-bold text-gray-900">
                        <a :href="route('supplier.index')" class="hover:text-indigo-700 transition-colors duration-200">Gestión de Proveedores</a>
                    </h2>
                </div>
                <p class="mt-4 text-gray-600 text-base leading-relaxed">
                    Administra la información de tus proveedores, sus contactos y el historial de pedidos para asegurar una cadena de suministro fluida y eficiente.
                </p>
                <p class="mt-6 text-base">
                    <a :href="route('supplier.index')" class="inline-flex items-center font-semibold text-indigo-600 hover:text-indigo-800 transition-colors duration-200">
                        Ver proveedores
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-2 w-5 h-5 fill-indigo-500">
                            <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </p>
            </div>


            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100">
                <div class="flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-10 h-10 stroke-red-600">
                        <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                    </svg>
                    <h2 class="ms-4 text-2xl font-bold text-gray-900">
                        <a :href="route('branches.index')" class="hover:text-indigo-700 transition-colors duration-200">Administración de Sucursales</a>
                    </h2>
                </div>
                <p class="mt-4 text-gray-600 text-base leading-relaxed">
                    Centraliza la gestión de todas tus sucursales y puntos de venta. Accede a información detallada, contactos y métricas de cada ubicación.
                </p>
                <p class="mt-6 text-base">
                    <a :href="route('branches.show')" class="inline-flex items-center font-semibold text-indigo-600 hover:text-indigo-800 transition-colors duration-200">
                        Administrar sucursales
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-2 w-5 h-5 fill-indigo-500">
                            <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </p>
            </div>


            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100">
                <div class="flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-10 h-10 stroke-red-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                    <h2 class="ms-4 text-2xl font-bold text-gray-900">
                        <a href="#" class="hover:text-indigo-700 transition-colors duration-200">Seguimiento</a>
                    </h2>
                </div>
                <p class="mt-4 text-gray-600 text-base leading-relaxed">
                    Supervisa el estado y la actividad de cada una de tus máquinas expendedoras. Recibe alertas y optimiza las rutas de mantenimiento.
                </p>
                <p class="mt-6 text-base">
                    <a href="#" class="inline-flex items-center font-semibold text-indigo-600 hover:text-indigo-800 transition-colors duration-200">
                        Ver estado de máquinas
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-2 w-5 h-5 fill-indigo-500">
                            <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </p>
            </div>


            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100">
                <div class="flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-10 h-10 stroke-red-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                    </svg>
                    <h2 class="ms-4 text-2xl font-bold text-gray-900">
                        <a href="#" class="hover:text-indigo-700 transition-colors duration-200">Catálogo de Productos</a>
                    </h2>
                </div>
                <p class="mt-4 text-gray-600 text-base leading-relaxed">
                    Define y organiza los diferentes tipos de productos que ofreces. Actualiza precios y gestiona la disponibilidad.
                </p>
                <p class="mt-6 text-base">
                    <a href="#" class="inline-flex items-center font-semibold text-indigo-600 hover:text-indigo-800 transition-colors duration-200">
                        Gestionar tipos de productos
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-2 w-5 h-5 fill-indigo-500">
                            <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </p>
            </div>
        </div>
    </div>
</template>
