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
        $check = Address::where('user_id',Auth()->user()->id)->count();
        if($check >= 3){
            return redirect()->back()->with('đã lưu 3 địa chỉ');
        }
        else{
            $address = Address::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'city' => $request->input('city'),
                'district' => $request->input('district'),
                'ward' => $request->input('ward'),
                'detailadress' => $request->input('detaileadress'),
                'data' => $request->input('detaileadress') . '--' . $request->input('ward') . '--' . $request->input('district') . '--' . $request->input('city'),
                'status' => 0,
                'user_id' => Auth()->user()->id,
            ]);
            return view('client.myaccount',compact('address'));
        }
    }
}
