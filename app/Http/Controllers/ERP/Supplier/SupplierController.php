<?php

namespace App\Http\Controllers\ERP\Supplier;

use App\Resources\Erp\Inventory\GetProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\Erp\Suppliers\StoreSupplierRequest;
use App\Resources\Erp\Supplier\DeleteSupplier;
use App\Resources\Erp\Supplier\GetSuppliers;
use App\Resources\Erp\Supplier\PostSupplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = GetSuppliers::Paginated(request()->all(), [], 25);
        return inertia('Supplier/SupplierIndex', [
            'suppliers' => $suppliers,
            'params' => request()->all()
        ]);
    }

    public function create()
    {
        return inertia('Supplier/SupplierCreate');
    }

      public function store(StoreSupplierRequest $request)
    {
        if(PostSupplier::Create($request->validated())){
            return back()->with('success', 'Proveedor creado correctamente.');
        }

        return back()->with('error', 'Error al crear el proveedor. Por favor, inténtelo de nuevo.');
    }

    public function update(StoreSupplierRequest $request, $supplier) {
        if(PostSupplier::Update($request->validated(), $supplier)){
            return back()->with('success', 'Proveedor actualizado correctamente.');
        }

        return back()->with('error', 'Error al actualizar el proveedor. Por favor, inténtelo de nuevo.');
    }
    public function destroy($id)
    {
        if(DeleteSupplier::Delete($id)){
            return back()->with('success', 'Proveedor eliminado correctamente.');
        }

        return back()->with('error', 'Error al eliminar el proveedor. Por favor, inténtelo de nuevo.');
    }
}