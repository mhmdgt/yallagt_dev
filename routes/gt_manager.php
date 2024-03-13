<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Gt_manager\Admin_profile\AdminController;
use App\Http\Controllers\Gt_manager\Cars_system\CarBrandController;
use App\Http\Controllers\Gt_manager\Stock_cars\StockCarsController;
use App\Http\Controllers\Gt_manager\Model_specs\BodyShapeController;
use App\Http\Controllers\Gt_manager\Stock_cars\CarCategoriesController;
use App\Http\Controllers\Gt_manager\Cars_system\CarBrandModelController;
use App\Http\Controllers\Gt_manager\Admin_profile\AdminProfileController;



Route::middleware('admin')->group(function(){

    Route::get('manager', [AdminController::class, 'IndexPage'])
            ->name('index-page');

        // Admin user //
    Route::get('manager/profile', [AdminProfileController::class, 'AdminProfile'])
            ->name('admin-profile');
    Route::post('manager/profile/update', [AdminProfileController::class, 'AdminUpdateData'])
            ->name('admin-profile-update');
    Route::get('manager/admin-change-password', [AdminProfileController::class, 'AdminChangePassword'])
            ->name('admin-change-password');
    Route::post('manager/admin-change-password-update', [AdminProfileController::class, 'AdminPasswordUpdate'])
            ->name('admin-password-update');

        // Car Brands //
//     Route::get('manager/stock-car-brands', [CarBrandController::class, 'AllCarBrands'])
//             ->name('show-all-car-brands');
//     Route::post('manager/store-car-brand', [CarBrandController::class, 'StoreCarBrand'])
//             ->name('store-car-brand');
//     Route::post('manager/update-car-brand', [CarBrandController::class, 'UpdateCarBrand'])
//             ->name('update-car-brand');
//     Route::delete('manager/delete-car-brand/{id}', [CarBrandController::class, 'DeleteCarBrand'])
//             ->name('delete.brand');

        // Cars Models //
    Route::get('manager/brand-models/{id}', [CarBrandModelController::class, 'AllBrandModels'])
            ->name('brand-models');
    Route::post('manager/{id}/store-brand-model', [CarBrandModelController::class, 'StoreBrandModel'])
            ->name('store-brand-model');
    // Route::get('manager/brand-model/{id}', [CarBrandModelsController::class, 'UpdateBrandModel'])
    //         ->name('update-brand-model');
    // Route::get('manager/brand-model/{id}', [CarBrandModelsController::class, 'DeleteBrandModel'])
    //         ->name('delete-brand-model');

        // Cars Models //
//     Route::get('manager/models-specs', [CarBrandModelController::class, 'allSpcesPage'])
//             ->name('model-specs-index');

        // Stock Cars //
    Route::get('manager/all-stock-cars', [StockCarsController::class, 'index'])
            ->name('all-stock-cars');
    Route::get('manager/create-stock-cars', [StockCarsController::class, 'create'])
            ->name('create-stock-cars');
//     Route::get('manager/update-stock-cars', [StockCarsController::class, 'update'])
//             ->name('create-stock-cars');
//     Route::get('manager/delete-stock-cars', [StockCarsController::class, 'delete'])
//             ->name('create-stock-cars');

        // Categories //
    Route::get('manager/create-category', [CarCategoriesController::class, 'create'])
            ->name('create-category');
//     Route::get('manager/update-stock-cars', [StockCarsController::class, 'update'])
//             ->name('create-stock-cars');
//     Route::get('manager/delete-stock-cars', [StockCarsController::class, 'delete'])
//             ->name('create-stock-cars');

















 ####################CarBrands#################################
 Route::controller(CarBrandController::class)->prefix('car-brands')->name('car-brand.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{carBrand}', 'show')->name('show');
        Route::post('/', 'store')->name('store');
        Route::post('/{carBrand}', 'update')->name('update');
        Route::delete('destroy/{carBrand}', 'destroy')->name('destroy');
       
    });
    ####################CarBrands#################################
 Route::controller(CarBrandModelController::class)->prefix('car-brand-models')->name('car-brand-model.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{carBrandModel}', 'show')->name('show');
        Route::post('/', 'store')->name('store');
        Route::put('/{carBrandModel}', 'update')->name('update');
        Route::delete('destroy/{carBrandModel}', 'destroy')->name('destroy');
       
    });
     ####################bodyShapes#################################
 Route::controller(BodyShapeController::class)->prefix('body-shapes')->name('body-shape.')->group(function () {

        Route::post('/', 'store')->name('store');
        Route::put('/{bodyShape}', 'update')->name('update');
        Route::delete('destroy/{bodyShape}', 'destroy')->name('destroy');
       
    });



    Route::get('manager/models-specs', [BodyShapeController::class, 'index'])
            ->name('model-specs-index');














    Route::get('logout', [AdminController::class, 'logout'])
            ->name('admin-logout');

}); // END OF Guest Routes
