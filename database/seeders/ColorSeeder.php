<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            ['en' => "White", "ar" => "أبيض"],
            ['en' => "Red", "ar" => "أحمر"],
            ['en' => "Green", "ar" => "أخضر"],
            ['en' => "Blue", "ar" => "أزرق"],
            ['en' => "Navy Blue", "ar" => "أزرق داكن"],
            ['en' => "Black", "ar" => "أسود"],
            ['en' => "Yellow", "ar" => "أصفر"],
            ['en' => "Orange", "ar" => "برتقالي"],
            ['en' => "Bronze", "ar" => "برونزي"],
            ['en' => "Purple", "ar" => "بنفسجي"],
            ['en' => "Brown", "ar" => "بني"],
            ['en' => "Beige", "ar" => "بيج"],
            ['en' => "Pink", "ar" => "بينك"],
            ['en' => "Turquoise", "ar" => "تركواز"],
            ['en' => "Gold", "ar" => "ذهبي"],
            ['en' => "Gray", "ar" => "رمادي"],
            ['en' => "Dark Gray", "ar" => "رمادي داكن"],
            ['en' => "Baby Blue", "ar" => "سماوي"],
            ['en' => "Champagne", "ar" => "شمبان"],
            ['en' => "Silver", "ar" => "فضي"],
            ['en' => "Maroon", "ar" => "نبيتي"],
        ];

        foreach ($colors as $color) {
            Color::create(['name' => $color]);
        }
    }
}
