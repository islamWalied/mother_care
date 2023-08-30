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
        Schema::create('mother_exercises', function (Blueprint $table) {
            $table->unsignedBigInteger("mom_id");
            $table->foreign('mom_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger("exercise_id");
            $table->foreign('exercise_id')->references('id')->on('exerciseplans')->cascadeOnUpdate()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mother_exercises');
    }
};
