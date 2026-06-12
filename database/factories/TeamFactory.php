<?php

namespace Database\Factories;

use App\Models\Teams_model;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    protected $model = Teams_model::class;

    public function definition(): array
    {
        static $teams = [

            'Falcons',
            'Titans',
            'Warriors',
            'Kings',
            'Wolves',
            'Strikers',
            'Royals',
            'Riders'

        ];

        return [

            'team_name' => array_shift($teams),

            'tournament_id' => 1

        ];
    }
}