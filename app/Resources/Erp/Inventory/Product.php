<?php

namespace App\Resources\Erp\Inventory;

use App\Models\Admin\Erp\Inventory\Product as ProductModel;

class Product extends ProductModel
{
    public static function Create($Product)
    {
        $Product_ = ProductModel::create([
            'name' => $Product['name'],
            'type' => $Product['type'],
            'stock' => $Product['stock'],
            'costs' => $Product['costs'],
            'price' => $Product['price'],
            'status' => $Product['status'],
            'unit' => $Product['unit'],
            'supplier' => $Product['supplier'],
            'physical_inventory' => $Product['physical_inventory'],
        ]);
        return $Product_;
    }

    public static function Get($Product)
    {
        $Product_ = ProductModel::where('id', $Product['id'])->first();
        return $Product_;
    }
    public function GetProducts()
    {
        $Products = ProductModel::all();
        return $Products;
    }
}