<?php

namespace App\Http\Controllers\ERP\Supplier;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        return Inertia::render('Supplier/SupplierIndex');
    }
}
