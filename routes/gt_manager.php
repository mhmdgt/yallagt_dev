<?php

use App\Http\Controllers\Gt_manager\Admin_profile\AdminController;
use App\Http\Controllers\Gt_manager\Admin_profile\AdminProfileController;

use App\Http\Controllers\Gt_manager\Cars_system\CarBrandController;
use App\Http\Controllers\Gt_manager\Cars_system\CarBrandModelController;
use App\Http\Controllers\Gt_manager\Cars_system\AllSpecsController;

use App\Http\Controllers\Gt_manager\Stock_cars\CarCategoriesController;
use App\Http\Controllers\Gt_manager\Stock_cars\StockCarsController;

use App\Http\Controllers\Gt_manager\Cars_for_sale\CarsForSaleController;

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {

    Route::get('manager', [AdminController::class, 'IndexPage'])
        ->name('index-page');

    Route::get('manager/home', [AdminController::class, 'ManagerHome'])
        ->name('manager-home');

    #################### Admin Profile ####################
    Route::get('manager/profile', [AdminProfileController::class, 'AdminProfile'])
        ->name('admin-profile');
    Route::post('manager/profile/update', [AdminProfileController::class, 'AdminUpdateData'])
        ->name('admin-profile-update');
    Route::get('manager/admin-change-password', [AdminProfileController::class, 'AdminChangePassword'])
        ->name('admin-change-password');
    Route::post('manager/admin-change-password-update', [AdminProfileController::class, 'AdminPasswordUpdate'])
        ->name('admin-password-update');

    #################### Car Brands ####################
    Route::controller(CarBrandController::class)->prefix('car-brands')->name('car-brand.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{carBrand}', 'show')->name('show');
        Route::post('/', 'store')->name('store');
        Route::post('/{carBrand}', 'update')->name('update');
        Route::delete('destroy/{carBrand}', 'destroy')->name('destroy');

    });

    #################### Car Models #################################
    Route::get('manager/brand-models/{id}', [CarBrandModelController::class, 'AllBrandModels'])
        ->name('brand-models');
    Route::post('manager/{id}/store-brand-model', [CarBrandModelController::class, 'StoreBrandModel'])
        ->name('store-brand-model');
    // Cars Models //
    Route::controller(CarBrandModelController::class)->prefix('car-brand-models')->name('car-brand-model.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{carBrandModel}', 'show')->name('show');
        Route::post('/', 'store')->name('store');
        Route::put('/{carBrandModel}', 'update')->name('update');
        Route::delete('destroy/{carBrandModel}', 'destroy')->name('destroy');

    });

    #################### Specs Categories #################################
    Route::get('manager/spec-categroies', [AllSpecsController::class, 'index'])
        ->name('spec-categories');
    Route::get('manager/specs/body-shapes', [AllSpecsController::class, 'BodyShape'])
        ->name('body-shapes');

    #################### Stock Cars ####################
    Route::get('manager/all-stock-cars', [StockCarsController::class, 'index'])
        ->name('all-stock-cars');
    Route::get('manager/all-stock-models', [StockCarsController::class, 'ModelsIndex'])
        ->name('all-stock-models');

    Route::get('manager/create-stock-cars', [StockCarsController::class, 'create'])
        ->name('create-stock-cars');
//     Route::get('manager/update-stock-cars', [StockCarsController::class, 'update'])
//             ->name('create-stock-cars');
//     Route::get('manager/delete-stock-cars', [StockCarsController::class, 'delete'])
//             ->name('create-stock-cars');

    Route::get('manager/car-stock-category', [CarCategoriesController::class, 'create'])
        ->name('category.create');
//     Route::get('manager/update-stock-cars', [StockCarsController::class, 'update'])
//             ->name('create-stock-cars');
//     Route::get('manager/delete-stock-cars', [StockCarsController::class, 'delete'])
//             ->name('create-stock-cars');

    #################### Cars For Sale ####################
    Route::get('manager/add-car-for-sale', [CarsForSaleController::class, 'create'])
        ->name('add-car-for-sale');

    #################### Admin Logout ####################
    Route::get('logout', [AdminController::class, 'logout'])
        ->name('admin-logout');

}); #################### End Of Admin Routs ####################
