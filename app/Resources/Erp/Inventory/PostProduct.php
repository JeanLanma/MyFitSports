<?php

namespace App\Resources\Erp\Inventory;

use App\Models\Admin\Erp\Inventory\Product as ProductModel;

class PostProduct
{
    public static function Create($Product)
    {
        $Product_ = ProductModel::create([
            'name' => $Product['name'],
            'type' => $Product['type'] ?? null,
            'stock' => $Product['stock'],
            'costs' => $Product['cost'],
            'price' => $Product['price'] ?? 00.00,
            'status' => $Product['status'],
            'unit' => $Product['unit'],
            'supplier' => $Product['supplier'],
            'physical_inventory' => $Product['physical_inventory'],
        ]);
        return $Product_;
    }
}