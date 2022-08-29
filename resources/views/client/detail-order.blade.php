@extends('layouts.account')
@section('section')
   <div class="col-lg-9">
        <div class="main-content">
            <div class="wrap-process-order">
                <div class="top">
                    <h3 class="head-page">Chi tiết đơn hàng</h3>
                    @if($detailorder->status == 'Đang xử lý' && $detailorder->payment_status == 'Đang xử lý')
                        <div class="right">
                            <button class="btn-second gray" id ="cancelorder" data-toggle="modal" data-target="#modal-cancel">Hủy đơn hàng</button>
                            <input type="hidden" name="detailorderid" value="{{ $detailorder->id }}" id="detailorderid">
                        </div>
                    @endif
                </div>
                <div class="order-info">
                    <span class="code">Đơn hàng: {{ $detailorder->order_number}}</span>
                    <span class="time">Ngày đặt hàng: {{ $detailorder->created_at}}</span>
                </div>
                <div class="order-process">
                    <div class="item active">
                        <div class="icon"><img src="images/ic-process1.png" alt=""></div>
                        <p>Đang xử lý</p>
                    </div>
                    <div class="item">
                        <div class="icon"><img src="images/ic-process2.png" alt=""></div>
                        <p>Đang giao hàng</p>
                    </div>
                    <div class="item">
                        <div class="icon"><i class="fal fa-check-circle"></i></div>
                        <p>Đã giao hàng</p>
                    </div>
                </div>
                <div class="tb-cart v2">
                    <table class="table">
                        <tr>
                            <th>Sản phẩm</th>
                            <th class="text-center">Giá</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-right">Thành tiền</th>
                        </tr>
                        <tr>
                            <td>
                                <div class="item-cart v2">
                                    <a href="" class="img"><img src="images/book-pay1.jpg" alt=""></a>
                                    <div class="ct">
                                        <h3 class="title">
                                            <a href="" title="">Giáo trình Hán ngữ 1 + 2 - Phiên bản tiếng Trung Dương Châu</a>
                                        </h3>
                                    </div>
                                </div>    
                            </td>
                            <td align="center">268.000 đ</td>
                            <td align="center">
                                1
                            </td>
                            <td align="right">268.000 đ</td>
                        </tr>
                    </table>
                </div>
                <ul class="order-total">
                    <li>Tổng tiền hàng:  <span>{{ $detailorder->sub_total}}</span></li>
                    <li>Giảm giá:  <span>{{ $detailorder->coupon ?? 0 }}</span></li>
                    <li>Phí vận chuyển:  <span>{{ $detailorder->shipping_id ?? 0}}</span></li>
                    <li>Tổng số tiền:  <b>{{ $detailorder->total_amount}}</b></li>
                    <li>Phương thức thanh toán <small>{{ $detailorder->payment_method}}</small></li>
                </ul>
                <div class="order-address-person">
                    <p class="title">địa chỉ nhận hàng</p>
                    <ul>
                        <li><span>Họ và tên:</span>{{ $detailorder->name ?? null}}</li>
                        <li><span>Số Điện thoại:</span>{{ $detailorder->phone ?? null}}</li>
                        <li><span>Địa chỉ:</span>{{ $detailorder->addressdetail ?? null}}</li>
                    </ul>
                    <div class="back-order">
                        <a href="javascript:;" title=""><i class="far fa-long-arrow-alt-left"></i> <span>Trở về đơn hàng</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('#cancelorder').on('click', function(){
        let url = "{{ route('setCancelOrder') }}";
        let id = $('#detailorderid').val();
        $.get(url,{'id':id}).done(function(data){
            console.log(data);
        })
    });
</script>
@endsection