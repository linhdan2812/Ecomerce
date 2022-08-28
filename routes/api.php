<?php

use App\Http\Controllers\Client\DashboardController;
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
Route::get('setDefaut/{id}',[Location::class,'setDefaut'])->name('setDefaut');
