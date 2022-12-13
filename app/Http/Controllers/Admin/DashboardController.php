<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        //  dự liệu bán hàng theo trong năm
        $users = Order::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->where('status', 'LIKE', 'Giao hàng thành công')
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count', 'month_name');
        $labels = $users->keys();
        $data = $users->values();

        // dự liệu bán hàng theo tháng hiện tại
        $users2 = Order::select(DB::raw("COUNT(*) as count"), DB::raw("DAY(created_at) as day"))
            ->where('status', 'LIKE', 'Giao hàng thành công')
            ->whereMonth('created_at', Carbon::now()->month)
            ->groupBy(DB::raw("DAY(created_at)"))
            ->pluck('count', 'day');
        $labels2 = $users2->keys();
        $data2 = $users2->values();

        // Doanh thu bán hàng theo năm
        $money = Order::select(DB::raw("SUM(total_amount) as totalAmount"), DB::raw("MONTHNAME(created_at) as monthName"))
            ->where('status', 'LIKE', 'Giao hàng thành công')
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('totalAmount', 'monthName');
        $moneyLabels = $money->keys();
        $moneyData = $money->values();

        // Doanh thu bán hàng theo tháng
        $money2 = Order::select(DB::raw("SUM(total_amount) as totalAmount"), DB::raw("DAY(created_at) as monthName"))
            ->where('status', 'LIKE', 'Giao hàng thành công')
            ->whereMonth('created_at', Carbon::now()->month)
            ->groupBy(DB::raw("DAY(created_at)"))
            ->pluck('totalAmount', 'monthName');
        $moneyLabels2 = $money2->keys();
        $moneyData2 = $money2->values();

        // tỷ trọng bán hàng
        return view('admin.index', compact('labels', 'data', 'labels2', 'data2', 'moneyLabels', 'moneyData', 'moneyLabels2', 'moneyData2'));
    }
}
