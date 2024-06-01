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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('user_address_id')->references('id')->on('user_addresses')->cascadeOnDelete();
            $table->string('tracking_num')->unique();
            $table->string('name');
            $table->string('phone');
            $table->string('governorate_id');
            $table->string('area');
            $table->string('building_number');
            $table->string('street');
            $table->string('full_address');
            $table->string('gps_link')->nullable();
            $table->enum('type', ['home', 'work']);

            $table->integer('total_qty')->default(1);
            $table->integer('sub_total');

            $table->foreignId('shipping_service_id')->references('id')->on('shipping_services');
            $table->string('shipping_service_fee');

            $table->foreignId('payment_method_id')->references('id')->on('payment_methods');
            $table->string('payment_method_name');

            $table->integer('total_price');

            $table->enum('status', ['pending', 'approved', 'processing', 'delivered', 'refunded', 'cancelled', 'completed'])->default('pending');

            $table->foreignId('shipping_company_id')->nullable()->constrained('shipping_companies');
            $table->string('shipment_code')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
