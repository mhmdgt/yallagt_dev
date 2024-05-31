<?php

namespace Database\Seeders;

use App\Models\Seller;
use App\Models\Product;
use App\Models\ProductSku;
use App\Models\Storehouse;
use App\Models\Manufacturer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Product::factory()
        ->count(10)
        ->create()
        ->each(function ($product) {
            // Create 3 SKUs for each product
            $skus = ProductSku::factory()
                ->count(3)
                ->for($product)
                ->create();

            // Create a product listing for each product
            $sku = $skus->random();
           
            $product->productListings()->create([
                'seller_id' => Seller::all()->random()->id,
               
                'manufacturer_id' => Manufacturer::all()->random()->id,
                'product_sku_id' => $sku->id,
                'sku' => $sku->sku,
                'selling_price' => 600,
                'storehouse_id' => Storehouse::all()->random()->id,

               
            ]);
        });

    }
}



