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
        Schema::table('clubs', function (Blueprint $table) {
            $table->string('email')->after('founded_year')->nullable();
            $table->string('phone')->after('email')->nullable();
            $table->string('website')->after('phone')->nullable();
            $table->string('address')->after('website')->nullable();
            $table->string('youtube')->after('address')->nullable();
            $table->string('instagram')->after('youtube')->nullable();
            $table->string('twitch')->after('instagram')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clubs', function (Blueprint $table) {
            //
        });
    }
};
