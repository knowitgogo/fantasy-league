<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Matches_model extends Model
{
    use HasFactory, SoftDeletes;
    protected static function newFactory()
    {
        return \Database\Factories\MatchFactory::new();
    }
    protected $table = 'matches';
    protected $fillable = [
        'tournament_id',
        'team1_id',
        'team2_id',
        'match_date',
        'status',
        'leaderboard_generated'
    ];
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

    public function team1()
    {
        return $this->belongsTo(
            Teams_model::class,
            'team1_id'
        );
    }

    public function team2()
    {
        return $this->belongsTo(
            Teams_model::class,
            'team2_id'
        );
    }
}
