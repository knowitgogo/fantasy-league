<?php

namespace Database\Factories;

use App\Models\Teams_model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Teams_model>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Teams_model::class;
    public function definition(): array
    {
        return [

            'team_name' => fake()->randomElement([

                'Falcons',
                'Wolves',
                'Titans',
                'Warriors',
                'Kings'

            ]),

            'tournament_id' => 1

        ];
    }
}
