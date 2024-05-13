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

            $table->string('payment');
            $table->string('price');

            $table->string('condition');
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


            $table->enum('status' , ['approved' , 'pending' , 'declined'] )->default('pending');

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
        Schema::dropIfExists('sale_cars');
    }
};
