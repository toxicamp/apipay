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

Route::middleware('auth:api')->get('/user', function(Request $request) {
    return $request->user();
});
Route::post('/order/cul', [\App\Http\Controllers\OrderController::class, 'payCul']);
Route::get('/order/select/{payment}/{shop_id}/{currency}/{price}', [\App\Http\Controllers\OrderController::class, 'index']);

Route::middleware('auth:api')->group(function() {

//Route::post('/payments/create', [App\Http\Controllers\Payments\PaymentController::class, 'createPayment']);
    Route::get('/payment/get', [App\Http\Controllers\Payments\PaymentController::class, 'getPayment']);
    Route::get('/payments/get', [App\Http\Controllers\Payments\PaymentController::class, 'getWallets']);

    Route::post('/payments/create', [App\Http\Controllers\Payments\PaymentController::class, 'createWallets']);
});
