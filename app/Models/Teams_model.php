<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Teams_model extends Model
{
    use HasFactory;
    protected static function newFactory()
    {
        return \Database\Factories\TeamFactory::new();
    }
    protected $table = 'teams';
    protected $fillable = [
        'team_name',
        'tournament_id'
    ];
    public function tournament()
    {
        return $this->belongsTo(Tournament_model::class, 'tournament_id');
    }

    public function players()
    {
        return $this->hasMany(Players_model::class, 'team_id');
    }
}