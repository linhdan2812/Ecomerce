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
      <div class="top" style="display: flex;justify-content: space-between">
        <h3 class="head-page">Chi tiết đơn hàng</h3>

        <!-- Modal -->
        <div id="ex1" class="modal col-md-6" style="border-radius: 2px;">
          <h3>Chỉnh sửa đơn hàng</h3>
          <form action="{{ route('admin.order.update',['id'=>$detailorder->id])}}" method="get">
            <div>
              <label for="">Lí do</label>
{{--              <input type="text" name="note" id="note" value="note">--}}
              <textarea cols="50" rows="5" name="note" id="note" value="note" ></textarea>
            </div>
            <div class="mb-3">
              <label for="">Chuyển trạng thái đơn hàng</label>
              <select class="custom-select" name="value" id="">
                <option value="outStock">Đã hết hàng</option>
                <option value="shipping">Đang giao hàng</option>
                <option value="cancel">Đã hủy đơn</option>
                <option value="pending">Chờ xử lí</option>
                <option value="success">Đã giao hàng</option>
                <option value="repeat">Hoàn hàng</option>
              </select>
            </div>
            <input type="hidden" name="id" value="{{$detailorder->id}}">
            <div style="text-align: center">
              <button class="btn btn-primamry"><a href="#" rel="modal:close">Đóng</a></button>
              <button class="btn btn-primamry" type="submit" style="color: #00bbff">Lưu</button>
            </div>
          </form>
        </div>

        <a href="#ex1" rel="modal:open" style="text-align: end;color: #00bbff;margin: 30px;border: 1px solid #00bbff;border-radius: 5px;padding: 10px;">
          Chỉnh sửa đơn hàng
        </a>
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
        <!-- <a href="{{route('change.order',['id'=>$request_order->id_order])}}" class="btn btn-primary">Xác nhận đổi hàng cho khách</a> -->
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
          @foreach($test as $key)
          <tr>
            <td align="left">
                <a title="">{{$key['name']}}</a>
            </td>
            <td><a class="img"><img src="{{asset('storage/'.$key['image'])}}" width="70" alt=""></a></td>
            <td align="center">{{number_format($key['price'],0,'.')}} VND</td>
            <td align="center">{{$key['quantity']}}</td>
            <td align="right">{{number_format($key['price'] * $key['quantity'],0,'.')}} VND</td>
          </tr>
          @endforeach
        </table>
      </div>
      <ul class="order-total">
        <li><b>Tổng tiền hàng:</b> <span> {{ number_format($detailorder->vnp_Amount)}} VND</span></li>
        <li><b>Giảm giá:</b> <span>{{ $detailorder->coupon ?? 0 }}</span></li>
        <li><b>Phí vận chuyển:</b> <span>{{ $detailorder->shipping_id ?? 0}}</span></li>
        <li><b>Tổng số tiền:</b> <b>{{ number_format($detailorder->vnp_Amount)}} VND</b></li>
        <li><b>Phương thức thanh toán: </b> <small>{{ $detailorder->vnp_CardType}}</small></li>
        <li><b>Tình trạng đơn hàng:</b>
          @if($detailorder->status_order == 'pending' && $detailorder->vnp_TransactionStatus == '00')
          Đang xử lý
          @elseif($detailorder->status_order == 'repeat')
          Đã Hoàn hàng
          @elseif($detailorder->status_order == 'outStock')
          Đã hết hàng
          @elseif($detailorder->status_order == 'confirm' && $order->vnp_TransactionStatus == '00')
          Đã xác nhận
          @elseif( ($detailorder->status_order == 'pending' ) && ( $detailorder->vnp_TransactionStatus == '02' || $detailorder->vnp_TransactionStatus == null ))
          Đang chờ xử lý
          @elseif( ( $detailorder->status_order == 'cancel' || $detailorder->status_order == 'pending' ) && ( $detailorder->vnp_TransactionStatus == '00' || $detailorder->vnp_TransactionStatus == null ))
          Đã hủy đơn hàng
          @elseif($detailorder->status_order == 'shipping' && $detailorder->vnp_TransactionStatus == '00')
          Đang giao hàng
          @elseif($detailorder->status_order == 'success')
          Đã giao hàng
          @endif</li>
        <li><b>Lịch sử giao hàng: </b> <ul class="order-total"> @foreach (explode(",",$detailorder->note) as $item)
          <li>{{$item }}</li>
        @endforeach</ul></li>
      </ul>
      <div class="order-address-person">
        <b>
          <h4>Địa chỉ nhận hàng</h4>
        </b>
        <ul>
          <li><span><b> Họ và tên: </b></span>{{ $detailorder->vnp_Bill_FirstName . ' ' . $detailorder->vnp_Bill_LastName ?? null}}</li>
          <li><span><b>Số điện thoại: </b></span>{{ $detailorder->vnp_Bill_Mobile ?? null}}</li>
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
