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
        Schema::create('sale_car_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->references('id')->on('sale_cars')->cascadeOnDelete();
            $table->string('name');
            $table->enum('main_img' , ['1' , '0'] );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_car_images');
    }
};
