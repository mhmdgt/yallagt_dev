<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CarBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $carBrands = [
            ['en' => "Alfa Romeo", "ar" => "الفا روميو"],
            ['en' => "Alpine", "ar" => "ألبينا"],
            ['en' => "Aston Martin", "ar" => "استون مارتن"],
            ['en' => "Audi", "ar" => "أودي"],
            ['en' => "Avatr", "ar" => "أفيتر"],
            ['en' => "BAIC", "ar" => "بايك"],
            ['en' => "Bentley", "ar" => "بنتلي"],
            ['en' => "Bestune", "ar" => "بيستون"],
            ['en' => "BMW", "ar" => "بي ام دبليو"],
            ['en' => "Brilliance", "ar" => "بريليانس"],
            ['en' => "Buick", "ar" => "بويك"],
            ['en' => "BYD", "ar" => "بي واي دي"],
            ['en' => "Cadillac", "ar" => "كاديلاك"],
            ['en' => "Chana", "ar" => "شانا"],
            ['en' => "Changan", "ar" => "تشانجان"],
            ['en' => "Changhe", "ar" => "تشانغي"],
            ['en' => "Chery", "ar" => "شيري"],
            ['en' => "Chevrolet", "ar" => "شيفروليه"],
            ['en' => "Chrysler", "ar" => "كرايسلر"],
            ['en' => "Citroen", "ar" => "سيتروين"],
            ['en' => "Cupra", "ar" => "كوبرا"],
            ['en' => "Dacia", "ar" => "داتشيا"],
            ['en' => "Daewoo", "ar" => "دايو"],
            ['en' => "Daihatsu", "ar" => "دايهاتسو"],
            ['en' => "Dodge", "ar" => " دودج"],
            ['en' => "Dongfeng", "ar" => "دونج فينج"],
            ['en' => "DS", "ar" => "دي اس"],
            ['en' => "Faw", "ar" => "فاو"],
            ['en' => "Ferrari", "ar" => "فيراري"],
            ['en' => "Fiat", "ar" => "فيات"],
            ['en' => "Ford", "ar" => "فورد"],
            ['en' => "Forthing", "ar" => "فورثينج"],
            ['en' => "GAC", "ar" => "جي اي سي"],
            ['en' => "Geely", "ar" => "جيلي"],
            ['en' => "GMC", "ar" => "جي إم سي"],
            ['en' => "Great Wall", "ar" => "جريت وول"],
            ['en' => "Haima", "ar" => "هيما"],
            ['en' => "Haval", "ar" => "هافال"],
            ['en' => "Havi", "ar" => "هافي"],
            ['en' => "Hawtai", "ar" => "هاوتاي"],
            ['en' => "Honda", "ar" => "هوندا"],
            ['en' => "Hummer", "ar" => "هامر"],
            ['en' => "Hyundai", "ar" => "هيونداي"],
            ['en' => "Infiniti", "ar" => "إنفينيتي"],
            ['en' => "Isuzu", "ar" => "ايسوزو"],
            ['en' => "JAC", "ar" => "جاك"],
            ['en' => "Jaguar", "ar" => "جاجوار"],
            ['en' => "Jeep", "ar" => "جيب"],
            ['en' => "JETOUR", "ar" => "جيتور"],
            ['en' => "JinBe", "ar" => "جين بي"],
            ['en' => "Kaiyi", "ar" => "كايي"],
            ['en' => "Kia", "ar" => "كيا"],
            ['en' => "Lada", "ar" => "لادا"],
            ['en' => "Lamborghini", "ar" => "لامبورغيني"],
            ['en' => "Lancia", "ar" => "لانشيا"],
            ['en' => "Land Rover", "ar" => "لاند روفر"],
            ['en' => "Lexus", "ar" => "لكزس"],
            ['en' => "Lifan", "ar" => "ليفان"],
            ['en' => "Lincoln", "ar" => "لينكولن"],
            ['en' => "Lotus", "ar" => "لوتس"],
            ['en' => "Mahindra", "ar" => "ماهيندرا"],
            ['en' => "Mapel", "ar" => "مابيل"],
            ['en' => "Maserati", "ar" => "مازيراتي"],
            ['en' => "Mazda", "ar" => "مازدا"],
            ['en' => "Mercedes", "ar" => "مرسيدس"],
            ['en' => "Mercury", "ar" => "ميركيو"],
            ['en' => "MG", "ar" => "ام جي"],
            ['en' => "Mini", "ar" => "ميني"],
            ['en' => "Mitsubishi", "ar" => "ميتسوبيشي"],
            ['en' => "Nasr", "ar" => "نصر"],
            ['en' => "Nissan", "ar" => "نيسان"],
            ['en' => "OPEL", "ar" => "أوبل"],
            ['en' => "Perodua", "ar" => "بيرودوا"],
            ['en' => "Peugeot", "ar" => "بيجو"],
            ['en' => "Pontiac", "ar" => "بونتياك"],
            ['en' => "Porsche", "ar" => "بورش"],
            ['en' => "Proton", "ar" => "بروتون"],
            ['en' => "Range Rover", "ar" => "رينج روفر"],
            ['en' => "Renault", "ar" => "رينو"],
            ['en' => "Rolls Royce", "ar" => "رولزرويس"],
            ['en' => "Saab", "ar" => "ساب"],
            ['en' => "Saipa", "ar" => "سايبا"],
            ['en' => "Samsung", "ar" => "سامسونج"],
            ['en' => "Seat", "ar" => "سيات"],
            ['en' => "Senova", "ar" => "سينوفا"],
            ['en' => "Skoda", "ar" => "سكودا"],
            ['en' => "Smart", "ar" => "سمارت"],
            ['en' => "Soueast", "ar" => "ساويست"],
            ['en' => "Speranza", "ar" => "سبيرانزا"],
            ['en' => "SsangYong", "ar" => "سانج يونج"],
            ['en' => "Subaru", "ar" => "سوبارو"],
            ['en' => "Suzuki", "ar" => "سوزوكي"],
            ['en' => "Tesla", "ar" => "تسلا"],
            ['en' => "Toyota", "ar" => "تويوتا"],
            ['en' => "VGV", "ar" => "VGV"],
            ['en' => "Volkswagen", "ar" => "فولكس فاجن"],
            ['en' => "Volvo", "ar" => "فولفو"],
            ['en' => "Zeekr", "ar" => "زييكر"],
            ['en' => "Zotye", "ar" => "زوتي"],
            ['en' => "Bugatti", "ar" => "بوجاتي"],
            ['en' => "Mclaren", "ar" => "ماكلارين"],
        ];
        foreach ($carBrands as $carBrand) {
            CarBrand::create([
                "name" => $carBrand,
                "slug" => Str::slug($carBrand['en']),
                "logo" => "logo.png",
            ]);

          







        }

    }
}
