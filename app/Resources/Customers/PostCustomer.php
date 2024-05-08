<?php

namespace App\Resources\Customers;

use App\Models\Customers\Customer;
use App\Models\User;

class PostCustomer
{
    public static function fromRequest($request)
    {
        if (self::checkIfCustomerExists($request)) {
            return self::updateCustomer($request, self::checkIfCustomerExists($request));
        }
        $data = $request->all();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt('12345678'),
        ]);
        return Customer::create($data);
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