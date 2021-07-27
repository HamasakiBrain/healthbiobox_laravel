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
