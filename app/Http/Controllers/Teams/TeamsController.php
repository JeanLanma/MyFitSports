<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Resources\Teams\GetTeams;
use App\Resources\Teams\PostTeam;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function index()
    {
        return inertia('Teams/TeamsIndex',[
            'teams' => GetTeams::paginate()
        ]);
    }
    public function create()
    {
        return inertia('Teams/Create');
    }
    public function show($team_id = null)
    {
        return inertia('Teams/Show',[
            'team' => GetTeams::findById($team_id)
        ]);
    }

    public function store(Request $request)
    {
        return redirect()->back()->with([
            'message' => 'Success',
            'data' => PostTeam::fromRequest($request),
        ]);
    }
}
