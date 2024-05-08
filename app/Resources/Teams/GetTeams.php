<?php

namespace App\Resources\Teams;

use App\Models\Teams\Team;

class GetTeams
{
    public static function all()
    {
        return Team::all();
    }

    public static function findById($team_id)
    {
        return Team::find($team_id);
    }

    public static function findBySLug($team_slug)
    {
        return Team::where('slug', $team_slug)->first();
    }

    public static function paginate($per_page = 15)
    {
        return Team::paginate($per_page);
    }
}