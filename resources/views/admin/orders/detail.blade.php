@extends('layouts.admin-layout')
@section('content')
    <div class="col-md-12">
        <h2>Hóa đơn chi tiết</h2>
        <div class="row">
            <div class="col-12 d-flex flex-wrap">
                <div class="col-6 mb-3">
                    <label for="">Đơn Hàng</label>
                    <div>{{ $order->order_number }}</div>
                </div>
                <div class="col-6 mb-3">
                    <label for="">Tên khách hàng</label>
                    <div>{{ $order->user->name }}</div>
                </div>
                <div class="col-6 mb-3">
                    <label for="">Tổng</label>
                    <div>{{ $order->sub_total }}</div>
                </div>
                <div class="col-6 mb-3">
                    <label for="">Ship</label>
                    <div>{{ $order->shipping->type }}</div>
                </div>
                <div class="col-6 mb-3">
                    <label for="">Mã giảm giá</label>
                    <div>{{ $order->coupon }}</div>
                </div>
                <div class="col-6 mb-3">
                    <label for="">Tổng</label>
                    <div>{{ $order->total_amount }}</div>
                </div>
                <div class="col-6 mb-3">
                    <label for="">Số lượng</label>
                    <div>{{ $order->quantity }}</div>
                </div>
                <div class="col-6 mb-3">
                    <label for="">Phương thức thanh toán</label>
                    <div>{{ $order->payment_method }}</div>
                </div>
                <div class="col-6 mb-3">
                    <label for="">Tình trạng thanh toán</label>
                    <div>{{ $order->payment_status }}</div>
                </div>
                <div class="col-6 mb-3">
                    <label for="">Tình trạng</label>
                    <div>{{ $order->status }}</div>
                </div>
                <div class="col-6 mb-3">
                    <label for="">Tên</label>
                    <div>{{ $order->name }}</div>
                </div>
                <div class="col-6 mb-3">
                    <label for="">Email</label>
                    <div>{{ $order->email }}</div>
                </div>
                <div class="col-6 mb-3">
                    <label for="">Số điện thoại</label>
                    <div>{{ $order->phone }}</div>
                </div>
                <div class="col-6 mb-3">
                    <label for="">Mã bưu điện</label>
                    <div>{{ $order->post_code }}</div>
                </div>
                <div class="col-6 mb-3">
                    <label for="">Thành phố</label>
                    <div>{{ $order->city }}</div>
                </div>
                <div class="col-6 mb-3">
                    <label for="">Quận/Huyện</label>
                    <div>{{ $order->district }}</div>
                </div>
                <div class="col-6 mb-3">
                    <label for="">Đường/Phố</label>
                    <div>{{ $order->ward }}</div>
                </div>
                <div class="col-6 mb-3">
                    <label for="">Địa chỉ cụ thể</label>
                    <div>{{ $order->addressdetail }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
