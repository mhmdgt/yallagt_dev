<?php

use App\Models\ContactUs;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable();
            $table->string('support_email')->nullable();
            $table->string('headqurter_address')->nullable();
            $table->string('hotline')->nullable();
            $table->string('phone')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twitter')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('google_maps')->nullable();
            $table->timestamps();
        });

        try {
            ContactUs::create([
                'support_email' => 'Support@yallagt.com',
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
        Schema::dropIfExists('contact_us');
    }
};
