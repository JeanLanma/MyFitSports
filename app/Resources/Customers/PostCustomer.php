<?php

namespace App\Resources\Customers;

use App\Models\Customers\Customer;

class PostCustomer
{
    public static function fromRequest($request)
    {
        if (self::checkIfCustomerExists($request)) {
            return self::updateCustomer($request, self::checkIfCustomerExists($request));
        }
        return Customer::create($request->all());;
    }

    public static function checkIfCustomerExists($request)
    {
        return Customer::where('email', $request->email)->first();
    }

    public static function updateCustomer($request, $customer)
    {
        return $customer->update($request->all());
    }
}