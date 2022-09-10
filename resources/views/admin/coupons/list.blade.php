@extends('layouts.admin-layout')
@section('content')
    <div class="content">
        @if(Session::has('msg'))
            <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2>Danh sách mã giảm giá</h2>
                    <div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Mã giảm giá</th>
                                <th scope="col">Loại</th>
                                <th scope="col">Giảm giá</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Ngày hết hạn</th>
                                <th scope="col">
                                    <a href="{{route('admin.coupon.add')}}" class="btn btn-success">Thêm mới</a>
                                </th>
                            </tr>
                            </thead>
                            @php
                                $stt = 1;
                            @endphp
                            <tbody>
                            @foreach($coupons as $item)
                                <tr>
                                    <th scope="row">{{$stt++}}</th>
                                    <td>{{$item->code}}</td>
                                    <td>{{$item->type}}</td>
                                    @if($item->type == 'percent')
                                        <td>{{$item->value}}%</td>
                                    @else
                                        <td>{{$item->value}}VND</td>
                                    @endif
                                    @if( $item->status == 'inactive')
                                        <td>Không hoạt động</td>
                                    @else
                                        <td>Hoạt động</td>
                                    @endif
                                    <td>{{$item->expired_at}}</td>
                                    <td>
                                        <a href="{{route('admin.coupon.update',['id'=>$item->id])}}"
                                           class="btn btn-warning">Sửa</a>
                                        <a href="{{route('admin.coupon.delete',['id'=>$item->id])}}"
                                           class="btn btn-danger"
                                           onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
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