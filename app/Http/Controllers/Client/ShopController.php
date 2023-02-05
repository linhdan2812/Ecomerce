<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Address;
use App\Models\Comment;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ShopController extends Controller
{
    public function __construct() {
        $this->middleware('auth:sanctum');
    }
    public function index(Request $request)
    {
        $request = $request->all();
        $page = $request['page'] ?? 18;
        $sort = $request['sort'] ?? 'title';
        $perPage = $request['perPage'] ?? 1;
        $page = $request['page'] ?? '';
        $keyword = $request['title'] ?? '';
        $sort_by = $request['sort_by'] ?? 'asc';
        $products = Product::where('title', 'LIKE', '%'. $keyword. '%')->orderBy($sort , $sort_by)
        // ->take($page)->limit((int)$perPage * (int)$page)
        ->simplePaginate(
            $perPage = 18, $columns = ['*'], $pageName = 'Shop'
        );
        return view('client.shop.list', compact('products'));
    }
    // public function index()
    // {
    //     $products = Product::all();
    //     return view('products', compact('products'));
    // }

    public function removeToCart($id){
        session()->remove($id);
        return redirect()->back()->with('Xóa sản phẩm thành công');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
        $time_now = Carbon::now();
        
        $coupons = Coupon::where('expired_at','>',$time_now)->get();
        
        return view('cart',compact('coupons'));
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
                "image" => $product->photo,
                "discount" => $product->discount,
                "color" => '',
                "size" => '',
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Thêm sản phẩm vào giỏ hàng thành công   !');
    }
    public function addToCartPost(Request $request)
    {
        if ($request->stock <= 0 || !is_int((int)$request->stock)){
            return redirect()->back()->withErrors(['msg' => 'Số lượng sản phẩm phải là số nguyên dương']);
            // ->with('danger', 'Số lượng sản phẩm vượt quá sản phẩm hiện có');
        }

        if (!$request->color || !$request->size){
            return redirect()->back()->withErrors(['msg' => 'Hãy chọn size và màu sắc']);
        }
        
        $product = Product::findOrFail($request->id);
        $cart = session()->get('cart', []);
        $arrayId = [];
        foreach ($cart as $item){
            $arrayId[] = $item['id'];
        }
        if (!in_array($request->id, array_unique($arrayId))){
            session()->put('cart', [
                "id" => $request->id,
                "name" => $product->title,
                "quantity" => $request->stock,
                "price" => $product->price,
                "image" => $product->photo,
                "discount" => $product->discount,
                "color" => $request->color,
                "size" => $request->size,
            ]);
        }elseif (in_array($request->id, array_unique($arrayId))){
            foreach ($cart as $item){
                if ($item['id'] == $request->id){
                    if ($item['color'] == $request->color && $item['size'] == $request->size){
                        $newStock =  $item['quantity'] + $request->stock;
                        session()->pull('cart', $item);
                        session()->put('cart', [
                            "id" => $request->id,
                            "name" => $product->title,
                            "quantity" => $newStock,
                            "price" => $product->price,
                            "image" => $product->photo,
                            "discount" => $product->discount,
                            "color" => $request->color,
                            "size" => $request->size,
                        ]);
                    }else{
                        session()->put('cart', [
                            "id" => $request->id,
                            "name" => $product->title,
                            "quantity" => $request->stock,
                            "price" => $product->price,
                            "image" => $product->photo,
                            "discount" => $product->discount,
                            "color" => $request->color,
                            "size" => $request->size,
                        ]);
                    }
                }
            }
        }

        // session()->flush();
        return redirect()->back()->with('success', 'Thêm sản phẩm vào giỏ hàng thành công !');
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
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|unique:posts|max:255',
        ]);
        foreach ($request->input('quantity') as $k => $value) {
            foreach ($request->input('stock') as $key => $value) {
                if($request->input('quantity')[$k] >$value){
                    toastr()->info('Số lượng đang lớn hơn số hàng chúng tôi có!!');
                    return redirect()->back();
                }
            }
        }
        $id = $request->input('id');
        $user_id = Auth()->user()->id;
        $quantities = [];
        $names = [];
        $prices = [];
        $quantities = $request->input('quantity');
        $names = $request->input('name');
        $subs = $request->input('sub');
        $newTotal = $request->input('newTotal');
        $coupon = $request->input('coupon');
        $total = $request->input('newTotal') ? $request->input('newTotal') : $request->input('total');
        $user = User::where('id',$user_id)->first();
        $address = Address::where('user_id',$user_id)->where('status',1)->first();
        return view('client.shop.checkout',compact('id','user','quantities','names','subs','total','coupon','address','newTotal'));
    }
    // CheckoutRequest $request phải thay cho request
        // Thêm thông tin truyền ra ngoài
    public function postcheckout(Request $request, Response $response)
    {
        $coupons = Coupon::all();
        if(array_diff((array) $request->input('coupon'),(array) $coupons)){
            $coupon = Coupon::where('code',$request->input('coupon'))->first();
        }
        if(!empty($coupon)){
            if($coupon->type == 'fixed'){
                if ($coupon->minbill <= $request->input('total')){
                    $subtotal = $request->input('total') - $coupon->value;
                }else {
                    $subtotal = $request->input('total');
                }

            }elseif($coupon->type == 'percent'){

                $subtotal = $request->input('total') * $coupon->value / 100;

            }
            else{

                $subtotal = $request->input('total') - $coupon->value;

            }
        }else{

            $subtotal = $request->input('total');

        }
        $inputs = [
            'order_number' => time(),
            'user_id' => Auth()->user()->id,
            'sub_total' => $subtotal,
            // 'shipping_id' => 1,
            'coupon' => $request->input('coupon') ?? null,
            'country' => 1,
            'total_amount'=> $request->input('total'),
            'quantity' => $request->input('quantity'),
            'payment_method' => 1,
            'payment_status'=> 1,
            'status' => 1,
            'data' => session('cart'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'city' => $request->input('city'),
            'district' => $request->input('district'),
            'ward' => $request->input('ward'),
            'addressdetail' => $request->input('addressdetail')
        ];
        $orders = Order::create($inputs);
        // Sử lý QrCode
        QrCode::size(250)->generate('ItSolutionStuff.com');
        Session::flash('success');
        session('cart')->flush();
        return redirect('/');
        // ->setMessage('Thành Công');
    }
    public function detailProduct($id)
    {
        $productDetail = Product::query()->with('brand','category')->where('id', $id)->first();
        $listSameProducts = Product::where('category_id', $productDetail->category_id)->take(8)->get();
        $listComments = Comment::where('product_id', $id)->where('status', 1)->get();
        return view('client.detail-product',compact('productDetail','listSameProducts','listComments'));
    }
    public function postComment(Request $request)
    {
        $comment = Comment::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->input('product_id'),
            'content' => $request->input('reviewComment'),
        ]);
        Session::flash('message','Bình luận thành công! hãy chờ quản trị viên xác nhận !!!');
        return redirect()->back();
    }
}
