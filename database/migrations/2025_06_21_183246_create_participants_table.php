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
        Schema::create('competition_participants', function (Blueprint $table) {
            $table->id();

            $table->foreignId('competition_id')->constrained()->onDelete('cascade');

            $table->unsignedBigInteger('participant_id');
            $table->string('participant_type');

            $table->unique(
                ['competition_id', 'participant_id', 'participant_type'],
                'comp_participant_unique'
            );

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competition_participants');
    }
};
