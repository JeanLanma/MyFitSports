<?php

namespace App\Resources\Erp\Supplier;
use App\Models\Admin\Erp\Inventory\Supplier as SupplierModel;

class PostSupplier
{
    public static function Create($Supplier)
    {
        $Supplier_ = SupplierModel::create([
            'category_id' => $Supplier['category_id'],
            'fiscal_name' => $Supplier['fiscal_name'],
            'trade_name' => $Supplier['trade_name'],
            'responsible_contact' => $Supplier['responsible_contact'],
            'phone' => $Supplier['phone'],
            'mail' => $Supplier['mail'],
            'payment_method' => $Supplier['payment_method'], // credito, transferencia, efectivo
            'credit_days' => isset($Supplier['credit_days']) ? $Supplier['credit_days'] : null, // Default: N/A
            'application_type' => isset($Supplier['application_type']) ? $Supplier['application_type'] : null, // Default: N/A
            'seal_type' => isset($Supplier['seal_type']) ? $Supplier['seal_type'] : null // Default: N/A
        ]);
        return $Supplier_;
    }

    public static function Update($Supplier, $id)
    {
        $Supplier_ = SupplierModel::find($id);
        $Supplier_->update([
            'category_id' => $Supplier['category_id'],
            'fiscal_name' => $Supplier['fiscal_name'],
            'trade_name' => $Supplier['trade_name'],
            'responsible_contact' => $Supplier['responsible_contact'],
            'phone' => $Supplier['phone'],
            'mail' => $Supplier['mail'],
            'payment_method' => $Supplier['payment_method'], // credito, transferencia, efectivo
            'credit_days' => isset($Supplier['credit_days']) ? $Supplier['credit_days'] : null, // Default: N/A
            'application_type' => isset($Supplier['application_type']) ? $Supplier['application_type'] : null, // Default: N/A
            'seal_type' => isset($Supplier['seal_type']) ? $Supplier['seal_type'] : null // Default: N/A
        ]);
        return $Supplier_;
    }
}