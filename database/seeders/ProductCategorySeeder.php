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
            ['en' => "Oils & Liquids", 'ar' => "الزيوت والسوائل"],
        ];

        foreach ($ProductCategories as $ProductCategory) {
            ProductCategory::create([
                    "name" => $ProductCategory,
                    "slug" => $this->slug(['en' => $ProductCategory['en'], 'ar' => $ProductCategory['ar']]),
                ]);
        }
    }
}
