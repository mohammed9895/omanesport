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
        Schema::table('competition_matches', function (Blueprint $table) {
            $table->unsignedInteger('home_score')->default(0)->after('away_id');
            $table->unsignedInteger('away_score')->default(0)->after('home_score');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('competition_matches', function (Blueprint $table) {
            //
        });
    }
};
