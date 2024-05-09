<?php

namespace App\Http\Controllers\Workouts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index()
    {
        return inertia('Workouts/WorkoutsIndex');
    }
}
