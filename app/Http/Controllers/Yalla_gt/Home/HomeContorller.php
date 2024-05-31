<?php

namespace App\Http\Controllers\Yalla_gt\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CarBrand;
use App\Models\CarBrandModel;
use App\Models\EngineKm;
use App\Models\Governorate;
use App\Models\Manufacturer;
use App\Models\PrivacyPolicy;
use App\Models\ProductListing;
use App\Models\SaleCar;
use App\Models\SaleCondition;
use App\Models\TermOfUse;
use App\Models\TransmissionType;

class HomeContorller extends Controller
{
    // -------------------- Method -------------------- //
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

        // BLOGS
        $blogs = Blog::where('status', 'active')->latest()->get();

        // Products
        $product_listings = ProductListing::with('seller', 'skus.images')->latest()->get();

        // Manufacturer WHICH HAS SKUS ONLY
        $manufacturerWithSkus = Manufacturer::WhereHas('products.skus')->get();

        return view('yalla-gt.pages.app.index',
            compact('cars', 'conditions', 'brands', 'models', 'transmissions', 'kms', 'governorates',
                'brandsWithStockCar', 'blogs', 'product_listings', 'manufacturerWithSkus'
            ));

    }
    // -------------------- Method -------------------- //
    public function termsIndex()
    {
        $terms = TermOfUse::get()->first();
        return view('yalla-gt.pages.need_help.terms_of_use', compact('terms'));
    }
    // -------------------- Method -------------------- //
    public function privacyIndex()
    {
        $policies = PrivacyPolicy::get()->first();
        return view('yalla-gt.pages.need_help.privacy_policy', compact('policies'));
    }
    // -------------------- Method -------------------- //
    public function faqIndex()
    {
        return view('yalla-gt.pages.need_help.faq');
    }

}
