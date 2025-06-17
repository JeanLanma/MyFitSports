<?php

namespace App\Resources\Erp\Supplier;
use App\Models\Admin\Erp\Inventory\Supplier as SupplierModel;

class DeleteSupplier
{
    public static function Delete($id)
    {
        $supplier = SupplierModel::find($id);
        if ($supplier) {
            $supplier->delete();
            return true;
        }
        return false;
    }
}