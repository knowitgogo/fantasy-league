<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('players_match_points', function (Blueprint $table) {
            $table->id();

            $table->foreignId('match_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('player_id')
                ->constrained()
                ->onDelete('cascade');

            $table->integer('points');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players_match_points');
    }
};
