<?php

namespace Database\Factories;

use App\Models\Matches_model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Matches_model>
 */
class MatchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Matches_model::class;
    public function definition(): array
    {
        return [

            'tournament_id' => 1,

            'team1_id' => rand(1,3),

            'team2_id' => rand(4,5),

            'match_date' => now()->addDays(rand(1,10)),

            'status' => 'Upcoming'

        ];
    }
}
