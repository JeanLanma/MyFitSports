<?php

namespace App\Http\Controllers\ERP;

use App\Http\Controllers\Controller;
use App\Resources\Customers\GetCustomers;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        return inertia('Sales/SalesIndex');
    }

    public function show()
    {
        $sale = [
            'id'=> 1,
            'no_order'=> '0001',
            'date'=>'25/10/2024 09:06:45',
            'customer'=> 'Diego Gonzalez',
            'seller'=> 'Daniel Rivera',
            'branch'=> 'Sucursal 1',
            'total'=> '$ 15,000.00',
            'status'=> 'Pagado',
        ];
        return inertia('Sales/SalesCreate', [
            'customer' => GetCustomers::byId(1),
            'sale' => $sale,
        ]);
    }
}
