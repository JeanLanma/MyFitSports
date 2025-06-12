<?php

namespace App\Http\Controllers\ERP\Supplier;

use App\Http\Controllers\Controller;
use App\Resources\Erp\Inventory\GetProduct;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $products = GetProduct::Paginated(request()->all());
        return inertia('Supplier/SupplierIndex', [
            'products' => $products,
            'params' => request()->all()
        ]);
    }

    public function create()
    {
        return inertia('Supplier/SupplierCreate');
    }
}
