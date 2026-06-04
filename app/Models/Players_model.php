<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Players_model extends Model
{
    use HasFactory, SoftDeletes;
    protected static function newFactory()
    {
        return \Database\Factories\PlayerFactory::new();
    }
    protected $table = 'players';

    protected $fillable = [

        'team_id',
        'player_name',
        'player_price',
        'age',
        'country',
        'team_name'

    ];

    public function team()
    {
        return $this->belongsTo(
            Teams_model::class,
            'team_id'
        );
    }
}
