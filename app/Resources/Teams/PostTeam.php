<?php

namespace App\Resources\Teams;

use Illuminate\Support\Str;
use App\Models\Teams\Team;


class PostTeam
{
    public static function fromRequest($request)
    {
        $team = $request->all();
        $team['slug'] = Str::slug($team['name']);
        $team['user_id'] = $request->user()->id;

        return Team::create($team);
    }
}
