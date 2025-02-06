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
                    <div ref="gridctr"></div>
                    <button @click="exportFile">Export XLSX</button>
                </div>
            </div>
        </div>

    </AppLayout>
</template>
