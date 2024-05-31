<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sellers=[
            [
                'name' => 'sRAhmed',
                'username' => "sar",
                'phone' => '01110120316',
                'email' => 'support@SARA.com',
                'password'=> Hash::make('0111'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Yallagt',
                'username' => "yallagt",
                'phone' => '01110120396',
                'email' => 'support@yallagt.com',
                'password'=> Hash::make('0111'),
                'email_verified_at' => now(),
            ],
        ];
    }
}



