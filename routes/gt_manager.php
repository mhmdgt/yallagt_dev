<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Gt_manager\Blog\BlogController;
use App\Http\Controllers\Gt_manager\Blog\BlogCategoryController;
use App\Http\Controllers\Gt_manager\Sale_cars\SaleCarsController;
use App\Http\Controllers\Gt_manager\Admin_profile\AdminController;
use App\Http\Controllers\Gt_manager\Car_assets\CarBrandController;
use App\Http\Controllers\Gt_manager\Customers\CustomersController;
use App\Http\Controllers\Gt_manager\Stock_cars\StockCarsController;
use App\Http\Controllers\Gt_manager\Product_assets\ProductController;
use App\Http\Controllers\Gt_manager\Web_settings\ContactUsController;
use App\Http\Controllers\Gt_manager\Storehouses\StorehousesController;
use App\Http\Controllers\Gt_manager\Car_assets\CarBrandModelController;
use App\Http\Controllers\Gt_manager\Admin_profile\AdminProfileController;
use App\Http\Controllers\Gt_manager\Product_assets\ProductSkusController;
use App\Http\Controllers\Gt_manager\Stock_cars\StockCarCategoryController;
use App\Http\Controllers\Gt_manager\Product_assets\ManufacturersController;
use App\Http\Controllers\Gt_manager\Product_assets\ProductCategoryController;
use App\Http\Controllers\Gt_manager\Product_Listings\ProductListingsController;
use App\Http\Controllers\Gt_manager\Product_assets\ProductSubCategoryController;

// Store Sale Cars
Route::post('sale-car-store' , [SaleCarsController::class, 'store'])->name('sale-car.store');
Route::post('/{slug}' , [SaleCarsController::class, 'update'])->name('sale-car.update');

// FilePond
Route::post('/manage/tmpFilepondUpload', [ProductController::class, 'tmpFilepondUpload']);
Route::delete('/manage/tmpFilepondDelete', [ProductController::class, 'tmpFilepondDelete']);
Route::post('/manage/blogTmpUpload', [BlogController::class, 'blogTmpUpload']);
Route::delete('/manage/blogTmpDelete', [BlogController::class, 'blogTmpDelete']);
Route::post('/manage/SaleCarTmpUpload', [SaleCarsController::class, 'SaleCarTmpUpload']);
Route::delete('/manage/SaleCarTmpDelete', [SaleCarsController::class, 'SaleCarTmpDelete']);

