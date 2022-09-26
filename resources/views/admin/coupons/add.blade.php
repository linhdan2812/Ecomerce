@extends('layouts.admin-layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2>Thêm mã giảm giá</h2>
                    @if(Session::has('msg'))
                        <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
                    @endif
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Mã giảm giá</label>
                            <input type="text" name="code" class="form-control">
                        </div>
                        @error('code')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-group">
                            <label for="status">Loại giảm giá</label>
                            <select class="form-control" name="type" id="type" onchange="onChangeSelect()">
                                <option value="" name=""selected>
                                    Loại giảm giá
                                </option>
                                <option value="fixed" name="fixed">
                                    Giảm theo số tiền
                                </option>
                                <option value="percent" name="percent">
                                    Giảm theo %
                                </option>
                                <option value="all" name="all">
                                    Giảm toàn bộ sản phẩm
                                </option>
                            </select>
                        </div>

                        @error('type')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div id="money"></div>
                        @if(session('alert'))
                            <span class='alert text-danger'>{{session('alert')}}</span>
                        @endif
                        @error('value')
                        <span class="text-danger">{{$message}}</span>
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
                        <div class="form-group">
                            <label for="">Ngày hết hạn</label>
                            <input type="date" name="expired_at" class="form-control">
                        </div>
                        @error('expired_at')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="mt-3">
                            <button class="btn btn-success" type="submit">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection