<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/my/')->group(function (){
    Route::get('/profile/', [\App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::any('/profile/edit/', [\App\Http\Controllers\HomeController::class, 'profileEdit'])->name('profile.edit');
    Route::get('/bonus/', [\App\Http\Controllers\HomeController::class, 'bonus'])->name('bonus');
    Route::get('/orderHistory/', [\App\Http\Controllers\HomeController::class, 'orderHistory'])->name('orderHistory');
    Route::get('/promo/', [\App\Http\Controllers\HomeController::class, 'promo'])->name('promo');
    Route::get('/payAndDelivery', [\App\Http\Controllers\HomeController::class, 'payAndDelivery'])->name('payAndDelivery');
    Route::get('/contract', [\App\Http\Controllers\HomeController::class, 'contract'])->name('contract');
});

Route::get('/lk/{referral_id}', [\App\Http\Controllers\ReferralController::class, 'create'])->name('lk.referral.register');

//права
Route::middleware(['isAdmin'])->group(function (){
    Route::get('/1231239iasjd', function (){
        return response(['json' => true]);
    });
    Route::prefix('/my/')->group(function (){
        Route::any('/payAndDeliveryEdit/', [\App\Http\Controllers\HomeController::class, 'payAndDeliveryEdit'])->name('payAndDeliveryEdit');
        Route::any('/contractEdit/', [\App\Http\Controllers\HomeController::class, 'contractEdit'])->name('contractEdit');
    });
    Route::any('/promo/edit', [\App\Http\Controllers\AdminController::class, 'edit_promo'])->name('edit.promo');
});
