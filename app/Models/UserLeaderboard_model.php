<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLeaderboard_model extends Model
{
    protected $table = 'user_leaderboards';

    protected $fillable = [
        'match_id',
        'user_id',
        'total_points',
        'rank'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function match()
    {
        return $this->belongsTo(
            Matches_model::class,
            'match_id'
        );
    }
}