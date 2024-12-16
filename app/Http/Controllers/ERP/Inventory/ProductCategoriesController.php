<?php

namespace App\Http\Controllers\Erp\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    public function index()
    {
        return inertia('ProductCategories/ProductCategoriesIndex');
    }
}
