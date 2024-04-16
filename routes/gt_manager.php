<?php

use App\Http\Controllers\Gt_manager\Admin_profile\AdminController;
use App\Http\Controllers\Gt_manager\Admin_profile\AdminProfileController;
use App\Http\Controllers\Gt_manager\Car_assets\CarBrandController;
use App\Http\Controllers\Gt_manager\Car_assets\CarBrandModelController;
use App\Http\Controllers\Gt_manager\Car_assets\SpecCategoriesController;
use App\Http\Controllers\Gt_manager\Sale_cars\SaleCarsController;
use App\Http\Controllers\Gt_manager\Product_assets\ManufacturersController;
use App\Http\Controllers\Gt_manager\Product_assets\ProCategoriesController;
use App\Http\Controllers\Gt_manager\Stock_cars\CarCategoriesController;
use App\Http\Controllers\Gt_manager\Stock_cars\StockCarsController;
use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {
    // Dashboard Index//
    Route::get('manager', [AdminController::class, 'index'])->name('manager-index');
    // Admin Profile //
    Route::controller(AdminProfileController::class)->prefix('manage/admin')->name('admin.')->group(function () {
        Route::get('/profile', 'AdminProfile')->name('profile');
        Route::post('/update-profile', 'AdminUpdateData')->name('update-profile');
        Route::get('/change-password', 'AdminChangePassword')->name('change-password');
        Route::post('/update-password', 'AdminPasswordUpdate')->name('update-password');
    });
    // Car Brands //
    Route::controller(CarBrandController::class)->prefix('manage/car-brands')->name('car-brand.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{carBrand}/models', 'show')->name('show');
        Route::post('/', 'store')->name('store');
        Route::post('/{carBrand}', 'update')->name('update');
        Route::delete('destroy/{carBrand}', 'destroy')->name('destroy');
    });
    // Car Brand Models //
    Route::controller(CarBrandModelController::class)->prefix('manage/car-brand-models')->name('car-brand-model.')->group(function () {
        Route::post('/', 'store')->name('store');
        Route::put('/{carBrandModel}', 'update')->name('update');
        Route::delete('destroy/{carBrandModel}', 'destroy')->name('destroy');
    });
    // Car Spec Categories //
    Route::controller(SpecCategoriesController::class)->prefix('manage/spec-categroies')->name('spec-categories.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/body-shapes', 'BodyShape')->name('shapes');
        Route::get('/fuel-types', 'FuelType')->name('fuel');
        Route::get('/transmassion-types', 'TransmassionType')->name('transmassion');
        Route::get('/engine-aspiration', 'EngineAspiration')->name('aspiration');
        Route::get('/engine-capacity', 'EngineCapacity')->name('cc');
        Route::get('/engine-kilometer', 'EngineKilometer')->name('km');
        Route::get('/spec-colors', 'colors')->name('colors');
    });
    // Stock Cars //
    Route::controller(StockCarsController::class)->prefix('manage/stock-car')->name('stock-car.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{brandSlug}', 'show')->name('show');
        Route::get('/{brandSlug}/create-model', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{brandSlug}/{modelSlug}/{stockYear}', 'edit')->name('edit');
        // Route::post('/', 'update')->name('update');
        Route::delete('/delete/{stockCar}', 'delete')->name('delete');
        Route::post('/tmp-upload', 'TmpUpload');
        Route::delete('/tmp-delete', 'TmpDelete');
    });
    // Stock Cars Categoires //
    Route::controller(CarCategoriesController::class)->prefix('manage/stock-category')->name('stock-category.')->group(function () {
        Route::get('/create-category', 'create')->name('create');
        Route::get('/edit-category', 'edit')->name('edit');
    });
    // Sale Cars //
    Route::controller(SaleCarsController::class)->prefix('manage/sale-car')->name('sale-car.')->group(function () {
        Route::get('/live', 'live')->name('live');
        Route::get('/create', 'create')->name('create');
    });
    // Product Manufacturers //
    Route::controller(ManufacturersController::class)->prefix('manage/manufacturers')->name('manufacturers.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
    // Product Categories //
    Route::controller(ProCategoriesController::class)->prefix('manage/pro-categories')->name('pro-categories.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/sub', 'show')->name('show');
    });
});

Route::middleware('admin', 'PreventBackHistory')->group(function () {
    Route::get('manager/logout', [AdminController::class, 'logout'])->name('admin-logout');
});
