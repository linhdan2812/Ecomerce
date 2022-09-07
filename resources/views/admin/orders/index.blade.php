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
                                <th scope="col">order_number</th>
                                <th scope="col">user</th>
                                <th scope="col">shipping_id</th>
                                <th scope="col">quantity</th>
                                <th scope="col">payment_method</th>
                                <th scope="col">payment_status</th>
                                <th scope="col">status</th>
                                <th scope="col">name</th>
                                <th scope="col">city</th>
                                
                            </tr>
                        </thead>
                        @php
                        $stt = 1;
                        @endphp
                        <tbody>
                            @foreach($orders as $item)
                            <tr>
                                <th scope="row">{{$stt++}}</th>
                                <td>{{$item->order_number}}</td>
                                <td>{{$item->user->name}}</td>
                                <td>{{$item->shipping->type}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->payment_method}}</td>
                                <td>{{$item->payment_status}}</td>
                                <td>{{$item->status}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->city}}</td>
                                <td>
                                    <a href="{{ route('admin.order.detail', ['id'=>$item->id]) }}" class="btn btn-warning">Chi tiết</a>
                                    <a href="" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                                </td>
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
