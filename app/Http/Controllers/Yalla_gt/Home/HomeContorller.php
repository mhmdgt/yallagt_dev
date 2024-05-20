<?php

namespace App\Http\Controllers\Yalla_gt\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CarBrand;
use App\Models\CarBrandModel;
use App\Models\EngineKm;
use App\Models\Governorate;
use App\Models\Manufacturer;
use App\Models\ProductListing;
use App\Models\SaleCar;
use App\Models\SaleCondition;
use App\Models\TransmissionType;
use Illuminate\Support\Facades\DB;

class HomeContorller extends Controller
{
    public function index()
    {
        // SALE CARS
        $cars = SaleCar::where('status', 'approved')->latest()->get();
        $brands = CarBrand::whereIn('id', $cars->pluck('brand'))->pluck('name', 'id');
        $models = CarBrandModel::whereIn('id', $cars->pluck('model'))->pluck('name', 'id');
        $transmissions = TransmissionType::whereIn('id', $cars->pluck('transmission'))->pluck('name', 'id');
        $kms = EngineKm::whereIn('id', $cars->pluck('km'))->pluck('name', 'id');
        $governorates = Governorate::whereIn('id', $cars->pluck('governorate'))->pluck('name', 'id');
        $conditions = SaleCondition::whereIn('id', $cars->pluck('condition'))->pluck('name', 'id');

        // CAR BRANDS WHICH HAS STOCK_CARS ONLY
        $brandsWithStockCar = CarBrand::whereHas('models.stockCars')->get(['id', 'name', 'slug', 'logo']);

        // Manufacturer WHICH HAS SKUS ONLY
        $manufacturerWithSkus = Manufacturer::WhereHas('products.skus')->get();

        // BLOGS
        $blogs = Blog::where('status', 'active')->latest()->get();

        // Products
        // Get the latest product listings with associated SKUs
        // $product_listings = ProductListing::with('skus' , 'skus.images')->latest()->get();
        $product_listings = ProductListing::whereIn('id', function ($query) {
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
        // dd($product_listings);
        return view('yalla-gt.pages.app.index',
            compact('cars', 'conditions', 'brands', 'models', 'transmissions', 'kms', 'governorates',
                'brandsWithStockCar', 'blogs', 'products', 'manufacturers', 'storehouses', 'product_listings' , 'manufacturerWithSkus'
            ));

    }
}
