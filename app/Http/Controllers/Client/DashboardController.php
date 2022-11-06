<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use App\Models\Order;
use App\Http\Requests\AccountRequest;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Models\wishlist;
use App\Models\Product;
use App\Models\RequestOrder;
use App\Models\Vnpay;
use App\Models\VnpayTest;

class DashboardController extends Controller
{
    public function index() {
        $user_id = Auth()->user()->id ?? null;
        $bannerSlide = Banner::query()->where('status','=','active')->orderBy('created_at', 'DESC')->limit(5)->get();
        return view('client.index',compact('bannerSlide'));
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
    public function orders(Request $request)
    {
        $user = $request->user();
        $user->id;
        $orders = VnpayTest::where('user_id','=',$user->id)->get();
        return view('client.order',compact('orders'));
    }
    public function detailorder($id)
    {
        $detailorder = VnpayTest::where('id', '=', $id)->first();
        $cart = $detailorder->cart;
        $test = json_decode($cart, true);
        return view('client.detail-order',compact('detailorder', 'test'));
    }

    public function cancelOrder($id){
        $vnpay = VnpayTest::find($id);
        $vnpay->fill([
            'status_order' => 'cancel'
        ]);
        $vnpay->save();
        return redirect()->back()->with('msg','Hủy đơn hàng thành công!');
    }

    public function errorOrderForm($id){
        $order = VnpayTest::find($id);
        $cart = $order->cart;
        $product = json_decode($cart,true);
        return view('client.error', compact('order','product'));
    }

    public function errorOrderSave($id, Request $request){
        $user = $request->user();
        $user->id;
        $request_order = new RequestOrder();
        $request_order->fill([
            'id_user' => $user->id,
            'id_order' => $id,
            'name_product'  => $request->name_product,
            'note'  => $request->note,
            'type'  => 'C',
        ]);
        if ($request->hasFile('image')) {
            $newFileName = uniqid() . '-' . $request->image->getClientOriginalName();
            $path = $request->image->storeAs('public/uploads/products', $newFileName);
            $request_order->image = str_replace('public/', '', $path);
        }
        $request_order->save();
        return redirect()->route('order.detail',['id' => $id])->with('msg','Báo lỗi thành công');
    }

    public function wishlist()
    {
        $wishlists = Wishlist::where('user_id', '=', Auth::user()->id)->get();
        $wishlists_id = [];
        foreach ($wishlists as $key => $value) {
            array_push($wishlists_id, $value->product_id);
        }
        $products = Product::whereIn('id',$wishlists_id)->get();
        return view('client.wishlist',compact('wishlists','products'));
    }
    public function postWishlist($id)
    {
        $product = Product::where('id',$id)->first();
        $wishlists = Wishlist::create([
            'product_id' => $product->id,
            'user_id' => Auth::user()->id,
            'price' => $product->price,
        ]);
        return redirect()->back();
    }
    public function updateNotification()
    {
        $allNotifications = Notification::where('user_id',Auth::user()->id)->update(['read_at'=>1]);
        return $allNotifications;
    }
}
