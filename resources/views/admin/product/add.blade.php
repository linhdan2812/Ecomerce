@extends('layouts.admin-layout')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm mới sản phẩm</h2>
                <form method="post" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả tóm tắt</label>
                        <input type="text" name="summary" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Chi tiết sản phẩm</label>
                        <input type="text" name="description" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh</label>
                        <input type="file" name="photo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Stock</label>
                        <input type="number" name="stock" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Kích thước</label>
                        <input type="text" name="size" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Giá</label>
                        <input type="text" name="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Giảm giá</label>
                        <input type="text" name="discount" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Loại hàng</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach ($brands as $item)
                                <option value="<?= $item->id ?>"><?= $item->title ?></option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="brand_id">Thương hiệu</label>
                        <select class="form-control" name="brand_id" id="brand_id">
                            @foreach ($categories as $item)
                            <option value="<?= $item->id ?>"><?= $item->title ?></option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select class="form-control" name="status" id="status">
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
