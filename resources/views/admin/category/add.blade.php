@extends('layouts.admin-layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2>Thêm mới loại hàng</h2>
                    @if (Session::has('msg'))
                        <div class="alert alert-success" role="alert">{{ Session::get('msg') }}</div>
                    @endif
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Tên loại hàng</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name="summary" class="ckeditor form-control" style="height: 10rem;"></textarea>
                        </div>

                        @error('summary')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-group">
                            <label for="status">Trạng thái</label>
                            <select class="form-control" name="status" id="status">
                                <option selected value="active" name="active">
                                    Hoạt động
                                </option>
                                <option value="inactive" name="inactive">
                                    Không hoạt động
                                </option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-success" type="submit">Lưu</button>
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
