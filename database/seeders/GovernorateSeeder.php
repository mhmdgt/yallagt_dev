<?php

namespace Database\Seeders;

use App\Models\Governorate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $governorates=[
            ['en' => "", "ar" => ""],
        ];


        foreach(  $governorates as   $governorate){
            Governorate::create(  $governorate);

        }
        
    }
}
