<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ErrorOrderController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Client\DashboardController as ClientDashboardController;
use App\Http\Controllers\Client\ShopController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ChatsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VnpayController;
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
Route::get('/', [ClientDashboardController::class, 'index'])->name('home');

//Client
Route::prefix('/')->middleware('auth')->group(function () {

    //Shop
    Route::get('shop', [ShopController::class, 'index'])->name('shop');
    Route::get('cart', [ShopController::class, 'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('add.to.cart');
    Route::patch('update-cart', [ShopController::class, 'update'])->name('update.cart');
    Route::delete('remove-from-cart', [ShopController::class, 'remove'])->name('remove.from.cart');
    Route::get('getcheckout', [ShopController::class, 'getcheckout'])->name('getcheckout');
    Route::post('postcheckout', [ShopController::class, 'postcheckout'])->name('postcheckout');
    Route::get('myaccount', [ClientDashboardController::class, 'myaccount'])->name('myaccount');
    Route::get('address', [ClientDashboardController::class, 'address'])->name('address');
    Route::post('postMyaccount', [ClientDashboardController::class, 'postMyaccount'])->name('postMyaccount');
    Route::post('postAddress', [ClientDashboardController::class, 'postAddress'])->name('postAddress');
    Route::get('orders', [ClientDashboardController::class, 'orders'])->name('orders');
    Route::get('detailorder/{id}', [ClientDashboardController::class, 'detailorder'])->name('order.detail');
    Route::get('wishlist', [ClientDashboardController::class, 'wishlist'])->name('wishlist');
    Route::get('postWishlist/{id}', [ClientDashboardController::class, 'postWishlist'])->name('postWishlist');
    Route::get('detailProduct/{id}', [ShopController::class, 'detailProduct'])->name('detailProduct');
    Route::post('postComment', [ShopController::class, 'postComment'])->name('postComment');
    Route::get('updateNotification', [ClientDashboardController::class, 'updateNotification'])->name('updateNotification');

    //Hủy đơn hàng
    Route::get('cancel-order/{id}', [ClientDashboardController::class, 'cancelOrder'])->name('cancel.order');

    //Báo lỗi, báo hỏng
    Route::get('error-order/{id}', [ClientDashboardController::class, 'errorOrderForm'])->name('error.order');
    Route::post('error-order-save/{id}', [ClientDashboardController::class, 'errorOrderSave'])->name('error.order.save');

    // Route::get('/chat', [ChatsController::class,'index']);
    // Route::get('messages', [ChatsController::class,'fetchMessages']);
    // Route::post('messages', [ChatsController::class,'sendMessage']);

    //Thanh toán vnpay
    Route::get('thanh-toan', [VnpayController::class, 'index'])->name('thanhtoan');
    Route::post('thanh-toan', [VnpayController::class, 'create']);
    Route::get('vnpay-return', [VnpayController::class, 'return']);
    Route::get('send-mail', [VnpayController::class, 'sendMail'])->name('send-mail');
    Route::get('send-mail-change-status', [OrderController::class, 'sendMail'])->name('send-mail-change-status');
});

Route::get('checkCoupon', [HomeController::class, 'checkCoupon'])->name('checkCoupon');
//Admin
Route::prefix('admin/')->middleware('authadmin')->group(function () {

    //Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    //Category
    Route::prefix('category/')->group(function () {
        Route::get('list', [CategoryController::class, 'list'])->name('admin.category.list');

        Route::get('add', [CategoryController::class, 'addForm'])->name('admin.category.add');
        Route::post('add', [CategoryController::class, 'saveAdd']);

        Route::get('update/{id}', [CategoryController::class, 'editForm'])->name('admin.category.update');
        Route::post('update/{id}', [CategoryController::class, 'saveEdit']);

        Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    });

    //Product
    Route::prefix('product/')->group(function () {

        Route::get('list', [ProductController::class, 'list'])->name('admin.product.list');
        Route::get('export/', [ProductController::class, 'export'])->name('product.export');;
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

    //Orders
    Route::prefix('orders')->group(function () {

        Route::get('/', [OrderController::class, 'index'])->name('admin.order.list');

        Route::get('update-order/{id}', [OrderController::class, 'updateOrder'])->name('admin.order.update');

        //Chi tiết đơn hàng
        Route::get('/{id}', [OrderController::class, 'detail'])->name('admin.order.detail');

        //Chỉnh sửa đơn hàng
        Route::get('edit-order/{id}', [OrderController::class, 'editOrder'])->name('admin.order.edit');

        //Chuyển trạng thái đơn hàng
        Route::get('state-change/{id}', [OrderController::class, 'stateChange'])->name('admin.order.stateChange');
    });

    //Báo lỗi
    Route::prefix('error')->group(function () {
        Route::get('/', [ErrorOrderController::class, 'index'])->name('admin.error.order.list');

        //Xác nhận đổi hàng cho khách
        Route::get('change-order/{id}', [ErrorOrderController::class, 'changeOrder'])->name('change.order');
    });

    // Coupons
    Route::prefix('coupons')->group(function () {

        Route::get('list', [CouponController::class, 'list'])->name('admin.coupon.list');

        Route::get('add', [CouponController::class, 'addForm'])->name('admin.coupon.add');
        Route::post('add', [CouponController::class, 'saveAdd']);

        Route::get('edit/{id}', [CouponController::class, 'editForm'])->name('admin.coupon.update');
        Route::post('edit/{id}', [CouponController::class, 'saveEdit']);

        Route::get('delete/{id}', [CouponController::class, 'delete'])->name('admin.coupon.delete');
    });

    Route::prefix('blogs')->group(function () {
        Route::get('list', [BlogController::class, 'index'])->name('admin.blog.list');

        Route::get('add', [BlogController::class, 'add'])->name('admin.blog.add');
        Route::post('add', [BlogController::class, 'saveAdd']);

        Route::get('edit/{id}', [BlogController::class, 'edit'])->name('admin.blog.edit');
        Route::post('edit/{id}', [BlogController::class, 'saveEdit']);

        Route::get('delete/{id}', [BlogController::class, 'delete'])->name('admin.blog.delete');
    });
});

//Đăng nhập
Route::get('login', [LoginController::class, 'loginForm'])->name('login');

//Đăng nhập google
Route::get('/login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback']);

//Đăng xuất
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


//403
Route::get('403', function () {
    return view('403');
});
