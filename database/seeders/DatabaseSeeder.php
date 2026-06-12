<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([

            'name' => 'Admin',

            'email' => 'admin@gmail.com',

            'password' => bcrypt('password'),

            'wallet_balance' => 0,

            'role' => 'admin'

        ]);

        \App\Models\User::factory(10)->create();

        \App\Models\Tournament_model::factory(3)->create();

        \App\Models\Teams_model::factory(5)->create();

        \App\Models\Players_model::factory(30)->create();

        \App\Models\Matches_model::factory(10)->create();
    }
}
