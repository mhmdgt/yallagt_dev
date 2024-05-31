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
        // $Oils_Liquids = [
        //     ["en" => "Transmission Oil", "ar" => "زيت ناقل الحركة"],
        //     ["en" => "Brake oil", "ar" => "زيت الفرامل"],
        //     ["en" => "Diesel exhaust fluids", "ar" => "سوائل عادم الديزل"],
        //     ["en" => "Distilled water", "ar" => "ماء مقطرة"],
        //     ["en" => "Engine oil", "ar" => "زيت المحرك"],
        //     ["en" => "Engine oil additive", "ar" => "مادة مضافة لزيت المحرك"],
        //     ["en" => "Fuel additives", "ar" => "إضافات الوقود"],
        //     ["en" => "Hydraulic oil", "ar" => "الزيت الهيدروليكي"],
        //     ["en" => "Power steering oil", "ar" => "زيت توجيه الدريكسون"],
        //     ["en" => "Transmission additives", "ar" => "إضافات ناقل الحركة"],
        //     ["en" => "Coolant Water", "ar" => "مياه التبريد"],
        // ];
        // $category = ProductCategory::whereRaw("JSON_EXTRACT(name, '$.en') = 'Oils & Liquids'")->first();
        // foreach ($Oils_Liquids as $sub) {
        //     ProductSubCategory::create([
        //         "name" => ["en" => $sub['en'], "ar" => $sub['ar']],
        //         "slug" => $this->slug(['en' => $sub['en'], 'ar' => $sub['ar']]),
        //         'product_category_id' => $category->id,
        //     ]);
        // }
    }
}
