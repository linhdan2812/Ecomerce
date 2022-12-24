<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ChangeOrderStatusMail;
use App\Mail\OrderMail;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\RequestOrder;
use App\Models\Shipping;
use App\Models\User;
use App\Models\Vnpay;
use App\Models\VnpayTest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use function React\Promise\all;

class OrderController extends Controller
{
    // public function index()
    // {
    //     $orders = VnpayTest::all();
    //     return view('admin.orders.index', compact('orders'));
    // }

    public function index(Request $request)
    {
        $orderSearch = VnpayTest::query();
        if($request->searchStatus == 'all' && !$request->searchName){
            $orders = $orderSearch->get();
        }else{
            if ($request->has('searchName')) {
                $orderSearch->where('vnp_TxnRef', 'LIKE', '%' . $request->searchName . '%');
            }

            if ($request->has('searchStatus') && $request->searchStatus != 'all') {
                $orderSearch->where('status_order', $request->searchStatus);
            }
            $orders = $orderSearch->get();
        }
        return view('admin.orders.index', compact('orders'));
    }

    public function detail($id)
    {
        $detailorder = VnpayTest::where('id', $id)->first();
        $request_order = RequestOrder::where('id_order', $id)->first();
        $cart = $detailorder->cart;
        $test = json_decode($cart, true);
        return view('admin.orders.detail', compact('detailorder', 'test', 'request_order'));
    }

    public function editOrder($id)
    {
        $order = VnpayTest::find($id);
    }

    public function updateOrder(Request $request)
    {
        // $order = VnpayTest::find($request->id);
        $order = VnpayTest::where('id', $request->id)
            ->update(['status_order' => $request->input('value')]);
        return redirect('/admin/orders');
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
        $msg = '';
        $status = '';
        if ($order->status_order == 'pending') {
            $status = 'shipping';
            $msg = 'Đã xác nhận để giao hàng';
        }else if($order->status_order == 'shipping') {
            $status = 'success';
            $msg = 'Đã giao hàng thành công';
        }
        $order->status_order = $status;
        $order->save();
        $this->sendMail($order);
        return redirect()->back()->with('msg', $msg);
    }

    public function sendMail($order){
        $user = Auth::user();
        if ($order->status_order == 'shipping'){
            $message = "Đơn hàng của bạn đang được vận chuyển";
        }else{
            $message = "Đơn hàng của bạn giao nhận thành công";
        }
        $detailProducts = array_values(json_decode($order->cart, true));
        Mail::to($user->email)->send(new ChangeOrderStatusMail($user, $detailProducts, $message));
    }
}
