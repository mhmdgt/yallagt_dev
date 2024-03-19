<?php

use App\Models\CarBrand;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Gt_manager\Admin_profile\AdminController;
use App\Http\Controllers\Gt_manager\Admin_profile\AdminLoginController;

require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

 /* ===================== GT-Guest Routes ===================== */

 Route::middleware('guest')->group(function(){

    Route::post('/admin/check-login', [AdminLoginController::class, 'login'])
    ->name('admin-check-login');

    Route::get('/admin/login', [AdminController::class, 'LoginPage'])
    ->name('admin-login');

    Route::get('/admin/register', [AdminController::class, 'RegisterPage'])
    ->name('admin-register');

}); // END OF Guest Routes


/* ===================== GT-Manager Routes ===================== */

require __DIR__ . '/gt_manager.php';

/* ===================== Yalla-GT Routes ===================== */


Route::get('/', function () {
    // $brandEagle = CarBrand::whereRaw("JSON_EXTRACT(name, '$.en') = '580 Eagle'")->first();
    // dd($brandEagle);
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


