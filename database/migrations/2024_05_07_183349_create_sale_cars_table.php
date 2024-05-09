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
        Schema::create('sale_cars', function (Blueprint $table) {
            $table->id();

            $table->string('slug');

            $table->string('brand');
            $table->string('model');
            $table->year('year');

            $table->string('price');

            $table->string('bodyShape');
            $table->string('color');
            $table->string('transmission');
            $table->string('fuelType');
            $table->string('aspiration');
            $table->string('km');
            $table->string('cc');
            $table->json('features');
            $table->text('description');

            $table->string('governorate')->nullable();
            $table->string('user_name');
            $table->string('phone');

            $table->enum('payment' , ['cash' , 'downpayment'] );
            $table->enum('condition' , ['new' , 'used'] );
            $table->enum('status' , ['approved' , 'pending' , 'declined'] )->default('pending');

            // Created by and its type
            $table->unsignedBigInteger('created_by')->nullable();
            $table->string('created_type')->nullable();

            // Updated by and its type
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->string('updated_type')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_cars');
    }
};
