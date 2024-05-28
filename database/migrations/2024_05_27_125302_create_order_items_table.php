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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references('id')->on('orders')->cascadeOnDelete();
            $table->foreignId('seller_id')->references('id')->on('sellers')->cascadeOnDelete();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('product_listing_id')->references('id')->on('product_listings')->cascadeOnDelete();
            $table->foreignId('product_sku_id')->references('id')->on('product_skus')->cascadeOnDelete();
            $table->string('sku');
            $table->integer('qty')->default(1);
            $table->integer('total_price_per_item')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
