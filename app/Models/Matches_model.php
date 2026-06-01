<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matches_model extends Model
{
    protected $table = 'matches';

    public function tournament()
    {
        return $this->belongsTo(Tournament_model::class, 'tournament_id');
    }

    public function fantasyTeams()
    {
        return $this->hasMany(FantasyTeams_model::class, 'match_id');
    }

    public function playerMatchPoints()
    {
        return $this->hasMany(PlayerMatchPoints_model::class, 'match_id');
    }

    public function leaderboards()
    {
        return $this->hasMany(Leaderboards_model::class, 'match_id');
    }
}