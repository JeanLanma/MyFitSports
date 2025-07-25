<script setup>
import NavigationButton from "@/Shared/NavigationButton.vue";
import DialogModal from "@/Components/DialogModal.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import Pagination from "@/Shared/Pagination.vue";
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

const DefaultProductValue = {
    category_id: null,
    fiscal_name: null,
    trade_name: null,
    responsible_contact: null,
    phone: null,
    mail: null,
    payment_method: null,
    credit_days: null,
    application_type: null,
    seal_type: null
};

const props = defineProps({
    suppliers: Object,
});

const GetStatusColor = (status) => {
    switch (status) {
        case "Full":
            return "text-green-500 bg-green-100 rounded-full";
        default:
            return "text-gray-500 bg-gray-100 rounded-full";
    }
};
const supplier = ref(props.suppliers.data);

const ShowUpdateProductModal = ref(false);
const CurrentProduct = ref(DefaultProductValue);
const TriggerUpdateSupplier = (id) => {
    CurrentProduct.value = supplier.value.find((p) => p.id === id);
    ShowUpdateProductModal.value = true;
};
const UpdateProduct = () => {
    const updateSupplierForm = useForm({
        category_id: CurrentProduct.value.category_id,
        fiscal_name: CurrentProduct.value.fiscal_name,
        trade_name: CurrentProduct.value.trade_name,
        responsible_contact: CurrentProduct.value.responsible_contact,
        phone: CurrentProduct.value.phone,
        mail: CurrentProduct.value.mail,
        payment_method: CurrentProduct.value.payment_method,
        credit_days: CurrentProduct.value.credit_days,
        application_type: CurrentProduct.value.application_type,
        seal_type: CurrentProduct.value.seal_type,
    });
    updateSupplierForm.post(route("supplier.update", CurrentProduct.value.id), {
        onSuccess: () => {
            ShowUpdateProductModal.value = false;
            CurrentProduct.value = DefaultProductValue;
        },
        onError: (errors) => {
            console.error(errors);
        },
    });
};
const CloseUpdateProductModal = () => {
    ShowUpdateProductModal.value = false;
    CurrentProduct.value = DefaultProductValue;
};

const DeleteEntry = (id) => {
    // Confirm deletion
    const DeleteForm = useForm({});
    if (confirm("¿Estás seguro de que deseas eliminar este proveedor?")) {
        DeleteForm.delete(route("supplier.destroy", id), {
            onSuccess: () => {
                // Remove the deleted supplier from the list
                supplier.value = supplier.value.filter((sup) => sup.id !== id);
            },
            onError: (errors) => {
                console.error(errors);
            },
        });
    }
};
</script>

