<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Players_model extends Model
{
    protected $table = 'players';

    public function team()
    {
        return $this->belongsTo(Teams_model::class, 'team_id');
    }

    public function playerMatchPoints()
    {
        return $this->hasMany(PlayerMatchPoints_model::class, 'player_id');
    }

    public function fantasyTeams()
    {
        return $this->belongsToMany(
            FantasyTeams_model::class,
            'fantasy_team_players',
            'player_id',
            'fantasy_team_id'
        );
    }
}