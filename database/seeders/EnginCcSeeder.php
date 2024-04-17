<?php

namespace Database\Seeders;

use App\Models\EngineCc;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EnginCcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $enginCcs=[
            ['en' => "", "ar" => ""],
        ];


        foreach(  $enginCcs as   $enginCc){
            EngineCc::create(  ['name'=>$enginCc]);

        }
    }
}
