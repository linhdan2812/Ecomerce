@extends('layouts.admin-layout')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2>Sửa sản phẩm</h2>
                <form method="post" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="title" value="{{ $product->title }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả tóm tắt</label>
                        <input type="text" name="summary" value="{{ $product->summary }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Chi tiết sản phẩm</label>
                        <input type="text" name="description" value="{{ $product->description }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh</label>
                        <input type="file" name="photo" value="{{ old($product->photo) }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Stock</label>
                        <input type="number" name="stock" value="{{ $product->stock }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Kích thước</label>
                        <input type="text" name="size" value="{{ $product->size }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Giá</label>
                        <input type="text" name="price" value="{{ $product->price }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Giảm giá</label>
                        <input type="text" name="discount" value="{{ $product->discount }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Loại hàng</label>
                        <select class="form-control" name="category_id" value="{{ $product->category_id }}" id="category_id">
                            @foreach ($categories as $item)
                            <option value="<?= $item->id ?>"><?= $item->title ?></option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="brand_id">Thương hiệu</label>
                        <select class="form-control" name="brand_id" value="{{ $product->brand_id }}" id="brand_id">
                            @foreach ($brands as $item)
                            <option value="<?= $item->id ?>"><?= $item->id ?></option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select class="form-control" name="status" value="{{ $product->status }}" id="status">
                            <option value="active">Hoạt động</option>
                            <option value="inactive">Không hoạt động</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</div>
        @endsection