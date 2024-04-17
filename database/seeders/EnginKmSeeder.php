<?php

namespace Database\Seeders;


use App\Models\EngineKm;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EnginKmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enginKms=[
            ['en' => "", "ar" => ""],
        ];


        foreach(  $enginKms as   $enginKm){
            EngineKm::create(  ['name'=>$enginKm]);

        }
    }
}
