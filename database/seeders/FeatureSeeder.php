<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            ['en' => "ABS", 'ar' => "فرامل إيه بي إس"],
            ['en' => "Air Conditioning", 'ar' => "تكيف"],
            ['en' => "Airbags", 'ar' => "وسائد هوائية"],
            ['en' => "Alarm/Anti-Theft System", 'ar' => "نظام إنذار / مضاد للسرقة"],
            ['en' => "AM/FM Radio", 'ar' => "راديو AM/FM"],
            ['en' => "Aux Audio In", 'ar' => "مدخل صوت ايه يو اكس"],
            ['en' => "Bluetooth System", 'ar' => "نظام البلوتوث"],
            ['en' => "Cruise Control", 'ar' => "مثبت السرعة"],
            ['en' => "EBD", 'ar' => "إي بي دي"],
            ['en' => "Fog Lights", 'ar' => "مصابيح الضباب"],
            ['en' => "Keyless Start", 'ar' => "تشغيل بدون مفتاح"],
            ['en' => "Leather Seats", 'ar' => "مقاعد جلدية"],
            ['en' => "Navigation System", 'ar' => "نظام ملاحة"],
            ['en' => "Off-Road Tyres", 'ar' => "إطارات الطرق الوعرة"],
            ['en' => "Parking Sensors", 'ar' => "مجسات وقوف السيارات"],
            ['en' => "Power Locks", 'ar' => "أقفال الطاقة"],
            ['en' => "Power Mirrors", 'ar' => "مرايا كهربائية"],
            ['en' => "Power Seats", 'ar' => "مقاعد السلطة"],
            ['en' => "Power Steering", 'ar' => "نظام التوجيه المعزز"],
            ['en' => "Power Windows", 'ar' => "نوافذ كهربائية"],
            ['en' => "Premium Wheels/Rims", 'ar' => "عجلات/جنوط متميزة"],
            ['en' => "Rear View Camera", 'ar' => "كاميرا الرؤية الخلفية"],
            ['en' => "Roof Rack", 'ar' => "سقف الرف"],
            ['en' => "Sunroof", 'ar' => "فتحة سقف"],
            ['en' => "Touch Screen", 'ar' => "شاشة اللمس"],
            ['en' => "USB Charger", 'ar' => "شاحن يو اس بي"],
            ['en' => "Type-C Charger", 'ar' => "شاحن Type-C"],
        ];

        foreach ($features as $feature) {
            Feature::create(['name' => $feature]);
        }
    }
}
