<?php

use App\Models\PrivacyPolicy;
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
        Schema::create('privacy_policies', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->timestamps();
        });

        try {
            PrivacyPolicy::create([
                'content' => ['en' => "English Content", "ar" => "المحتوى العربي"],
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
        Schema::dropIfExists('privacy_policies');
    }
};
