@extends('layouts.admin-layout')
@section('content')
    <div class="content">
        @if(Session::has('msg'))
            <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2>Danh sách hoàn trả hàng</h2>
                    <div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Đơn hàng</th>
                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Ghi chú của khách hàng</th>
                                <th scope="col">
                                    
                                </th>
                            </tr>
                            </thead>
                            @php
                                $stt = 1;
                            @endphp
                            <tbody>
                            @foreach($errorOrder as $item)
                                <tr>
                                    <th scope="row">{{$stt++}}</th>
                                    <td>{{$item->id_order}}</td>
                                    <td>{{$item->id_user}}</td>
                                    <td>{{$item->note}}</td>
                                    <td>
                                        <a href="{{route('admin.order.detail',['id'=>$item->id_order])}}"
                                           class="btn btn-warning">Xem chi tiết đơn</a>
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