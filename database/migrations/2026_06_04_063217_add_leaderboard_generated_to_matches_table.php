<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('matches', function (Blueprint $table) {

            $table->boolean('leaderboard_generated')
                  ->default(false);

        });
    }

    public function down(): void
    {
        Schema::table('matches', function (Blueprint $table) {

            $table->dropColumn('leaderboard_generated');

        });
    }
};