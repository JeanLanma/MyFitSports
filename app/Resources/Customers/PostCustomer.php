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
        $customer = self::createCustomer($data);
        return $customer;
    }

    public static function createCustomer($data)
    {
        $customer = Customer::create($data);
        return self::RegistrCustomerAsUser($customer);
    }
    public static function checkIfCustomerExists($request)
    {
        return Customer::where('email', $request->email)->first();
    }

    public static function updateCustomer($request, $customer)
    {
        return $customer->update($request->all());
    }

    public static function RegistrCustomerAsUser($customer)
    {
        $User = User::where('email', $customer->email)->first();
        if($User){
            $customer->update(['user_id' => $User->id]);
            return $customer;
        }
        $user = User::create([
            'name' => $customer->name,
            'email' => $customer->email,
            'password' => bcrypt('12345678'),
        ]);
        $customer->update(['user_id' => $user->id]);
        return $customer;
    }
}