<script setup>
import TeamsList from './Partials/ProductsList.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { read, utils, writeFileXLSX } from 'xlsx';
import { ref, onMounted } from "vue";

const CurrentSheet = ref(null);
/* the component state is an array of objects */

const props = defineProps({
    products: Object,
    params: Object | Array
});

/* the component state is an array of objects */
// const pres = ref([]);
const rows = ref([]);

/* Fetch and update the state once */
//  onMounted(async() => {
//    const f = await fetch("https://docs.sheetjs.com/pres.numbers");
//    const ab = await f.arrayBuffer();
//    /* parse */
//    const wb = read(ab);
//    /* generate array of objects from first worksheet */
//    const ws = wb.Sheets[wb.SheetNames[0]]; // get the first worksheet
//    const data = utils.sheet_to_json(ws); // generate objects
//    /* update state */
//     rows.value = data;
//     console.log(rows.value);
//  });
/* get state data and export to XLSX */
function exportFile() {
    rows.value.unshift(CurrentSheet.value.headers);
    
    const ws = utils.aoa_to_sheet(rows.value); 
    const wb = utils.book_new();
    utils.book_append_sheet(wb, ws, "Sheet1");
    // Get Random string
    const randomString = Math.random().toString(36).substring(3, 9);
    writeFileXLSX(wb, "SheetJSVueAoO-" + randomString + ".xlsx");
}
// ================
const ParseJsonSheetToTable = (sheet) => {
    const JsonTable = {
        headers: [],
        rows: []
    };
    rows.value = [];
    sheet.forEach((row, index) => {
        if (index === 0) {
            JsonTable.headers = row;
        } else {
            JsonTable.rows.push(row);
        }
    });
    JsonTable.headers = Array.from(new Set(JsonTable.headers));
    rows.value = JsonTable.rows;
    return JsonTable;
}
// ================
onMounted( () => {
    document.getElementById('uploadExcel').addEventListener('change', function(event) {
        let file = event.target.files[0];
        let reader = new FileReader();
        
        reader.onload = function(e) {
            let data = new Uint8Array(e.target.result);
            let workbook = read(data, { type: 'array' });
            let sheetName = workbook.SheetNames[0];
            let sheet = utils.sheet_to_json(workbook.Sheets[sheetName], { header: 1, nullError: true });
            // let shetHTML = utils.sheet_to_html(workbook.Sheets[sheetName]);
            utils.json_to_sheet(sheet);
            
            let table = document.getElementById('excelTable');
            table.innerHTML = ""; // Limpia la tabla antes de renderizar
            CurrentSheet.value = ParseJsonSheetToTable(sheet);
            
            sheet.forEach(row => {
                let tr = document.createElement("tr");
                row.forEach(cell => {
                    let td = document.createElement("td");
                    td.textContent = cell || "";  // Evita valores `undefined`
                    td.contentEditable = "true";  // Hace la celda editable
                    tr.appendChild(td);
                });
                table.appendChild(tr);
            });
            
        };
        
        reader.readAsArrayBuffer(file);
    });

    const saveChanges = () => {
        let table = document.getElementById('excelTable');
        let workbook = utils.table_to_book(table);
        let excelData = write(workbook, { bookType: 'xlsx', type: 'binary' });

        fetch('/guardar-excel', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ excel: btoa(excelData) })
        }).then(response => response.json())
        .then(data => alert(data.message));
    }
});
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
                    <input type="file" id="uploadExcel" />
                    <table id="excelTable" border="1"></table>
                    <button v-on:click="saveChanges">Guardar Cambios</button>
                    <!--  -->
                    <button @click="exportFile">Export XLSX</button>
                </div>
            </div>
        </div>

    </AppLayout>
</template>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }
    td {
        cursor: pointer;
    }
    td:focus {
        outline: none;
        background-color: #f0f8ff;
    }
</style>