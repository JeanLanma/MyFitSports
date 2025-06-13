<?php

namespace App\Resources\Erp\Supplier;
use App\Models\Admin\Erp\Inventory\Supplier as SupplierModel;

class GetSuppliers
{
    public static function Select($Supplier)
    {
        $Supplier_ = SupplierModel::where('id', $Supplier['id'])->first();
        return $Supplier_;
    }

    public static function Paginated($Search, $orderBy = [], $limit = 25)
    {
        $_limit = (isset($Search['per_page']) && is_numeric($Search['per_page']) && $Search['per_page'] > 0) ? $Search['per_page'] : $limit;
        $Supplier_ = SupplierModel::when(isset($Search['fiscal_name']), function ($query) use ($Search) {
                                        $query->where('fiscal_name', 'like', '%' . $Search['fiscal_name'] . '%');
                                    })
                                    ->when(isset($Search['trade_name']), function ($query) use ($Search) {
                                        $query->where('trade_name', 'like', '%' . $Search['trade_name'] . '%');
                                    })
                                    ->when(isset($Search['responsible_contact']), function ($query) use ($Search) {
                                        $query->where('responsible_contact', 'like', '%' . $Search['responsible_contact'] . '%');
                                    })
                                    ->when(isset($Search['phone']), function ($query) use ($Search) {
                                        $query->where('phone', 'like', '%' . $Search['phone'] . '%');
                                    })
                                    ->when(isset($Search['mail']), function ($query) use ($Search) {
                                        $query->where('mail', 'like', '%' . $Search['mail'] . '%');
                                    })
                                    ->when(isset($Search['payment_method']), function ($query) use ($Search) {
                                        $query->where('payment_method', 'like', '%' . $Search['payment_method'] . '%');
                                    })
                                    ->when(isset($Search['credit_days']), function ($query) use ($Search) {
                                        $query->where('credit_days', 'like', '%' . $Search['credit_days'] . '%');
                                    })
                                    ->when(isset($Search['application_type']), function ($query) use ($Search) {
                                        $query->where('application_type', 'like', '%' . $Search['application_type'] . '%');
                                    })
                                    ->when(isset($Search['seal_type']), function ($query) use ($Search) {
                                        $query->where('seal_type', 'like', '%' . $Search['seal_type'] . '%');
                                    })
                                    ->when(isset($Search['category_id']), function ($query) use ($Search) {
                                        $query->where('category_id', $Search['category_id']);
                                    })
                                    ->when(!empty($orderBy), function ($query) use ($orderBy) {
                                        foreach ($orderBy as $field => $direction) {
                                            $query->orderBy($field, $direction);
                                        }
                                    })
                                    ->paginate($_limit);
        return $Supplier_;
    }

    public static function All($Search = [])
    {
        $Supplier_ = SupplierModel::when(isset($Search['fiscal_name']), function ($query) use ($Search) {
                                        $query->where('fiscal_name', 'like', '%' . $Search['fiscal_name'] . '%');
                                    })
                                    ->when(isset($Search['trade_name']), function ($query) use ($Search) {
                                        $query->where('trade_name', 'like', '%' . $Search['trade_name'] . '%');
                                    })
                                    ->when(isset($Search['responsible_contact']), function ($query) use ($Search) {
                                        $query->where('responsible_contact', 'like', '%' . $Search['responsible_contact'] . '%');
                                    })
                                    ->when(isset($Search['phone']), function ($query) use ($Search) {
                                        $query->where('phone', 'like', '%' . $Search['phone'] . '%');
                                    })
                                    ->when(isset($Search['mail']), function ($query) use ($Search) {
                                        $query->where('mail', 'like', '%' . $Search['mail'] . '%');
                                    })
                                    ->when(isset($Search['payment_method']), function ($query) use ($Search) {
                                        $query->where('payment_method', 'like', '%' . $Search['payment_method'] . '%');
                                    })
                                    ->when(isset($Search['credit_days']), function ($query) use ($Search) {
                                        $query->where('credit_days', 'like', '%' . $Search['credit_days'] . '%');
                                    })
                                    ->when(isset($Search['application_type']), function ($query) use ($Search) {
                                        $query->where('application_type', 'like', '%' . $Search['application_type'] . '%');
                                    })
                                    ->when(isset($Search['seal_type']), function ($query) use ($Search) {
                                        $query->where('seal_type', 'like', '%' . $Search['seal_type'] . '%');
                                    })
                                    ->get();
        return $Supplier_;
    }
}