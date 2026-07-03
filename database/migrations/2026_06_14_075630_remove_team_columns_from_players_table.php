<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('players', function (Blueprint $table) {

            $table->dropForeign('players_team_id_foreign');

            $table->dropColumn([
                'team_id',
                'team_name'
            ]);

        });
    }

    public function down(): void
    {
        Schema::table('players', function (Blueprint $table) {

            $table->foreignId('team_id');

            $table->string('team_name');

            $table->foreign('team_id')
                  ->references('id')
                  ->on('teams')
                  ->onDelete('cascade');

        });
    }
};