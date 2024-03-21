<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\CarBrand;
use App\Models\CarBrandModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarBrandModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        #################### Alfa Romeo ####################
        $AlfaRomeoModels = [
            ["en" => "147", "ar" => "147"],
            ["en" => "156", "ar" => "156"],
            ["en" => "4C", "ar" => "سي 4"],
            ["en" => "Alfa Romeo", "ar" => "الفا رويو"],
            ["en" => "Giulia", "ar" => "جوليا"],
            ["en" => "Giulietta", "ar" => "جوليتا"],
            ["en" => "Giulietta Quadrifoglio Verde", "ar" => "جوليتا كوادري فوليو فيردي"],
            ["en" => "Giulietta Veloce", "ar" => "جوليتا فيلوتشي"],
            ["en" => "Mito", "ar" => "ميتو"],
            ["en" => "Spider", "ar" => "اسبايدر"],
            ["en" => "Stelvio", "ar" => "ستيلفيو"],
            ["en" => "Tonale", "ar" => "تونالي"]
        ];
        $brandAlfaRomeo = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Alfa Romeo'")->first();
        foreach ($AlfaRomeoModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandAlfaRomeo->id
            ]);
        }
        #################### Alpine ####################
        $AlpineModels=[
            ["en"=>"A110s","ar"=>"A110s"],
        ];
        $brandAlpine = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Alpine'")->first();
        foreach( $AlpineModels as $model){
            CarBrandModel::create([
                "name"=>$model,
                "slug"=> Str::slug($model['en']),
                'car_brand_id'=> $brandAlpine->id
            ]);
        }
        #################### Aston Martin ####################
        $AstonMartinModels = [
            ["en" => "Austin", "ar" => "أوستن"],
            ["en" => "DB9", "ar" => "DB9"],
            ["en" => "DBX", "ar" => "DBX"],
            ["en" => "Rapide S", "ar" => "رابيد اس"],
            ["en" => "Vanquish", "ar" => "Vanquish"],
            ["en" => "Vantage", "ar" => "فانتاج"]
        ];

        $brandAstonMartin = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Aston Martin'")->first();

        foreach ($AstonMartinModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandAstonMartin->id
            ]);
        }
        #################### Audi ####################
        $AudiModels = [
            ["en" => "A1", "ar" => "A1"],
            ["en" => "A3", "ar" => "A3"],
            ["en" => "A4", "ar" => "A4"],
            ["en" => "A5", "ar" => "A5"],
            ["en" => "A6", "ar" => "A6"],
            ["en" => "A7", "ar" => "A7"],
            ["en" => "A8", "ar" => "A8"],
            ["en" => "E Tron", "ar" => "E Tron"],
            ["en" => "Q2", "ar" => "Q2"],
            ["en" => "Q3", "ar" => "Q3"],
            ["en" => "Q4 e Tron", "ar" => "Q4 e Tron"],
            ["en" => "Q5", "ar" => "Q5"],
            ["en" => "Q7", "ar" => "Q7"],
            ["en" => "Q8", "ar" => "Q8"],
            ["en" => "R8", "ar" => "R8"],
            ["en" => "RS Q8", "ar" => "RS Q8"],
            ["en" => "TT", "ar" => "TT"],
            ["en" => "TT Roadster", "ar" => "TT Roadster"],
            ["en" => "TT coupe", "ar" => "TT كوبيه"],
            ["en" => "TT450", "ar" => "TT450"]
        ];

        $brandAudi = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Audi'")->first();

        foreach ($AudiModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandAudi->id
            ]);
        }
        #################### Avatr ####################
        $AvatrModels = [
            ["en" => "11", "ar" => "11"]
        ];

        $brandAvatr = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Avatr'")->first();

        foreach ($AvatrModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandAvatr->id
            ]);
        }
        #################### BAIC ####################
        $BAICModels = [
            ["en" => "X3", "ar" => "X3"],
            ["en" => "X5", "ar" => "X5"],
            ["en" => "X7", "ar" => "X7"]
        ];

        $brandBAIC = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'BAIC'")->first();

        foreach ($BAICModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandBAIC->id
            ]);
        }
        #################### Bentley ####################
        $BentleyModels = [
            ["en" => "Bentiaga", "ar" => "Bentiaga"],
            ["en" => "Continental GT", "ar" => "Continental GT"],
            ["en" => "Flying spur", "ar" => "Flying spur"]
        ];

        $brandBentley = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Bentley'")->first();

        foreach ($BentleyModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandBentley->id
            ]);
        }
        #################### Bestune ####################
        $BestuneModels = [
            ["en" => "B70", "ar" => "B70"],
            ["en" => "T33", "ar" => "T33"],
            ["en" => "T55", "ar" => "T55"],
            ["en" => "T77", "ar" => "T77"]
        ];

        $brandBestune = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Bestune'")->first();

        foreach ($BestuneModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandBestune->id
            ]);
        }
        #################### BMW ####################
        $BMWModels = [
            ["en" => "116i", "ar" => "116i"],
            ["en" => "118i", "ar" => "118i"],
            ["en" => "120i", "ar" => "120i"],
            ["en" => "218", "ar" => "218"],
            ["en" => "218i", "ar" => "218i"],
            ["en" => "235i", "ar" => "235i"],
            ["en" => "316i", "ar" => "316i"],
            ["en" => "318i", "ar" => "318i"],
            ["en" => "320i", "ar" => "320i"],
            ["en" => "325i", "ar" => "325i"],
            ["en" => "328i", "ar" => "328i"],
            ["en" => "330i", "ar" => "330i"],
            ["en" => "335ci", "ar" => "335ci"],
            ["en" => "335i", "ar" => "335i"],
            ["en" => "340i", "ar" => "340i"],
            ["en" => "418i", "ar" => "418i"],
            ["en" => "420i Convertible", "ar" => "420i كابورليه"],
            ["en" => "420i Coupe", "ar" => "420i كوبيه"],
            ["en" => "420i Gran Coupe", "ar" => "420i جران كوبيه"],
            ["en" => "430i Convertible", "ar" => "430i كابورليه"],
            ["en" => "430i Coupe", "ar" => "430i كوبيه"],
            ["en" => "430i Gran Coupe", "ar" => "430i جران كوبيه"],
            ["en" => "440i Coupe", "ar" => "440i كوبيه"],
            ["en" => "440i Gran Coupe", "ar" => "440i جران كوبيه"],
            ["en" => "440i convertible", "ar" => "440i كابورليه"],
            ["en" => "518", "ar" => "518"],
            ["en" => "520i", "ar" => "520i"],
            ["en" => "523i", "ar" => "523i"],
            ["en" => "525i", "ar" => "525i"],
            ["en" => "528", "ar" => "528"],
            ["en" => "528i", "ar" => "528i"],
            ["en" => "530i", "ar" => "530i"],
            ["en" => "535i", "ar" => "535i"],
            ["en" => "540i", "ar" => "540i"],
            ["en" => "640i", "ar" => "640i"],
            ["en" => "645 Coupe", "ar" => "645 كوبيه"],
            ["en" => "650i", "ar" => "650i"],
            ["en" => "720", "ar" => "720"],
            ["en" => "725", "ar" => "725"],
            ["en" => "730Li", "ar" => "730Li"],
            ["en" => "735", "ar" => "735"],
            ["en" => "740Li", "ar" => "740Li"],
            ["en" => "740i", "ar" => "740i"],
            ["en" => "745i", "ar" => "745i"],
            ["en" => "750E", "ar" => "750E"],
            ["en" => "750Li", "ar" => "750Li"],
            ["en" => "750i", "ar" => "750i"],
            ["en" => "760i", "ar" => "760i"],
            ["en" => "840i coupe", "ar" => "840i كوبيه"],
            ["en" => "840i gran coupe", "ar" => "840i جران كوبيه"],
            ["en" => "M2 Competition", "ar" => "M2 Competition"],
            ["en" => "Li 730", "ar" => "Li 730"],
            ["en" => "M3", "ar" => "M3"],
            ["en" => "M4", "ar" => "M4"],
            ["en" => "M5", "ar" => "M5"],
            ["en" => "M8", "ar" => "M8"],
            ["en" => "M850i", "ar" => "M850i"],
            ["en" => "X1", "ar" => "X1"],
            ["en" => "X2", "ar" => "X2"],
            ["en" => "X3", "ar" => "X3"],
            ["en" => "X4", "ar" => "X4"],
            ["en" => "X5", "ar" => "X5"],
            ["en" => "X6", "ar" => "X6"],
            ["en" => "X7", "ar" => "X7"],
            ["en" => "Z3", "ar" => "Z3"],
            ["en" => "Z4", "ar" => "Z4"],
            ["en" => "i3", "ar" => "i3"],
            ["en" => "i4", "ar" => "i4"],
            ["en" => "i7", "ar" => "i7"],
            ["en" => "i8", "ar" => "i8"],
            ["en" => "iX", "ar" => "iX"],
            ["en" => "iX1", "ar" => "iX1"],
            ["en" => "iX3", "ar" => "iX3"]
        ];

        $brandBMW = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'BMW'")->first();

        foreach ($BMWModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandBMW->id
            ]);
        }
        #################### Brilliance ####################
        $BrillianceModels = [
            ["en" => "FRV", "ar" => "FRV"],
            ["en" => "FRV Cross", "ar" => "FRV كروس"],
            ["en" => "FSV", "ar" => "FSV"],
            ["en" => "Galena", "ar" => "جالينا"],
            ["en" => "H 530", "ar" => "H 530"],
            ["en" => "H330", "ar" => "H330"],
            ["en" => "H5", "ar" => "H5"],
            ["en" => "S30", "ar" => "S30"],
            ["en" => "Splendor", "ar" => "سبلندور"],
            ["en" => "V3", "ar" => "V3"],
            ["en" => "V5", "ar" => "V5"],
            ["en" => "V6", "ar" => "V6"]
        ];

        $brandBrilliance = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Brilliance'")->first();

        foreach ($BrillianceModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandBrilliance->id
            ]);
        }
        #################### Buick ####################
        $BuickModels = [
            ["en" => "Skylark", "ar" => "سكاي لارك"]
        ];

        $brandBuick = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Buick'")->first();

        foreach ($BuickModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandBuick->id
            ]);
        }
        #################### BYD ####################
        $BYDModels = [
            ["en" => "F0", "ar" => "F0"],
            ["en" => "F3", "ar" => "F3"],
            ["en" => "Flyer", "ar" => "فلاير"],
            ["en" => "Han", "ar" => "هان"],
            ["en" => "L3", "ar" => "L3"],
            ["en" => "QIN", "ar" => "QIN"],
            ["en" => "S5", "ar" => "S5"],
            ["en" => "Seagull", "ar" => "سياجل"],
            ["en" => "Song L", "ar" => "سونج L"],
            ["en" => "Song Plus", "ar" => "سونج بلس"],
            ["en" => "Tang", "ar" => "تانج"],
            ["en" => "Yuan Plus", "ar" => "يوان بلس"],
            ["en" => "dolphin", "ar" => "دولفين"]
        ];

        $brandBYD = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'BYD'")->first();

        foreach ($BYDModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandBYD->id
            ]);
        }
        #################### Cadillac ####################
        $CadillacModels = [
            ["en" => "Brougham", "ar" => "بروجهام"],
            ["en" => "DTS", "ar" => "DTS"],
            ["en" => "Dls", "ar" => "Dls"],
            ["en" => "Escalade", "ar" => "اسكاليد"],
            ["en" => "SRX", "ar" => "SRX"]
        ];

        $brandCadillac = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Cadillac'")->first();

        foreach ($CadillacModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandCadillac->id
            ]);
        }
        #################### Chana ####################
        $ChanaModels = [
            ["en" => "Benni", "ar" => "بيني"]
        ];

        $brandChana = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Chana'")->first();

        foreach ($ChanaModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandChana->id
            ]);
        }
        #################### Changan ####################
        $ChanganModels = [
            ["en" => "Alsvin", "ar" => "ألسفن"],
            ["en" => "Benni Mini", "ar" => "بيني ميني"],
            ["en" => "CS15", "ar" => "CS15"],
            ["en" => "CS35 PLUS", "ar" => "CS35 PLUS"],
            ["en" => "CS55", "ar" => "CS55"],
            ["en" => "CS55-Plus", "ar" => "CS55-Plus"],
            ["en" => "Combo", "ar" => "كومبو"],
            ["en" => "EADO", "ar" => "إيدو"],
            ["en" => "UNI-T", "ar" => "UNI-T"],
            ["en" => "V7", "ar" => "V7"]
        ];

        $brandChangan = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Changan'")->first();

        foreach ($ChanganModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandChangan->id
            ]);
        }
        #################### Changan ####################
        $ChangheModels = [
            ["en" => "M50s", "ar" => "M50s"],
            ["en" => "Q35", "ar" => "Q35"]
        ];

        $brandChanghe = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Changhe'")->first();

        foreach ($ChangheModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandChanghe->id
            ]);
        }
        #################### Chery ####################
        $CheryModels = [
            ["en" => "A11", "ar" => "A11"],
            ["en" => "A516", "ar" => "A516"],
            ["en" => "ARRIZO 5", "ar" => "اريزو 5"],
            ["en" => "E5", "ar" => "E5"],
            ["en" => "Envy", "ar" => "انفي"],
            ["en" => "Long", "ar" => "لونج"],
            ["en" => "QQ", "ar" => "QQ"],
            ["en" => "Tiggo", "ar" => "تيجو"],
            ["en" => "Tiggo 3", "ar" => "تيجو 3"],
            ["en" => "Tiggo 4", "ar" => "تيجو 4"],
            ["en" => "Tiggo 7", "ar" => "تيجو 7"],
            ["en" => "Tiggo 7 Pro", "ar" => "تيجو 7 برو"],
            ["en" => "Tiggo 8", "ar" => "تيجو 8"],
            ["en" => "Tiggo 8 PRO", "ar" => "تيجو 8 برو"]
        ];

        $brandChery = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Chery'")->first();

        foreach ($CheryModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandChery->id
            ]);
        }
        #################### Chevrolet ####################
        $ChevroletModels = [
            ["en" => "Aveo", "ar" => "افيو"],
            ["en" => "Camaro", "ar" => "كامارو"],
            ["en" => "Caprice classic", "ar" => "كابريس كلاسيك"],
            ["en" => "Captiva", "ar" => "كابتيفا"],
            ["en" => "Corsica", "ar" => "كورسيكا"],
            ["en" => "Corvette", "ar" => "كورفيت"],
            ["en" => "Cruze", "ar" => "كروز"],
            ["en" => "Equinox", "ar" => "ايكونوكس"],
            ["en" => "Frontera", "ar" => "فرونتيرا"],
            ["en" => "Impala", "ar" => "امبالا"],
            ["en" => "Lanos", "ar" => "لانوس"],
            ["en" => "Lumina", "ar" => "لومينا"],
            ["en" => "Malibu", "ar" => "ماليبو"],
            ["en" => "N 300", "ar" => "N 300"],
            ["en" => "N 200", "ar" => "N 200"],
            ["en" => "NKR", "ar" => "NKR"],
            ["en" => "NPR", "ar" => "NPR"],
            ["en" => "NQR", "ar" => "NQR"],
            ["en" => "Optra", "ar" => "اوبترا"],
            ["en" => "Silverado", "ar" => "سيلفرادو"],
            ["en" => "Sonic", "ar" => "سونيك"],
            ["en" => "Spark", "ar" => "سبارك"],
            ["en" => "TFR", "ar" => "TFR"],
            ["en" => "Trailblazer", "ar" => "تريلبليزر"]
        ];

        $brandChevrolet = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Chevrolet'")->first();

        foreach ($ChevroletModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandChevrolet->id
            ]);
        }
        #################### Chrysler ####################
        $ChryslerModels = [
            ["en" => "300C", "ar" => "300C"],
            ["en" => "Crossfire", "ar" => "كروس فاير"],
            ["en" => "M300", "ar" => "M300"],
            ["en" => "Neon", "ar" => "نيون"],
            ["en" => "PT Cruiser", "ar" => "كروزر بي تي"],
            ["en" => "Pacifica", "ar" => "باسيفيكا"],
            ["en" => "Sebring", "ar" => "سبرينج"],
            ["en" => "Stratus", "ar" => "ستراتوس"],
            ["en" => "Town & Country", "ar" => "تاون أند كانتري"],
            ["en" => "Voyager", "ar" => "فوياجر"]
        ];

        $brandChrysler = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Chrysler'")->first();

        foreach ($ChryslerModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandChrysler->id
            ]);
        }
        #################### Citroen ####################
        $CitroenModels = [
            ["en" => "AX", "ar" => "AX"],
            ["en" => "Berlingo", "ar" => "بيرلينجو"],
            ["en" => "C-Elysee", "ar" => "سى اليزيه"],
            ["en" => "C2", "ar" => "C2"],
            ["en" => "C3", "ar" => "C3"],
            ["en" => "C3 Aircross", "ar" => "C3 ايركروس"],
            ["en" => "C3 Picasso", "ar" => "C3 بيكاسو"],
            ["en" => "C4", "ar" => "C4"],
            ["en" => "C4 Grand Picasso", "ar" => "C4 جراند بيكاسو"],
            ["en" => "C4 Picasso", "ar" => "C4 بيكاسو"],
            ["en" => "C4 X", "ar" => "C4 X"],
            ["en" => "C5", "ar" => "C5"],
            ["en" => "C5 Aircross", "ar" => "C5 اير كروس"],
            ["en" => "C6", "ar" => "C6"],
            ["en" => "C8", "ar" => "C8"],
            ["en" => "DS3", "ar" => "DS3"],
            ["en" => "DS4", "ar" => "DS4"],
            ["en" => "DS5", "ar" => "DS5"],
            ["en" => "DS7", "ar" => "DS7"],
            ["en" => "Jumpy", "ar" => "جامبي"],
            ["en" => "Oltcit", "ar" => "أولست"],
            ["en" => "Picasso", "ar" => "بيكاسو"],
            ["en" => "Xsara", "ar" => "اكسارا"],
            ["en" => "Zara", "ar" => "زارا"],
            ["en" => "ZX", "ar" => "ZX"]
        ];

        $brandCitroen = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Citroen'")->first();

        foreach ($CitroenModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandCitroen->id
            ]);
        }
        #################### Cupra ####################
        $CupraModels = [
            ["en" => "Formentor", "ar" => "فورمينتور"],
            ["en" => "Leon", "ar" => "ليون"]
        ];

        $brandCupra = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Cupra'")->first();

        foreach ($CupraModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandCupra->id
            ]);
        }
        #################### Dacia ####################
        $DaciaModels = [
            ["en" => "1100", "ar" => "1100"],
            ["en" => "1300", "ar" => "1300"]
        ];

        $brandDacia = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Dacia'")->first();

        foreach ($DaciaModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandDacia->id
            ]);
        }
        #################### Daewoo ####################
        $DaewooModels = [
            ["en" => "Celio", "ar" => "سيليو"],
            ["en" => "Espero", "ar" => "إسبيرو"],
            ["en" => "Juliet", "ar" => "جوليت"],
            ["en" => "Lacetti", "ar" => "لاسيتى"],
            ["en" => "Lanos", "ar" => "لانوس"],
            ["en" => "Lanos 2", "ar" => "لانوس 2"],
            ["en" => "Leganza", "ar" => "ليجانزا"],
            ["en" => "Matiz", "ar" => "ماتيز"],
            ["en" => "Nubira", "ar" => "نوبيرا"],
            ["en" => "Racer", "ar" => "رايسر"],
            ["en" => "Zaz", "ar" => "زاز"]
        ];

        $brandDaewoo = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Daewoo'")->first();

        foreach ($DaewooModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandDaewoo->id
            ]);
        }
        #################### Daihatsu ####################
        $DaihatsuModels = [
            ["en" => "Charade", "ar" => "شاريد"],
            ["en" => "Gran Max", "ar" => "جران ماكس"],
            ["en" => "Grand Terios", "ar" => "جراند تريوس"],
            ["en" => "Kancil", "ar" => "كانشيل"],
            ["en" => "Materia", "ar" => "ماتيريا"],
            ["en" => "Mira", "ar" => "ميرا"],
            ["en" => "Sirion", "ar" => "سيريون"],
            ["en" => "Terios", "ar" => "تريوس"],
            ["en" => "YRV", "ar" => "YRV"]
        ];

        $brandDaihatsu = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Daihatsu'")->first();

        foreach ($DaihatsuModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandDaihatsu->id
            ]);
        }
        #################### Dodge ####################
        $DodgeModels = [
            ["en" => "Caravan", "ar" => "كارافان"],
            ["en" => "Challenger", "ar" => "تشالنجر"],
            ["en" => "Charger", "ar" => "تشارجر"],
            ["en" => "Dakota", "ar" => "داكوتا"],
            ["en" => "Dart", "ar" => "دارت"],
            ["en" => "Durango", "ar" => "دورانجو"],
            ["en" => "Nitro", "ar" => "نايترو"],
            ["en" => "RS", "ar" => "RS"],
            ["en" => "Ram", "ar" => "رام"]
        ];

        $brandDodge = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Dodge'")->first();

        foreach ($DodgeModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandDodge->id
            ]);
        }
        #################### Dodge ####################
        $DodgeModels = [
            ["en" => "Caravan", "ar" => "كارافان"],
            ["en" => "Challenger", "ar" => "تشالنجر"],
            ["en" => "Charger", "ar" => "تشارجر"],
            ["en" => "Dakota", "ar" => "داكوتا"],
            ["en" => "Dart", "ar" => "دارت"],
            ["en" => "Durango", "ar" => "دورانجو"],
            ["en" => "Nitro", "ar" => "نايترو"],
            ["en" => "RS", "ar" => "RS"],
            ["en" => "Ram", "ar" => "رام"]
        ];

        $brandDodge = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Dodge'")->first();

        foreach ($DodgeModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandDodge->id
            ]);
        }
        #################### Dongfeng ####################
        $DongfengModels = [
            ["en" => "Aeolus A30", "ar" => "أيولوس A30"],
            ["en" => "Aeolus e70 pro", "ar" => "أيولوس e70 pro"],
            ["en" => "Eagel 580", "ar" => "إيجل 508"],
            ["en" => "HUGE-Hybrid", "ar" => "هيوج-هايبرد"],
            ["en" => "Venucia", "ar" => "فينوتشيا"]
        ];

        $brandDongfeng = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Dongfeng'")->first();

        foreach ($DongfengModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandDongfeng->id
            ]);
        }
        #################### DS ####################
        $DSModels = [
            ["en" => "3 Crossback", "ar" => "كروس باك 3"],
            ["en" => "7 Crossback", "ar" => "7 كروس باك"],
            ["en" => "DS4", "ar" => "DS4"],
            ["en" => "DS5", "ar" => "DS5"]
        ];

        $brandDS = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'DS'")->first();

        foreach ($DSModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandDS->id
            ]);
        }
        #################### Faw ####################
        $FawModels = [
            ["en" => "B30", "ar" => "B30"],
            ["en" => "Bestune", "ar" => "Bestune"],
            ["en" => "Vita", "ar" => "فيتا"],
            ["en" => "X40", "ar" => "X40"],
            ["en" => "Xiali", "ar" => "زياللى"]
        ];

        $brandFaw = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Faw'")->first();

        foreach ($FawModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandFaw->id
            ]);
        }
        #################### Ferrari ####################
        $FerrariModels = [
            ["en" => "296 GTB", "ar" => "296 GTB"],
            ["en" => "360 spider", "ar" => "360 Spider"],
            ["en" => "430 scuderia", "ar" => "430 Scuderia"],
            ["en" => "458 italia", "ar" => "458 Italia"],
            ["en" => "458 spider", "ar" => "458 Spider"],
            ["en" => "550 Barchetta", "ar" => "550 Barchetta"],
            ["en" => "575M Maranello", "ar" => "575M Maranello"],
            ["en" => "599 GTB Fiorano", "ar" => "599 GTB Fiorano"],
            ["en" => "599 GTO", "ar" => "599 GTO"],
            ["en" => "612 scaglietti", "ar" => "612 Scaglietti"],
            ["en" => "612 sessanta", "ar" => "612 Sessanta"],
            ["en" => "California", "ar" => "California"],
            ["en" => "Challenge stradale", "ar" => "Challenge Stradale"],
            ["en" => "Enzo", "ar" => "Enzo"],
            ["en" => "F430", "ar" => "F430"],
            ["en" => "F430 spider", "ar" => "F430 Spider"],
            ["en" => "FF", "ar" => "FF"],
            ["en" => "Roma", "ar" => "Roma"],
            ["en" => "Scuderia spider 16m", "ar" => "Scuderia Spider 16M"],
            ["en" => "Superamerica", "ar" => "Superamerica"]
        ];

        $brandFerrari = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Ferrari'")->first();

        foreach ($FerrariModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandFerrari->id
            ]);
        }
        #################### Fiat ####################
        $FiatModels = [
            ["en" => "124", "ar" => "124"],
            ["en" => "125", "ar" => "125"],
            ["en" => "126", "ar" => "126"],
            ["en" => "127", "ar" => "127"],
            ["en" => "128 nova", "ar" => "128 نوفا"],
            ["en" => "1300", "ar" => "1300"],
            ["en" => "131", "ar" => "131"],
            ["en" => "132", "ar" => "132"],
            ["en" => "500", "ar" => "500"],
            ["en" => "500C", "ar" => "500C"],
            ["en" => "500L", "ar" => "500L"],
            ["en" => "500X", "ar" => "500X"],
            ["en" => "Argentina", "ar" => "أرجينتا"],
            ["en" => "Brava", "ar" => "برافا"],
            ["en" => "Bravo", "ar" => "برافو"],
            ["en" => "Chenko", "ar" => "شينكو"],
            ["en" => "Coupe Mini Ferrari", "ar" => "كوبيه مينى فيرارى"],
            ["en" => "Doblo", "ar" => "دوبلو"],
            ["en" => "Fiorino", "ar" => "فيورينو"],
            ["en" => "Grand Punto", "ar" => "جراند بونتو"],
            ["en" => "Linea", "ar" => "لينيا"],
            ["en" => "Marea", "ar" => "ماريا"],
            ["en" => "Multipla", "ar" => "Multipla"],
            ["en" => "Palio", "ar" => "باليو"],
            ["en" => "Panda", "ar" => "باندا"],
            ["en" => "Petra", "ar" => "بترا"],
            ["en" => "Polonez", "ar" => "بولونيز"],
            ["en" => "Punto", "ar" => "بونتو"],
            ["en" => "Punto Evo", "ar" => "بونتو EVO"],
            ["en" => "Qubo", "ar" => "كوبو"],
            ["en" => "Regata", "ar" => "ريجاتا"],
            ["en" => "Ritmo", "ar" => "ريتمو"],
            ["en" => "Siena", "ar" => "سيينا"],
            ["en" => "Tempra", "ar" => "تمبرا"],
            ["en" => "Tipo", "ar" => "تيبو"],
            ["en" => "Uno", "ar" => "اونو"],
            ["en" => "Zastava", "ar" => "زستافا"],
            ["en" => "Fabrino van", "ar" => "فابرينو فان"]
        ];

        $brandFiat = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Fiat'")->first();

        foreach ($FiatModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandFiat->id
            ]);
        }
        #################### Ford ####################
        $FordModels = [
            ["en" => "B-Max", "ar" => "بي ماكس"],
            ["en" => "CMAX", "ar" => "سى ماكس"],
            ["en" => "Ecosport", "ar" => "ايكو سبورت"],
            ["en" => "Edge", "ar" => "أيدج"],
            ["en" => "Escape", "ar" => "اسكيب"],
            ["en" => "Escort", "ar" => "اسكورت"],
            ["en" => "Expedition", "ar" => "اكسبدشن"],
            ["en" => "Explorer", "ar" => "اكسبلورر"],
            ["en" => "F150", "ar" => "F150"],
            ["en" => "F250", "ar" => "F250"],
            ["en" => "Fairmont", "ar" => "فرومنت"],
            ["en" => "Fiesta", "ar" => "فيستا"],
            ["en" => "Flex", "ar" => "فليكس"],
            ["en" => "Focus", "ar" => "فوكاس"],
            ["en" => "Fusion", "ar" => "فيوجن"],
            ["en" => "Grand C-Max", "ar" => "جراند سى ماكس"],
            ["en" => "Ka", "ar" => "كا"],
            ["en" => "Kuga", "ar" => "كوجا"],
            ["en" => "Lincoln", "ar" => "لينكولن"],
            ["en" => "Mercury", "ar" => "ميركوري"],
            ["en" => "Mondeo", "ar" => "مونديو"],
            ["en" => "Mustang", "ar" => "موستانج"],
            ["en" => "Ranger", "ar" => "رينجر"],
            ["en" => "Taurus", "ar" => "تورس"]
        ];

        $brandFord = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Ford'")->first();

        foreach ($FordModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandFord->id
            ]);
        }
        #################### Forthing ####################
        $ForthingModels = [
            ["en" => "T5 Evo", "ar" => "T5 Evo"]
        ];

        $brandForthing = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Forthing'")->first();

        foreach ($ForthingModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandForthing->id
            ]);
        }
        #################### GAC ####################
        $GACModels = [
            ["en" => "EMKOO", "ar" => "إم كو"],
            ["en" => "EMPOW", "ar" => "إمباو"],
            ["en" => "EMZOOM", "ar" => "إم زووم"],
            ["en" => "GS4", "ar" => "GS4"]
        ];

        $brandGAC = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'GAC'")->first();

        foreach ($GACModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandGAC->id
            ]);
        }
        #################### Geely ####################
        $GeelyModels = [
            ["en" => "CK 2", "ar" => "CK 2"],
            ["en" => "Coolray", "ar" => "كول راي"],
            ["en" => "EMGRAND X7", "ar" => "ايمجراند اكس 7"],
            ["en" => "Emgrand 7", "ar" => "ايمجراند 7"],
            ["en" => "Emgrand 8", "ar" => "ايمجراند 8"],
            ["en" => "Englon", "ar" => "انجلون"],
            ["en" => "Frotta", "ar" => "فروته"],
            ["en" => "GX3 PRO", "ar" => "GX3 PRO"],
            ["en" => "Geometry C", "ar" => "جيومتري سي"],
            ["en" => "Imperial", "ar" => "امبريال"],
            ["en" => "Okavango", "ar" => "اوكافانجو"],
            ["en" => "Pandino", "ar" => "باندينو"],
            ["en" => "X 7", "ar" => "X 7"],
            ["en" => "X Pandino", "ar" => "اكس باندينو"]
        ];

        $brandGeely = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Geely'")->first();

        foreach ($GeelyModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandGeely->id
            ]);
        }
        #################### GMC ####################
        $GMCModels = [
            ["en" => "Blazer", "ar" => "بليزر"],
            ["en" => "Jimmy", "ar" => "جيمي"],
            ["en" => "Savana", "ar" => "سافانا"],
            ["en" => "Sierra", "ar" => "Sierra"],
            ["en" => "Super pan", "ar" => "سوبربان"],
            ["en" => "Yukon", "ar" => "يوكون"]
        ];

        $brandGMC = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'GMC'")->first();

        foreach ($GMCModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandGMC->id
            ]);
        }
        #################### Great Wall ####################
        $GreatWallModels = [
            ["en" => "C30", "ar" => "C30"],
            ["en" => "Coolbear", "ar" => "كول بير"],
            ["en" => "Florid", "ar" => "فلوريد"],
            ["en" => "Florida", "ar" => "فلوريدا"],
            ["en" => "Hover", "ar" => "هوف"],
            ["en" => "Peri", "ar" => "بيرى"]
        ];

        $brandGreatWall = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Great Wall'")->first();

        foreach ($GreatWallModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandGreatWall->id
            ]);
        }
        #################### Haima ####################
        $HaimaModels = [
            ["en" => "Family", "ar" => "فاميلى"],
            ["en" => "Haima 1", "ar" => "هايما 1"],
            ["en" => "Haima 2", "ar" => "هايما 2"],
            ["en" => "Haima 3", "ar" => "هايما 3"],
            ["en" => "M3", "ar" => "M3"],
            ["en" => "S5", "ar" => "S5"]
        ];

        $brandHaima = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Haima'")->first();

        foreach ($HaimaModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandHaima->id
            ]);
        }
        #################### Haval ####################
        $HavalModels = [
            ["en" => "H6", "ar" => "H6"],
            ["en" => "JOLION", "ar" => "جولايون"]
        ];

        $brandHaval = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Haval'")->first();

        foreach ($HavalModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandHaval->id
            ]);
        }
        #################### Havi ####################
        $HaviModels = [
            ["en" => "Lopo", "ar" => "لوبو"]
        ];

        $brandHavi = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Havi'")->first();

        foreach ($HaviModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandHavi->id
            ]);
        }
        #################### Hawtai ####################
        $HawtaiModels = [
            ["en" => "A25", "ar" => "A25"]
        ];

        $brandHawtai = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Hawtai'")->first();

        foreach ($HawtaiModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandHawtai->id
            ]);
        }
        #################### Honda ####################
        $HondaModels = [
            ["en" => "Accord", "ar" => "أكورد"],
            ["en" => "CR-V", "ar" => "CR-V"],
            ["en" => "CRX", "ar" => "CRX"],
            ["en" => "City", "ar" => "سيتي"],
            ["en" => "Civic", "ar" => "سيفيك"],
            ["en" => "Cr-x del sol", "ar" => "CR-X Del Sol"],
            ["en" => "Enb1", "ar" => "Enb1"],
            ["en" => "HR-V", "ar" => "HR-V"],
            ["en" => "Integra", "ar" => "انتجرا"],
            ["en" => "Jazz", "ar" => "جاز"],
            ["en" => "MRV", "ar" => "MRV"],
            ["en" => "Odyssey", "ar" => "أوديسي"],
            ["en" => "Prelude", "ar" => "بريلود"],
            ["en" => "Stream", "ar" => "ستريم"],
            ["en" => "ZR-V", "ar" => "ZR-V"],
            ["en" => "e:NS1", "ar" => "e:NS1"]
        ];

        $brandHonda = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Honda'")->first();

        foreach ($HondaModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandHonda->id
            ]);
        }
        #################### Hummer ####################
        $HummerModels = [
            ["en" => "H 1", "ar" => "H 1"],
            ["en" => "H 2", "ar" => "H 2"],
            ["en" => "H3", "ar" => "H3"],
            ["en" => "Hummer EV SUV", "ar" => "هامر EV"]
        ];

        $brandHummer = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Hummer'")->first();

        foreach ($HummerModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandHummer->id
            ]);
        }
        #################### Hyundai ####################
        $HyundaiModels = [
            ["en" => "Accent", "ar" => "أكسنت"],
            ["en" => "Accent BN7", "ar" => "أكسنت BN7"],
            ["en" => "Accent HCI", "ar" => "أكسنت HCI"],
            ["en" => "Accent RB", "ar" => "أكسنت RB"],
            ["en" => "Atos", "ar" => "اتوس"],
            ["en" => "Avante", "ar" => "افنتي"],
            ["en" => "Bayon", "ar" => "بايون"],
            ["en" => "Coupe", "ar" => "كوبيه"],
            ["en" => "Creta", "ar" => "كريتا"],
            ["en" => "Elantra", "ar" => "النترا"],
            ["en" => "Elantra AD", "ar" => "النترا AD"],
            ["en" => "Elantra CN7", "ar" => "النترا CN7"],
            ["en" => "Elantra HD", "ar" => "النترا HD"],
            ["en" => "Elantra MD", "ar" => "النترا MD"],
            ["en" => "Excel", "ar" => "اكسل"],
            ["en" => "Galloper", "ar" => "جالوبر"],
            ["en" => "Genesis", "ar" => "جينيسيس"],
            ["en" => "Getz", "ar" => "جيتز"],
            ["en" => "Grand i10", "ar" => "جراند i10"],
            ["en" => "H1", "ar" => "H1"],
            ["en" => "HD260", "ar" => "HD260"],
            ["en" => "i10", "ar" => "i10"],
            ["en" => "i20", "ar" => "i20"],
            ["en" => "i30", "ar" => "i30"],
            ["en" => "i40", "ar" => "i40"],
            ["en" => "IONIQ", "ar" => "ايونيك"],
            ["en" => "ix 20", "ar" => "ix 20"],
            ["en" => "ix 35", "ar" => "ix 35"],
            ["en" => "Matrix", "ar" => "ماتركس"],
            ["en" => "Santa Fe", "ar" => "سانتا فيه"],
            ["en" => "Santamo", "ar" => "سانتامو"],
            ["en" => "Solaris", "ar" => "سولاريس"],
            ["en" => "Sonata", "ar" => "سوناتا"],
            ["en" => "Terracan", "ar" => "تيراكان"],
            ["en" => "Tucson", "ar" => "توسان"],
            ["en" => "Veloster", "ar" => "فيلوستر"],
            ["en" => "Verna", "ar" => "فرنا"],
            ["en" => "Viva", "ar" => "فيفا"],
            ["en" => "Venue", "ar" => "فينيو"]
        ];

        $brandHyundai = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Hyundai'")->first();

        foreach ($HyundaiModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandHyundai->id
            ]);
        }
        #################### Infiniti ####################
        $InfinitiModels = [
            ["en" => "Ex35", "ar" => "Ex35"],
            ["en" => "FX35", "ar" => "FX35"],
            ["en" => "Fx50", "ar" => "Fx50"],
            ["en" => "Q30", "ar" => "Q30"],
            ["en" => "QX56", "ar" => "QX56"],
            ["en" => "QX70", "ar" => "QX70"]
        ];

        $brandInfiniti = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Infiniti'")->first();

        foreach ($InfinitiModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandInfiniti->id
            ]);
        }
        #################### Isuzu ####################
        $IsuzuModels = [
            ["en" => "NPR", "ar" => "NPR"]
        ];

        $brandIsuzu = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Isuzu'")->first();

        foreach ($IsuzuModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandIsuzu->id
            ]);
        }
        #################### JAC ####################
        $JACModels = [
            ["en" => "Eagle", "ar" => "ايجل"],
            ["en" => "G3", "ar" => "G3"],
            ["en" => "G5", "ar" => "G5"],
            ["en" => "J7", "ar" => "J7"],
            ["en" => "JS2", "ar" => "JS2"],
            ["en" => "JS3", "ar" => "JS3"],
            ["en" => "JS4", "ar" => "JS4"],
            ["en" => "S2", "ar" => "S2"],
            ["en" => "S3", "ar" => "S3"],
            ["en" => "S4", "ar" => "S4"],
            ["en" => "S7", "ar" => "S7"]
        ];

        $brandJAC = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'JAC'")->first();

        foreach ($JACModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandJAC->id
            ]);
        }
        #################### Jaguar ####################
        $JaguarModels = [
            ["en" => "E-PACE", "ar" => "E-PACE"],
            ["en" => "F-PACE", "ar" => "F-PACE"],
            ["en" => "F-TYPE", "ar" => "F-TYPE"],
            ["en" => "S Type", "ar" => "S Type"],
            ["en" => "X Type", "ar" => "X Type"],
            ["en" => "XE", "ar" => "XE"],
            ["en" => "XF", "ar" => "XF"],
            ["en" => "XF Portfolio", "ar" => "XF Portfolio"],
            ["en" => "XFR", "ar" => "XFR"],
            ["en" => "XJ", "ar" => "XJ"],
            ["en" => "XJL", "ar" => "XJL"],
            ["en" => "XK", "ar" => "XK"],
            ["en" => "XS", "ar" => "XS"],
            ["en" => "i Pace", "ar" => "i Pace"]
        ];

        $brandJaguar = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Jaguar'")->first();

        foreach ($JaguarModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandJaguar->id
            ]);
        }
        #################### Jeep ####################
        $JeepModels = [
            ["en" => "Cherokee", "ar" => "شيروكى"],
            ["en" => "Commander", "ar" => "كوماندور"],
            ["en" => "Compass", "ar" => "كومبس"],
            ["en" => "Grand Cherokee", "ar" => "جراند شيروكى"],
            ["en" => "Liberty", "ar" => "ليبرتي"],
            ["en" => "Patriot", "ar" => "باتريوت"],
            ["en" => "Renegade", "ar" => "رينجيد"],
            ["en" => "Wagoneer", "ar" => "واجنر"],
            ["en" => "Wings", "ar" => "وينجز"],
            ["en" => "Wrangler", "ar" => "رانجلر"]
        ];

        $brandJeep = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Jeep'")->first();

        foreach ($JeepModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandJeep->id
            ]);
        }

        #################### JETOUR ####################
        $JETOURModels = [
            ["en" => "Dashing", "ar" => "داشينج"],
            ["en" => "X70", "ar" => "X70"],
            ["en" => "X70 Plus", "ar" => "X70 Plus"],
            ["en" => "X90 Plus", "ar" => "X90 Plus"],
            ["en" => "X95", "ar" => "X95"]
        ];

        $brandJETOUR = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'JETOUR'")->first();

        foreach ($JETOURModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandJETOUR->id
            ]);
        }
        #################### JinBe ####################
        $JinBeModels = [
            ["en" => "Jinbe", "ar" => "جين بى"],
            ["en" => "X30", "ar" => "X30"]
        ];

        $brandJinBe = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'JinBe'")->first();

        foreach ($JinBeModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandJinBe->id
            ]);
        }

        #################### Kaiyi ####################
        $KaiyiModels = [
            ["en" => "X-3", "ar" => "X-3"],
            ["en" => "X3 Pro", "ar" => "X3 Pro"]
        ];

        $brandKaiyi = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Kaiyi'")->first();

        foreach ($KaiyiModels as $model) {
            CarBrandModel::create([
                "name" => ["en" => $model['en'], "ar" => $model['ar']],
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandKaiyi->id
            ]);
        }
        #################### Kia ####################
        $KiaModels = [
            ["en" => "Cadenza", "ar" => "كادينزا"],
            ["en" => "Carens", "ar" => "كارينز"],
            ["en" => "Carnival", "ar" => "كارنافال"],
            ["en" => "Ceed", "ar" => "سييد"],
            ["en" => "Cerato", "ar" => "سيراتو"],
            ["en" => "Clarus", "ar" => "كلاروس"],
            ["en" => "Grand Cerato", "ar" => "جراند سيراتو"],
            ["en" => "Magentis", "ar" => "ماجنتس"],
            ["en" => "Optima", "ar" => "اوبتيما"],
            ["en" => "Pegas", "ar" => "بيجاس"],
            ["en" => "Picanto", "ar" => "بيكانتو"],
            ["en" => "Pride", "ar" => "برايد"],
            ["en" => "Retona", "ar" => "ريتونا"],
            ["en" => "Rio", "ar" => "ريو"],
            ["en" => "Rio II", "ar" => "ريو 2"],
            ["en" => "Saiba", "ar" => "سايبا"],
            ["en" => "Sephia", "ar" => "سيفيا"],
            ["en" => "Shuma", "ar" => "شوما"],
            ["en" => "Sorento", "ar" => "سورنتو"],
            ["en" => "Soul", "ar" => "سول"],
            ["en" => "Spectra", "ar" => "سبكترا"],
            ["en" => "Sportage", "ar" => "سبورتاج"],
            ["en" => "Sportage NQ5", "ar" => "سبورتاج NQ5"],
            ["en" => "Xceed", "ar" => "أكسيد"],
            ["en" => "Seltos", "ar" => "سيلتوس"]
        ];

        $brandKia = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Kia'")->first();

        foreach ($KiaModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandKia->id
            ]);
        }
        #################### Lada ####################
        $LadaModels = [
            ["en" => "2104", "ar" => "2104"],
            ["en" => "2105", "ar" => "2105"],
            ["en" => "2107", "ar" => "2107"],
            ["en" => "2107 A/C", "ar" => "2107 A/C"],
            ["en" => "2110", "ar" => "2110"],
            ["en" => "2111", "ar" => "2111"],
            ["en" => "2112", "ar" => "2112"],
            ["en" => "2115", "ar" => "2115"],
            ["en" => "2170", "ar" => "2170"],
            ["en" => "Aleko", "ar" => "اليكو"],
            ["en" => "Granta", "ar" => "جرانتا"],
            ["en" => "Kalina", "ar" => "كالينا"],
            ["en" => "Largus", "ar" => "لارجوس"],
            ["en" => "Niva", "ar" => "نيفا"],
            ["en" => "Oka", "ar" => "أوكا"],
            ["en" => "Samara", "ar" => "سمارا"]
        ];

        $brandLada = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Lada'")->first();

        foreach ($LadaModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandLada->id
            ]);
        }
        #################### Lamborghini ####################
        $LamborghiniModels = [
            ["en" => "Huracán", "ar" => "هوراكان"],
            ["en" => "Urus", "ar" => "أوروس"],
            ["en" => "Countach", "ar" => "كونتاش"],
            ["en" => "Diablo", "ar" => "ديابلو"],
            ["en" => "Murcielago", "ar" => "مورسيلاغو"],
            ["en" => "Gallardo", "ar" => "غالاردو"],
            ["en" => "Aventador", "ar" => "أفينتادور"]
        ];

        $brandLamborghini = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Lamborghini'")->first();

        foreach ($LamborghiniModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandLamborghini->id
            ]);
        }
        #################### Lancia ####################
        $LanciaModels = [
            ["en" => "Dedra", "ar" => "ديدرا"]
        ];

        $brandLancia = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Lancia'")->first();

        foreach ($LanciaModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandLancia->id
            ]);
        }
        #################### Land Rover ####################
        $LandRoverModels = [
            ["en" => "Freelander", "ar" => "فريلاندر"],
            ["en" => "LR2", "ar" => "LR2"],
            ["en" => "LR3", "ar" => "LR3"],
            ["en" => "LR4", "ar" => "LR4"],
            ["en" => "Land rover", "ar" => "لاند روفر"]
        ];

        $brandLandRover = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Land Rover'")->first();

        foreach ($LandRoverModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandLandRover->id
            ]);
        }
        #################### Lexus ####################
        $LexusModels = [
            ["en" => "ES300", "ar" => "ES300"],
            ["en" => "ES350", "ar" => "ES350"],
            ["en" => "GS 330", "ar" => "GS 330"],
            ["en" => "Gx470", "ar" => "Gx470"],
            ["en" => "LS500", "ar" => "LS500"],
            ["en" => "LX 460", "ar" => "LX 460"],
            ["en" => "LX570", "ar" => "LX570"],
            ["en" => "LX600", "ar" => "LX600"],
            ["en" => "RX300", "ar" => "RX300"],
            ["en" => "RX330", "ar" => "RX330"],
            ["en" => "RX350", "ar" => "RX350"]
        ];

        $brandLexus = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Lexus'")->first();

        foreach ($LexusModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandLexus->id
            ]);
        }
        #################### Lifan ####################
        $LifanModels = [
            ["en" => "320", "ar" => "320"],
            ["en" => "520", "ar" => "520"],
            ["en" => "520i", "ar" => "520i"]
        ];

        $brandLifan = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Lifan'")->first();

        foreach ($LifanModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandLifan->id
            ]);
        }
        #################### Lincoln ####################
        $LincolnModels = [
            ["en" => "Navigator", "ar" => "نافيجاتور"],
            ["en" => "Town Car", "ar" => "تاون كار"]
        ];

        $brandLincoln = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Lincoln'")->first();

        foreach ($LincolnModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandLincoln->id
            ]);
        }
        #################### Lotus ####################
        $LotusModels = [
            ["en" => "Emeya", "ar" => "Emeya"],
            ["en" => "Eletre", "ar" => "Eletre"],
            ["en" => "Emira", "ar" => "Emira"],
            ["en" => "Evija", "ar" => "Evija"],
            ["en" => "Evora", "ar" => "Evora"],
            ["en" => "Exige", "ar" => "Exige"]
        ];

        $brandLotus = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Lotus'")->first();

        foreach ($LotusModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandLotus->id
            ]);
        }
        #################### Mahindra ####################
        $MahindraModels = [
            ["en" => "Scorpio", "ar" => "سكوربيو"]
        ];

        $brandMahindra = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Mahindra'")->first();

        foreach ($MahindraModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandMahindra->id
            ]);
        }
        #################### Mapel ####################
        $MapelModels = [
            ["en" => "ASPIRE", "ar" => "أسباير"]
        ];

        $brandMapel = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Mapel'")->first();

        foreach ($MapelModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandMapel->id
            ]);
        }
        #################### Maserati ####################
        $MaseratiModels = [
            ["en" => "Ghibli", "ar" => "جيبلي"],
            ["en" => "Gran Cabrio", "ar" => "جران كابريو"],
            ["en" => "GranTurismo", "ar" => "جران توريزمو"],
            ["en" => "Grecale", "ar" => "جريكاليه"],
            ["en" => "Levante", "ar" => "ليفانتى"],
            ["en" => "Levante S", "ar" => "ليفانتى اس"],
            ["en" => "Quattroporte", "ar" => "كواتروبورتى"],
            ["en" => "Quattroporte S", "ar" => "كواتروبورتى اس"]
        ];

        $brandMaserati = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Maserati'")->first();

        foreach ($MaseratiModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandMaserati->id
            ]);
        }
        #################### Mazda ####################
        $MazdaModels = [
            ["en" => "121", "ar" => "121"],
            ["en" => "2", "ar" => "2"],
            ["en" => "3", "ar" => "3"],
            ["en" => "323", "ar" => "323"],
            ["en" => "5", "ar" => "5"],
            ["en" => "6", "ar" => "6"],
            ["en" => "626", "ar" => "626"],
            ["en" => "929", "ar" => "929"],
            ["en" => "CX 3", "ar" => "CX 3"],
            ["en" => "CX9", "ar" => "CX9"],
            ["en" => "Familia", "ar" => "فاميليا"],
            ["en" => "M2", "ar" => "M2"],
            ["en" => "M3", "ar" => "M3"],
            ["en" => "Miata", "ar" => "مياتا"],
            ["en" => "Mx6", "ar" => "MX6"]
        ];

        $brandMazda = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Mazda'")->first();

        foreach ($MazdaModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandMazda->id
            ]);
        }
        #################### Mercedes ####################
        $MercedesModels = [
            ["en" => "E 63S", "ar" => "E 63S"],
            ["en" => "E230", "ar" => "E230"],
            ["en" => "E280", "ar" => "E280"],
            ["en" => "EQE 43", "ar" => "EQE 43"],
            ["en" => "190", "ar" => "190"],
            ["en" => "300 S", "ar" => "300 S"],
            ["en" => "4048-K", "ar" => "4048-K"],
            ["en" => "A 250e", "ar" => "A 250e"],
            ["en" => "A140", "ar" => "A140"],
            ["en" => "A150", "ar" => "A150"],
            ["en" => "A160", "ar" => "A160"],
            ["en" => "A180", "ar" => "A180"],
            ["en" => "A200", "ar" => "A200"],
            ["en" => "A35", "ar" => "A35"],
            ["en" => "A45 AMG", "ar" => "A45 AMG"],
            ["en" => "B 180", "ar" => "B 180"],
            ["en" => "B 200", "ar" => "B 200"],
            ["en" => "B150", "ar" => "B150"],
            ["en" => "B160", "ar" => "B160"],
            ["en" => "C 180 station", "ar" => "C 180 ستيشن"],
            ["en" => "C 250", "ar" => "C 250"],
            ["en" => "C 280", "ar" => "C 280"],
            ["en" => "C 300e", "ar" => "C 300e"],
            ["en" => "C 43 AMG", "ar" => "C 43 AMG"],
            ["en" => "C Coupe", "ar" => "C Coupe"],
            ["en" => "C180", "ar" => "C180"],
            ["en" => "C200", "ar" => "C200"],
            ["en" => "C230", "ar" => "C230"],
            ["en" => "C240", "ar" => "C240"],
            ["en" => "C300", "ar" => "C300"],
            ["en" => "C320", "ar" => "C320"],
            ["en" => "C350", "ar" => "C350"],
            ["en" => "C63 S", "ar" => "C63 S"],
            ["en" => "CE230", "ar" => "CE230"],
            ["en" => "CL63AMG", "ar" => "CL63AMG"],
            ["en" => "CLA 180", "ar" => "CLA 180"],
            ["en" => "CLA 200", "ar" => "CLA 200"],
            ["en" => "CLA 250e", "ar" => "CLA 250e"],
            ["en" => "CLA 45s", "ar" => "CLA 45s"],
            ["en" => "CLC 160", "ar" => "CLC 160"],
            ["en" => "CLE 200 coupe", "ar" => "CLE 200 كوبيه"],
            ["en" => "CLK", "ar" => "CLK"],
            ["en" => "CLS 350", "ar" => "CLS 350"],
            ["en" => "CLS 550", "ar" => "CLS 550"],
            ["en" => "CLS53", "ar" => "CLS53"],
            ["en" => "Clk 200", "ar" => "Clk 200"],
            ["en" => "E 180", "ar" => "E 180"],
            ["en" => "E 250", "ar" => "E 250"],
            ["en" => "E Cabriolet", "ar" => "E كابريوليه"],
            ["en" => "E coupe", "ar" => "E coupe"],
            ["en" => "E200", "ar" => "E200"],
            ["en" => "E220", "ar" => "E220"],
            ["en" => "E230", "ar" => "E230"],
            ["en" => "E240", "ar" => "E240"],
            ["en" => "E280", "ar" => "E280"],
            ["en" => "E300", "ar" => "E300"],
            ["en" => "E300e Amg", "ar" => "E300e Amg"],
            ["en" => "E320", "ar" => "E320"],
            ["en" => "E350", "ar" => "E350"],
            ["en" => "E53", "ar" => "E53"],
            ["en" => "EQA 250", "ar" => "EQA 250"],
            ["en" => "EQB 300", "ar" => "EQB 300"],
            ["en" => "EQB 350", "ar" => "EQB 350"],
            ["en" => "EQE 300", "ar" => "EQE 300"],
            ["en" => "EQE 350", "ar" => "EQE 350"],
            ["en" => "EQS", "ar" => "EQS"],
            ["en" => "EQS 450+", "ar" => "EQS 450+"],
            ["en" => "EQV 300", "ar" => "EQV 300"],
            ["en" => "G 500", "ar" => "G 500"],
            ["en" => "G 63", "ar" => "G 63"],
            ["en" => "G Class", "ar" => "G Class"],
            ["en" => "GL 500", "ar" => "GL 500"],
            ["en" => "GLA 180", "ar" => "GLA 180"],
            ["en" => "GLA 200", "ar" => "GLA 200"],
            ["en" => "GLB 180", "ar" => "GLB 180"],
            ["en" => "GLC 200", "ar" => "GLC 200"],
            ["en" => "GLC 250", "ar" => "GLC 250"],
            ["en" => "GLC 300", "ar" => "GLC 300"],
            ["en" => "GLC 300 COUPE", "ar" => "GLC 300 كوبيه"],
            ["en" => "GLC 43", "ar" => "GLC 43"],
            ["en" => "GLE63", "ar" => "GLE63"],
            ["en" => "GLK 250", "ar" => "GLK 250"],
            ["en" => "GLK 280", "ar" => "GLK 280"],
            ["en" => "GLK 300", "ar" => "GLK 300"],
            ["en" => "GLK 350", "ar" => "GLK 350"],
            ["en" => "GLS 580", "ar" => "GLS 580"],
            ["en" => "GLS 580 Maybach", "ar" => "GLS 580 مايباخ"],
            ["en" => "GT43", "ar" => "GT43"],
            ["en" => "GT53", "ar" => "GT53"],
            ["en" => "GT63", "ar" => "GT63"],
            ["en" => "GTA63", "ar" => "GTA63"],
            ["en" => "Gle 450", "ar" => "Gle 450"],
            ["en" => "ML320", "ar" => "ML320"],
            ["en" => "Maybach S 450", "ar" => "مايباخ S 450"],
            ["en" => "Maybach S 560", "ar" => "مايباخ S 560"],
            ["en" => "Maybach S 580", "ar" => "مايباخ S 580"],
            ["en" => "Maybach S 650", "ar" => "مايباخ S 650"],
            ["en" => "Ml 350", "ar" => "Ml 350"],
            ["en" => "Ml 55 amg", "ar" => "Ml 55 amg"],
            ["en" => "S280", "ar" => "S280"],
            ["en" => "S320", "ar" => "S320"],
            ["en" => "S350", "ar" => "S350"],
            ["en" => "S400", "ar" => "S400"],
            ["en" => "S450", "ar" => "S450"],
            ["en" => "S500", "ar" => "S500"],
            ["en" => "S560", "ar" => "S560"],
            ["en" => "S580", "ar" => "S580"],
            ["en" => "S63", "ar" => "S63"],
            ["en" => "SEL200", "ar" => "SEL200"],
            ["en" => "SEL280", "ar" => "SEL280"],
            ["en" => "SEL300", "ar" => "SEL300"],
            ["en" => "SEL500", "ar" => "SEL500"],
            ["en" => "SEL600", "ar" => "SEL600"],
            ["en" => "SL 350", "ar" => "SL 350"],
            ["en" => "SL43 AMG Cabriolet", "ar" => "SL43 AMG كابريوليه"],
            ["en" => "SLC 180", "ar" => "SLC 180"],
            ["en" => "Sl 320", "ar" => "Sl 320"],
            ["en" => "Sl 500", "ar" => "Sl 500"],
            ["en" => "Slk 200", "ar" => "Slk 200"],
            ["en" => "Slr", "ar" => "Slr"],
            ["en" => "Sls", "ar" => "Sls"],
            ["en" => "Smart", "ar" => "سمارت"],
            ["en" => "V 250", "ar" => "V 250"]
        ];

        $brandMercedes = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Mercedes'")->first();

        foreach ($MercedesModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandMercedes->id
            ]);
        }
        #################### Mercury ####################
        $MercuryModels = [
            ["en" => "Grand Marquis", "ar" => "جراند ماركيز"],
            ["en" => "Crown victoria", "ar" => "كراون فيكتوريا"],
            ["en" => "Mountaineer", "ar" => "مازنتانر"],
            ["en" => "Sable", "ar" => "سبلي"]
        ];

        $brandMercury = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Mercury'")->first();

        foreach ($MercuryModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandMercury->id
            ]);
        }
        #################### MG ####################
        $MGModels = [
            ["en" => "350 S", "ar" => "350 S"],
            ["en" => "360", "ar" => "360"],
            ["en" => "5", "ar" => "5"],
            ["en" => "6", "ar" => "6"],
            ["en" => "750", "ar" => "750"],
            ["en" => "Cyberster", "ar" => "سايبرستر"],
            ["en" => "HS", "ar" => "إيتش أس"],
            ["en" => "3", "ar" => "3"],
            ["en" => "3 Cross Over", "ar" => "3 كروس اوفر"],
            ["en" => "RX5", "ar" => "RX5"],
            ["en" => "RX5 Plus", "ar" => "RX5 بلس"],
            ["en" => "ZS", "ar" => "ZS"]
        ];

        $brandMG = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'MG'")->first();

        foreach ($MGModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandMG->id
            ]);
        }
        #################### Mini ####################
        $MiniModels = [
            ["en" => "Cabrio", "ar" => "Cabrio"],
            ["en" => "Cooper", "ar" => "Cooper"],
            ["en" => "Cooper Clubman", "ar" => "Cooper Clubman"],
            ["en" => "Cooper Countryman", "ar" => "Cooper Countryman"],
            ["en" => "Cooper F55", "ar" => "Cooper F55"],
            ["en" => "Cooper Paceman", "ar" => "Cooper Paceman"],
            ["en" => "Cooper S", "ar" => "Cooper S"],
            ["en" => "Cooper S Countryman", "ar" => "Cooper S Countryman"],
            ["en" => "Countryman", "ar" => "Countryman"],
            ["en" => "Countryman S", "ar" => "Countryman S"],
            ["en" => "John Cooper Works", "ar" => "John Cooper Works"]
        ];

        $brandMini = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Mini'")->first();

        foreach ($MiniModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandMini->id
            ]);
        }
        #################### Mitsubishi ####################
        $MitsubishiModels = [
            ["en" => "Attrage", "ar" => "أتراج"],
            ["en" => "Colt", "ar" => "كولت"],
            ["en" => "Eclipse", "ar" => "اكليبس"],
            ["en" => "Galant", "ar" => "جالانت"],
            ["en" => "Grandis", "ar" => "جرانديز"],
            ["en" => "Gt 3000", "ar" => "GT 3000"],
            ["en" => "L200", "ar" => "L200"],
            ["en" => "Lancer", "ar" => "لانسر"],
            ["en" => "Mirage", "ar" => "ميراج"],
            ["en" => "Montero", "ar" => "مونتيرو"],
            ["en" => "Nativa", "ar" => "ناتيفا"],
            ["en" => "Outlander", "ar" => "أوت لاندر"],
            ["en" => "Pajero", "ar" => "باجيرو"],
            ["en" => "Vr4", "ar" => "VR4"],
            ["en" => "Xpander", "ar" => "اكسباندر"]
        ];

        $brandMitsubishi = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Mitsubishi'")->first();

        foreach ($MitsubishiModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandMitsubishi->id
            ]);
        }
        #################### Nasr ####################
        $NasrModels = [
            ["en" => "128", "ar" => "128"],
            ["en" => "Dogan", "ar" => "دوجان"],
            ["en" => "Florida", "ar" => "فلوريدا"],
            ["en" => "Nova", "ar" => "نوفا"],
            ["en" => "Polonez", "ar" => "بولونيز"],
            ["en" => "Shahin", "ar" => "شاهين"]
        ];

        $brandNasr = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Nasr'")->first();

        foreach ($NasrModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandNasr->id
            ]);
        }
        #################### Nissan ####################
        $NissanModels = [
            ["en" => "350 Z", "ar" => "350 Z"],
            ["en" => "Armada", "ar" => "أرمادا"],
            ["en" => "Bluebird", "ar" => "بلوبيرد"],
            ["en" => "Datsun", "ar" => "داتسون"],
            ["en" => "Infinity", "ar" => "انفينيتي"],
            ["en" => "Juke", "ar" => "جوك"],
            ["en" => "Juke Platinium", "ar" => "جيوك بلاتينيوم"],
            ["en" => "Livina", "ar" => "ليفينا"],
            ["en" => "March", "ar" => "مارش"],
            ["en" => "Maxima", "ar" => "مكسيما"],
            ["en" => "Murano", "ar" => "مورانو"],
            ["en" => "Navara", "ar" => "نافارا"],
            ["en" => "Pathfinder", "ar" => "باث فايندر"],
            ["en" => "Patrol", "ar" => "باترول"],
            ["en" => "Pick up", "ar" => "بيك أب"],
            ["en" => "Qashqai", "ar" => "قشقاي"],
            ["en" => "Sentra", "ar" => "سنترا"],
            ["en" => "Sunny", "ar" => "صني"],
            ["en" => "Tiida", "ar" => "تيدا"],
            ["en" => "Titan", "ar" => "تيتان"],
            ["en" => "X-Trail", "ar" => "اكس ترايل"]
        ];

        $brandNissan = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Nissan'")->first();

        foreach ($NissanModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandNissan->id
            ]);
        }
        #################### OPEL ####################
        $OpelModels = [
            ["en" => "Adam", "ar" => "ادم"],
            ["en" => "Astra", "ar" => "أسترا"],
            ["en" => "Astra GTC", "ar" => "GTC أسترا"],
            ["en" => "Cascada", "ar" => "كاسكادا"],
            ["en" => "Corsa", "ar" => "كورسا"],
            ["en" => "Cross Land", "ar" => "كروس لاند"],
            ["en" => "Grand Land", "ar" => "جراند لاند"],
            ["en" => "Insignia", "ar" => "انسيجنيا"],
            ["en" => "Meriva", "ar" => "ميريفا"],
            ["en" => "Mokka", "ar" => "موكا"],
            ["en" => "Tigra", "ar" => "تيجرا"],
            ["en" => "Vectra", "ar" => "فيكترا"],
            ["en" => "Zafira", "ar" => "زافيرا"]
        ];

        $brandOpel = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Opel'")->first();

        foreach ($OpelModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandOpel->id
            ]);
        }
        #################### Perodua ####################
        $PeroduaModels = [
            ["en" => "Kancil", "ar" => "كانشيل"],
            ["en" => "Kelisa", "ar" => "كيليزا"]
        ];

        $brandPerodua = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Perodua'")->first();

        foreach ($PeroduaModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandPerodua->id
            ]);
        }
        #################### Peugeot ####################
        $PeugeotModels = [
            ["en" => "1007", "ar" => "1007"],
            ["en" => "104", "ar" => "104"],
            ["en" => "106", "ar" => "106"],
            ["en" => "107", "ar" => "107"],
            ["en" => "2008", "ar" => "2008"],
            ["en" => "204", "ar" => "204"],
            ["en" => "205", "ar" => "205"],
            ["en" => "206", "ar" => "206"],
            ["en" => "207", "ar" => "207"],
            ["en" => "207 CC", "ar" => "207 CC"],
            ["en" => "208", "ar" => "208"],
            ["en" => "208 CC", "ar" => "208 CC"],
            ["en" => "3008", "ar" => "3008"],
            ["en" => "301", "ar" => "301"],
            ["en" => "304", "ar" => "304"],
            ["en" => "305", "ar" => "305"],
            ["en" => "306", "ar" => "306"],
            ["en" => "307", "ar" => "307"],
            ["en" => "308", "ar" => "308"],
            ["en" => "404", "ar" => "404"],
            ["en" => "405", "ar" => "405"],
            ["en" => "406", "ar" => "406"],
            ["en" => "407", "ar" => "407"],
            ["en" => "408", "ar" => "408"],
            ["en" => "5008", "ar" => "5008"],
            ["en" => "504", "ar" => "504"],
            ["en" => "505", "ar" => "505"],
            ["en" => "508", "ar" => "508"],
            ["en" => "508 GT MAX", "ar" => "508 GT MAX"],
            ["en" => "605", "ar" => "605"],
            ["en" => "607", "ar" => "607"],
            ["en" => "Pars", "ar" => "بارس"],
            ["en" => "Partner", "ar" => "بارتنر"],
            ["en" => "RCZ", "ar" => "RCZ"],
            ["en" => "Samand", "ar" => "ساماند"]
        ];

        $brandPeugeot = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Peugeot'")->first();

        foreach ($PeugeotModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandPeugeot->id
            ]);
        }
        #################### Pontiac ####################
        $PontiacModels = [
            ["en" => "Pontiac", "ar" => "بونتياك"]
        ];

        $brandPontiac = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Pontiac'")->first();

        foreach ($PontiacModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandPontiac->id
            ]);
        }
        #################### Porsche ####################
        $PorscheModels = [
            ["en" => "718", "ar" => "718"],
            ["en" => "718 Boxster", "ar" => "بوكستر 718"],
            ["en" => "718 Boxster GTS", "ar" => "718 GTS بوكستر"],
            ["en" => "718 Boxster S", "ar" => "718 S بوكستر"],
            ["en" => "718 Cayman", "ar" => "كايمن 718"],
            ["en" => "718 Cayman GTS", "ar" => "718 GTS كايمن"],
            ["en" => "718 Cayman S", "ar" => "718 S كايمن"],
            ["en" => "911 Carrera", "ar" => "كاريرا 911"],
            ["en" => "911 Carrera 4S", "ar" => "911 4S كاريرا"],
            ["en" => "911 Carrera S", "ar" => "911 S كاريرا"],
            ["en" => "911 GT3", "ar" => "911 GT3"],
            ["en" => "911 Targa 4", "ar" => "911 4 ترجا"],
            ["en" => "911 Turbo", "ar" => "911 تربو"],
            ["en" => "944", "ar" => "944"],
            ["en" => "Boxster", "ar" => "بوكستر"],
            ["en" => "Boxster S", "ar" => "بوكستر S"],
            ["en" => "Carrera", "ar" => "كاريرا"],
            ["en" => "Carrera 4", "ar" => "كاريرا 4"],
            ["en" => "Carrera 4S", "ar" => "4S - كاريرا"],
            ["en" => "Carrera S", "ar" => "كاريرا S"],
            ["en" => "Cayenne", "ar" => "كايين"],
            ["en" => "Cayenne Coupe", "ar" => "كايين كوبيه"],
            ["en" => "Cayenne S", "ar" => "كايين S"],
            ["en" => "Cayman", "ar" => "كايمان"],
            ["en" => "Cayman S", "ar" => "كايمان S"],
            ["en" => "Macan", "ar" => "ماكان"],
            ["en" => "Macan S", "ar" => "ماكان S"],
            ["en" => "Panamera", "ar" => "باناميرا"],
            ["en" => "Panamera 4", "ar" => "باناميرا 4"],
            ["en" => "Panamera 4S", "ar" => "4S - باناميرا"],
            ["en" => "Panamera GTS", "ar" => "باناميرا GTS"],
            ["en" => "Panamera S", "ar" => "باناميرا S"],
            ["en" => "Panamera Turbo", "ar" => "باناميرا تيربو"],
            ["en" => "Panamera Turbo S", "ar" => "باناميرا تيربو S"],
            ["en" => "Targa", "ar" => "تارجا"],
            ["en" => "Targa 4S", "ar" => "4S - تارجا"],
            ["en" => "Taycan", "ar" => "تايكان"]
        ];

        $brandPorsche = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Porsche'")->first();

        foreach ($PorscheModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandPorsche->id
            ]);
        }
        #################### Proton ####################
        $ProtonModels = [
            ["en" => "Exora", "ar" => "اكسورا"],
            ["en" => "Gen 2", "ar" => "جين 2"],
            ["en" => "Persona", "ar" => "برسونا"],
            ["en" => "Preve", "ar" => "بريفى"],
            ["en" => "Saga", "ar" => "ساجا"],
            ["en" => "Waja", "ar" => "واجا"],
            ["en" => "Wira", "ar" => "ويرا"]
        ];

        $brandProton = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Proton'")->first();

        foreach ($ProtonModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandProton->id
            ]);
        }
        #################### Range Rover ####################
        $RangeRoverModels = [
            ["en" => "Defender", "ar" => "ديفيندر"],
            ["en" => "Sport", "ar" => "سبورت"],
            ["en" => "Autobiography", "ar" => "Autobiography"],
            ["en" => "Discovery", "ar" => "ديسكوفرى"],
            ["en" => "Discovery Sport", "ar" => "ديسكوفرى سبورت"],
            ["en" => "Evoque", "ar" => "ايفوك"],
            ["en" => "HSE", "ar" => "HSE"],
            ["en" => "New Range Rover", "ar" => "نيو رانج روفر"],
            ["en" => "Rover", "ar" => "روفر"],
            ["en" => "Rover 75", "ar" => "روفر 75"],
            ["en" => "SVR", "ar" => "SVR"],
            ["en" => "VOGUE", "ar" => "VOGUE"],
            ["en" => "Velar", "ar" => "فيلر"]
        ];

        $brandRangeRover = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Range Rover'")->first();

        foreach ($RangeRoverModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandRangeRover->id
            ]);
        }
        #################### Renault ####################
        $RenaultModels = [
            ["en" => "11", "ar" => "11"],
            ["en" => "18", "ar" => "18"],
            ["en" => "19", "ar" => "19"],
            ["en" => "25", "ar" => "25"],
            ["en" => "5", "ar" => "5"],
            ["en" => "9", "ar" => "9"],
            ["en" => "Austral", "ar" => "أوسترال"],
            ["en" => "Captur", "ar" => "كابتشر"],
            ["en" => "Clio", "ar" => "كليو"],
            ["en" => "Dacia", "ar" => "داشيا"],
            ["en" => "Duster", "ar" => "داستر"],
            ["en" => "Express van", "ar" => "Express van"],
            ["en" => "Fluence", "ar" => "فلوانس"],
            ["en" => "Kadjar", "ar" => "كادجار"],
            ["en" => "Kangoo express", "ar" => "كانجو إكسبرس"],
            ["en" => "Laguna", "ar" => "لاجونا"],
            ["en" => "Lodgy", "ar" => "لودجى"],
            ["en" => "Logan", "ar" => "لوجان"],
            ["en" => "Logan MCV", "ar" => "MCV لوجان"],
            ["en" => "Megane", "ar" => "ميجان"],
            ["en" => "Rainbow", "ar" => "رينبو"],
            ["en" => "Sandero", "ar" => "سانديرو"],
            ["en" => "Sandero Stepway", "ar" => "سانديرو ستيب واي"],
            ["en" => "Scala", "ar" => "اسكالا"],
            ["en" => "Scenic", "ar" => "سينيك"],
            ["en" => "Symbol", "ar" => "سيمبول"],
            ["en" => "Taliant", "ar" => "تاليانت"]
        ];

        $brandRenault = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Renault'")->first();

        foreach ($RenaultModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandRenault->id
            ]);
        }
        #################### Rolls Royce ####################
        $RollsRoyceModels = [
            ["en" => "Cullinan", "ar" => "كولينان"],
            ["en" => "Ghost", "ar" => "جوست"],
            ["en" => "Phantom", "ar" => "فانتم"],
            ["en" => "Silver Wraith", "ar" => "سيلفر واريس"],
            ["en" => "Other", "ar" => "آخري"]
        ];

        $brandRollsRoyce = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Rolls Royce'")->first();

        foreach ($RollsRoyceModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandRollsRoyce->id
            ]);
        }
        #################### Saab ####################
        $SaabModels = [
            ["en" => "900", "ar" => "900"]
        ];

        $brandSaab = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Saab'")->first();

        foreach ($SaabModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandSaab->id
            ]);
        }
        #################### Saipa ####################
        $SaipaModels = [
            ["en" => "Pride", "ar" => "برايد"],
            ["en" => "Tiipa", "ar" => "تييبا"]
        ];

        $brandSaipa = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Saipa'")->first();

        foreach ($SaipaModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandSaipa->id
            ]);
        }
        #################### Samsung ####################
        $SamsungModels = [
            ["en" => "Q5", "ar" => "Q5"]
        ];

        $brandSamsung = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Samsung'")->first();

        foreach ($SamsungModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandSamsung->id
            ]);
        }
        #################### Seat ####################
        $SeatModels = [
            ["en" => "133", "ar" => "133"],
            ["en" => "ATECA", "ar" => "اتيكا"],
            ["en" => "Altea", "ar" => "التيا"],
            ["en" => "Arona", "ar" => "ارونا"],
            ["en" => "Cordoba", "ar" => "كوردوبا"],
            ["en" => "Ibiza", "ar" => "ابيزا"],
            ["en" => "Leon", "ar" => "ليون"],
            ["en" => "Tarraco", "ar" => "تاراكو"],
            ["en" => "Toledo", "ar" => "توليدو"]
        ];

        $brandSeat = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Seat'")->first();

        foreach ($SeatModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandSeat->id
            ]);
        }
        #################### Senova ####################
        $SenovaModels = [
            ["en" => "A1", "ar" => "A1"],
            ["en" => "A3", "ar" => "A3"],
            ["en" => "X25", "ar" => "X25"],
            ["en" => "X35", "ar" => "X35"]
        ];

        $brandSenova = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Senova'")->first();

        foreach ($SenovaModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandSenova->id
            ]);
        }
        #################### Skoda ####################
        $SkodaModels = [
            ["en" => "Fabia", "ar" => "فابيا"],
            ["en" => "Fantasia", "ar" => "فانتازيا"],
            ["en" => "Felicia", "ar" => "فيليشيا"],
            ["en" => "Forman", "ar" => "فورمان"],
            ["en" => "KAMIQ", "ar" => "كاميك"],
            ["en" => "KAROQ", "ar" => "كاروك"],
            ["en" => "KODIAQ", "ar" => "كودياك"],
            ["en" => "Octavia", "ar" => "اوكتافيا"],
            ["en" => "Rapid", "ar" => "رابيد"],
            ["en" => "Roomster", "ar" => "رومستار"],
            ["en" => "SCALA", "ar" => "سكالا"],
            ["en" => "Superb", "ar" => "سوبيرب"],
            ["en" => "Yeti", "ar" => "ييتي"],
            ["en" => "Favorite", "ar" => "فافوريت"]
        ];

        $brandSkoda = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Skoda'")->first();

        foreach ($SkodaModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandSkoda->id
            ]);
        }
        #################### Smart ####################
        $SmartModels = [
            ["en" => "samrt", "ar" => "سمارت"]
        ];

        $brandSmart = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Smart'")->first();

        foreach ($SmartModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandSmart->id
            ]);
        }
        #################### Soueast ####################
        $SoueastModels = [
            ["en" => "A 5", "ar" => "A 5"],
            ["en" => "DX8S COUPE", "ar" => "DX8S كوبيه"],
            ["en" => "Dx7 NOVA", "ar" => "Dx7 نوفا"],
            ["en" => "V3", "ar" => "V3"],
            ["en" => "V5", "ar" => "V5"],
            ["en" => "V6", "ar" => "V6"]
        ];

        $brandSoueast = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Soueast'")->first();

        foreach ($SoueastModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandSoueast->id
            ]);
        }
        #################### Speranza ####################
        $SperanzaModels = [
            ["en" => "A113", "ar" => "A113"],
            ["en" => "A213", "ar" => "A213"],
            ["en" => "A516", "ar" => "A516"],
            ["en" => "A620", "ar" => "A620"],
            ["en" => "Envy", "ar" => "انفي"],
            ["en" => "M11", "ar" => "M11"],
            ["en" => "M12", "ar" => "M12"],
            ["en" => "Marke", "ar" => "Marke"],
            ["en" => "Tiggo", "ar" => "تيجو"]
        ];

        $brandSperanza = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Speranza'")->first();

        foreach ($SperanzaModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandSperanza->id
            ]);
        }
        #################### SsangYong ####################
        $SsangYongModels = [
            ["en" => "Korando", "ar" => "كوراندو"],
            ["en" => "Musso", "ar" => "موسو"],
            ["en" => "STAVIC", "ar" => "ستافيك"],
            ["en" => "Tivoli", "ar" => "تيفولي"],
            ["en" => "Torres", "ar" => "توريس"],
            ["en" => "XLV", "ar" => "XLV"]
        ];

        $brandSsangYong = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'SsangYong'")->first();

        foreach ($SsangYongModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandSsangYong->id
            ]);
        }
        #################### Subaru ####################
        $SubaruModels = [
            ["en" => "BRZ", "ar" => "BRZ"],
            ["en" => "Crosstrek", "ar" => "كروس تريك"],
            ["en" => "Forester", "ar" => "فورستر"],
            ["en" => "Impreza", "ar" => "امبريزا"],
            ["en" => "Legacy", "ar" => "ليجاسى"],
            ["en" => "Outback", "ar" => "اوتباك"],
            ["en" => "XV", "ar" => "XV"]
        ];

        $brandSubaru = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Subaru'")->first();

        foreach ($SubaruModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandSubaru->id
            ]);
        }
        #################### Suzuki ####################
        $SuzukiModels = [
            ["en" => "Alto", "ar" => "ألتو"],
            ["en" => "Apv", "ar" => "APV"],
            ["en" => "Baleno", "ar" => "بالينو"],
            ["en" => "Celerio", "ar" => "سيليريو"],
            ["en" => "Ciaz", "ar" => "سياز"],
            ["en" => "Dzire", "ar" => "ديزاير"],
            ["en" => "Ertiga", "ar" => "ارتيجا"],
            ["en" => "Fronx", "ar" => "فرونكس"],
            ["en" => "Grand Vitara", "ar" => "جراند فيتارا"],
            ["en" => "Jimny", "ar" => "جيمني"],
            ["en" => "Liana", "ar" => "ليانا"],
            ["en" => "Maruti", "ar" => "ماروتي"],
            ["en" => "S Cross", "ar" => "أس كروس"],
            ["en" => "SX4", "ar" => "SX4"],
            ["en" => "Spresso", "ar" => "إسبريسو"],
            ["en" => "SuperCarry", "ar" => "SuperCarry"],
            ["en" => "Swift", "ar" => "سويفت"],
            ["en" => "Van", "ar" => "فان"],
            ["en" => "Vitara", "ar" => "فيتارا"],
            ["en" => "Zen", "ar" => "زن"]
        ];

        $brandSuzuki = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Suzuki'")->first();

        foreach ($SuzukiModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandSuzuki->id
            ]);
        }
        #################### Tesla ####################
        $TeslaModels = [
            ["en" => "3 Model", "ar" => "3 Model"],
            ["en" => "Model Y", "ar" => "Model Y"],
            ["en" => "Model S", "ar" => "Model S"],
            ["en" => "Model X", "ar" => "Model X"]
        ];

        $brandTesla = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Tesla'")->first();

        foreach ($TeslaModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandTesla->id
            ]);
        }
        #################### Toyota ####################
        $ToyotaModels = [
            ["en" => "4Runner", "ar" => "4رانر"],
            ["en" => "Auris", "ar" => "اوريس"],
            ["en" => "Avalon", "ar" => "أفالون"],
            ["en" => "Avanza", "ar" => "أفانزا"],
            ["en" => "Avensis", "ar" => "أفنسيس"],
            ["en" => "Belta", "ar" => "بيلتا"],
            ["en" => "C-HR", "ar" => "C-HR"],
            ["en" => "Camry", "ar" => "كامرى"],
            ["en" => "Celica", "ar" => "سليكا"],
            ["en" => "Corolla", "ar" => "كورولا"],
            ["en" => "Corona", "ar" => "كورونا"],
            ["en" => "Cressida", "ar" => "كرسيدا"],
            ["en" => "Echo", "ar" => "أيكو"],
            ["en" => "FJ", "ar" => "FJ"],
            ["en" => "Fortuner", "ar" => "فورتشنر"],
            ["en" => "Hiace", "ar" => "هاي أس"],
            ["en" => "Hilux", "ar" => "هيلوكس"],
            ["en" => "Land cruiser", "ar" => "لاند كروزر"],
            ["en" => "Prado", "ar" => "برادو"],
            ["en" => "Previa", "ar" => "بريفيا"],
            ["en" => "Prius C", "ar" => "C بريوس"],
            ["en" => "Rav4", "ar" => "راف 4"],
            ["en" => "Rumion", "ar" => "روميون"],
            ["en" => "Rush", "ar" => "راش"],
            ["en" => "Siena", "ar" => "سيينا"],
            ["en" => "Starlet", "ar" => "ستارليت"],
            ["en" => "Surf", "ar" => "Surf"],
            ["en" => "Tercel", "ar" => "تريسل"],
            ["en" => "Tundra", "ar" => "تاندرا"],
            ["en" => "Yaris", "ar" => "ياريس"],
            ["en" => "bZ4X", "ar" => "bZ4X"]
        ];

        $brandToyota = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Toyota'")->first();

        foreach ($ToyotaModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandToyota->id
            ]);
        }
        #################### VGV ####################
        $VGVModels = [
            ["en" => "U70 PRO", "ar" => "U70 PRO"]
        ];

        $brandVGV = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'VGV'")->first();

        foreach ($VGVModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandVGV->id
            ]);
        }
        #################### Volkswagen ####################
        $VolkswagenModels = [
            ["en" => "Amarok", "ar" => "أمروك"],
            ["en" => "Arteon", "ar" => "ارتيون"],
            ["en" => "Beetles", "ar" => "بيتلز"],
            ["en" => "Bora", "ar" => "بورا"],
            ["en" => "CC", "ar" => "CC"],
            ["en" => "Caddy life", "ar" => "كادى لايف"],
            ["en" => "Carvelle", "ar" => "كارفيل"],
            ["en" => "Corrado", "ar" => "كورودو"],
            ["en" => "Cross Fox", "ar" => "كروس فوكس"],
            ["en" => "Cross Touran", "ar" => "كروس توران"],
            ["en" => "Eos", "ar" => "إيوس"],
            ["en" => "Gol", "ar" => "جول"],
            ["en" => "Golf", "ar" => "جولف"],
            ["en" => "Golf Variant", "ar" => "جولف فارينت"],
            ["en" => "ID.4 CROZZ", "ar" => "ID.4 CROZZ"],
            ["en" => "ID6 CROZZ", "ar" => "ID6 CROZZ"],
            ["en" => "ID 3", "ar" => "ID 3"],
            ["en" => "Jetta", "ar" => "جيتا"],
            ["en" => "Multivan", "ar" => "مالتيفان"],
            ["en" => "New Beetles", "ar" => "بيتل الجديدة"],
            ["en" => "Parati", "ar" => "باراتى"],
            ["en" => "Passat", "ar" => "باسات"],
            ["en" => "Passat CC", "ar" => "باسات سي سي"],
            ["en" => "Passat Variant", "ar" => "باسات فاريانت"],
            ["en" => "Pointer", "ar" => "بوينتر"],
            ["en" => "Polo", "ar" => "بولو"],
            ["en" => "Rabbit", "ar" => "رابيت"],
            ["en" => "Scirocco", "ar" => "شيروكو"],
            ["en" => "Souran", "ar" => "سوران"],
            ["en" => "T-Roc", "ar" => "تي روك"],
            ["en" => "Tiguan", "ar" => "تيجوان"],
            ["en" => "Touareg", "ar" => "طوارق"],
            ["en" => "Touran", "ar" => "توران"],
            ["en" => "Transporter", "ar" => "ترانسبورتر"],
            ["en" => "id7", "ar" => "id7"],
        ];

        $brandVolkswagen = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Volkswagen'")->first();

        foreach ($VolkswagenModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandVolkswagen->id
            ]);
        }
        #################### Volvo ####################
        $volvoModels = [
            ["en" => "144", "ar" => "144"],
            ["en" => "240", "ar" => "240"],
            ["en" => "244", "ar" => "244"],
            ["en" => "340", "ar" => "340"],
            ["en" => "460", "ar" => "460"],
            ["en" => "740", "ar" => "740"],
            ["en" => "760", "ar" => "760"],
            ["en" => "850", "ar" => "850"],
            ["en" => "940", "ar" => "940"],
            ["en" => "C30", "ar" => "C30"],
            ["en" => "C70", "ar" => "C70"],
            ["en" => "S40", "ar" => "S40"],
            ["en" => "S60", "ar" => "S60"],
            ["en" => "S70", "ar" => "S70"],
            ["en" => "S80", "ar" => "S80"],
            ["en" => "S90", "ar" => "S90"],
            ["en" => "V 50", "ar" => "V 50"],
            ["en" => "V40", "ar" => "V40"],
            ["en" => "V60", "ar" => "V60"],
            ["en" => "V70", "ar" => "V70"],
            ["en" => "XC 40", "ar" => "XC 40"],
            ["en" => "XC 60", "ar" => "XC 60"],
            ["en" => "XC 90", "ar" => "XC 90"],
        ];

        $brandVolvo = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Volvo'")->first();

        foreach ($volvoModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandVolvo->id
            ]);
        }
        #################### Zeekr ####################
        $zeekrModels = [
            ["en" => "1", "ar" => "1"],
            ["en" => "7", "ar" => "7"]
        ];

        $brandZeekr = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Zeekr'")->first();

        foreach ($zeekrModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandZeekr->id
            ]);
        }
        #################### Zotye ####################
        $zotyeModels = [
            ["en" => "T500", "ar" => "T500"],
            ["en" => "T600", "ar" => "T600"],
            ["en" => "Xplosion", "ar" => "اكسبلوجن"],
            ["en" => "sr7", "ar" => "sr7"]
        ];

        $brandZotye = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Zotye'")->first();

        foreach ($zotyeModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandZotye->id
            ]);
        }
        #################### Mclaren ####################
        $mclarenModels = [
            ["en" => "GT", "ar" => "GT"],
            ["en" => "765LT", "ar" => "765LT"],
            ["en" => "765LT Spider", "ar" => "765LT Spider"],
            ["en" => "750S", "ar" => "750S"],
            ["en" => "750S Spider", "ar" => "750S Spider"],
            ["en" => "Artura", "ar" => "Artura"],
            ["en" => "Elva", "ar" => "Elva"],
            ["en" => "Senna", "ar" => "Senna"],
            ["en" => "Senna GTR", "ar" => "Senna GTR"],
            ["en" => "Speedtail", "ar" => "Speedtail"],
            ["en" => "720S GT3", "ar" => "720S GT3"],
            ["en" => "720S GT3X", "ar" => "720S GT3X"],
            ["en" => "570S GT4", "ar" => "570S GT4"],
            ["en" => "Artura GT4", "ar" => "Artura GT4"],
            ["en" => "Solus GT", "ar" => "Solus GT"]
        ];

        $brandMcLaren = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'McLaren'")->first();

        foreach ($mclarenModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandMcLaren->id
            ]);
        }
        #################### Bugatti ####################
        $bugattiModels = [
            ["en" => "EB110", "ar" => "EB110"],
            ["en" => "Veyron", "ar" => "Veyron"],
            ["en" => "Les Légendes De Bugatti", "ar" => "Les Légendes De Bugatti"],
            ["en" => "Chiron", "ar" => "Chiron"],
            ["en" => "Mistral", "ar" => "Mistral"]
        ];

        $brandBugatti = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = 'Bugatti'")->first();

        foreach ($bugattiModels as $model) {
            CarBrandModel::create([
                "name" => $model,
                "slug" => Str::slug($model['en']),
                'car_brand_id' => $brandBugatti->id
            ]);
        }
        #################### END OF LIST ####################

    } // End OF Method

} // End of Class
