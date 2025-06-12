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

      public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ]);

        // Here you would typically save the data to the database
        // For example:
        // Product::create($data);

        return response()->json([
            'message' => 'Product created successfully.',
            'data' => $data,
        ], 201);
        return redirect()->route('suppliertory.index')->with('success', 'Product created successfully.');
    }
}
