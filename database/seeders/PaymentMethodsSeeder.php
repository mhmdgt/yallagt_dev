<?php

namespace Database\Seeders;

use App\Models\PaymentMethods;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $methods = [
            ['en' => "cash", "ar" => "نقدي"],
            ['en' => "cash on delivery", "ar" => "الدفع عند الاستلام"],
            ['en' => "Bank Card", "ar" => "بطاقة مصرفية"],
            ['en' => "downpayment", "ar" => "دفعة مبدئية ( تقسيط )"],

        ];
        foreach ($methods as $method) {
            PaymentMethods::create(["name" => $method]);
        }
    }
}
