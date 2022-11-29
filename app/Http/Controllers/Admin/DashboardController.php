<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {

        $users = Order::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->where('status','LIKE', 'Giao hàng thành công')
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count', 'month_name');
        $labels = $users->keys();
        $data = $users->values();

        $money = Order::select(DB::raw("SUM(total_amount) as totalAmount"), DB::raw("MONTHNAME(created_at) as monthName"))
                    ->where('status','LIKE', 'Giao hàng thành công')
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('totalAmount', 'monthName');
        $moneyLabels = $money->keys();
        $moneyData = $money->values();

        return view('admin.index', compact('labels', 'data','moneyLabels','moneyData'));
    }
}
