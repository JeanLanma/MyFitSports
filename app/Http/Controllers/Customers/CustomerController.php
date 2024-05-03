<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Resources\Customers\GetCustomers;
use App\Resources\Customers\PostCustomer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return inertia('Customers/CustomerIndex',
            [
                'customers' => GetCustomers::paginated(),
            ]);
    }

    public function show($customer)
    {
        return inertia('Customers/CustomerCreate', [
            'customer' => GetCustomers::byId($customer),
        ]);
    }
    public function create()
    {
        return inertia('Customers/CustomerCreate');
    }
    public function store(Request $request)
    {
        return redirect()->back()->with([
            'message' => 'Customer created successfully',
            'data' => $request->all(),
            'created' => PostCustomer::fromRequest($request),
        ]);
    }
}
