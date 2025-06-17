 <template>
 <div v-if="true" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded shadow w-full lg:w-1/2">
        <h2 class="text-xl font-semibold mb-4">Editar proveedor</h2>
        <p class="text-gray-700">
            <form class=" grid grid-cols-2 gap-4">
                <div class="grid grid-cols-1">
                <InputLabel for="category" value="Familia"/>
                     <TextInput id=""  class="w-full"/>
                    </div>
                    <div class="grid grid-cols-1">
                <InputLabel for="category" value="Razon Social"/>
                     <TextInput id=""  class="w-full"/>
                    </div>
                    <div class="grid grid-cols-1">
                <InputLabel for="category" value="Nombre Comercial"/>
                     <TextInput id=""  class="w-full"/>
                    </div>
                    <div class="grid grid-cols-1">
                <InputLabel for="category" value="Contacto"/>
                     <TextInput id=""  class="w-full"/>
                    </div>
                    <div class="grid grid-cols-1">
                <InputLabel for="category" value="Forma de pago"/>
                     <TextInput id=""  class="w-full"/>
                    </div>
                    <div class="grid grid-cols-1">
                <InputLabel for="category" value="Días de crédito"/>
                     <TextInput id=""  class="w-full"/>
                    </div>
                    <div class="grid grid-cols-1 w-full">
                <InputLabel for="category" value="Tipo de sello"/>
                     <select id="" class="">
                        <option value="Pagado">RECIBIDO / PAGADO</option>
                        <option value="Pendiente de pago">PENDIENTE DE PAGO</option>
                     </select>
                    </div>
            </form>
        </p>
        <div class="flex justify-between">
        <button @click="alert('Guardar cambios')" class="mt-4 bg-red-600 text-white px-4 py-2 rounded ">
            Atras
        </button>
        <button @click="alert('Guardar cambios')" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">
            Guardar
        </button>
        </div>
        
    </div>
   </div>

</template>
