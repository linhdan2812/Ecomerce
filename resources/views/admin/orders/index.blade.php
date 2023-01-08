@extends('layouts.admin-layout')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2>Danh sách đơn hàng</h2>
                @if(Session::has('msg'))
                    <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
                @endif
                <form action="{{ route('admin.order.list') }}" method="get">
                    @csrf
                    <div style="display: flex;">
                        <div style="display: flex;height: 30px;margin-right: 30px;">
                            <p>Tìm kiếm theo trạng thái</p>
                            <select class="select" style="height: 100%;margin-left: 10px;" name="searchStatus">
                                <option value="all">Tất cả</option>
                                <option value="pending">Chờ xử lý</option>
                                <option value="shipping">Đang giao hàng</option>
                                <option value="success">Đã giao hàng</option>
                                <option value="cancel">Đã hủy</option>
                                <option value="finished">Đã hoàn thành</option>
                            </select>
                        </div>
                        <div style="display: flex;height: 30px;margin-right: 30px;">
                            <p>Tìm kiếm theo mã đơn hàng</p>
                            <input type="text" name="searchId" style="height: 100%;margin-left: 10px;">
                        </div>
                        <button type="submit" class="btn btn-primary" style="padding: 0 10px;">Tìm kiếm</button>
                    </div>
                </form>
                <form action="{{ route('product.export') }}">
                    @csrf
                    <label for="">Tháng</label>
                    <input type="number" name="month" id="month" min="1" max="12" required>
                    <label for="">Năm</label>
                    <input type="number" name="year" pattern="\d{4}" min="2000" id="year" required>
                    <button class="btn btn-success">
                    Xuất file CSV
                    </button>
                </form>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Đơn hàng</th>
                                <th scope="col">Người mua</th>
                                <th scope="col">Thanh toán</th>
                                <th scope="col">Chi tiết đơn hàng</th>
                                <th scope="col">Tình trạng đơn hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->vnp_TxnRef}}</td>
                                <td>{{$order->vnp_Bill_FirstName . ' ' . $order->vnp_Bill_LastName}}</td>
                                @if($order->vnp_TransactionStatus == '00')
                                <td>Đã thanh toán thành công</td>
                                @elseif($order->vnp_TransactionStatus == null)
                                <td>Thanh toán thất bại</td>
                                @else
                                <td></td>
                                @endif

                                <!-- Chi tiết đơn hàng -->
                                <td><a href="{{route('admin.order.detail',['id'=>$order->id])}}">Xem</a></td>

                                <!-- Trạng thái đơn hàng -->
                                @if($order->status_order == 'pending' && $order->vnp_TransactionStatus == '00')
                                <td><a href="#" class="btn btn-warning">Đang xử lý</a></td>
                                @elseif($order->status_order == 'outStock')
                                <td class="btn btn-warning">Đã hết hàng</td>
                                @elseif($order->status_order == 'confirm' && $order->vnp_TransactionStatus == '00')
                                <td class="btn btn-warning">Đã xác nhận</td>
                                @elseif($order->status_order == 'repeat' && $order->vnp_TransactionStatus == '00')
                                <td class="btn btn-warning">Đã hoàn hàng</td>
                                @elseif( ($order->status_order == 'pending' ) && ( $order->vnp_TransactionStatus == '02' || $order->vnp_TransactionStatus == null ))
                                <td><a href="" class="btn btn-danger">Đang chờ xử lý</a></td>
                                @elseif( ( $order->status_order == 'cancel' || $order->status_order == 'pending' ) && ( $order->vnp_TransactionStatus == '00' || $order->vnp_TransactionStatus == null ))
                                <td><a href="" class="btn btn-danger">Đã hủy đơn hàng</a></td>
                                @elseif($order->status_order == 'shipping' && $order->vnp_TransactionStatus == '00')
                                <td><a href="#" class="btn btn-info">Đang giao hàng</a></td>
                                @elseif($order->status_order == 'success')
                                <td><a href="" class="btn btn-success">Đã giao hàng</a></td>
                                @elseif($order->status_order == 'finished')
                                <td><a href="#" class="btn btn-info">Đã hoàn thành</a></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{ $orders->links() }}
</div>
@endsection