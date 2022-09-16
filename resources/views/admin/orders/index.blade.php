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
                                <th scope="col">Shipping</th>
                                <th scope="col">Phương thức thanh toán</th>
                                <th scope="col">Trạng thái thanh toán</th>
                                <th scope="col">Trạng thái</th>
                                
                            </tr>
                        </thead>
                        @php
                        $stt = 1;
                        @endphp
                        <tbody>
                            @foreach($orders as $item)
                            <tr>
                                <th scope="row">{{$stt++}}</th>
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
