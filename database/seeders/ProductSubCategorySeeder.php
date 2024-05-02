<?php

namespace Database\Seeders;

use App\Traits\SlugTrait;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use App\Models\ProductSubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSubCategorySeeder extends Seeder
{
    use SlugTrait;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Breaks = [
            ["en" => "Brake Pads", "ar" => "أقراص الفرامل"],
            ["en" => "Brake Rotors", "ar" => "أقراص الفرامل الدوارة"],
            ["en" => "Brake Calipers", "ar" => "السواقات الفرامل"],
            ["en" => "Brake Lines", "ar" => "خطوط الفرامل"],
            ["en" => "Brake Fluids", "ar" => "سوائل الفرامل"],

        ];
        $categoryBreaks = ProductCategory::whereRaw("JSON_EXTRACT(name, '$.en') = 'Breaks'")->first();
        foreach ($Breaks as $sub) {
            ProductSubCategory::create([
                "name" => ["en" => $sub['en'], "ar" => $sub['ar']],
                "slug" => $this->slug(['en' => $sub['en'], 'ar' => $sub['ar']]),
                'product_category_id' => $categoryBreaks->id,
            ]);
        }
    }
}
