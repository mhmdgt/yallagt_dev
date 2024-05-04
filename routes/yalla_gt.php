<?php

use App\Http\Controllers\YallaGT\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
//     /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
//     Route::get('/', function () {
//         return view('yalla-gt.pages.app.index');
//     });

// });

Route::controller(AuthController::class)->name('yalla-gt.')->prefix('users')->group(function () {
Route::post('register', 'register')->name('register');
Route::post('login', 'login')->name('login');
Route::post('logout', 'logout')->name('logout');
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function () {
        Route::get('/', function () {
            return view('yalla-gt.pages.app.index');
        });
    });
