<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\DashboardController;
// use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Client\DashboardController as ClientDashboardController;
use App\Http\Controllers\LoginController;
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
Route::get('/', [ClientDashboardController::class, 'index'])->name('client.home');
//Client
Route::prefix('/')->group(function() {

});
Route::get('/', [ProductController::class, 'index']);  

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
    Route::prefix('product/')->group(function () {

        Route::get('list', [ProductController::class, 'list'])->name('admin.product.list');

        Route::get('add', [ProductController::class, 'add'])->name('admin.product.add');
        Route::post('add', [ProductController::class, 'saveAdd']);

        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('edit/{id}', [ProductController::class, 'saveEdit']);

        Route::get('delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delte');
    });
    
    //Brand
    Route::prefix('brand/')->group(function () {

        Route::get('list', [BrandController::class, 'list'])->name('admin.brand.list');

        Route::get('add', [BrandController::class, 'add'])->name('admin.brand.add');
        Route::post('add', [BrandController::class, 'saveAdd']);

        Route::get('edit/{id}', [BrandController::class, 'edit'])->name('admin.brand.edit');
        Route::post('edit/{id}', [BrandController::class, 'saveEdit']);

        Route::get('delete/{id}', [BrandController::class, 'delete'])->name('admin.brand.delete');
    });

    //Category
    Route::prefix('category/')->group(function () {
        Route::get('list', [CategoryController::class, 'list'])->name('admin.category.list');

        Route::get('add', [CategoryController::class, 'addForm'])->name('admin.category.add');
        Route::post('add', [CategoryController::class, 'saveAdd']);

        Route::get('update/{id}', [CategoryController::class, 'editForm'])->name('admin.category.update');
        Route::post('update/{id}', [CategoryController::class, 'saveEdit']);

        Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    });
});

//Đăng nhập
Route::get('login',[LoginController::class,'loginForm'])->name('login');

//Đăng nhập google
Route::get('/login/google',[LoginController::class,'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback',[LoginController::class,'handleGoogleCallback']);

//Đăng xuất
Route::get('/logout',[LoginController::class,'logout'])->name('logout');


//403
Route::get('403',function(){
    return view('403');
});
