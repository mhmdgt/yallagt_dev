<?php

namespace Database\Seeders;

use App\Models\EngineCc;
use Illuminate\Database\Seeder;

class EngineCcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $engineCcs = [
            ['en' => "Electric", 'ar' => "كهرباء"],
            ['en' => "800 - 1000 CC", 'ar' => "800 - 1000 سي سي"],
            ['en' => "1100 - 1300 CC", 'ar' => "1100 - 1300 سي سي"],
            ['en' => "1400 - 1500 CC", 'ar' => "1400 - 1500 سي سي"],
            ['en' => '1600 - 1700 CC', 'ar' => '1600 - 1700 سي سي'],
            ['en' => "1800 - 2000 CC", 'ar' => "1800 - 2000 سي سي"],
            ['en' => '2200 - 2400 CC', 'ar' => '2200 - 2400 سي سي'],
            ['en' => "2500 - 2800 CC", 'ar' => "2500 - 2800 سي سي"],
            ['en' => "2900 - 3000 CC", 'ar' => "2900 - 3000 سي سي"],
            ['en' => "3200 - 3300 CC", 'ar' => "3200 - 3300 سي سي"],
            ['en' => "3400 - 3600 CC", 'ar' => "3400 - 3600 سي سي"],
            ['en' => "3700 - 3900 CC", 'ar' => "3700 - 3900 سي سي"],
            ['en' => "4000 - 4300 CC", 'ar' => "4000 - 4300 سي سي"],
            ['en' => "4700 - 5000 CC", 'ar' => "4700 - 5000 سي سي"],
            ['en' => "5300 - 5700 CC", 'ar' => "5300 - 5700 سي سي"],
            ['en' => "6000 - 6400 CC", 'ar' => "6000 - 6400 سي سي"],
            ['en' => "More than 6400", 'ar' => "أكثر من 6400"],
        ];

        foreach ($engineCcs as $engineCc) {
            EngineCc::create(['name' => $engineCc]);
        }
    }
}
