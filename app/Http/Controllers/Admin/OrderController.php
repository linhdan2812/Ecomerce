<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\User;
use App\Models\Vnpay;
use Illuminate\Http\Request;

use function React\Promise\all;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('admin.orders.index',compact('orders'));
    }

    public function detail($order_number){
        $order = Order::where('order_number',$order_number)->first();
        return view('admin.orders.detail',compact('order'));
    }
    public function changestatus(Request $request){
        $order = Order::where('id', $request->id)
                ->update(['status' => $request->status == 1 ? 'Đã hủy' : 'Đang vận chuyển']);
        return $order;
    }
}
