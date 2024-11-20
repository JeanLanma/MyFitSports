<?php

namespace App\Resources\Erp\Inventory;

use App\Models\Admin\Erp\Inventory\Product as ProductModel;

class GetProduct
{
    public static function Select($Product)
    {
        $Product_ = ProductModel::where('id', $Product['id'])->first();
        return $Product_;
    }
    public static function Paginated($Search, $limit = 25)
    {
        $Product_ = ProductModel::when(isset($Search['name']), function ($query) use ($Search) {
                                        $query->where('name', 'like', '%' . $Search['name'] . '%');
                                    })
                                    ->when(isset($Search['stock']), function ($query) use ($Search) {
                                        $query->where('stock', 'like', '%' . $Search['stock'] . '%');
                                    })
                                    ->when(isset($Search['costs']), function ($query) use ($Search) {
                                        $query->where('costs', $Search['costs']);
                                    })
                                    ->when(isset($Search['status']), function ($query) use ($Search) {
                                        $query->where('status', $Search['status']);
                                    })
                                    ->when(isset($Search['unit']), function ($query) use ($Search) {
                                        $query->where('unit', 'like', '%' . $Search['unit'] . '%');
                                    })
                                    ->when(isset($Search['supplier']), function ($query) use ($Search) {
                                        $query->where('supplier', 'like', '%' . $Search['supplier'] . '%');
                                    })
                                    ->when(isset($Search['physical_inventory']), function ($query) use ($Search) {
                                        $query->where('physical_inventory', $Search['physical_inventory']);
                                    })
                                    ->paginate($limit);
        return $Product_;
    }
}