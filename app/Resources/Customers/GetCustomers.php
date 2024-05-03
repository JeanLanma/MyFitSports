<?php

namespace App\Resources\Customers;

use App\Models\Customers\Customer;

class GetCustomers
{
    public static function paginated($limit = 15)
    {
        return Customer::paginate($limit);
    }

    public static function byId($id)
    {
        return Customer::find($id);
    }

    public static function all()
    {
        return Customer::all();
    }
}