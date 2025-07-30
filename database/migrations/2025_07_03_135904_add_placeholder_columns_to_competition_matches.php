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
            $table->string('placeholder_home')->nullable()->after('home_id');
            $table->string('placeholder_away')->nullable()->after('away_id');
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
