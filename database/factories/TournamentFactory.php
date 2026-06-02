<?php

namespace Database\Factories;

use App\Models\Tournament_model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tournament_model>
 */
class TournamentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Tournament_model::class;
    public function definition(): array
    {
        return [

            'name' => fake()->randomElement([
                'IPL',
                'World Cup',
                'Champions Trophy'
            ]),

            'start_date' => now(),

            'end_date' => now()->addDays(30),

            'status' => 'Upcoming'

        ];
    }
}
