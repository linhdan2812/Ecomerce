<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Client\DashboardController as ClientDashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[ClientDashboardController::class,'index'])->name('client.home');
//Client
Route::prefix('/')->group(function() {
    
});

Route::prefix('admin/')->group(function() {
    Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard');

    //Product
    Route::prefix('product/')->group(function() {
        Route::get('list',[ProductController::class,'list'])->name('admin.product.list');
    });
});