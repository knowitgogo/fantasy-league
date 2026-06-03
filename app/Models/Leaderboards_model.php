<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leaderboards_model extends Model
{
    protected $table = 'players_leaderboard';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function match()
    {
        return $this->belongsTo(Matches_model::class, 'match_id');
    }
}