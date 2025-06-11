<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupllierController extends Controller
{
    public function index () { 
    return inertia("Supplier/SupplierIndex");
}
}
