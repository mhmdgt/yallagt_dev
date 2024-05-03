<?php

namespace Database\Seeders;

use App\Traits\SlugTrait;
use App\Models\BlogCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogCategorySeeder extends Seeder
{
    use SlugTrait;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $BlogCategories = [
            ['en' => "Car Pricing", 'ar' => "تسعير السيارات"],
            ['en' => "New Announcement", 'ar' => "إعلان جديد"],
            ['en' => "Test Drive", 'ar' => "اختبار القيادة"],
            ['en' => "Car Advicies", 'ar' => "نصائح السيارات"],
            ['en' => "Road News", 'ar' => "أخبار الطريق"],
            ['en' => "Entertainment", 'ar' => "ترفيه"],
            ['en' => "Car Comparison", 'ar' => "مقارنة السيارات"],
            ['en' => "Off-roads", 'ar' => "اوف رود"],
            ['en' => "Concept Cars ", 'ar' => "سيارات مبتكرة"],
            ['en' => "For Sale", 'ar' => "للبيع"],
            ['en' => "Luxury cars", 'ar' => "سيارات فارهة"],
            ['en' => "Spare parts and maint", 'ar' => "قطع الغيار والصيانة"],
            ['en' => "Exotic Cars", 'ar' => "سيارات اكزوتك"],
            ['en' => "Tuning", 'ar' => "سيارة معدله"],
        ];

        foreach ($BlogCategories as $BlogCategory) {
            BlogCategory::create([
                    "name" => $BlogCategory,
                    "slug" => $this->slug(['en' => $BlogCategory['en'], 'ar' => $BlogCategory['ar']]),
                ]);
        }
    }
}
