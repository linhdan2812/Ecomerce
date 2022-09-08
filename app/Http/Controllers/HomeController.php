<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Notification;
use App\Models\wishlist;
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
        $user_id = Auth()->user()->id ?? null;
        $notificationsRead = Notification::where('user_id',$user_id)->where('read_at',0)->get();
        $allNotifications = Notification::where('user_id',$user_id)->get();
        $wishlists = wishlist::where('user_id',$user_id)->get();
        return view('layouts.client-layout',compact('notificationsRead','allNotifications','wishlists'));
    }
}
