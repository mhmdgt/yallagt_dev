<?php

namespace Database\Seeders;

use App\Models\SaleCondition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaleConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $conditions = [
            ['en' => "new", "ar" => "جديدة"],
            ['en' => "used", "ar" => "مستعملة"],

        ];
        foreach ($conditions as $condition) {
            SaleCondition::create(["name" => $condition]);
        }
    }
}
