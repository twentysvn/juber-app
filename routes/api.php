<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlamatMerchantController;
use App\Http\Controllers\CabCustomerController;
use App\Http\Controllers\MerchantLayananController;
use App\Http\Controllers\VoucherMerchantController;
use App\Http\Controllers\uploadController;
use App\Http\Controllers\HistoryRideController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\JenisLayananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\ProfilesController;

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
Route::get('cab_user', [CabCustomerController::class, 'index']);
Route::get('cab_user/{id}', [CabCustomerController::class, 'show']);
Route::get('cab_user/idrs/{idrs}', [CabCustomerController::class, 'getByIdrs']);
Route::post('cab_user', [CabCustomerController::class, 'store']);
Route::put('cab_user/{id}', [CabCustomerController::class, 'update']);
Route::delete('cab_user/{id}', [CabCustomerController::class, 'destroy']);

//merchant
Route::get('merchant_layanan', [MerchantLayananController::class, 'index']);
Route::get('merchant_layanan/{id}', [MerchantLayananController::class, 'show']);
Route::get('merchant_layanan/idrs/{id}', [MerchantLayananController::class, 'getByIdrs']);
Route::post('merchant_layanan', [MerchantLayananController::class, 'store']);
Route::put('merchant_layanan/{id}', [MerchantLayananController::class, 'update']);
Route::delete('merchant_layanan/{id}', [MerchantLayananController::class, 'destroy']);

// jenis layanan
Route::get('layanan', [JenisLayananController::class, 'index']);
Route::get('layanan/{id}', [JenisLayananController::class, 'show']);
Route::get('layanan/mcid/{id}', [JenisLayananController::class, 'showByMcId']);
Route::post('layanan', [JenisLayananController::class, 'store']);
Route::delete('layanan/{id}', [JenisLayananController::class, 'destroy']);
Route::put('layanan/{id}', [JenisLayananController::class, 'update']);

//voucher
Route::get('voucher', [VoucherMerchantController::class, 'index']);
Route::get('voucher/mcid/{id}', [VoucherMerchantController::class, 'getByMcid']);
Route::get('voucher/{id}', [VoucherMerchantController::class, 'show']);
Route::post('voucher', [VoucherMerchantController::class, 'store']);
Route::put('voucher/{id}', [VoucherMerchantController::class, 'update']);
Route::delete('voucher/{id}', [VoucherMerchantController::class, 'destroy']);

//history ride
Route::get('history_ride', [HistoryRideController::class, 'index']);
Route::get('history_ride/idrs/{id}', [HistoryRideController::class, 'getByIdrs']);
Route::post('history_ride', [HistoryRideController::class, 'store']);
Route::put('history_ride/{id}', [HistoryRideController::class, 'update']);
Route::delete('history_ride/{id}', [HistoryRideController::class, 'destroy']);
Route::get('history_ride/{id}', [HistoryRideController::class, 'show']);

//Driver
Route::get('driver', [DriverController::class, 'getDriver']);
Route::get('driver/{id}', [DriverController::class, 'show']);
Route::get('driver/idrs/{idrs}', [DriverController::class, 'getByIdrs']);
Route::post('driver', [DriverController::class, 'store']);
Route::put('driver/{id}', [DriverController::class, 'update']);
Route::put('driver/updateStatus/{id}', [DriverController::class, 'updateDriverStatus']);
Route::delete('driver/{id}', [DriverController::class, 'destroy']);

// wallet
Route::get('wallet', [WalletController::class, 'index']);
Route::get('wallet/{id}', [WalletController::class, 'show']);
Route::get('wallet/idrs/{id}', [WalletController::class, 'showByIdrs']);
Route::post('wallet', [WalletController::class, 'store']);

// gambar
Route::post('image/upload', [uploadController::class, 'store']);
Route::delete('image/delete', [uploadController::class, 'destroy']);
// Route::delete('image/delete/{id}', [uploadController::class, 'destroy']);


//profile
Route::get('profile', [ProfilesController::class, 'index']);
Route::get('profile/{id}', [ProfilesController::class, 'show']);
Route::post('profile', [ProfilesController::class, 'store']);
Route::put('profile/{id}', [ProfilesController::class, 'update']);
Route::delete('profile/{id}', [ProfilesController::class, 'destroy']);

//profile
Route::get('product', [ProductController::class, 'index']);
Route::post('product/search', [ProductController::class, 'getbyname']);
Route::get('product/{id}', [ProductController::class, 'show']);
Route::post('product', [ProductController::class, 'store']);
Route::put('product/{id}', [ProductController::class, 'update']);


//alamat
Route::get('alamat', [AlamatMerchantController::class, 'index']);
Route::get('alamat/{id}', [AlamatMerchantController::class, 'show']);
Route::get('alamat/idrs/{id}', [AlamatMerchantController::class, 'getByMcid']);
Route::post('alamat', [AlamatMerchantController::class, 'store']);
Route::put('alamat/{id}', [AlamatMerchantController::class, 'update']);
Route::delete('alamat/{id}', [AlamatMerchantController::class, 'destroy']);
