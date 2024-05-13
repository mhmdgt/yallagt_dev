<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Yalla_gt\Auth\AuthController;
use App\Http\Controllers\Yalla_gt\Home\HomeContorller;
use App\Http\Controllers\Yalla_gt\Cart\UserCartController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Yalla_gt\User_profile\UserController;
use App\Http\Controllers\Yalla_gt\Product\ShowProductController;
use App\Http\Controllers\Gt_manager\Sale_cars\SaleCarsController;
use App\Http\Controllers\Gt_manager\Car_assets\CarBrandModelController;

#AJAX DATA URLS
Route::get('car-brand-models/models/{brandId}', [SaleCarsController::class, 'getModelsByBrand']);

#AUTH_ROUTES
Route::controller(AuthController::class)->prefix('users')->name('yalla-gt.')->group(function () {
    Route::post('register', 'register')->name('register');
    Route::post('login', 'login')->name('login');
    Route::get('logout', 'logout')->name('logout');
});

Route::controller(AuthController::class)->name('yalla-gt.')->prefix('users')->group(function () {
Route::post('register', 'register')->name('register');
Route::post('login', 'login')->name('login');
Route::post('logout', 'logout')->name('logout');
});

Route::group(
    ['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    // Authorized
    function () {Route::middleware(['auth'])->group(function () {

        // USER PROFILE
        Route::controller(UserController::class)->prefix('user')->name('user.')->group(function () {
            Route::get('/profile', 'index')->name('profile');
            Route::get('/ads', 'ads')->name('ads');
        });

        // GT CARS
        Route::controller(SaleCarsController::class)->name('gt_car.')->group(function () {
            Route::get('/gt-ads', 'gtAds')->name('ads');
            Route::get('{slug}/edit', 'gtEdit')->name('edit');
            Route::get('/sell', 'gtCreate')->name('create');
        });

    });
        // Guest
        Route::get('/', [HomeContorller::class, 'index'])->name('yalla-index');
        Route::view('/cart', 'yalla-gt.pages.cart.index')->name('cart.index');
        Route::view('/about-us', 'yalla-gt.pages.need_help.about_us')->name('about_us');

        Route::get('/{slug}/{sku}/product-item', [ShowProductController::class, 'item'])->name('product_item');

// user cart




    });


    Route::controller(UserCartController::class)->prefix('user-carts')->name('user-carts.')->group(function () {
        Route::get('/{product_sku }', 'store')->name('store');
      
    });