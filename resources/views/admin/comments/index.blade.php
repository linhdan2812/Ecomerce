@extends('layouts.admin-layout')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2>Danh sách Bình Luận</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Người comment</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{!! $item->content !!}</td>
                                <td>{{ $item->status ? 'Hoạt động' : 'Không hoạt động' }}</td>
                                <td>
                                    <a href="{{ route('admin.comment.edit',['id' => $item->id]) }}" class="btn btn-warning">Duyệt</a>
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
