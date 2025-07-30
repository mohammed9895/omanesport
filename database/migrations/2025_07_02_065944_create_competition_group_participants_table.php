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
        Schema::create('competition_group_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competition_group_id')->constrained()->onDelete('cascade');
            $table->string('participant_type');
            $table->unsignedBigInteger('participant_id');
            $table->index(['participant_type', 'participant_id'], 'group_participant_index');
            $table->timestamps();

            $table->unique(['competition_group_id', 'participant_id', 'participant_type'], 'unique_group_participant');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competition_group_participants');
    }
};
