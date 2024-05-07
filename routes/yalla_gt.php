<?php

use App\Http\Controllers\Gt_manager\Sale_cars\SaleCarsController;
use App\Http\Controllers\Yalla_gt\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::controller(AuthController::class)->prefix('users')->name('yalla-gt.')->group(function () {
    Route::post('register', 'register')->name('register');
    Route::post('login', 'login')->name('login');
    Route::get('logout', 'logout')->name('logout');
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function () {
        // USER MIDDELWARE
        Route::middleware(['auth', 'PreventBackHistory'])->group(function () {
            // USER PROFILE
            Route::view('/profile', 'yalla-gt.pages.profile.index')->name('user.profile');
            // GT CARS
            Route::controller(SaleCarsController::class)->name('gt_car.')->group(function () {
                Route::get('/sell', 'gtCreate')->name('create');
                Route::post('/store-gt-car', 'gtStore')->name('store');

            });

        });
        // Guest
        Route::view('/', 'yalla-gt.pages.app.index')->name('yalla-index');
        Route::view('/about-us', 'yalla-gt.pages.need_help.about_us')->name('about_us');

    });
