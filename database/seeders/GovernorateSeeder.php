<?php

namespace Database\Seeders;

use App\Models\Governorate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $governorates = [
            ['en'=> 'Cairo', 'ar'=> 'القاهرة'],
            ['en'=> 'Giza', 'ar'=> 'الجيزة'],
            ['en'=> 'Alexandria', 'ar'=> 'الإسكندرية'],
            ['en'=> 'Luxor', 'ar'=> 'الأقصر'],
            ['en'=> 'Aswan', 'ar'=> 'أسوان'],
            ['en'=> 'Red Sea (Al-Bahr Al-Ahmar)', 'ar'=> 'البحر الأحمر (البحر الأحمر)'],
            ['en'=> 'South Sinai (Janub Sina)', 'ar'=> 'جنوب سيناء (جنوب سيناء)'],
            ['en'=> 'Hurghada', 'ar'=> 'الغردقة'],
            ['en'=> 'Sharm El Sheikh', 'ar'=> 'شرم الشيخ'],
            ['en'=> 'Port Said', 'ar'=> 'بورسعيد'],
            ['en'=> 'Ismailia', 'ar'=> 'الاسماعيلية'],
            ['en'=> 'Suez', 'ar'=> 'السويس'],
            ['en'=> 'Fayoum', 'ar'=> 'الفيوم'],
            ['en'=> 'Asyut', 'ar'=> 'أسيوط'],
            ['en'=> 'Beni Suef', 'ar'=> 'بني سويف'],
            ['en'=> 'Qena', 'ar'=> 'قنا'],
            ['en'=> 'Minya', 'ar'=> 'المنيا'],
            ['en'=> 'Dakahlia', 'ar'=> 'الدقهلية'],
            ['en'=> 'Gharbia', 'ar'=> 'الغربية'],
            ['en'=> 'Sharqia', 'ar'=> 'الشرقية'],
            ['en'=> 'Sohag', 'ar'=> 'سوهاج'],
            ['en'=> 'Beheira', 'ar'=> 'البحيرة'],
            ['en'=> 'Kafr El Sheikh', 'ar'=> 'كفر الشيخ'],
            ['en'=> 'Monufia', 'ar'=> 'المنوفية'],
            ['en'=> 'Damietta', 'ar'=> 'دمياط'],
            ['en'=> 'New Valley (Al-Wadi Al-Jadid)', 'ar'=> 'الوادي الجديد (الوادي الجديد)'],
            ['en'=> 'North Sinai (Shamal Sina)', 'ar'=> 'شمال سيناء (شمال سيناء)']
        ];


        foreach ($governorates as   $governorate) {
            Governorate::create( ['name'=>$governorate] );
        }
    }
}
