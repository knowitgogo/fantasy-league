<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;
    protected static function newFactory()
    {
        return \Database\Factories\UserFactory::new();
    }
    public function fantasyTeams()
    {
        return $this->hasMany(
            FantasyTeams_model::class,
            'user_id'
        );
    }

    public function leaderboards()
    {
        return $this->hasMany(
            Leaderboards_model::class,
            'user_id'
        );
    }

    protected $fillable = [

        'name',
        'email',
        'password',
        'wallet_balance',
        'fantasy_points',
        'role'

    ];

    protected $hidden = [

        'password'

    ];

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    protected function casts(): array
    {
        return [

            'password' => 'hashed',

        ];
    }
}
