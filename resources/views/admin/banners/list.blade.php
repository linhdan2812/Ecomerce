@extends('layouts.admin-layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2>Danh sách banner slide</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col"><a class="btn btn-success" href="{{ route('admin.banner.add') }}">Thêm
                                        mới</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td><img src="{{ asset('storage/' . $item->photo) }}" alt="" width="250"></td>
                                    @if ($item->status == 'inactive')
                                        <td>Không hoạt động</td>
                                    @else
                                        <td>Hoạt động</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('admin.banner.edit', ['id' => $item->id]) }}"
                                            class="btn btn-warning">Sửa</a>
                                        <a href="{{ route('admin.banner.delete', ['id' => $item->id]) }}"
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
@endsection
