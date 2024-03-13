<?php

namespace Database\Seeders;

use App\Models\FuelType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fuels=[
            ['en' => "Diesel", "ar" => "ديزل"],
            ['en' => "Electric", "ar" => "كهرباء"],
            ['en' => "Benzine", "ar" => "بنرين"],
            ['en' => "Hybrid", "ar" => "هجين"],
            ['en' => "Natural Gas", "ar" => "غاز طبيعي"]
           
        ];
        foreach($fuels as $fuel){
            FuelType::create([
                "name"=>$fuel
            ]);
    }
}
}