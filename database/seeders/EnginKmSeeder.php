<?php

namespace Database\Seeders;

use App\Models\EnginKm;
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
            EnginKm::create(  ['name'=>$enginKm]);

        }
    }
}
