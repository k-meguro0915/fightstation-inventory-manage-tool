<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StationsController;
use App\Http\Controllers\InventoryController;

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

Route::get('/',[ProductsController::class,'index']);
Route::get('/products',[ProductsController::class,'index']);
Route::get('/products/create',[ProductsController::class,'create']);
Route::post('/products/confirm',[ProductsController::class,'confirm']);
Route::post('/products/commit',[ProductsController::class,'commit']);
Route::get('/products/update/{product_id}',[ProductsController::class,'edit']);
Route::get('/products/delete/{product_id}',[ProductsController::class,'delete']);

Route::get('/stations',[StationsController::class,'index']);
Route::get('/stations/create',[StationsController::class,'create']);
Route::post('/stations/confirm',[StationsController::class,'confirm']);
Route::post('/stations/commit',[StationsController::class,'commit']);
Route::get('/stations/update/{station_id}',[StationsController::class,'edit']);

Route::get('/inventory/check/{station_id}',[InventoryController::class,'check']);
Route::post('/inventory/commit',[InventoryController::class,'commit']);