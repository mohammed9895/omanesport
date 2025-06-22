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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
        });

        Schema::create('gamer_game', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gamer_id')
                ->constrained('gamers')
                ->onDelete('cascade');
            $table->foreignId('game_id')
                ->constrained('games')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('club_game', function (Blueprint $table) {
            $table->id();
            $table->foreignId('club_id')
                ->constrained('clubs')
                ->onDelete('cascade');
            $table->foreignId('game_id')
                ->constrained('games')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
