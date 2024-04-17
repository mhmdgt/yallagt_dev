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
            'name' => 'Admin',
            'username' => 'Admin',
            'phone' => '0111',
            'email' => 'admin@gt.com',
            'password'=> Hash::make('0111')
        ]);
    }
}
