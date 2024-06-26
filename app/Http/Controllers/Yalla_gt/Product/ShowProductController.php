<?php

namespace App\Http\Controllers\Yalla_gt\Product;

use App\Http\Controllers\Controller;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\ProductListing;
use App\Models\ProductSku;
use App\Models\Seller;
use App\Traits\SlugTrait;
use Illuminate\Support\Facades\DB;

class ShowProductController extends Controller
{
    use SlugTrait;

    // -------------------- Method -------------------- //
    public function allProducts()
    {
        // // Fetch the latest product listings with associated skus
        $product_listings = ProductListing::with('seller', 'skus.images')->latest()->get();

        // // Prepare arrays to store associated data
        // $products = [];
        // $manufacturers = [];
        // $storehouses = [];

        // // Iterate over each product listing to gather associated data
        // foreach ($product_listings as $product_listing) {
        //     foreach ($product_listing->skus as $sku) {
        //         // Retrieve product and manufacturer
        //         $product = $sku->product;
        //         $manufacturer = optional($product->manufacturer);
        //         // Retrieve storehouse
        //         $storehouse = $product_listing->storehouse;

        //         // Add product, manufacturer, and storehouse to arrays
        //         $products[$product_listing->id] = $product;
        //         $manufacturers[$product_listing->id] = $manufacturer;
        //         $storehouses[$product_listing->id] = $storehouse;
        //     }
        // }

        // $sellersStock = Seller::with('storehouses.productListings.skus.images')->get();
        // dd($product_listings);

        // Return data to the view
        return view('yalla-gt.pages.products.index', compact('product_listings'));
    }

    // -------------------- Method -------------------- //
    public function manufacturersIndex()
    {
        $manufacturerWithSkus = Manufacturer::WhereHas('products.skus.listings')->get();
        return view('yalla-gt.pages.products.manufacturers_index', compact('manufacturerWithSkus'));
    }
    // -------------------- Method -------------------- //
    public function productsByManufacturer($slug)
    {
        // Retrieve the manufacturer data by slug
        $manufacturerData = Manufacturer::getByTranslatedSlug($slug)->first();

        // Check if the manufacturer data is retrieved
        if (!$manufacturerData) {
            // Handle the case when the manufacturer is not found
            return response()->json(['error' => 'Manufacturer not found'], 404);
        }

        // Get the latest product listings with associated SKUs for the specific manufacturer
        $product_listings = ProductListing::where('manufacturer_id', $manufacturerData->id)
            ->whereIn('id', function ($query) {
                $query->select(DB::raw('MIN(id)'))
                    ->from('product_listings')
                    ->groupBy('sku');
            })
            ->latest()
            ->get();

        // Prepare arrays to store associated data
        $products = [];
        $manufacturers = [];
        $storehouses = [];

        // Iterate over each product listing to gather associated data
        foreach ($product_listings as $product_listing) {
            // Check if the product listing has SKUs
            if ($product_listing->skus->isNotEmpty()) {
                // Retrieve the first SKU for the product listing
                $sku = $product_listing->skus->first();
                // Retrieve product and manufacturer
                $product = $sku->product;
                $manufacturer = optional($product->manufacturer);
                // Retrieve storehouse
                $storehouse = $product_listing->storehouse;

                // Add product, manufacturer, and storehouse to arrays
                $products[$product_listing->id] = $product;
                $manufacturers[$product_listing->id] = $manufacturer;
                $storehouses[$product_listing->id] = $storehouse;
            }
        }

        return view('yalla-gt.pages.products.index', compact('manufacturerData', 'product_listings'));
    }
    // -------------------- Method -------------------- //
    public function item($seller, $slug, $sku)
    {

        $sellerData = Seller::where('username' , $seller)->first();
        $product = Product::getByTranslatedSlug($slug)->first();
        $skuData = ProductSku::where('sku', $sku)->with('images')->first();
        $product_listing = ProductListing::Where(['sku' => $sku , 'seller_id' => $sellerData->id])->get()->first();
// dd($product_listing);
        // $single_listing = $product_listings->first();

        // // Fetch related products from the same seller, limit to 5 items, excluding the current product
        // $related_products = ProductListing::with('skus.images')
        //     ->where('storehouse_id', $single_listing->storehouse_id)
        //     ->where('sku', '!=', $sku) // Exclude the current product
        //     ->limit(5)
        //     ->get();

        return view('yalla-gt.pages.products.item', compact('sellerData', 'product', 'skuData', 'product_listing'));
    }

}