// Admin Middleware
Route::middleware('admin')->group(function () {
    // Dashboard Index//
    Route::get('manager', [AdminController::class, 'index'])->name('manager-index');
    // All Admins
    Route::controller(AdminController::class)->prefix('manage/admins')->name('admins.')->group(function () {
        Route::get('/admins', 'show')->name('show');
    });
    // Admin Profile //
    Route::controller(AdminProfileController::class)->prefix('manage/admin')->name('admin.')->group(function () {
        Route::get('/profile', 'AdminProfile')->name('profile');
        Route::post('/update-profile', 'AdminUpdateData')->name('update-profile');
        Route::get('/change-password', 'AdminChangePassword')->name('change-password');
        Route::post('/update-password', 'AdminPasswordUpdate')->name('update-password');
    });
    // Customers
    Route::controller(CustomersController::class)->prefix('manage/customers')->name('customers.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
    // Customer Web
    Route::controller(ContactUsController::class)->prefix('manage/cst_web')->name('cst_web.')->group(function () {
        Route::view('/contact_us', 'gt-manager.pages.web_settings.contact_us.index')->name('contact_us');
        Route::post('/update/contact_us', 'update')->name('update');
    });
    // Car Brands //
    Route::controller(CarBrandController::class)->prefix('manage/car-brands')->name('car-brand.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/{slug}/models', 'show')->name('show');
        Route::put('/{slug}', 'update')->name('update');
        Route::delete('destroy/{slug}', 'destroy')->name('destroy');
    });
    // Car Brand Models //
    Route::controller(CarBrandModelController::class)->prefix('manage/car-brand-models')->name('car-brand-model.')->group(function () {
        Route::post('/', 'store')->name('store');
        Route::put('/{slug}', 'update')->name('update');
        Route::delete('destroy/{slug}', 'destroy')->name('destroy');
        Route::get('/models/{brandId}', 'getModelsByBrand');
    });
    // Spec Categories //
    Route::prefix('manage/spec-categroies')->name('spec-categories.')->group(function () {
        Route::view('/', 'gt-manager.pages.car_assets.spec_categories.all_specs')->name('index');
        Route::view('/body-shapes', 'gt-manager.pages.car_assets.spec_categories.body_shapes')->name('shapes');
        Route::view('/fuel-types', 'gt-manager.pages.car_assets.spec_categories.fuel_type')->name('fuel');
        Route::view('/transmassion-types', 'gt-manager.pages.car_assets.spec_categories.transmassion_type')->name('transmassion');
        Route::view('/engine-aspiration', 'gt-manager.pages.car_assets.spec_categories.engine_aspiration')->name('aspiration');
        Route::view('/engine-capacity', 'gt-manager.pages.car_assets.spec_categories.engine_capacity')->name('cc');
        Route::view('/engine-kilometer', 'gt-manager.pages.car_assets.spec_categories.engine_kilometer')->name('km');
        Route::view('/spec-colors', 'gt-manager.pages.car_assets.spec_categories.colors')->name('colors');
        Route::view('/spec-features', 'gt-manager.pages.car_assets.spec_categories.features')->name('features');
    });
    // Stock Cars //
    Route::controller(StockCarsController::class)->prefix('manage/stock-car')->name('stock-car.')->group(function () {
        // Route::get('/{brandSlug}/{modelSlug}/{stockYear}/update-model', 'create')->name('update');
        // Pages
        Route::get('/', 'index')->name('index');
        Route::get('/{slug}', 'show')->name('show');
        Route::get('/{slug}/create-model', 'create')->name('create');
        Route::get('/{slug}/edit-stock-car', 'edit')->name('edit');
        // Actions
        Route::post('/store', 'store')->name('store');
        Route::put('/{stockCar}', 'update')->name('update');
        Route::delete('/{slug}/destroy', 'destroy')->name('destroy');
        // FilePond
        Route::post('/tmp-upload', 'TmpUpload');
        Route::delete('/tmp-delete', 'TmpDelete');
    });
    // Stock Cars Categoires //
    Route::controller(StockCarCategoryController::class)->prefix('manage/stock-car')->name('model-category.')->group(function () {
        Route::get('/{stock_car_id}/create-category', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{carSlug}/{slug}/edit-category', 'edit')->name('edit');
        Route::put('/{stockCarCategory}/update', 'update')->name('update');
        Route::delete('/{stockCarCategory}', 'destroy')->name('destroy');
    });
    // Sale Cars //
    Route::controller(SaleCarsController::class)->prefix('manage/sale-car')->name('sale-car.')->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::get('{slug}/edit', 'edit')->name('edit');
        Route::get('/live', 'live')->name('live');
        Route::get('/pending', 'pending')->name('pending');
        Route::get('/declined', 'declined')->name('declined');

        // Approve and Decline routes
        Route::delete('{slug}/destroy', 'destroy')->name('destroy');
        Route::post('{slug}/approve', 'approve')->name('approve-car');
        Route::post('{slug}/decline', 'decline')->name('decline-car');
    });
    // Storehouses //
    Route::controller(StorehousesController::class)->prefix('manage/storehouses')->name('storehouses.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create-storehouse', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('{storehouse}/edit-storehouse', 'edit')->name('edit');
        Route::put('{storehouse}/update-storehouse', 'update')->name('update');

    });
    // Product Manufacturers //
    Route::controller(ManufacturersController::class)->prefix('manage/manufacturers')->name('manufacturers.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::get('/{slug}/details', 'show')->name('show');
        Route::put('/{slug}', 'update')->name('update');
        Route::delete('destroy/{slug}', 'destroy')->name('destroy');
    });
    // Product Categories //
    Route::controller(ProductCategoryController::class)->prefix('manage/product-categories')->name('product-categories.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{slug}/sub-categories', 'show')->name('show');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{slug}/edit', 'edit')->name('edit');
        Route::put('/{slug}', 'update')->name('update');
        Route::delete('/{slug}', 'destroy')->name('destroy');
    });
    // Sub Product Categories //
    Route::controller(ProductSubCategoryController::class)->prefix('manage/product-subcategories')->name('product-subcategories.')->group(function () {
        Route::post('/', 'store')->name('store');
        Route::get('/{slug}/edit', 'edit')->name('edit');
        Route::put('/{slug}', 'update')->name('update');
        Route::delete('/{slug}', 'destroy')->name('destroy');
        Route::get('/categories/{categoryId}', 'getCategoriesByCategory');

    });
    // Product //
    Route::controller(ProductController::class)->prefix('manage/products')->name('products.')->group(function () {
        // Pages
        Route::get('/', 'index')->name('index');
        Route::get('/create-product', 'create')->name('create');
        Route::get('{slug}/edit', 'edit')->name('edit');
        // Actions
        Route::post('/store', 'store')->name('store');
        Route::put('/{slug}', 'update')->name('update');
        Route::delete('{slug}/destroy', 'destroy')->name('destroy');
    });
    // SKUSSSSSSSSSS //
    Route::controller(ProductSkusController::class)->prefix('manage/product-skus')->name('product-skus.')->group(function () {
        Route::get('/{slug}', 'index')->name('index');
        Route::get('{slug}/create-sku', 'create')->name('create');
        Route::get('{sku}/edit', 'edit')->name('edit');

        Route::post('{sku}/store-sku', 'store')->name('store');
        Route::put('{sku}/update', 'update')->name('update');
        Route::delete('{sku}/destroy', 'destroy')->name('destroy');

    });
    // Products Listings //
    Route::controller(ProductListingsController::class)->prefix('manage/product-listings')->name('product-listings.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/add-product', 'add')->name('add');
        Route::post('/store', 'store')->name('store');
    });
    // blog categories
    Route::controller(BlogCategoryController::class)->prefix('manage/blog-categories')->name('blog-categories.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{slug}/edit', 'edit')->name('edit');
        Route::put('/{slug}', 'update')->name('update');
        Route::delete('/{slug}', 'destroy')->name('destroy');
    });
    // blogs
    Route::controller(BlogController::class)->prefix('manage/blogs')->name('blogs.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create-blog', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{slug}/edit', 'edit')->name('edit');
        Route::put('/{slug}', 'update')->name('update');
        Route::delete('/{slug}', 'destroy')->name('destroy');
    });
});

////////////// Middleware of PreventBackHistory //////////////
Route::middleware('admin', 'PreventBackHistory')->group(function () {
    Route::get('manager/logout', [AdminController::class, 'logout'])->name('admin-logout');
});

