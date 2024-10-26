<?php

namespace App\Http\Controllers\ERP\Branches;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    public function index()
    {
        return inertia('Branches/BranchesIndex');
    }
}
