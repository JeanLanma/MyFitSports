<?php

namespace App\Http\Controllers\ERP\Supplier;

use App\Resources\Erp\Inventory\GetProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\Erp\Suppliers\StoreSupplierRequest;
use App\Resources\Erp\Supplier\PostSupplier;
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

      public function store(StoreSupplierRequest $request)
    {

        PostSupplier::Create($request->validated());

        return response()->json([
            'message' => 'Product created successfully.',
            'data' => $request->validated(),
        ], 201);
        return redirect()->route('suppliertory.index')->with('success', 'Product created successfully.');
    }
}
