<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Gt_manager\Admin_profile\AdminController;
use App\Http\Controllers\Yalla_gt\Cart\UserCartController;

Route::get('ppp/{product_sku}',[UserCartController::class,'store']
)->name('user-carts.store');
require __DIR__ . '/gt_manager.php';
require __DIR__ . '/yalla_gt.php';

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

 Route::middleware('guest','PreventBackHistory')->group(function(){
     Route::view('/manager/login', 'gt-manager.pages.auth.login')->name('admin-login');
    Route::post('/manager/check-login', [AdminController::class, 'login'])->name('admin.check.login');
}); // END OF Guest Routes



