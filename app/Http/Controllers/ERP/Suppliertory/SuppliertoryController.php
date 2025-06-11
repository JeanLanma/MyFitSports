<?php

namespace App\Http\Controllers\ERP\Suppliertory;

use App\Http\Controllers\Controller;
use App\Resources\Erp\Inventory\GetProduct;
use Illuminate\Http\Request;

class SuppliertoryController extends Controller
{
    public function index()
    {
        $products = GetProduct::Paginated(request()->all());
        return inertia('Suppliertory/InventoryIndex', [
            'products' => $products,
            'params' => request()->all()
        ]);
    }
}
