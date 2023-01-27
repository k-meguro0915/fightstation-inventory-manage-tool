<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StationsController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DiscountController;

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
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/user/{user_id}/edit/email',[UserController::class,'edit_email']);
Route::post('/user/{user_id}/edit/email/commit',[UserController::class,'commit_email']);
require __DIR__.'/auth.php';

Route::get('/company',[CompanyController::class,'index']);
Route::get('/company/create',[CompanyController::class,'create']);
Route::post('/company/confirm',[CompanyController::class,'confirm']);
Route::post('/company/commit',[CompanyController::class,'commit']);
Route::get('/company/update/{company_id}',[CompanyController::class,'edit']);
Route::get('/company/delete/{company_id}',[CompanyController::class,'delete']);

Route::get('/managers',[ManagerController::class,'index']);
Route::get('/managers/create',[ManagerController::class,'create']);
Route::get('/managers/edit/{user_id}',[ManagerController::class,'edit']);
Route::post('/managers/commit',[ManagerController::class,'commit']);
Route::post('/managers/update',[ManagerController::class,'update']);
Route::get('/managers/delete/{user_id}',[ManagerController::class,'delete']);

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
Route::get('/stations/edit/{station_id}',[StationsController::class,'edit']);
Route::post('/stations/update',[StationsController::class,'update']);
Route::get('/stations/delete/{station_id}',[StationsController::class,'delete']);
Route::get('/stations/discount/{station_id}',[DiscountController::class,'discount']);
Route::post('/stations/discount/update',[DiscountController::class,'discountCommit']);

Route::get('/inventory',[InventoryController::class,'index']);
Route::get('/inventory/create/{station_id}',[InventoryController::class,'create']);
Route::post('/inventory/confirm',[InventoryController::class,'confirm']);
Route::get('/inventory/check/{station_id}',[InventoryController::class,'check']);
Route::post('/inventory/commit',[InventoryController::class,'commit']);
Route::post('/inventory/replenishment',[InventoryController::class,'replenishment']);

Route::post('/config/point',[PointController::class,'index']);