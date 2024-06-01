<?php

use App\Models\ShippingService;
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
        Schema::create('shipping_services', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('fee');
            $table->enum('status', ['active', 'hidden'])->default('active');

            // Autoloaded Stamps
            $table->string('created_user_type')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->string('updated_user_type')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });

        try {
            ShippingService::create([
                'name' => ['en' => "Basic", "ar" => "أساسي"],
                'fee' => 50,
            ]);
        } catch (\Exception $e) {
            // Handle the error, such as logging or displaying a message
            // For example:
            logger()->error('Failed to create initial ContactUs record: ' . $e->getMessage());
            // Or
            // throw $e; // Rethrow the exception
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_services');
    }
};
