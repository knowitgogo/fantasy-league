<?php

namespace Database\Factories;

use App\Models\Tournament_model;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentFactory extends Factory
{
    protected $model = Tournament_model::class;

    public function definition(): array
    {
        static $tournaments = [

            'IPL',
            'World Cup',
            'Champions Trophy',
            'Asia Cup',
            'Big Bash League',
            'PSL',
            'SA20',
            'CPL'

        ];

        return [

            'name' => array_shift($tournaments),

            'start_date' => now(),

            'end_date' => now()->addDays(30),

            'status' => 'Upcoming'

        ];
    }
}