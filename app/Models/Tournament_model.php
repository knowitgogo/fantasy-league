<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tournament_model extends Model
{
    protected $table = 'tournaments';

    public function teams()
    {
        return $this->hasMany(Teams_model::class, 'tournament_id');
    }

    public function matches()
    {
        return $this->hasMany(Matches_model::class, 'tournament_id');
    }
}