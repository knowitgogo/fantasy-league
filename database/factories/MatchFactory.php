<?php

namespace Database\Factories;

use App\Models\Matches_model;
use App\Models\Teams_model;
use Illuminate\Database\Eloquent\Factories\Factory;

class MatchFactory extends Factory
{
    protected $model = Matches_model::class;

    public function definition(): array
    {
        $teams = Teams_model::inRandomOrder()
                    ->take(2)
                    ->get();

        return [

            'tournament_id' => 1,

            'team1_id' => $teams[0]->id,

            'team2_id' => $teams[1]->id,

            'match_date' => fake()->unique()->dateTimeBetween(
                '+1 days',
                '+30 days'
            ),

            'status' => 'Upcoming'

        ];
    }
}