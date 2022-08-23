<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use App\Http\Requests\AccountRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class DashboardController extends Controller
{
    public function index() {
        return view('client.index');
    }
    public function myaccount() {

        $user = User::where('id',Auth()->user()->id)->first();
        return view('client.myaccount',compact('user'));
    }
    public function address() {
        $address = Address::where('user_id',Auth()->user()->id)->get();
        return view('client.address',compact('address'));
    }
    public function postMyaccount(Request $request , Response $response) {
        $infomation = User::where('id',Auth()->user()->id)
        ->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'birthday' => $request->input('birthday'),
            'gender' => $request->input('gender'),
        ]);
        return redirect()->back();
        // ->setError('Lỗi')
        // ->setMessage('Thành công');
    }
    public function postAddress(Request $request) {
        // $orders = Order::create([
        //     'order_number' => time(),
        //     'user_id' => Auth()->user()->id,
        //     'sub_total' => $request->input('total'),
        //     'shipping_id' => 1,
        //     'coupon' => 1,
        //     'total_amount'=> $request->input('total'),
        //     'quantity' => 1,
        //     'payment_method' => 1,
        //     'payment_status'=> 1,
        //     'status' => 1,
        //     'name' => $request->input('name'),
        //     'email' => $request->input('email'),
        //     'phone' => $request->input('phone'),
        //     'address1' => $request->input('address1'),
        //     'address2' => $request->input('address2'),
        // ]);
        return view('client.myaccount',compact('user'));
    }
}
