<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->unsignedBigInteger('car_id')->nullable();
            $table->string('start_location')->nullable();
            $table->string('end_location')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->integer('seats_available')->nullable();
            $table->decimal('price_per_seat')->nullable();
            $table->timestamps();

            $table->foreign('driver_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rides');
    }
};
