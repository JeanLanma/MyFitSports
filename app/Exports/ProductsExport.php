<?php

namespace App\Exports;

use App\Models\Admin\Erp\Inventory\Product as InventoryProduct;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return InventoryProduct::all([
            'id',
            'name',
            'type',
            'stock',
            'costs',
            'status',
            'unit',
            'supplier',
            'physical_inventory',
        ]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Producto',
            'Tipo',
            'Stock',
            'Costo',
            'Estatus',
            'Unidad',
            'Proveedor',
            'Inventario Físico',
        ];
    }
}
