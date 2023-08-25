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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mom_id');
            $table->foreign('mom_id')->references('id')->on('articles')->cascadeOnUpdate()->cascadeOnDelete();
            $table->decimal('total_price');
            $table->dateTime('date_time');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('articles')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('card_cvv');
            $table->integer('card_number');
            $table->integer('card_expiry');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
