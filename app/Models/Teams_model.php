<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teams_model extends Model
{
    protected $table = 'teams';

    public function tournament()
    {
        return $this->belongsTo(Tournament_model::class, 'tournament_id');
    }

    public function players()
    {
        return $this->hasMany(Players_model::class, 'team_id');
    }
}