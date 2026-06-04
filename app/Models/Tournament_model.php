<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tournament_model extends Model
{
    use HasFactory, SoftDeletes;
    protected static function newFactory()
    {
        return \Database\Factories\TournamentFactory::new();
    }
    protected $table = 'tournaments';

    protected $fillable = [

        'name',
        'start_date',
        'end_date',
        'status'

    ];

    public function teams()
    {
        return $this->hasMany(
            Teams_model::class,
            'tournament_id'
        );
    }

    public function matches()
    {
        return $this->hasMany(
            Matches_model::class,
            'tournament_id'
        );
    }

    
}
