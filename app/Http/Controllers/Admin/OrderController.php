<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        $ship = Shipping::all();
        $coupons = Coupon::all();
        $users = User::all();
        return view('admin.orders.index',compact('orders','ship','coupons','users'));
    }
}
