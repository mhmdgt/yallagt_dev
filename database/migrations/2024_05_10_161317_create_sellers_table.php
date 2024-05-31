<?php

use App\Models\Seller;
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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('username')->unique();
            $table->string('phone')->unique();
            $table->string('email')->unique();

            $table->string('headqurter_address')->nullable();

            $table->string('avatar')->nullable();
            $table->enum('type', ['personal', 'pro', 'business'])->default('personal');

            // Autoloaded Stamps
            $table->string('created_user_type')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->string('updated_user_type')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });

        try {
            Seller::create([
                'name' => 'Yallagt',
                'username' => 'yallagt',
                'phone' => '01110120316',
                'email' => 'yallagtx@gmail.com',
                'headqurter_address' => '39 Nasr El-Thawra st, Haram, Giza',
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
        Schema::dropIfExists('sellers');
    }
};
