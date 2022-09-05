<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\User;
use Illuminate\Http\Request;

use function React\Promise\all;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        $orders->load('shipping','coupon','user');
        return view('admin.orders.index',compact('orders'));

        $user = Order::find(1)->user();
        dd($user);
    }
}
