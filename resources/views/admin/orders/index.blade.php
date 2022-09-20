@extends('layouts.admin-layout')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2>Danh sách đơn hàng</h2>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Đơn hàng</th>
                                <th scope="col">Người mua</th>
                                <th scope="col">Thanh toán</th>
                                <th scope="col">Xác nhận thanh toán</th>
                                <th scope="col">Xác nhận giao hàng</th>
                                
                            </tr>
                        </thead>
                        </tbody>
                        <tbody>
                            {{-- @foreach($order_vnpay as $item)
                                <tr>
                                    <th>{{$loop->iteration}}</th>
                                    <td>{{$item->vnp_BankTranNo}}</td>
                                    <td>{{$item->user->name}}</td>
                                    @if($item->vnp_ResponseCode == '00')
                                    <td>Đã thanh toán</td>
                                    @endif
                                    @if($item->status_pay == '0')
                                    <td>Đang chờ xử lý</td>
                                    @endif
                                    @if($item->status_transport == '0')
                                    <td>Đang chờ xử lý</td>
                                    @endif
                                </tr> --}}
                            @foreach($orders as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td><a href="{{ route('admin.order.detail', ['order_number'=>$item->order_number]) }}">{{$item->order_number}}</a></td>
                                <td>{{$item->user->name}}</td>
                                <td></td>
                                <td>{{$item->payment_method}}</td>
                                <td>{{$item->payment_status}}</td>
                                <td>{{$item->status}}</td>
                                {{-- <td>
                                    <a href="" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                                </td> --}}
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
