@extends('layouts.admin-layout')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2>Chỉnh sửa banner slide</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Ảnh</label>
                        <input type="file" name="photo" value="{{ $banner->photo }}" class="form-control">
                        @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select class="form-control" name="status" id="status">
                            <option {{old('status',$banner->status)=="active"? 'selected':''}}  value="active">
                                Hoạt động
                            </option>
                            <option {{old('status',$banner->status)=="inactive"? 'selected':''}} value="inactive">
                                Không hoạt động
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection