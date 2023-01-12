<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// CMS側API
Route::get('get_station',[APIController::class,'getStation']);
Route::get('get_station_detail',[APIController::class,'getStationDetail']);

// アプリ側API
Route::get('app_sign_up',[APIController::class,'appSignUp']);
Route::get('app_login',[APIController::class,'appLogin']);
Route::get('decrease_inventory',[APIController::class,'decreaseInventory']);
