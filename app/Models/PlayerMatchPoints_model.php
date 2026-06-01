<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerMatchPoints_model extends Model
{
    protected $table = 'player_match_points';

    public function player()
    {
        return $this->belongsTo(Players_model::class, 'player_id');
    }

    public function match()
    {
        return $this->belongsTo(Matches_model::class, 'match_id');
    }
}