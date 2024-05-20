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
        Schema::create('user_cart_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_cart_id')->references('id')->on('user_carts')->cascadeOnDelete();
            $table->foreignId('product_sku_id')->references('id')->on('product_skus')->cascadeOnDelete();
            $table->string('sku');
            $table->integer('qty')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_cart_items');
    }
};
