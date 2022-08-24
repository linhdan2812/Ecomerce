@extends('layouts.account')
@section('content')

    <div class="col-lg-9">
        <div class="main-content">
            <div class="top-content">
                <h4 class="title">danh sách địa chỉ</h4>
                <button class="btn" data-toggle="modal" data-target="#addAddress"><i class="far fa-plus"></i>thêm địa chỉ
                    mới</button>
            </div>
            @if($address)
                <div class="body-content">
                    <div class="address-list">
                        @foreach ($address as $item)
                            <div class="address-item">
                                <div class="left-address">
                                    <div class="info-item">
                                        <div class="info-label">Họ và tên:</div>
                                        <div class="info-ct name">{{Auth()->user()->name}}<span class="label">Mặc định</span></div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">Số điện thoại:</div>
                                        <div class="info-ct">{{Auth()->user()->phone ?? null}}</div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">Địa chỉ:</div>
                                        <div class="info-ct">{{$item->data}}</div>
                                    </div>
                                </div>
                                <div class="right-address">
                                    <div class="top">
                                        <a href="javascript:;" class="edit">Chỉnh sửa</a>
                                        <a href="javascript:;" class="delete">Xóa</a>
                                    </div>
                                    <div class="bottom">
                                        <button class="btn" disabled>Thiết lập mặc định</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="modal fade" id="addAddress" tabindex="-1" role="dialog" aria-labelledby="addAddressLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="header">
                    <h4 class="title">thêm địa chỉ mới</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                    </button>
                </div>
                <form action="{{route('postAddress')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="body">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Họ và tên" class="form-control">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" placeholder="Số điện thoại" class="form-control">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="form-group select-box">
                            <select name="city" id="city" class="form-control">
                                <option value="">Tỉnh/Thành Phố</option>
                            </select>
                            <i class="fas fa-caret-circle-down"></i>
                        </div>
                        <div class="form-group select-box">
                            <select name="district" id="district" class="form-control">
                                <option value="">Quận/Huyện</option>
                            </select>
                            <i class="fas fa-caret-circle-down"></i>
                        </div>
                        <div class="form-group select-box">
                            <select name="ward" id="ward" class="form-control">
                                <option value="">Phường/Xã</option>
                            </select>
                            <i class="fas fa-caret-circle-down"></i>
                        </div>
                        <div class="form-group">
                            <input type="text" name="detaileadress" placeholder="Toà nhà, tên đường, số nhà..." class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="check-container">Đặt làm mặc định
                                <input type="checkbox" name="status" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="form-group button">
                            <button class="btn">đăng ký</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection