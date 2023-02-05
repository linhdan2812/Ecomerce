@extends('layouts.admin-layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @if (Session::has('msg'))
                    <div class="alert alert-success" role="alert">{{ Session::get('msg') }}</div>
                @endif
                <div class="col-md-12">
                    <h2>Thêm mới sản phẩm</h2>
                    <form method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" name="title" class="form-control">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Mô tả tóm tắt</label>
                            <textarea name="summary" class="form-control" style="height: 10rem;"></textarea>
                            @error('summary')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Chi tiết sản phẩm</label>
                            <textarea class="ckeditor form-control" name="description"></textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Ảnh</label>
                            <input type="file" name="photo" class="form-control">
                            @error('photo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Thêm ảnh('có thể trống')</label>
                            <div class="">
                                <div class="col-lg-12">
                                    <div id="row">
                                        <div class="input-group m-3">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-danger" id="DeleteRow" type="button">
                                                    <i class="bi bi-trash"></i>
                                                    Delete
                                                </button>
                                            </div>
                                            <input type="file" name="image[]" class="form-control">
                                        </div>
                                    </div>
                                    <div id="newinput"></div>
                                    <button id="rowAdder" type="button" class="btn btn-dark">
                                        <span class="bi bi-plus-square-dotted">
                                        </span> Thêm ảnh
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Kích thước</label>
                            <input class="form-check-input form-control" name="size[]" type="checkbox" id="inlineCheckbox1"
                                value="S">
                            <label class="form-check-label form-control" for="inlineCheckbox1">S</label>
                            <input class="form-check-input form-control" name="size[]" type="checkbox" id="inlineCheckbox2"
                                value="M">
                            <label class="form-check-label form-control" for="inlineCheckbox2">M</label>
                            <input class="form-check-input form-control" name="size[]" type="checkbox" id="inlineCheckbox3"
                                value="L">
                            <label class="form-check-label form-control" for="inlineCheckbox3">L</label>
                            <input class="form-check-input form-control" name="size[]" type="checkbox" id="inlineCheckbox4"
                                value="XL">
                            <label class="form-check-label form-control" for="inlineCheckbox4">XL</label>
                        </div>
                        <div class="form-group">
                            <label for="">Màu sắc</label>
                            <input class="form-check-input form-control" name="color[]" type="checkbox" id="inlineCheckbox1"
                                value="Trắng">
                            <label class="form-check-label form-control" for="inlineCheckbox1">Trắng</label>
                            <input class="form-check-input form-control" name="color[]" type="checkbox" id="inlineCheckbox2"
                                value="Đen">
                            <label class="form-check-label form-control" for="inlineCheckbox2">Đen</label>
                        </div>
                        <div class="form-group">
                            <label for="">Giá</label>
                            <input name="price" class="form-control">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- <div class="form-group">
                            <label for="">Giảm giá</label>
                            <input type="number" name="discount" class="form-control">
                            @error('discount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> -->

                        <div class="form-group">
                            <label for="category_id">Loại hàng</label>
                            <select class="form-control" name="category_id" id="category_id">
                                @foreach ($categories as $item)
                                    <option value="<?= $item->id ?>"><?= $item->title ?></option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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


    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
        $("#rowAdder").click(function() {
            newRowAdd =
                '<div id="row"> <div class="input-group m-3">' +
                '<div class="input-group-prepend">' +
                '<button class="btn btn-danger" id="DeleteRow" type="button">' +
                '<i class="bi bi-trash"></i> Delete</button> </div>' +
                ' <input type="file" name="image[]" class="form-control"> </div> </div>';

            $('#newinput').append(newRowAdd);
        });

        $("body").on("click", "#DeleteRow", function() {
            $(this).parents("#row").remove();
        })
    </script>
@endsection
