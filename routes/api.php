<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Client\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Location;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('getCity',[Location::class,'getCity'])->name('getCity');
Route::get('getDistrict',[Location::class,'getDistrict'])->name('getDistrict');
Route::get('getWard',[Location::class,'getWard'])->name('getWard');
Route::get('deleteAddres/{id}',[Location::class,'deleteAddres'])->name('deleteAddres');
Route::get('setDefaut/{id}',[Location   ::class,'setDefaut'])->name('setDefaut');
Route::get('setCancelOrder',[Location::class,'setCancelOrder'])->name('setCancelOrder');
Route::post('changestatus',[OrderController::class,'changestatus'])->name('changestatus');
Route::post('checkCoupon',[HomeController::class,'checkCoupon'])->name('checkCoupon');
Route::get('get-dashboard', [AdminDashboardController::class, 'changeIndex'])->name('changeIndex');
Route::get('firstChart', [AdminDashboardController::class, 'firstChart'])->name('firstChart');
Route::get('listUserSoft', [AdminDashboardController::class, 'listUserSoft'])->name('listUserSoft');
Route::get('listProductSoft', [AdminDashboardController::class, 'listProductSoft'])->name('listProductSoft');
Route::get('listProductOver', [AdminDashboardController::class, 'listProductOver'])->name('listProductOver');