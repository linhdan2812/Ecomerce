<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
// use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Client\DashboardController as ClientDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


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
Route::get('/', [ProductController::class, 'index']);  
Route::get('cart', [ProductController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');

Route::prefix('admin/')->group(function() {
    Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    //Category
    Route::prefix('category/')->group(function() {
        Route::get('list',[CategoryController::class,'list'])->name('admin.category.list');
        Route::get('add',[CategoryController::class,'addForm'])->name('admin.category.add');
        Route::post('add',[CategoryController::class,'saveAdd']);
        Route::get('update/{id}',[CategoryController::class,'editForm'])->name('admin.category.update');
        Route::post('update/{id}',[CategoryController::class,'saveEdit']);
        Route::get('delete/{id}',[CategoryController::class,'delete'])->name('admin.category.delete');
    });
    //Product
    Route::prefix('product/')->group(function() {
        Route::get('list',[ProductController::class,'list'])->name('admin.product.list');
    });
});
