@extends('layouts.admin-layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @if (Session::has('msg'))
                    <div class="alert alert-success" role="alert">{{ Session::get('msg') }}</div>
                @endif
                <div class="col-md-12">
                    <h2>Sửa sản phẩm</h2>
                    <form method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" name="title" value="{{ $product->title }}" class="form-control">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả tóm tắt</label>
                            <textarea class="form-control" style="height: 10rem;" name="summary">{{ old('summary', $product->summary) }}</textarea>
                            @error('summary')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Chi tiết sản phẩm</label>
                            <textarea class="ckeditor form-control" name="description" value="">{{ $product->description }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh</label>
                            <input type="file" name="photo" value="{{ $product->photo }}" class="form-control">
                            @error('photo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Stock</label>
                            <input type="number" name="stock" value="{{ $product->stock }}" class="form-control">
                            @error('stock')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Giá</label>
                            <input type="text" name="price" value="{{ $product->price }}" class="form-control">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_id">Loại hàng</label>
                            <select class="form-control" name="category_id" value="{{ $product->category_id }}"
                                id="category_id">
                                @foreach ($categories as $item)
                                    <option value="<?= $item->id ?>"><?= $item->title ?></option>
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

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection
