<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('teams', function (Blueprint $table) {

            $table->dropForeign('teams_tournament_id_foreign');

            $table->dropColumn('tournament_id');

        });
    }

    public function down(): void
    {
        Schema::table('teams', function (Blueprint $table) {

            $table->foreignId('tournament_id');

            $table->foreign('tournament_id')
                  ->references('id')
                  ->on('tournaments')
                  ->onDelete('cascade');

        });
    }
};