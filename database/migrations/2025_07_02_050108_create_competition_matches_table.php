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
        Schema::create('competition_matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competition_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('home_id')->nullable();
            $table->unsignedBigInteger('away_id')->nullable();
            $table->unsignedBigInteger('winner_id')->nullable();
            $table->integer('round')->nullable(); // used for knockout
            $table->integer('group_id')->nullable(); // for league grouping
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competition_matches');
    }
};
