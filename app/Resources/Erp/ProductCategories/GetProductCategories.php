<?php

namespace App\Resources\Erp\ProductCategories;

use App\Models\Admin\Erp\Inventory\ProductCategory;

class GetProductCategories
{
    public static function Paginated($params, $limit = 15)
    {
        $query = ProductCategory::query();
        if (isset($params['search'])) {
            $query->where('name', 'like', '%' . $params['search'] . '%');
        }
        return $query->paginate($limit);
    }
}