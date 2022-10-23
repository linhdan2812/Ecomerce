@extends('layouts.admin-layout')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2>Danh sách đơn hàng</h2>
                @if(Session::has('msg'))
                    <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
                @endif
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Đơn hàng</th>
                                <th scope="col">Người mua</th>
                                <th scope="col">Thanh toán</th>
                                <th scope="col">Chi tiết đơn hàng</th>
                                <th scope="col">Tình trạng đơn hàng</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->vnp_TxnRef}}</td>
                                <td>{{$order->vnp_Bill_FirstName . ' ' . $order->vnp_Bill_LastName}}</td>
                                @if($order->vnp_TransactionStatus == '00')
                                <td>Đã thanh toán thành công</td>
                                @elseif($order->vnp_TransactionStatus == null)
                                <td>Đã hủy giao dịch</td>
                                @endif

                                <!-- Chi tiết đơn hàng -->
                                <td><a href="{{route('admin.order.detail',['id'=>$order->id])}}">Xem</a></td>

                                <!-- Trạng thái đơn hàng -->
                                @if($order->status_order == 'pending' && $order->vnp_TransactionStatus == '00')
                                <td><a href="{{route('admin.order.stateChange',['id'=>$order->id])}}" class="btn btn-warning">Đang xử lý</a></td>
                                @elseif($order->status_order == 'confirm' && $order->vnp_TransactionStatus == '00')
                                <td>Đã xác nhận</td>
                                @elseif( ( $order->status_order == 'cancel' || $order->status_order == 'pending' ) && ( $order->vnp_TransactionStatus == '00' || $order->vnp_TransactionStatus == null ))
                                <td><a href="" class="btn btn-danger">Đã hủy đơn hàng</a></td>
                                @elseif($order->status_order == 'shipping' && $order->vnp_TransactionStatus == '00')
                                <td><a href="{{route('admin.order.stateChange',['id'=>$order->id])}}" class="btn btn-info">Đang giao hàng</a></td>
                                @elseif($order->status_order == 'success' && $order->vnp_TransactionStatus == '00')
                                <td><a href="" class="btn btn-success">Đã giao hàng</a></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection