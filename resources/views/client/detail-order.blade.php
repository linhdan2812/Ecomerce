@extends('layouts.account')
@section('section')
   <div class="col-lg-9">
        <div class="main-content">
            <div class="wrap-process-order">
                @if(Session::has('msg'))
                    <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
                @endif
                <div class="top">
                    <h3 class="head-page">Chi tiết đơn hàng</h3>
                    @if($detailorder->status_order == 'pending')
                        <div class="right">
                            <a href="{{route('cancel.order',['id' => $detailorder->id])}}" class="btn-second gray">Hủy đơn hàng</a>
                        </div>
                    @endif
                    @if($detailorder->status_order == 'success')
                        <div class="right">
                            <a href="{{route('error.order',['id' => $detailorder->id])}}" class="btn-second warning">Báo lỗi</a>
                        </div>
                    @endif
                </div>
                <div class="order-info">
                    <span class="code">Đơn hàng: {{ $detailorder->vnp_TxnRef}}</span>
                    <span class="time">Ngày đặt hàng: {{ $detailorder->created_at}}</span>
                </div>
                <div class="order-process">
                    <div class="item active">
                        <div class="icon"><img src="images/ic-process1.png" alt=""></div>
                        <p>Đang xử lý</p>
                    </div>
                    <div class="item">
                        <div class="icon"><i class="fal fa-check-circle"></i><img src="images/ic-process2.png" alt=""></div>
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
                        @foreach($test as $key)
                        <tr>
                                <td>
                                    <div class="item-cart v2">
                                        <a class="img"><img src="{{asset('storage/'.$key['image'])}}" width="70" alt=""></a>
                                        <div class="ct">
                                            <h3 class="title">
                                                <a href="" title="">{{$key['name']}}</a>
                                            </h3>
                                        </div>
                                    </div>    
                                </td>
                                <td align="center">{{number_format($key['price'])}} VND</td>
                                <td align="center">{{$key['quantity']}}</td>
                                <td align="right">{{number_format($key['price'] * $key['quantity'])}} VND</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <ul class="order-total">
                    <li>Tổng tiền hàng:  <span>{{ number_format($detailorder->vnp_Amount) ?? 0 }} VND   </span></li>
                    <li>Giảm giá:  <span>{{ $detailorder->coupon ?? 0 }}</span></li>
                    <li>Phí vận chuyển:  <span>{{ $detailorder->shipping_id ?? 0}}</span></li>
                    <li>Tổng số tiền:  <b>{{ number_format($detailorder->vnp_Amount ?? 0)}} VND</b></li>
                    <li>Phương thức thanh toán <small>{{ $detailorder->vnp_CardType}}</small></li>
                </ul>
                <div class="order-address-person">
                    <p class="title">địa chỉ nhận hàng</p>
                    <ul>
                        <li><span>Họ và tên:</span>{{ $detailorder->vnp_Bill_FirstName . ' ' . $detailorder->vnp_Bill_LastName ?? null}}</li>
                        <li><span>Số Điện thoại:</span>{{ $detailorder->vnp_Bill_Mobile ?? null}}</li>
                        <li><span>Địa chỉ:</span>{{ $detailorder->vnp_Bill_Address ?? null}}</li>
                    </ul>
                    <div class="back-order">
                        <a href="{{route('orders')}}" title=""><i class="far fa-long-arrow-alt-left"></i> <span>Trở về đơn hàng</span></a>
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