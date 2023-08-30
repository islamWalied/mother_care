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
        Schema::create('baby_mom_vacc', function (Blueprint $table) {
            $table->unsignedBigInteger("mom_id");
            $table->foreign('mom_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger("baby_id");
            $table->foreign('baby_id')->references('id')->on('babies')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger("vacc_id");
            $table->foreign('vacc_id')->references('id')->on('vaccinations')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baby_mom_vacc');
    }
};
