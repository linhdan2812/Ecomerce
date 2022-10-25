@extends('layouts.account')
@section('section')
    <div class="col-lg-9">
        <div class="main-content">
            <div class="top-content v2 wow fadeInUp">
                <h4 class="title">Báo lỗi đơn hàng </h4>
                <!-- <div class="control">
                    <span class="text">Ngày đặt hàng</span>
                    <div class="form-group date">
                        <input type="text" class="form-control pick-date">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="form-group select">
                        <select name="" id="" class="form-control">
                            <option value="">Trạng thái đơn hàng</option>
                            <option value="">Đang vận chuyển</option>
                            <option value="">Đang xử lý</option>
                            <option value="">Giao hàng thành công</option>
                        </select>
                        <i class="fas fa-caret-circle-down"></i>
                    </div>
                </div> -->
            </div>
            <div class="body-content">
                <div>
                    <b>Mã đơn hàng:</b> {{$order->vnp_TxnRef}}
                </div>
                <div>
                    <b>Ngày đặt hàng:</b> {{$order->created_at}}
                </div>
                <div>
                    <b>Tổng tiền:</b> {{$order->vnp_Amount}}
                </div>
                <form action="{{route('error.order.save',['id'=>$order->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="">Ghi chú (nếu có)</label>
                        <input type="text" name="note">
                    </div>
                    <div>
                        <label for="">Sản phẩm</label>
                        <select name="name_product" id="">
                            @foreach($product as $key)
                            <option value="{{$key['name']}}">{{$key['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="">Ảnh sản phẩm bị lỗi</label>
                        <input type="file" name="image">
                    </div>
                    <div>
                        <button type="submit" class="btn">Gửi yêu cầu</button>
                    </div>
                </form>


                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        {{-- <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="fal fa-chevron-right"></i></a></li> --}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection