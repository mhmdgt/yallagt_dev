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
        Schema::create('stock_cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_brand_model_id')->references('id')->on('car_brand_models')->cascadeOnDelete();
            $table->year('year');
            $table->string('brochure')->nullable();
            $table->enum('status' , ['active' , 'hidden'] )->default('active');
            // $table->unsignedBigInteger('created_by')->nullable();
            // $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_cars');
    }
};
