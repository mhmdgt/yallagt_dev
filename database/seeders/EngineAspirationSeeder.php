<?php

namespace Database\Seeders;

use App\Models\EngineAspiration;
use Illuminate\Database\Seeder;

class EngineAspirationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $engines = [
            ['en' => "Natural", "ar" => "طبيعي"],
            ['en' => "Turbo-charger", "ar" => "تيربو"],
            ['en' => "Super-charger", "ar" => "سوبر تشارج"],

        ];
        foreach ($engines as $engine) {
            EngineAspiration::create(["name" => $engine]);
        }
    }
}
