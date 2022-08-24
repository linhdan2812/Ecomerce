@extends('layouts.account')
@section('content')
{{-- @endsection
@extends('index')

@section('content')  --}}

<div class="col-lg-9">
    <div class="main-content">
        <div class="top-content wow fadeInUp">
            <h4 class="title">Thông tin tài khoản</h4>
        </div>
        <div class="body-content">
            <div class="row">
                <div class="col-lg-7">
                    <div class="account-form">
                        <form action="{{route('postMyaccount')}}" method="post" enctype="multipart/form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Họ và tên</label>
                                        <input type="text" placeholder="Họ và tên" name="name" value="{{$user->name ?? null}}" class="form-control">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Số điện thoại</label>
                                        <input type="text" placeholder="Số điện thoại" name="phone" value="{{$user->phone ?? null}}" class="form-control">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" placeholder="Email" name="email" value="{{$user->email ?? null}}" class="form-control">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Năm sinh</label>
                                        <input type="text" placeholder="Năm sinh" name="birthday" value="{{$user->birthday ?? null}}" class="form-control date-input">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group select-box">
                                        <label for="">Giới tính</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="1">Nam</option>
                                            <option value="0">Nữ</option>
                                        </select>
                                        <i class="fas fa-caret-circle-down"></i>
                                    </div>
                                </div>
                                <div class="button-update mt-3 mb-3">
                                    <button class="btn">Cập nhật</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                
@endsection