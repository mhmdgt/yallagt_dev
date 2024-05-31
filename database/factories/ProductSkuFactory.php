<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductSku>
 */
class ProductSkuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          
                'sku' => $this->faker->ean8,
                'sku_name' => [
                    'en' => $this->faker->name,
                    'ar' => $this->faker->name,
                ],
                'part_number' => $this->faker->ean8,
                'main_price' => $this->faker->numberBetween(1000, 1000000),
            ];
    
    }
}
