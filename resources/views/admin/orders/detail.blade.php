@extends('layouts.admin-layout')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

<div class="col-lg-9">
  <div class="main-content">
    <div class="wrap-process-order">
      @if(Session::has('msg'))
      <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
      @endif
      <div class="top">
        <h3 class="head-page">Chi tiết đơn hàng</h3>

        <!-- Modal -->
        <div id="ex1" class="modal" style="border-radius: 2px;">
          <h3>Chỉnh sửa đơn hàng</h3>
          <form action="{{ route('admin.order.update',['id'=>$detailorder->id])}}" method="get">
            <div>
              <label for="">Lí do</label>
              <input type="text" name="note" id="note" value="note">
            </div>
            <div>
              <label for="">Chuyển trạng thái đơn hàng</label>
              <select name="value" id="">
                <option value="outStock">Đã hết hàng</option>
                <option value="shipping">Đang giao hàng</option>
                <option value="cancel">Đã hủy đơn</option>
                <option value="pending">Chờ xử lí</option>
                <option value="success">Đã giao hàng</option>
              </select>
            </div>
            <input type="hidden" name="id" value="{{$detailorder->id}}">
            <a href="#" rel="modal:close">Đóng</a>
            <button type="submit">Lưu</button>
          </form>
        </div>

        <p><a href="#ex1" rel="modal:open">Chỉnh sửa đơn hàng</a></p>
      </div><br>
      <div class="order-info">
        <span class="code"><b>Đơn hàng:</b> {{ $detailorder->vnp_TxnRef}}</span><br>
        <span class="time"><b>Ngày đặt hàng:</b> {{ $detailorder->created_at}}</span>
      </div><br>
      @if($request_order )
      <div class="right">
        <a><b>
            <h3> Khách hàng báo lỗi </h3>
          </b></a>
        <div>
          <br>
          <p><b style="color: red;">Sản phẩm lỗi:</b> {{$request_order->name_product ?? ''}}</p>
          <p><b style="color: red;">Ghi chú của khách hàng:</b> {{$request_order->note ?? ''}}</p>
          <p><b style="color: red;">Ảnh kèm theo:</b> <img src="{{asset('storage/'. $request_order->image)}}" width="200" alt=""></p>
        </div><br>
        <a href="{{route('change.order',['id'=>$request_order->id_order])}}" class="btn btn-primary">Xác nhận đổi hàng cho khách</a>
      </div><br>
      @endif
      <div class="tb-cart v2">
        <table class="table">
          <tr>
            <th class="text-center">Sản phẩm</th>
            <th class="text-center">Ảnh</th>
            <th class="text-center">Giá</th>
            <th class="text-center">Số lượng</th>
            <th class="text-right">Thành tiền</th>
          </tr>
          <tr>
            @foreach($test as $key)
            <td align="center">
                <a title="">{{$key['name']}}</a>
            </td>
            <td><a class="img"><img src="{{asset('storage/'.$key['image'])}}" width="70" alt=""></a></td>
            <td align="center">{{$key['price']}} VND</td>
            <td align="center">{{$key['quantity']}}</td>
            <td align="right">{{$key['price'] * $key['quantity']}} VND</td>
            @endforeach
          </tr>
        </table>
      </div>
      <ul class="order-total">
        <li><b>Tổng tiền hàng:</b> <span>{{ $detailorder->vnp_Amount}}</span></li>
        <li><b>Giảm giá:</b> <span>{{ $detailorder->coupon ?? 0 }}</span></li>
        <li><b>Phí vận chuyển:</b> <span>{{ $detailorder->shipping_id ?? 0}}</span></li>
        <li><b>Tổng số tiền:</b> <b>{{ $detailorder->vnp_Amount}}</b></li>
        <li><b>Phương thức thanh toán: </b> <small>{{ $detailorder->vnp_CardType}}</small></li>
      </ul>
      <div class="order-address-person">
        <b>
          <h4>Địa chỉ nhận hàng</h4>
        </b>
        <ul>
          <li><span><b> Họ và tên: </b></span>{{ $detailorder->vnp_Bill_FirstName . ' ' . $detailorder->vnp_Bill_LastName ?? null}}</li>
          <li><span><b>Số Điện thoại: </b></span>{{ $detailorder->vnp_Bill_Mobile ?? null}}</li>
          <li><span><b> Địa chỉ: </b></span>{{ $detailorder->vnp_Bill_Address ?? null}}</li>
        </ul>
      </div>
    </div>
  </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $('#cancelorder').on('click', function() {
    let url = "{{ route('setCancelOrder') }}";
    let id = $('#detailorderid').val();
    $.get(url, {
      'id': id
    }).done(function(data) {
      console.log(data);
    })
  });
</script>
@endsection