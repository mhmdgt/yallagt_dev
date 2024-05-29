<?php

use App\Models\TermOfUse;
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
        Schema::create('term_of_uses', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->timestamps();
        });

        try {
            TermOfUse::create([
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
        Schema::dropIfExists('term_of_uses');
    }
};
