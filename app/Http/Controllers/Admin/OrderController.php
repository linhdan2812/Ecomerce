<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\RequestOrder;
use App\Models\Shipping;
use App\Models\User;
use App\Models\Vnpay;
use App\Models\VnpayTest;
use Illuminate\Http\Request;

use function React\Promise\all;

class OrderController extends Controller
{
    public function index()
    {
        $orders = VnpayTest::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function detail($id)
    {
        $detailorder = VnpayTest::where('id', $id)->first();
        $request_order = RequestOrder::where('id_order',$id)->first();
        $cart = $detailorder->cart;
        $test = json_decode($cart, true);
        return view('admin.orders.detail', compact('detailorder','test','request_order'));
    }

    public function editOrder($id){
        $order = VnpayTest::find($id);
        dd($order);
    }

    public function changestatus(Request $request)
    {
        $order = Order::where('id', $request->id)
            ->update(['status' => $request->status == 1 ? 'Đã hủy' : 'Đang vận chuyển']);
        return $order;
    }

    public function stateChange($id)
    {
        $order = VnpayTest::find($id);
        if ($order->status_order == 'pending') {
            $order->fill([
                'status_order' => 'shipping'
            ]);
            $order->save();
            return redirect()->back()->with('msg','Đã xác nhận để giao hàng');
        }

        if ($order->status_order == 'shipping') {
            $order->fill([
                'status_order' => 'success'
            ]);
            $order->save();
            return redirect()->back()->with('msg','Đã giao hàng thành công');
        }
    }
}
