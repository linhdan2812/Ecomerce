<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Client\DashboardController as ClientDashboardController;
use App\Http\Controllers\Client\ShopController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ChatsController;
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
//Trang chủ
Route::get('/', [ClientDashboardController::class, 'index'])->name('client.home');

//Client
Route::prefix('/')->middleware('auth')->group(function() {

    //Shop
    Route::get('shop',[ShopController::class,'index'])->name('shop');
    Route::get('cart', [ShopController::class, 'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('add.to.cart');
    Route::patch('update-cart', [ShopController::class, 'update'])->name('update.cart');
    Route::delete('remove-from-cart', [ShopController::class, 'remove'])->name('remove.from.cart');
    Route::get('getcheckout', [ShopController::class, 'getcheckout'])->name('getcheckout');
    Route::post('postcheckout', [ShopController::class, 'postcheckout'])->name('postcheckout');
    Route::get('myaccount',[ClientDashboardController::class, 'myaccount'])->name('myaccount');
    Route::get('address',[ClientDashboardController::class, 'address'])->name('address');
    Route::post('postMyaccount',[ClientDashboardController::class, 'postMyaccount'])->name('postMyaccount');
    Route::post('postAddress',[ClientDashboardController::class, 'postAddress'])->name('postAddress');
    Route::get('orders',[ClientDashboardController::class, 'orders'])->name('orders');
    // Route::get('/chat', [ChatsController::class,'index']);
    // Route::get('messages', [ChatsController::class,'fetchMessages']);
    // Route::post('messages', [ChatsController::class,'sendMessage']);
});

//Admin
Route::prefix('admin/')->middleware('authadmin')->group(function() {

    //Dashboard
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
    //Banners
    Route::prefix('banners')->group(function () {

        Route::get('list', [BannerController::class, 'list'])->name('admin.banner.list');

        Route::get('add', [BannerController::class, 'add'])->name('admin.banner.add');
        Route::post('add', [BannerController::class, 'saveAdd']);

        Route::get('edit/{id}', [BannerController::class, 'edit'])->name('admin.banner.edit');
        Route::post('edit/{id}', [BannerController::class, 'saveEdit']);

        Route::get('delete/{id}', [BannerController::class, 'delete'])->name('admin.banner.delete');
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
