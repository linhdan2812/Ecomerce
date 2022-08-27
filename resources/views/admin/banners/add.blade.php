@extends('layouts.admin-layout')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm mới banner</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Tiêu đề</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh</label>
                        <input type="file" name="photo" class="form-control">
                        @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả</label>
                        <input type="text" name="description" class="form-control">
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select name="status" class="form-control">
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