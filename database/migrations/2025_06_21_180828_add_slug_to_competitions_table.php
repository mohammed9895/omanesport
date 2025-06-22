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
        Schema::table('competitions', function (Blueprint $table) {
            $table->string('slug')->unique()->nullable()->after('name');
            $table->string('prize')->nullable()->after('cover_image');
            $table->string('location')->nullable()->after('prize');
            $table->string('number_of_winners')->nullable()->after('location');
            $table->foreignIdFor(App\Models\CompetitionCategory::class)
                ->nullable()
                ->after('number_of_winners')
                ->constrained('competition_categories')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('competitions', function (Blueprint $table) {

        });
    }
};
