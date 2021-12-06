<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/pay", [\App\Http\Controllers\PaymentController::class, 'createPayment'])->name('api.pay');
Route::any('/pay/success', [\App\Http\Controllers\PaymentController::class, 'success']);
Route::any('/pay/notify', [\App\Http\Controllers\PaymentController::class, 'notify']);
