<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Response;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('client.shop.list', compact('products'));
    }
    // public function index()
    // {
    //     $products = Product::all();
    //     return view('products', compact('products'));
    // }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
        return view('cart');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->title,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->photo
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Thêm sản phẩm vào giỏ hàng thành công   !');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
    public function getcheckout(Request $request)
    {
        // CheckoutRequest $request phải thay cho request
        // Thêm thông tin truyền ra ngoài
        $user_id = Auth()->user()->id;
        $quantities = [];
        $names = [];
        $prices = [];
        $quantities = $request->input('quantity');
        $names = $request->input('name');
        $subs = $request->input('sub');
        $total = $request->input('total');
        $user = User::where('id',$user_id)->first();
        $address = Address::where('user_id',$user_id)->where('status',1)->first();
        return view('client.shop.checkout',compact('user','quantities','names','subs','total','address'));
    }
    // CheckoutRequest $request phải thay cho request
        // Thêm thông tin truyền ra ngoài
    public function postcheckout(Request $request, Response $response)
    {
        $orders = Order::create([
            'order_number' => time(),
            'user_id' => Auth()->user()->id,
            'sub_total' => $request->input('total'),
            // 'shipping_id' => 1,
            'coupon' => 1,
            'country' => 1,
            'total_amount'=> $request->input('total'),
            'quantity' => 1,
            'payment_method' => 1,
            'payment_status'=> 1,
            'status' => 1,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'city' => $request->input('city'),
            'district' => $request->input('district'),
            'ward' => $request->input('ward'),
            'addressdetail' => $request->input('addressdetail')
        ]);
        return $response;
        // ->setMessage('Thành Công');
    }
}
