<?php

namespace Database\Factories;

use App\Models\Governorate;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Storehouse>
 */
class StorehouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            'manager_name' => fake()->name(),
            "full_address" => fake()->address(),
            "phone" => fake()->phoneNumber(),
            "landline" => fake()->phoneNumber(),
            "email" => fake()->email(),
            "governorate_id" => Governorate::all()->random()->id,
            "area" => fake()->word(),
            "building_number" => fake()->word(),
            "street" => fake()->word(),
            "gps_link" => fake()->url(),
            'seller_id' => Seller::all()->random()->id,


        ];
    }
}

