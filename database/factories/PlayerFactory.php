<?php

namespace Database\Factories;

use App\Models\Players_model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Players_model>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Players_model::class;
    public function definition(): array
    {
        return [

            'team_id' => rand(1,5),

            'team_name' => fake()->randomElement([

                'Falcons',
                'Wolves',
                'Titans'

            ]),

            'player_name' => fake()->name(),

            'player_price' => rand(100,1000),

            'age' => rand(18,35),

            'country' => fake()->country()

        ];
    }
}
