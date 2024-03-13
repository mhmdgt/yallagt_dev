<?php

namespace Database\Seeders;

use App\Models\BodyShape;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BodyShapeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shapes = [
            ['en' => "Coupe", "ar" => "كوبيه"],
            ['en' => "Cabriolet", "ar" => "كابريوليه"],
            ['en' => "SUV", "ar" => "SUV"],
            ['en' => "Sedan", "ar" => "سيدان"],
            ['en' => "Station", "ar" => "ستيشين"],
            ['en' => "Sport car", "ar" => "سبورت كار"],
            ['en' => "Hatchback", "ar" => "هتش باك"],
            ['en' => "Van", "ar" => "فان"],

        ];
        foreach($shapes as $shape){
            BodyShape::create([
                "name"=>$shape
            ]);
        }
    }
}
