<?php

namespace Database\Factories;

use App\Models\Players_model;
use App\Models\Teams_model;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    protected $model = Players_model::class;

    public function definition(): array
    {
        $team = Teams_model::inRandomOrder()->first();

        return [

            'team_id' => $team->id,

            'team_name' => $team->team_name,

            'player_name' => fake()->unique()->name(),

            'player_price' => rand(100,1000),

            'age' => rand(18,35),

            'country' => fake()->country()

        ];
    }
}