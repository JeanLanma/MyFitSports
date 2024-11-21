<?php

namespace App\Http\Controllers\ERP\Inventory;

use App\Resources\Erp\Inventory\GetProduct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $products = GetProduct::Paginated(request()->all());
        return inertia('Inventory/InventoryIndex', [
            'products' => $products,
            'params' => request()->all()
        ]);
    }
}
