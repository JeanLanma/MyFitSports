<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return inertia('Customers/CustomerIndex');
    }
    public function create()
    {
        return inertia('Customers/CustomerIndex');
    }
}
