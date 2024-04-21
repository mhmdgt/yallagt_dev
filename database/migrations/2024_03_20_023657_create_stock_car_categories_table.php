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
        Schema::create('stock_car_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique()->default('');
            $table->decimal('price');
            $table->enum('status' , ['active' , 'hidden'] )->default('active');
            $table->integer('rims_size');
            $table->integer('number_of_seat');
            $table->integer('trunk_size');
            $table->integer('fuel_tank_capacity');
            $table->integer('cylinder');
            $table->integer('acceleration');
            $table->integer('maximum_speed');
            $table->integer('newton_meter');
            $table->integer('horsepower');
            $table->integer('transmission_speed');
            $table->integer('fuel_consumption');
            $table->foreignId('body_shape_id')->nullable()->references('id')->on('body_shapes')->onDelete('set null');
            $table->foreignId('fuel_type_id')->nullable()->references('id')->on('fuel_types')->onDelete('set null');
            $table->foreignId('transmission_type_id')->nullable()->references('id')->on('transmission_types')->onDelete('set null');
            $table->foreignId('engine_aspiration_id')->nullable()->references('id')->on('engine_aspirations')->onDelete('set null');
            $table->foreignId('engine_cc_id')->nullable()->references('id')->on('engine_ccs')->onDelete('set null');
            $table->foreignId('engine_km_id')->nullable()->references('id')->on('engine_kms')->onDelete('set null');
            $table->foreignId('stock_car_id')->references('id')->on('stock_cars')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_car_categories');
    }
};
