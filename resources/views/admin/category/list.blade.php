@extends('layouts.admin-layout')
@section('content')
    <div class="content">
        @if(Session::has('msg'))
            <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2>Danh sách loại hàng</h2>
                    <div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên loại hàng</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">
                                    <a href="{{route('admin.category.add')}}" class="btn btn-success">Thêm mới</a>
                                </th>
                            </tr>
                            </thead>
                            @php
                                $stt = 1;
                            @endphp
                            <tbody>
                            @foreach($categories as $item)
                                <tr>
                                    <th scope="row">{{$stt++}}</th>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->summary}}</td>
                                    @if( $item->status == 'inactive')
                                        <td>Không hoạt động</td>
                                    @else
                                        <td>Hoạt động</td>
                                    @endif
                                    <td>
                                        <a href="{{route('admin.category.update',['id'=>$item->id])}}"
                                           class="btn btn-warning">Sửa</a>
                                        <a href="{{route('admin.category.delete',['id'=>$item->id])}}"
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