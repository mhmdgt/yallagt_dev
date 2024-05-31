<?php

namespace Database\Seeders;

use App\Models\Storehouse;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StorehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Storehouse::factory()->count(10)->create();
    }
}
