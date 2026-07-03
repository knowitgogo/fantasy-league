<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchPlayers_model extends Model
{
    protected $table = 'match_players';

    protected $fillable = [

        'match_id',
        'player_id'

    ];

    public function match()
    {
        return $this->belongsTo(
            Matches_model::class,
            'match_id'
        );
    }

    public function player()
    {
        return $this->belongsTo(
            Players_model::class,
            'player_id'
        );
    }


    public function matchPlayers()
    {
        return $this->hasMany(
            MatchPlayers_model::class,
            'match_id'
        );
    }
}