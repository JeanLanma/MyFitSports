<?php

namespace App\Resources\Erp\ProductCategories;

use App\Models\Admin\Erp\Inventory\ProductCategory;

class PostProductCategory {

    public static function create($categoryData)
    {
        $category = ProductCategory::create([
            'name' => $categoryData['name'],
            'description' => $categoryData['description'] ?? null,
            'image' => $categoryData['image'] ?? null,
            'is_active' => $categoryData['is_active'] ?? true,
            'parent_id' => $categoryData['parent_id'] ?? null,
        ]);

        return $category;
    }
}