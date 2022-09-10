<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function list()
    {
        $coupons = Coupon::all();
        foreach ($coupons as $coupon) {
            $this->checkStatus($coupon);
        }

        return view('admin.coupons.list', compact('coupons'));
    }

    public function addForm()
    {
        return view('admin.coupons.add');
    }

    public function saveAdd(Request $request)
    {
        $this->validateMessage($request);
        $coupon = new Coupon();
        if ($request->type == 'percent') {
            if ($request->value < 0 || $request->value >= 100) {
                $value = 'Hãy chọn giá trị trong khoảng từ 1 đến 100';

                return redirect()->back()->with('alert', $value);
            }
        }
        $coupon->fill($request->all());
        $coupon->code = str_replace(" ", "", strtoupper($request->code));
        $coupon->save();

        return redirect(route('admin.coupon.list'))->with('msg', 'Thêm mới thành công!');
    }

    public function editForm($id)
    {
        $coupon = Coupon::find($id);
        if (!$coupon) {
            return redirect(route('admin.coupon.list'));
        }

        return view('admin.coupons.edit', compact('coupon'));
    }

    public function saveEdit($id, Request $request)
    {
        $now    = Carbon::now();
        $coupon = Coupon::find($id);
        if ($request->code != $coupon->code) {
            $this->validateMessage($request);
        }
        if ($coupon->expired_at < $now){
            $request->status = 'inactive';
        }
        Coupon::query()->where('id', $id)->update([
                           'code' => $request->code,
                           'type' => $request->type,
                           'value' => $request->value,
                           'status' => $request->status,
                           'expired_at' => $request->expired_at
                       ]);
        $coupon->save();

        return redirect(route('admin.coupon.list'))->with('msg', 'Sửa thành công!');
    }

    public function delete($id)
    {
        Coupon::destroy($id);

        return redirect()->back()->with('msg', 'Xóa thành công!');
    }

    public function checkStatus($coupon)
    {
        $now = Carbon::now();
        if ($coupon->expired_at < $now) {
            Coupon::query()
                  ->where('id', $coupon->id)
                  ->update([
                      'status' => 'inactive'
                           ]);
        }
    }

    public function validateMessage($request)
    {
        return $request->validate([
                                      'code'       => 'required|unique:coupons|max:20',
                                      'type'       => 'required',
                                      'value'      => 'required|numeric',
                                      'expired_at' => 'required|date_format:"Y-m-d"|after:yesterday',
                                  ],
                                  [
                                      'code.required'          => 'Hãy nhập mã giảm giá',
                                      'code.unique'            => 'Mã giảm giá đã tồn tại',
                                      'code.max'               => 'Mã giảm giá dài quá 10 ký tự',
                                      'value.required'         => 'Hãy nhập giá muốn giảm',
                                      'value.numeric'          => 'Hãy nhập số',
                                      'expired_at.required'    => 'Hãy chọn ngày',
                                      'expired_at.date_format' => 'Ngày đã chọn sai định dạng',
                                      'expired_at.after'       => 'Hãy chọn ngày lớn hơn ngày hiện tại',
                                  ]
        );
    }
}
