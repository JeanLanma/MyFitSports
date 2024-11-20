<?php

namespace App\Http\Controllers\ERP\Inventory;

use App\Http\Controllers\Controller;
use App\Resources\Erp\Inventory\GetProduct;
use App\Resources\Erp\Inventory\PostProduct;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = GetProduct::Paginated(request()->all());
        return inertia('Inventory/ProductsIndex',[
            'products' => $products
        ]);
    }
    public function create()
    {
        return inertia('Inventory/ProductsCreate');
    }

    public static function store(Request $request)
    {
        return redirect()->back()->with([
            'success' => PostProduct::Create($request->all()),
        ]);
    }
}
