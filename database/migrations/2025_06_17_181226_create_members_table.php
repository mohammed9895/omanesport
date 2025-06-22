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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Club::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(\App\Models\Gamer::class)->constrained()->onDelete('cascade');
            $table->string('role')->default('member'); // e.g., member, admin, owner
            $table->integer('status')->default(0); // To manage active/inactive members
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
