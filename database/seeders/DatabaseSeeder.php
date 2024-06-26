<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            AdminSeeder::class,
            CarBrandSeeder::class,
            CarBrandModelSeeder::class,
            BodyShapeSeeder::class,
            FuelTypeSeeder::class,
            TransmissionTypeSeeder::class,
            EngineAspirationSeeder::class,
            EngineCcSeeder::class,
            EngineKmSeeder::class,
            ColorSeeder::class,
            FeatureSeeder::class,
            GovernorateSeeder::class,
            ManufacturerSeeder::class,
            ProductCategorySeeder::class,
            ProductSubCategorySeeder::class,
            BlogCategorySeeder::class,
            SaleConditionSeeder::class,
            PaymentMethodsSeeder::class,
        ]);
    }


}
