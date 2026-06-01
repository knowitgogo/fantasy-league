<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FantasyTeamPlayers_model extends Model
{
    protected $table = 'fantasy_team_players';

    public function fantasyTeam()
    {
        return $this->belongsTo(FantasyTeams_model::class, 'fantasy_team_id');
    }

    public function player()
    {
        return $this->belongsTo(Players_model::class, 'player_id');
    }
}