@extends('layouts.admin-layout')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h2>Danh sách sản phẩm</h2>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">STT</th>
              <th scope="col">Tên sản phẩm</th>
              <th scope="col">Ảnh</th>
              <th scope="col">Kích thước</th>
              <th scope="col">Giá</th>
              <th scope="col">Loại hàng</th>
              <!-- <th scope="col">Thương hiệu</th> -->
              <th scope="col">Trạng thái</th>
              <th><a class="btn btn-success" href="{{ route('admin.product.add') }}">Thêm mới</a></th>
            </tr>
          </thead>
          @php
          $stt = 1;
          @endphp
          <tbody>
            @foreach ($products as $item)
            <tr>
              <th scope="row">{{$stt++}}</th>
              <td>{{ $item->title }}</td>
              <td><img src="{{asset('storage/'. $item->photo)}}" alt="" width="100"></td>
              <td>{{ $item->size }}</td>
              <td>{{ $item->price }}</td>
              <td>{{ $item->category->title }}</td>
              <td>{{ $item->status == 'inactive' ? 'Không hoạt động' : 'Hoạt động'}}</td>
              <td>
                <a class="btn btn-warning" href="{{ route('admin.product.edit', ['id' => $item->id]) }}">Sửa</a>
                <a class="btn btn-danger" href="{{ route('admin.product.delte', ['id' => $item->id]) }}">Xóa</a>
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