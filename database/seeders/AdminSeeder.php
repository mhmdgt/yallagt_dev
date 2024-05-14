<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Admin::create([
            'name' => 'Yallagt',
            'username' => 'yallagt',
            'phone' => '01110120316',
            'email' => 'support@yallagt.com',
            'password'=> Hash::make('0111')
        ]);
    }
}
