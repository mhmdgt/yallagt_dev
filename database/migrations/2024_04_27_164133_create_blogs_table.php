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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->date('year')->nullable();
            $table->longText('content')->nullable();
            $table->enum('status', ['active', 'hidden'])->default('active');
            $table->foreignId('blog_category_id')->references('id')->on('blog_categories')->cascadeOnDelete();
            $table->foreignId('car_brand_model_id')->references('id')->on('car_brand_models')->cascadeOnDelete();
            $table->foreignId('transmission_type_id')->nullable()->references('id')->on('transmission_types')->onDelete('set null');
            $table->foreignId('fuel_type_id')->nullable()->references('id')->on('fuel_types')->onDelete('set null');
            $table->foreignId('engine_aspiration_id')->nullable()->references('id')->on('engine_aspirations')->onDelete('set null');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
