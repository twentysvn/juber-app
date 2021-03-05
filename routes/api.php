<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CabCustomerController;
use App\Http\Controllers\MerchantLayananController;
use App\Http\Controllers\VoucherMerchantController;
use App\Http\Controllers\uploadController;
use App\Http\Controllers\HistoryRideController;
use App\Http\Controllers\DriverController;
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
//cab customer
Route::get('cab_user',[CabCustomerController::class, 'index']);
Route::get('cab_user/{id}',[CabCustomerController::class, 'show']);
Route::get('cab_user/idrs/{idrs}',[CabCustomerController::class, 'getByIdrs']);
Route::post('cab_user',[CabCustomerController::class, 'store']);
Route::put('cab_user/{id}',[CabCustomerController::class, 'update']);
Route::delete('cab_user/{id}',[CabCustomerController::class, 'destroy']);

//merchant layanan
Route::get('merchant_layanan',[MerchantLayananController::class, 'index']);
Route::post('merchant_layanan',[MerchantLayananController::class, 'store']);



//voucher
Route::get('voucher',[VoucherMerchantController::class, 'index']);
Route::get('voucher/mcid/{id}',[VoucherMerchantController::class, 'getByMcid']);
Route::get('voucher/{id}',[VoucherMerchantController::class, 'show']);
Route::post('voucher',[VoucherMerchantController::class, 'store']);
Route::put('voucher/{id}',[VoucherMerchantController::class, 'update']);
Route::delete('voucher/{id}',[VoucherMerchantController::class, 'destroy']);

//history ride
Route::get('history_ride',[HistoryRideController::class, 'index']);
Route::get('history_ride/idrs/{id}',[HistoryRideController::class, 'getByIdrs']);
Route::post('history_ride',[HistoryRideController::class, 'store']);
Route::put('history_ride/{id}',[HistoryRideController::class, 'update']);
Route::delete('history_ride/{id}',[HistoryRideController::class, 'destroy']);
Route::get('history_ride/{id}',[HistoryRideController::class, 'show']);

//Driver
Route::get('driver',[DriverController::class, 'index']);
Route::get('driver/{id}',[DriverController::class, 'show']);
Route::get('driver/idrs/{idrs}',[DriverController::class, 'getByIdrs']);
Route::post('driver',[DriverController::class, 'store']);
Route::put('driver/{id}',[DriverController::class, 'update']);
Route::put('driver/updateStatus/{id}',[DriverController::class, 'updateDriverStatus']);
Route::delete('driver/{id}',[DriverController::class, 'destroy']);

//upload gambar
Route::post('upload',[uploadController::class, 'store']);