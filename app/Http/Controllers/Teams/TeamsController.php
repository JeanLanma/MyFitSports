<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Resources\Teams\PostTeam;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function create()
    {
        return inertia('Teams/Create');
    }

    public function store(Request $request)
    {
        return redirect()->back()->with([
            'message' => 'Team created successfully',
            'created' => PostTeam::fromRequest($request),
        ]);
    }
}
