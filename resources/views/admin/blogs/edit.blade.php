@extends('layouts.admin-layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2>Sửa loại hàng</h2>
                    @if (Session::has('msg'))
                        <div class="alert alert-success" role="alert">{{ Session::get('msg') }}</div>
                    @endif
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Tiêu đề</label>
                            <input class="form-control" type="text" name="title"
                                value="{{ old('title', $blog->title) }}">
                        </div>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-group">
                            <label for="">Ảnh</label>
                            <input class="form-control" type="file" name="photo"
                                value="{{ old('title', $blog->photo) }}">
                            
                        </div>
                        <div class="form-group">
                            <img src="{{asset('storage/'. $blog->photo)}}" alt="">
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea class="ckeditor form-control" style="height: 10rem;" name="description">{{ old('décription', $blog->description) }}</textarea>
                        </div>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        
                        <div class="mt-3">
                            <button class="btn btn-success" type="submit" class="btn btn-warning">Lưu</button>
                        </div>
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
