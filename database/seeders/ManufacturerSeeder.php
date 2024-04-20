<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\Manufacturer;
use Illuminate\Database\Seeder;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manufacturers = [
            ['en' => "3M", 'ar' => "3M"],
            ['en' => "Abro", 'ar' => "أبرو"],
            ['en' => "Amsoil", 'ar' => "أمسويل"],
            ['en' => "ATE", 'ar' => "أكل"],
            ['en' => "Bardahl", 'ar' => "باردال"],
            ['en' => "Bilstein", 'ar' => "بيلشتاين"],
            ['en' => "Bosch", 'ar' => "بوش"],
            ['en' => "Castrol", 'ar' => "كاسترول"],
            ['en' => "Chloride", 'ar' => "كلوريد"],
            ['en' => "Denso", 'ar' => "دينسو"],
            ['en' => "Ecoboost", 'ar' => "إيكوبوست"],
            ['en' => "EZI", 'ar' => "إيزي"],
            ['en' => "Genuine", 'ar' => "Genuine"],
            ['en' => "GM", 'ar' => "جنرال موتورز"],
            ['en' => "Koch chemie", 'ar' => "كوش كيمي"],
            ['en' => "Liqui-moly", 'ar' => "ليكو مولي"],
            ['en' => "LUK", 'ar' => "LUK"],
            ['en' => "Mafra", 'ar' => "مافرا"],
            ['en' => "MANN Filter", 'ar' => "مان فيلتر"],
            ['en' => "Mannol", 'ar' => "مانول"],
            ['en' => "Meyle", 'ar' => "ميلي"],
            ['en' => "Mobil", 'ar' => "موبيل"],
            ['en' => "Motocraft", 'ar' => "موتوكيرافت"],
            ['en' => "Motul", 'ar' => "موتول"],
            ['en' => "NAP", 'ar' => "NAP"],
            ['en' => "NGK", 'ar' => "NGK"],
            ['en' => "O2 Performance", 'ar' => "او تو - برفورمنس"],
            ['en' => "OSRM", 'ar' => "OSRM"],
            ['en' => "Renol", 'ar' => "رينول"],
            ['en' => "Sachs", 'ar' => "ساكس"],
            ['en' => "Shell", 'ar' => "شيل"],
            ['en' => "Sonax", 'ar' => "سوناكس"],
            ['en' => "TurtleWax", 'ar' => "ترتل واكس"],
            ['en' => "Valeo", 'ar' => "فاليو"],
            ['en' => "Valvoline", 'ar' => "فالفولين"],
            ['en' => "Wix Filters", 'ar' => "ويكس فيلتر"],
            ['en' => "Wolf", 'ar' => "وولف"],
            ['en' => "Wolver", 'ar' => "ولفر"],
            ['en' => "XADO", 'ar' => "XADO"],
        ];

        foreach ($manufacturers as $manufacturer) {
                Manufacturer::create([
                    "name" => $manufacturer,
                    "slug" => Str::slug($manufacturer['en']),
                    "logo" => "logo.png"
                ]);
        }
    }
}
