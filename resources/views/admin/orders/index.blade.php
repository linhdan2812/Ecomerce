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
                                <th scope="col">sub_total</th>
                                <th scope="col">shipping_id</th>
                                <th scope="col">coupon</th>
                                <th scope="col">total_amount</th>
                                <th scope="col">quantity</th>
                                <th scope="col">payment_method</th>
                                <th scope="col">payment_status</th>
                                <th scope="col">status</th>
                                <th scope="col">name</th>
                                <th scope="col">email</th>
                                <th scope="col">phone</th>
                                <th scope="col">post_code</th>
                                <th scope="col">city</th>
                                <th scope="col">district</th>
                                <th scope="col">ward</th>
                                <th scope="col">address_detail</th>
                                <th scope="col">
                                    <a href="" class="btn btn-success">Thêm mới</a>
                                </th>
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
                                <td>{{$item->user_id}}</td>
                                <td>{{$item->sub_total}}</td>
                                <td>{{$item->shipping_id}}</td>
                                <td>{{$item->coupon}}</td>
                                <td>{{$item->total_amount}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->payment_method}}</td>
                                <td>{{$item->payment_status}}</td>
                                <td>{{$item->status}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->post_code}}</td>
                                <td>{{$item->city}}</td>
                                <td>{{$item->district}}</td>
                                <td>{{$item->ward}}</td>
                                <td>{{$item->addressdetail}}</td>



                                <td>
                                    <a href="" class="btn btn-warning">Sửa</a>
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
