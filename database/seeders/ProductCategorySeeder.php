<?php

namespace Database\Seeders;

use App\Traits\SlugTrait;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    use SlugTrait;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ProductCategories = [
            ['en' => "Breaks", 'ar' => "فرامل"],
            ['en' => "Car Care", 'ar' => "العناية بالسيارات"],
            ['en' => "Engine Parts", 'ar' => "اجزاء المحرك"],
            ['en' => "Filters", 'ar' => "الفلاتر"],
            ['en' => "Lights", 'ar' => "أضواء"],
            ['en' => "Oils & Liquids", 'ar' => "الزيوت والسوائل"],
            ['en' => "Suspension", 'ar' => "نظام التعليق"],
            ['en' => "Tyres & Wheels", 'ar' => "الإطارات والعجلات"],
        ];

        foreach ($ProductCategories as $ProductCategory) {
            ProductCategory::create([
                    "name" => $ProductCategory,
                    "slug" => $this->slug(['en' => $ProductCategory['en'], 'ar' => $ProductCategory['ar']]),
                ]);
        }
    }
}
