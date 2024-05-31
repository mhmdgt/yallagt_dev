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
        Schema::create('storehouses', function (Blueprint $table) {
            $table->id();
            //You Data
            $table->foreignId('seller_id')->references('id')->on('sellers')->cascadeOnDelete();

            $table->string('name');
            $table->string('manager_name');
            $table->string('phone');
            $table->string('landline')->nullable();
            $table->string('email')->nullable();
            $table->string('governorate_id');
            $table->string('area');
            $table->string('building_number');
            $table->string('street');
            $table->string('full_address');
            $table->string('gps_link');

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
        Schema::dropIfExists('storehouses');
    }
};
