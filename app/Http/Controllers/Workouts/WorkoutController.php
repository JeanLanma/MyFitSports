<?php

namespace App\Http\Controllers\Workouts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    public function index()
    {
        return inertia('Workouts/WorkoutsIndex');
    }
}
