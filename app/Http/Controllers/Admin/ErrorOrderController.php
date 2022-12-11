<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RequestOrder;
use App\Models\VnpayTest;
use Illuminate\Http\Request;

class ErrorOrderController extends Controller
{
    public function index(){
        $errorOrder = RequestOrder::query()->with(['user','orderId'])->get();
        return view('admin.error-orders.list', compact('errorOrder'));
    }

    public function changeOrder($id) {
        $order = VnpayTest::find($id);
        $order->fill([
            'status_order' => 'shipping'
        ]);
        $order->save();
        $request_order = RequestOrder::where('id_order',$id)->first();
        $request_order->fill([
            'status' => 'success'
        ]);
        $request_order->save();
        return redirect()->back()->with('msg','Xác nhận đổi hàng cho khách thành công');
    }
}
