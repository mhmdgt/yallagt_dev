<?php
namespace Database\Factories;

use App\Models\Product;
use App\Models\Manufacturer;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => [
                'en' => $this->faker->name,
                'ar' => $this->faker->name,
            ],
            'description' => [
                'en' => $this->faker->text,
                'ar' => $this->faker->text,
            ],
            'slug' => [
                'en' => $this->faker->slug,
                'ar' => $this->faker->slug,
            ],
            'manufacturer_id' => Manufacturer::all()->random()->id,
            'product_category_id' => ProductCategory::all()->random()->id,
            'product_sub_category_id' => ProductSubCategory::all()->random()->id,
            'brochure' => $this->faker->url,
        ];
    }
}
