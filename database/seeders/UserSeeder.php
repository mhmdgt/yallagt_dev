<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
           "name"=>"user",
           "email"=>"user@example.com",
           "username"=>"user@example",
           "phone"=>"123",
           "password"=>Hash::make('123')

        ]);
    }
}
