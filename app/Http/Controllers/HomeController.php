<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Coupon;
use App\Models\Notification;
use App\Models\wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('layouts.client-layout',compact('notificationsRead','allNotifications','wishlists'));
    }

    public function checkCoupon(Request $request)
    {
        $coupon = $request->coupon;
        $total = $request->total;
        $now = Carbon::now()->toDateString();
        if($coupon){
           $getCoupon =  Coupon::where('status','active')->where('expired_at','>=',$now)->where('code', $coupon)->first();
           
            if( $getCoupon->type == 'fixed') {
                if($getCoupon->minbill > $total) {
                    return false;
                }
                $array = [
                    $value = $getCoupon->value,
                    $finalTotal = $total - $getCoupon->value,
                ];
                return $array;
            }
            if( $getCoupon->type == 'percent') {
                dd(2);
            }
            if( $getCoupon->type == 'all') {
                dd(2);
            }
            return false;
        }
        return false;
    }
}
