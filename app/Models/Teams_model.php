<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teams_model extends Model
{
    use HasFactory, SoftDeletes;
    protected static function newFactory()
    {
        return \Database\Factories\TeamFactory::new();
    }
    protected $table = 'teams';
    protected $fillable = [
        'team_name',
        'tournament_id'
    ];
    public function tournament()
    {
        return $this->belongsTo(Tournament_model::class, 'tournament_id');
    }

    public function tournaments()
    {
        return $this->belongsToMany(
            Tournament_model::class,
            'tournament_teams',
            'team_id',
            'tournament_id'
        );
    }

    public function legacyplayers()
    {
        return $this->hasMany(Players_model::class, 'team_id');
    }

    public function players()
    {
        return $this->belongsToMany(
            Players_model::class,
            'team_players',
            'team_id',
            'player_id'
        );
    }


    public function matchesAsTeam1()
    {
        return $this->hasMany(
            Matches_model::class,
            'team1_id'
        );
    }

    public function matchesAsTeam2()
    {
        return $this->hasMany(
            Matches_model::class,
            'team2_id'
        );
    }
}
