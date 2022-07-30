<?php

use App\Http\Controllers\Admin\BrandController;
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

        Route::get('add',[ProductController::class,'add'])->name('admin.product.add');
        Route::post('add',[ProductController::class,'saveAdd']);
    });

    //Brand
    Route::prefix('brand/')->group(function(){

        Route::get('list',[BrandController::class,'list'])->name('admin.brand.list');

        Route::get('add',[BrandController::class,'add'])->name('admin.brand.add');
        Route::post('add',[BrandController::class,'saveAdd']);

        Route::get('edit/{id}',[BrandController::class,'edit'])->name('admin.brand.edit');
        Route::post('edit/{id}',[BrandController::class,'saveEdit']);

        Route::get('delete/{id}',[BrandController::class,'delete'])->name('admin.brand.delete');
    });
});