<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\VnpayTest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class DashboardController extends Controller
{
    public function index()
    {
        //  dự liệu bán hàng theo trong năm
        $users = VnpayTest::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->where('status_order', 'LIKE', 'success')
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count', 'month_name');
        $labels = $users->keys();
        $data = $users->values();

        // dự liệu bán hàng theo tháng hiện tại
        $users2 = VnpayTest::select(DB::raw("COUNT(*) as count"), DB::raw("DAY(created_at) as day"))
            ->where('status_order', 'LIKE', 'success')
            ->whereMonth('created_at', Carbon::now()->month)
            ->groupBy(DB::raw("DAY(created_at)"))
            ->pluck('count', 'day');
        $labels2 = $users2->keys();
        $data2 = $users2->values();

        // Doanh thu bán hàng theo năm
        $money = VnpayTest::select(DB::raw("SUM(vnp_Amount) as totalAmount"), DB::raw("MONTHNAME(created_at) as monthName"))
            ->where('status_order', 'LIKE', 'success')
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('totalAmount', 'monthName');
        $moneyLabels = $money->keys();
        $moneyData = $money->values();

        // Doanh thu bán hàng theo tháng
        $money2 = VnpayTest::select(DB::raw("SUM(vnp_Amount) as totalAmount"), DB::raw("DAY(created_at) as monthName"))
            ->where('status_order', 'LIKE', 'success')
            ->whereMonth('created_at', Carbon::now()->month)
            ->groupBy(DB::raw("DAY(created_at)"))
            ->pluck('totalAmount', 'monthName');
        $moneyLabels2 = $money2->keys();
        $moneyData2 = $money2->values();

        // tỷ trọng bán hàng
        return view('admin.index', compact('labels', 'data', 'labels2', 'data2', 'moneyLabels', 'moneyData', 'moneyLabels2', 'moneyData2'));
    }
    public function firstChart(Request $request, Response $response)
    {
        $request = $request->all();
        $page = $request['page'] ?? 18;
        $sort = $request['sort'] ?? 'title';
        $perPage = $request['perPage'] ?? 1;
        $page = $request['page'] ?? '';
        $keyword = $request['searchName'] ?? '';
        $sort_by = $request['sort_by'] ?? 'desc';
        $Orders = VnpayTest::select('vnp_Amount',DB::raw("DAY(created_at) as date"),'cart', DB::raw("YEAR(created_at) as year"),DB::raw("MONTH(created_at) as month"))
        ->where('status_order', 'LIKE', 'success')
        ->simplePaginate(
            $perPage = 18, $columns = ['*'], $pageName = 'Count'
        );
        if (!empty($request['from'])) {
            $Orders = $Orders->where('vnpay_tests.created_at', '>=', date('Y-m-d', strtotime($request['from'])));
        }
        if (!empty($request['to'])) {
            $Orders = $Orders->where('vnpay_tests.created_at', '<=', date('Y-m-d', strtotime($request['to'])));
        }
        return $Orders;
    }

    public function listUserSoft(Request $request, Response $response)
    {
        $request = $request->all();
        $page = $request['page'] ?? 18;
        $sort = $request['sort'] ?? 'title';
        $perPage = $request['perPage'] ?? 1;
        $page = $request['page'] ?? '';
        $keyword = $request['searchName'] ?? '';
        $sort_by = $request['sort_by'] ?? 'desc';
        $users = VnpayTest::select(\DB::raw("COUNT(vnpay_tests.user_id) as count"),'users.name')
        ->join('users','users.id','vnpay_tests.user_id')
        ->where('vnpay_tests.status_order', 'LIKE', 'success')
        ->groupBy('users.name')
        ->orderBy(\DB::raw("COUNT(vnpay_tests.user_id)"),$sort_by)
        ->simplePaginate(
            $perPage = 18, $columns = ['*'], $pageName = 'Count'
        );
        if (!empty($request['from'])) {
            $users = $users->where('vnpay_tests.created_at', '>=', date('Y-m-d', strtotime($request['from'])));
        }
        if (!empty($request['to'])) {
            $users = $users->where('vnpay_tests.created_at', '<=', date('Y-m-d', strtotime($request['to'])));
        }
        return $users;
    }
    public function listProductSoft(Request $request, Response $response)
    {
        $request = $request->all();
        $page = $request['page'] ?? 18;
        $sort = $request['sort'] ?? 'title';
        $perPage = $request['perPage'] ?? 1;
        $page = $request['page'] ?? '';
        $keyword = $request['searchName'] ?? '';
        $sort_by = $request['sort_by'] ?? 'desc';
        $products = VnpayTest::select('cart')
        ->where('status_order', 'LIKE', 'success')
        ->simplePaginate(
            $perPage = 18, $columns = ['*'], $pageName = 'Count'
        );
        if (!empty($request['from'])) {
            $products = $products->where('vnpay_tests.created_at', '>=', date('Y-m-d', strtotime($request['from'])));
        }
        if (!empty($request['to'])) {
            $products = $products->where('vnpay_tests.created_at', '<=', date('Y-m-d', strtotime($request['to'])));
        }
        $oldname = '';
        $Array = [];
        foreach ($products as $key => $value) {
            $value = json_decode($value->cart);
            foreach ((array)$value as $k => $v) {
                $Arr = (array)$value;
                $Array1 = array(
                    $v->name,
                    (int)$v->quantity,
                );
                array_push($Array,$Array1);
            }
        }
        return $Array;
    }
}
