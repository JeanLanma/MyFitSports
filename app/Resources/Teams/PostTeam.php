<?php

namespace App\Resources\Teams;

use Illuminate\Support\Str;
use App\Models\Teams\Team;
use App\Services\Media\SaveFile;

class PostTeam
{
    public static function fromRequest($request)
    {
        $data = $request->all();
        if($data['id'] != null){
            $team = GetTeams::findById($data['id']);
            return self::update($team, $request);
        }
        return self::create($data);
    }

    public static function create($team)
    {
        $team['slug'] = Str::slug($team['name']);
        $team['user_id'] = request()->user()->id;
        return Team::create($team);
    }

    public static function update(Team $team, $request)
    {
        $data = $request->all();
        $request->has('cover') && (request('cover') != null ) 
            ? $data['cover'] = SaveFile::fromRequest($request, 'cover', 'teams') 
            : null;
        $team->update($data);
        return $team->id;
    }
}
