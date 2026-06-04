<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Teams_model extends Model
{
    use HasFactory, SoftDeletes;
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
