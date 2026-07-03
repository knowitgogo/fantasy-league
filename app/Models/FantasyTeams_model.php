<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FantasyTeams_model extends Model
{
    protected $table = 'fantasy_teams';
    protected $fillable = [

        'user_id',
        'match_id',
        'team_name'

    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function match()
    {
        return $this->belongsTo(Matches_model::class, 'match_id');
    }

    public function players()
    {
        return $this->belongsToMany(
            Players_model::class,
            'fantasy_team_players',
            'fantasy_team_id',
            'player_id'
        )->withPivot(
            'is_captain',
            'is_vice_captain'
        );
    }

    public function deleteTeamApi($id)
    {
        $team = FantasyTeams_model::findOrFail($id);

        $team->players()->detach();

        $team->delete();

        return response()->json([
            'message' => 'Team deleted successfully'
        ]);
    }
    
    
}
