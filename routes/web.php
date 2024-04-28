<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Gt_manager\Admin_profile\AdminController;
use App\Models\CarBrand;
use App\Models\ProductCategory;



require __DIR__ . '/gt_manager.php';

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


Route::get('/', function () {

   
return view('yalla-gt.pages.app.index');
});



