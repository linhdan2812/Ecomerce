@extends('layouts.admin-layout')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2>Danh sách Blog</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">title</th>
                            <th scope="col">slug</th>
                            <th scope="col">photo</th>
                            <th scope="col" class="col-6">description</th>
                            <th scope="col"><a class="btn btn-success" href="{{ route('admin.blog.add') }}">Thêm mới</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->slug }}</td>
                                <td><img src="{{asset('storage/'. $item->photo)}}" alt=""></td>
                                <td>{!! $item->description !!}</td>
                                <td>
                                    <a href="{{ route('admin.blog.edit',['id' => $item->id]) }}" class="btn btn-warning">Sửa</a>
                                    <a href="{{ route('admin.blog.delete',['id' => $item->id]) }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
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
