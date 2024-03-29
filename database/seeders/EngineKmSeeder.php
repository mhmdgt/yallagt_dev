<?php

namespace Database\Seeders;

use App\Models\EngineKm;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EngineKmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enginKms=[
                ['en', '0 - 10,000', 'ar', '0 - 10,000'],
                ['en', '10,000 - 20,000', 'ar', '10,000 - 20,000'],
                ['en', '20,000 - 30,000', 'ar', '20,000 - 30,000'],
                ['en', '30,000 - 40,000', 'ar', '30,000 - 40,000'],
                ['en', '40,000 - 50,000', 'ar', '40,000 - 50,000'],
                ['en', '50,000 - 60,000', 'ar', '50,000 - 60,000'],
                ['en', '60,000 - 70,000', 'ar', '60,000 - 70,000'],
                ['en', '70,000 - 80,000', 'ar', '70,000 - 80,000'],
                ['en', '80,000 - 90,000', 'ar', '80,000 - 90,000'],
                ['en', '90,000 - 100,000', 'ar', '90,000 - 100,000'],
                ['en', '100,000 - 120,000', 'ar', '100,000 - 120,000'],
                ['en', '120,000 - 140,000', 'ar', '120,000 - 140,000'],
                ['en', '140,000 - 160,000', 'ar', '140,000 - 160,000'],
                ['en', '160,000 - 180,000', 'ar', '160,000 - 180,000'],
                ['en', '180,000 - 200,000', 'ar', '180,000 - 200,000'],
                ['en', 'More than 200,000', 'ar', 'أكثر من 200,000']
        ];


        foreach(  $enginKms as   $enginKm){
            EngineKm::create(  $enginKm);
        }
    }
}
