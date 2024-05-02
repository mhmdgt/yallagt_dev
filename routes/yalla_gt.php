<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
//     /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
//     Route::get('/', function () {
//         return view('yalla-gt.pages.app.index');
//     });

// });

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function () {
        Route::get('/', function () {
            return view('yalla-gt.pages.app.index');
        });
    });
