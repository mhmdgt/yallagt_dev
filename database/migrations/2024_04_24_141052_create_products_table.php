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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // Foreign key constraint
            $table->foreignId('manufacturer_id')->references('id')->on('manufacturers')->cascadeOnDelete();
            $table->foreignId('product_category_id')->references('id')->on('product_categories')->cascadeOnDelete();
            $table->foreignId('product_sub_category_id')->references('id')->on('product_sub_categories')->cascadeOnDelete();

            // Main Products Details
            $table->string('name')->unique();
            $table->string('slug');
            $table->text('description');
            $table->string('brochure')->nullable();
            $table->enum('status' , ['active' , 'hidden'] )->default('active');

           // Autoloaded Stamps
           $table->string('created_user_type')->nullable();
           $table->unsignedBigInteger('created_by')->nullable();
           $table->string('updated_user_type')->nullable();
           $table->unsignedBigInteger('updated_by')->nullable();
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
