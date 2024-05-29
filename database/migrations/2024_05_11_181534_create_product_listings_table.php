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
        Schema::create('product_listings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id')->references('id')->on('sellers')->cascadeOnDelete();
            $table->unsignedBigInteger('manufacturer_id')->references('id')->on('manufacturers')->cascadeOnDelete();
            $table->unsignedBigInteger('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->unsignedBigInteger('product_sku_id')->references('id')->on('product_skus')->cascadeOnDelete();
            $table->string('sku');
            $table->integer('selling_price');

            $table->enum('status', ['active', 'hidden'])->default('active');

            // Autoloaded Stamps
            $table->string('created_user_type')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->string('updated_user_type')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // Add composite unique index to ensure a SKU can only be added once per storehouse
            $table->unique(['seller_id', 'sku']);
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_listings');
    }
};
