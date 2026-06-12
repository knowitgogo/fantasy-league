<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class playerscore_model extends Model
{
    use HasFactory;
    
    protected $table = 'player_scores';

    protected $fillable = [

        'match_id',
        'player_id',
        'fantasy_points'

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
}