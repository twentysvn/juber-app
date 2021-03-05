<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CabCustomerController;
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

Route::get('cab_user',[CabCustomerController::class, 'index']);
// Route::get('ref_cat/{id}',[RefCatController::class, 'show']);
Route::post('cab_user',[CabCustomerController::class, 'store']);
// Route::put('ref_cat/{id}',[RefCatController::class, 'update']);
// Route::delete('ref_cat/{id}',[RefCatController::class, 'destroy']);
