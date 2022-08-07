@extends('layouts.admin-layout')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2>Sửa loại hàng</h2>
                @if(Session::has('msg'))
                <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
                @endif
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Tên loại hàng</label>
                        <input class="form-control" type="text" name="title" value="{{$category->title}}">
                    </div>
                    @error('title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-group">
                        <label for="">Mô tả</label>
                        <textarea class="form-control" type="text" name="summary">{{$category->summary}}</textarea>
                    </div>
                    @error('summary')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select class="form-control" name="status" value="{{ $category->status }}" id="status">
                            <option value="active">Hoạt động</option>
                            <option value="inactive">Không hoạt động</option>
                        </select>
                    </div>
                    @error('status')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="mt-3">
                        <button class="btn btn-success" type="submit" class="btn btn-warning">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

        @endsection