@extends('layouts.account')
@section('section')
    <div class="col-lg-9">
        <div class="main-content">
            <div class="top-content v2 wow fadeInUp">
                <h4 class="title">Đơn hàng của tôi</h4>
                <div class="control">
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
                </div>
            </div>
            <div class="body-content">
                <div class="order-list v2 wow fadeInUp">
                    <div class="body table-responsive">
                        <table class="table order-history-table">
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Ngày đặt hàng</th>
                                <th>Tổng tiền</th>
                                <th width="26%">Trạng thái thanh toán</th>
                                <th width="20%">Trạng thái đơn hàng</th>
                            </tr>
                            @foreach ($orders as $item)
                                <tr>
                                    <td><a href="{{ route('order.detail',[ 'id' => $item->id])}}" title="">{{$item->vnp_TxnRef}}</a></td>
                                    <td>{{$item->created_at}}</td>
                                    <td><b>{{$item->vnp_Amount}}</b></td>

                                    <!-- Trạng thái thanh toán -->
                                    @if($item->vnp_TransactionStatus == '00')
                                    <td>Thanh toán thành công</td>
                                    @elseif($item->vnp_TransactionStatus == null)
                                    <td>Đã hủy giao dịch</td>
                                    @endif

                                    <!-- Trạng thái đơn hàng -->
                                    @if($item->status_order == 'pending' && $item->vnp_TransactionStatus == '00')
                                    <td>Đang xử lý</td>
                                    @elseif($item->status_order == 'confirm' && $item->vnp_TransactionStatus == '00')
                                    <td>Đã xác nhận</td>
                                    @elseif( ( $item->status_order == 'cancel' || $item->status_order == 'pending' ) && ( $item->vnp_TransactionStatus == '00' || $item->vnp_TransactionStatus == null ))
                                    <td>Đã hủy đơn hàng</td>
                                    @elseif($item->status_order == 'shipping' && $item->vnp_TransactionStatus == '00')
                                    <td>Đang giao hàng</td>
                                    @elseif($item->status_order == 'success' && $item->vnp_TransactionStatus == '00')
                                    <td>Đã giao hàng</td>
                                    @endif

                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
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