<template>
    <!-- Modal -->
    <section>
        <DialogModal
            :show="ShowUpdateProductModal"
            @close="CloseUpdateProductModal"
        >
            <template #title>
                <div class="flex items-center justify-center w-full">
                    <div class="bg-white p-6 rounded shadow w-full">
                        <h2 class="text-xl font-semibold mb-4">
                            Editar proveedor
                        </h2>
                        <p class="text-gray-700"></p>
                        <form class="grid grid-cols-2 gap-4">
                            <div class="grid grid-cols-1">
                                <InputLabel for="category" value="Familia" />
                                <TextInput
                                    id=""
                                    class="w-full"
                                    v-model="CurrentProduct.category_id"
                                />
                            </div>
                            <div class="grid grid-cols-1">
                                <InputLabel
                                    for="razon fiscal"
                                    value="Razon Social"
                                />
                                <TextInput
                                    id=""
                                    class="w-full"
                                    v-model="CurrentProduct.fiscal_name"
                                />
                            </div>
                            <div class="grid grid-cols-1">
                                <InputLabel
                                    for="nombre comercial"
                                    value="Nombre Comercial"
                                />
                                <TextInput
                                    id=""
                                    class="w-full"
                                    v-model="CurrentProduct.trade_name"
                                />
                            </div>
                            <div class="grid grid-cols-1">
                                <InputLabel for="contacto" value="Contacto" />
                                <TextInput
                                    id=""
                                    class="w-full"
                                    v-model="CurrentProduct.responsible_contact"
                                />
                            </div>
                            <div class="grid grid-cols-1">
                                <InputLabel
                                    for="forma de pago"
                                    value="Forma de pago"
                                /><select
                                    id=""
                                    class=""
                                    v-model="CurrentProduct.payment_method"
                                >
                                    <option value="Efectivo">Efectivo</option>
                                    <option value="Credito">Crédito</option>
                                    <option value="Transferencia">
                                        Transferencia
                                    </option>
                                </select>
                            </div>

                            <div class="grid grid-cols-1">
                                <InputLabel
                                    for="dias de credito"
                                    value="Días de crédito"
                                />
                                <TextInput
                                    id=""
                                    class="w-full"
                                    v-model="CurrentProduct.credit_days"
                                />
                            </div>
                            <div class="grid grid-cols-1">
                                <InputLabel for="telefono" value="Telefono" />
                                <TextInput
                                    id=""
                                    class="w-full"
                                    v-model="CurrentProduct.phone"
                                />
                            </div>
                            <div class="grid grid-cols-1">
                                <InputLabel for="correo" value="Correo" />
                                <TextInput
                                    id=""
                                    class="w-full"
                                    v-model="CurrentProduct.mail"
                                />
                            </div>
                            <div class="grid grid-cols-1">
                                <InputLabel for="web" value="Página Web" />
                                <TextInput
                                    id=""
                                    class="w-full"
                                    v-model="CurrentProduct.web_url"
                                />
                            </div>
                            <div class="grid grid-cols-1 w-full">
                                <InputLabel
                                    for="tipo de sello"
                                    value="Tipo de sello"
                                />
                                <select
                                    id=""
                                    class=""
                                    v-model="CurrentProduct.seal_type"
                                >
                                    <option value="Pagado">
                                        RECIBIDO / PAGADO
                                    </option>
                                    <option value="Pendiente de pago">
                                        PENDIENTE DE PAGO
                                    </option>
                                </select>
                            </div>
                        </form>

                        <div class="flex justify-between">
                            <button
                                @click.native="CloseUpdateProductModal"
                                class="mt-4 bg-red-600 text-white px-2 py-2 rounded hover:bg-red-800"
                            >
                                Cancelar
                            </button>
                            <button
                                @click="UpdateProduct()"
                                class="mt-4 bg-blue-600 text-white px-2 py-2 rounded hover:bg-blue-800"
                            >
                                Guardar
                            </button>
                        </div>
                    </div>
                </div>
            </template>
        </DialogModal>
    </section>
    <!-- /Modal -->
    <section class="w-full antialiased bg-gray-100 text-gray-600">
        <div class="flex flex-col justify-center h-full">
            <!-- Table -->
            <div
                class="w-full mx-auto bg-white shadow-lg rounded-md border border-gray-200"
            >
                <header
                    class="px-5 py-4 border-b border-gray-100 flex flex-col md:flex-row justify-between"
                >
                    <h2 class="font-bold text-gray-800 text-2xl">
                        Lista de Proveedores
                    </h2>
                    <a :href="route('products.export')">
                        <NavigationButton
                            class="max-w-md w-14 flex justify-center border-[#45B058]"
                        >
                            <svg
                                width="32px"
                                height="32px"
                                viewBox="-4 0 64 64"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="#000000"
                            >
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g
                                    id="SVGRepo_tracerCarrier"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M5.112.006c-2.802 0-5.073 2.273-5.073 5.074v53.841c0 2.803 2.271 5.074 5.073 5.074h45.774c2.801 0 5.074-2.271 5.074-5.074v-38.605l-18.902-20.31h-31.946z"
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        fill="#45B058"
                                    ></path>
                                    <path
                                        d="M19.429 53.938c-.216 0-.415-.09-.54-.27l-3.728-4.97-3.745 4.97c-.126.18-.324.27-.54.27-.396 0-.72-.306-.72-.72 0-.144.035-.306.144-.432l3.89-5.131-3.619-4.826c-.09-.126-.145-.27-.145-.414 0-.342.288-.72.721-.72.216 0 .432.108.576.288l3.438 4.628 3.438-4.646c.127-.18.324-.27.541-.27.378 0 .738.306.738.72 0 .144-.036.288-.127.414l-3.619 4.808 3.891 5.149c.09.126.125.27.125.414 0 .396-.324.738-.719.738zm9.989-.126h-5.455c-.595 0-1.081-.486-1.081-1.08v-10.317c0-.396.324-.72.774-.72.396 0 .721.324.721.72v10.065h5.041c.359 0 .648.288.648.648 0 .396-.289.684-.648.684zm6.982.216c-1.782 0-3.188-.594-4.213-1.495-.162-.144-.234-.342-.234-.54 0-.36.27-.756.702-.756.144 0 .306.036.433.144.828.738 1.98 1.314 3.367 1.314 2.143 0 2.826-1.152 2.826-2.071 0-3.097-7.111-1.386-7.111-5.672 0-1.98 1.764-3.331 4.123-3.331 1.548 0 2.881.468 3.853 1.278.162.144.253.342.253.54 0 .36-.307.72-.703.72-.145 0-.307-.054-.432-.162-.883-.72-1.98-1.044-3.079-1.044-1.44 0-2.467.774-2.467 1.909 0 2.701 7.112 1.152 7.112 5.636 0 1.748-1.188 3.53-4.43 3.53z"
                                        fill="#ffffff"
                                    ></path>
                                    <path
                                        d="M55.953 20.352v1h-12.801s-6.312-1.26-6.127-6.707c0 0 .207 5.707 6.002 5.707h12.926z"
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        fill="#349C42"
                                    ></path>
                                    <path
                                        d="M37.049 0v14.561c0 1.656 1.104 5.791 6.104 5.791h12.801l-18.905-20.352z"
                                        opacity=".5"
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        fill="#ffffff"
                                    ></path>
                                </g>
                            </svg>
                        </NavigationButton>
                    </a>
                    <NavigationButton
                        :visit="route('supplier.create')"
                        class="max-w-md text-sky-600 hover:text-white hover:bg-sky-600"
                    >
                        Añadir nuevo
                    </NavigationButton>
                </header>
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            <thead
                                class="text-xs font-semibold uppercase text-gray-400 bg-gray-50"
                            >
                                <tr>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">
                                            Familia
                                        </div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">
                                            Razon social
                                        </div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">
                                            Nombre comercial
                                        </div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">
                                            Contacto
                                        </div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">
                                            Telefono
                                        </div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">
                                            Correo
                                        </div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">
                                            Página Web
                                        </div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">
                                            Forma de pago
                                        </div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">
                                            Dias de credito
                                        </div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap block">
                                        <div class="font-semibold text-left">
                                            Tipo solcitud
                                        </div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">
                                            Tipo sello
                                        </div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">
                                            ...
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody
                                v-if="supplier.length > 0"
                                class="text-sm divide-y divide-gray-100"
                            >
                                <tr
                                    v-for="sup in supplier"
                                    :key="sup.id"
                                    class="h-14 hover:bg-sky-300 hover:shadow-md"
                                >
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="font-bold text-gray-700"
                                            >
                                                {{ sup.category_id }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-gray-700">
                                                {{ sup.fiscal_name }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-gray-700">
                                                {{ sup.trade_name }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-gray-700">
                                                {{ sup.responsible_contact }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="text-gray-700 font-semibold"
                                            >
                                                {{ sup.phone }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="text-gray-700 font-semibold"
                                            >
                                                {{ sup.mail }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="text-gray-700 font-semibold"
                                            >
                                                {{ sup.web_url }}
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 whitespace-nowrap cursor-default"
                                    >
                                        {{ sup.payment_method }}
                                    </td>
                                    <td
                                        class="p-2 whitespace-nowrap cursor-default font-semibold text-center"
                                    >
                                        <span
                                            class="py-1 px-3"
                                            :class="GetStatusColor(sup.status)"
                                        >
                                            {{ sup.credit_days }}
                                        </span>
                                    </td>
                                    <td
                                        class="p-2 whitespace-nowrap cursor-default font-semibold"
                                    >
                                        {{ sup.application_type }}
                                    </td>
                                    <td
                                        class="p-2 whitespace-nowrap cursor-default font-semibold"
                                    >
                                        {{ sup.seal_type }}
                                    </td>
                                    <td
                                        class="p-2 whitespace-nowrap cursor-default"
                                    >
                                        <div class="flex flex-col gap-2">
                                            <button
                                                @click="
                                                    TriggerUpdateSupplier(
                                                        sup.id
                                                    )
                                                "
                                                class="py-1 text-center text-sky-600 rounded-lg font-medium hover:text-white duration-150 underline hover:no-underline hover:bg-blue-500 underline-offset-2"
                                            >
                                                Modificar
                                            </button>
                                            <a
                                                @click.prevent="DeleteEntry(sup.id)"
                                                class="text-center text-red-600 rounded-lg font-medium hover:text-white duration-150 underline hover:no-underline hover:bg-red-500 underline-offset-2"
                                                >Eliminar</a
                                            >
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td
                                        class="p-2 whitespace-nowrap"
                                        colspan="8"
                                    >
                                        <div
                                            class="flex items-center justify-center"
                                        >
                                            <p
                                                class="font-medium text-gray-800"
                                            >
                                                No hay registros
                                                <a
                                                    class="text-indigo-500 font-bold text-sm hover:underline hover:underline-offset-2"
                                                    :href="
                                                        route('supplier.create')
                                                    "
                                                    >agregar nuevo</a
                                                >
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="flex justify-center">
                        <Pagination v-if="false" :links="props.currencies" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
