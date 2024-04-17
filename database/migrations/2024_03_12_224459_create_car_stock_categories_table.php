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
        Schema::create('car_stock_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->decimal('price');
            $table->integer('rims_size');
            $table->integer('number_of_seat');
            $table->integer('trunk_size');
            $table->integer('fuel_tank_capacity');
            $table->integer('engine_capacity');
            $table->integer('cylinder');
            $table->integer('acceleration');
            $table->integer('maximum_speed');
            $table->integer('newton_meter');
            $table->integer('horsepower');
            $table->integer('transmission_speed');
            $table->integer('fuel_consumption');
            $table->enum('active', [0, 1])->default(1)->comment('0=>inactive,1=>active');
            $table->foreignId('body_shape_id')->nullable()->references('id')->on('body_shapes')->onDelete('set null');
            $table->foreignId('fuel_type_id')->nullable()->references('id')->on('fuel_types')->onDelete('set null');
            $table->foreignId('transmission_type_id')->nullable()->references('id')->on('transmission_types')->onDelete('set null');
            $table->foreignId('engine_aspiration_id')->nullable()->references('id')->on('engine_aspirations')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
