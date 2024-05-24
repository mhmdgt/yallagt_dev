<?php

use App\Http\Controllers\Gt_manager\Blog\BlogController;
use App\Http\Controllers\Gt_manager\Sale_cars\SaleCarsController;
use App\Http\Controllers\Gt_manager\Stock_cars\StockCarsController;
use App\Http\Controllers\Yalla_gt\Auth\AuthController;
use App\Http\Controllers\Yalla_gt\Cart\CheckoutController;
use App\Http\Controllers\Yalla_gt\Cart\UserCartController;
use App\Http\Controllers\Yalla_gt\Home\HomeContorller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Yalla_gt\User_profile\UserController;
use App\Http\Controllers\Yalla_gt\Product\ShowProductController;

#AJAX DATA URLS
Route::get('car-brand-models/models/{brandId}', [SaleCarsController::class, 'getModelsByBrand']);

#AUTH_ROUTES
Route::controller(AuthController::class)->prefix('users')->name('yalla-gt.')->group(function () {
    Route::post('register', 'register')->name('register');
    Route::post('login', 'login')->name('login');
    Route::get('logout', 'logout')->name('logout');
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    // ------------------------------------ Authorized
    function () {Route::middleware(['auth'])->group(function () {

        // USER PROFILE
        Route::controller(UserController::class)->prefix('user')->name('user.')->group(function () {
            Route::get('/profile', 'index')->name('profile');
            Route::get('/ads', 'ads')->name('ads');

            Route::get('/addresses', 'addressesIndex')->name('addressesIndex');
            Route::post('/addresses-store', 'addressesStore')->name('addressesStore');

            Route::get('{username}/edit-profile', 'editProfile')->name('edit-profile');
            Route::put('/update-profile', 'updateProfile')->name('update-profile');

        });

        // GT SALE CARS
        Route::controller(SaleCarsController::class)->name('gt_car.')->group(function () {
            Route::get('/gt-ads', 'gtAds')->name('ads');
            Route::get('{slug}/edit', 'gtEdit')->name('edit');
            Route::get('/sell', 'gtCreate')->name('create');
        });

        Route::controller(CheckoutController::class)->prefix('checkout')->name('checkout.')->group(function () {
            Route::view('/', 'yalla-gt.pages.cart.checkout')->name('index');
        });

    }); // ------------------------------------ END OF Authorized

        Route::controller(UserCartController::class)->prefix('user-carts')->name('user-carts.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{ProductSku}/store', 'store')->name('store');
        });

        // Home
        Route::get('/', [HomeContorller::class, 'index'])->name('yalla-index');
        Route::view('/about-us', 'yalla-gt.pages.need_help.about_us')->name('about_us');
        Route::view('/contact_us', 'yalla-gt.pages.need_help.contact_us')->name('contact_us');

        // Stock Cars
        Route::get('/brands', [StockCarsController::class, 'gtIndex'])->name('stock-car.gtIndex');
        Route::get('/stock-cars/{slug}', [StockCarsController::class, 'gtList'])->name('stock-car.gtList');
        Route::get('/stock-car/{slug}/{categorySlug}', [StockCarsController::class, 'gtShow'])->name('stock-car.gtShow');

        // Sale Car
        Route::get('/car-listings', [SaleCarsController::class, 'gtIndex'])->name('sale-car.gtIndex');
        Route::get('/car-listings/brand/{slug}', [SaleCarsController::class, 'gtList'])->name('sale-car.gtList');
        Route::get('/car-listing/{slug}', [SaleCarsController::class, 'gtShow'])->name('sale-car.show');

        // Products
        Route::get('/manufacturers', [ShowProductController::class, 'manufacturersIndex'])->name('product.manufacturers-index');
        Route::get('/manufacturer/{slug}', [ShowProductController::class, 'productsByManufacturer'])->name('product.manufacturer-products');
        Route::get('/all-products', [ShowProductController::class, 'allProducts'])->name('product.all-products');
        Route::get('product-item/{slug}/{sku}', [ShowProductController::class, 'item'])->name('product-item');

        // Blogs
        Route::get('/car-blogs', [BlogController::class, 'gtIndex'])->name('blog-gtIndex');
        Route::get('/blog/{slug}', [BlogController::class, 'gtBlog'])->name('blog-post');
        
         //User Cart
         Route::controller(UserCartController::class)->prefix('user-carts')->name('user-carts.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{ProductSku}/store', 'store')->name('store');
            Route::post('increment', 'increment')->name('increment');
            Route::post('decrement', 'decrement')->name('decrement');
        });

    }); // ------------------------------------ END OF YALLAGT




    
        Route::get('/blog/{slug}', [BlogController::class, 'gtBlog'])->name('blog-post'); // ------------------------------------ END OF YALLAGT
