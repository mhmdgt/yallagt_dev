<?php

namespace Database\Seeders;

use App\Models\TransmissionType;
use Illuminate\Database\Seeder;

class TransmissionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transmissions = [
            ['en' => "Automatic", "ar" => "أوتوماتيك"],
            ['en' => "Manual", "ar" => "مانيوال"],

        ];
        foreach ($transmissions as $transmission) {
            TransmissionType::create(["name" => $transmission]);
        }

    }
}
