<script setup>
import TeamsList from './Partials/ProductsList.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { read, utils, writeFileXLSX } from 'xlsx';
import { ref, onMounted } from "vue";

/* the component state is an array of objects */

const props = defineProps({
    products: Object,
    params: Object | Array
});
console.log(props.params);

/* the component state is an array of objects */
const pres = ref([]);
const rows = ref([]);

/* Fetch and update the state once */
onMounted(async() => {
  /* Download from https://docs.sheetjs.com/pres.numbers */
  const f = await fetch("https://docs.sheetjs.com/pres.numbers");
  const ab = await f.arrayBuffer();

  /* parse */
  const wb = read(ab);

  /* generate array of objects from first worksheet */
  const ws = wb.Sheets[wb.SheetNames[0]]; // get the first worksheet
  const data = utils.sheet_to_json(ws); // generate objects

  /* update state */
  pres.value = data;
    rows.value = data;
});
/* get state data and export to XLSX */
function exportFile() {
  const ws = utils.json_to_sheet(rows.value);
  const wb = utils.book_new();
  utils.book_append_sheet(wb, ws, "Data");
  writeFileXLSX(wb, "SheetJSVueAoO.xlsx");
}

</script>

<template>
    <AppLayout title="Productos">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Productos
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <!-- generate row (TR) for each president -->
                    <!-- <table><thead><tr><th>Name</th><th>Index</th></tr></thead><tbody>
                            <tr v-for="(row, idx) in rows" :key="idx">
                            <td>{{ row.Name }}</td>
                            <td>{{ row.Index }}</td>
                            </tr>
                        </tbody><tfoot><td colSpan={2}>
                        </td></tfoot>
                    </table> -->
                    <!--  -->
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="border-y border-gray-100 bg-gray-50/50 p-2">Name</th>
                                    <th class="border-y border-gray-100 bg-gray-50/50 p-2">Index</th>
                                    <th class="border-y border-gray-100 bg-gray-50/50 p-2">...</th>
                                    <!-- <th class="border-y border-gray-100 bg-gray-50/50 p-2">Attendees</th>
                                    <th class="border-y border-gray-100 bg-gray-50/50 p-2">Total Cost</th>
                                    <th class="border-y border-gray-100 bg-gray-50/50 p-2">Action</th> -->
                                </tr>
                            </thead>
                            <tbody id="attendees-list">
                                <!-- Initial attendees -->
                                <tr v-for="(row, idx) in rows" :key="idx">
                                    <!-- <td class="border border-gray-300 px-4 py-2">
                                        <select onchange="updateHourlyRate(this)" class="p-2 rounded border bg-white">
                                            <option value="Developer">Developer</option>
                                            <option value="DevOps">DevOps</option>
                                            <option value="QA">QA</option>
                                            <option value="Designer">Designer</option>
                                            <option value="Marketer">Marketer</option>
                                            <option value="Product Manager">Product Manager</option>
                                            <option value="Head of department">Head of department</option>
                                            <option value="VP">VP</option>
                                            <option value="C-Level executive">C-Level executive</option>
                                        </select>
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <input type="number"  class="p-2 rounded border hourly-rate" value="75">
                                    </td> -->
                                    <td class="border border-gray-300 px-4 py-2">
                                        <input type="text" :value="row.Name" class="p-2 rounded border name">
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <input type="text" :value="row.Index" readonly disabled class="p-2 rounded border index">
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <button onclick="removeRow(this)" class="p-2 text-red-600 ">
                                            <svg class="w-6 h-6 " stroke="currentColor" fill="none"  xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 24 24">
                                            <path d="M 10 2 L 9 3 L 4 3 L 4 5 L 5 5 L 5 20 C 5 20.522222 5.1913289 21.05461 5.5683594 21.431641 C 5.9453899 21.808671 6.4777778 22 7 22 L 17 22 C 17.522222 22 18.05461 21.808671 18.431641 21.431641 C 18.808671 21.05461 19 20.522222 19 20 L 19 5 L 20 5 L 20 3 L 15 3 L 14 2 L 10 2 z M 7 5 L 17 5 L 17 20 L 7 20 L 7 5 z M 9 7 L 9 18 L 11 18 L 11 7 L 9 7 z M 13 7 L 13 18 L 15 18 L 15 7 L 13 7 z"></path>
                                            </svg>
                                        </button>
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--  -->
                    <button @click="exportFile">Export XLSX</button>
                </div>
            </div>
        </div>

    </AppLayout>
</template>
