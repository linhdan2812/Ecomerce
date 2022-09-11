@extends('layouts.admin-layout')
@section('content')
    <div class="content">
        @if(Session::has('msg'))
            <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2>Sửa mã giảm giá</h2>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Mã giảm giá</label>
                            <input class="form-control" type="text" name="code"
                                   value="{{old('code', $coupon->code)}}">
                        </div>
                        @error('code')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="form-group">
                            <label for="status">Loại giảm giá</label>
                            <select class="form-control" name="type" id="type">
                                <option {{old('type',$coupon->type)=="fixed"? 'selected':''}}  value="fixed">
                                    Giảm theo số lượng
                                </option>
                                <option {{old('type',$coupon->type)=="percent"? 'selected':''}} value="percent">
                                    Giảm theo %
                                </option>
                            </select>
                        </div>
                        @error('type')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="form-group">
                            <label for="">Giảm giá</label>
                            <input type="number" name="value" class="form-control" value="{{old('value', $coupon->value)}}">
                        </div>
                        @if(session('alert'))<section class='alert text-danger'>{{session('alert')}}</section>@endif
                        @error('value')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="form-group">
                            <label for="status">Trạng thái</label>
                            <select class="form-control" name="status" id="status">
                                <option {{old('status',$coupon->status)=="active"? 'selected':''}}  value="active">
                                    Hoạt động
                                </option>
                                <option {{old('status',$coupon->status)=="inactive"? 'selected':''}} value="inactive">
                                    Không hoạt động
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Ngày hết hạn</label>
                            <input type="date" name="expired_at" class="form-control" value="{{$coupon->expired_at}}">
                        </div>
                        @error('expired_at')
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