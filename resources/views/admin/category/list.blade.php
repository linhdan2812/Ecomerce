@extends('layouts.admin-layout')
@section('content')
    <h2>CATEGORY LIST</h2>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Summary</th>
                <th scope="col">Status</th>
                <th scope="col">
                    <a href="{{route('admin.category.add')}}" class="btn btn-primary">Thêm mới</a>
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
                    <td>{{$item->slug}}</td>
                    <td>{{$item->summary}}</td>
                    <td>{{$item->status}}</td>
                    <td>
                        <a href="{{route('admin.category.update',['id'=>$item->id])}}" class="btn btn-warning">Sửa</a>
                        <a href="{{route('admin.category.delete',['id'=>$item->id])}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
