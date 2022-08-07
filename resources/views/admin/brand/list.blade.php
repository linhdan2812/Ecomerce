@extends('layouts.admin-layout')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2>Danh sách thương hiệu</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên Thương hiệu</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col"><a class="btn btn-success" href="{{ route('admin.brand.add') }}">Thêm mới</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            @if( $item->status == 'inactive')
                            <td>Không hoạt động</td>
                            @else
                            <td>Hoạt động</td>
                            @endif
                            <td>
                                <a href="{{ route('admin.brand.edit',['id' => $item->id]) }}" class="btn btn-warning">Sửa</a>
                                <a href="{{ route('admin.brand.delete',['id' => $item->id]) }}" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection