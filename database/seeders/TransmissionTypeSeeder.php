<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TransmissionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransmissionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $transmissions=[
        ['en' => "Automatic", "ar" => "أوتوماتيك"],
        ['en' => "Manua", "ar" => "مانيوال"],
        ['en' => "CVT", "ar" => "CVT"],
        ['en' => "DSG", "ar" => "DSG"],

       ];
       foreach($transmissions as $transmission){
        TransmissionType::create([
            "name"=>$transmission
        ]);
}
       
    }
}
