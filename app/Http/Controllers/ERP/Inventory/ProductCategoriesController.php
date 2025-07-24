<?php

namespace App\Http\Controllers\Erp\Inventory;

use App\Resources\Erp\ProductCategories\PostProductCategory;
use App\Http\Controllers\Controller;
use App\Resources\Erp\ProductCategories\GetProductCategories;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    public function index()
    {
        return inertia('ProductCategories/ProductCategoriesIndex', [
            'categories' => GetProductCategories::All(request()->all()),
            'params' => request()->all(),
        ]);
    }

    public function apiStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        $category = PostProductCategory::create($request->all());

        return response()->json([
            'message' => 'Category created successfully',
            'category' => $category,
            'status' => 'ok',
            'success' => true,
        ], 201);
    }
}
