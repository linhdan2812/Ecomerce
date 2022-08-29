@extends('layouts.account')
@section('section')
    {{-- <div class="col-lg-9">
        <div class="main-content">
            <div class="wrap-process-order">
                <div class="top">
                    <h3 class="head-page">Chi tiết đơn hàng</h3>
                    <!-- <div class="right">
                        <button class="btn-second gray" data-toggle="modal" data-target="#modal-cancel">Hủy đơn hàng</button>
                    </div> -->
                </div>
                <div class="order-info">
                    <span class="code">Đơn hàng: 45678901</span>
                    <span class="time">Ngày đặt hàng: 20/02/2021</span>
                </div>
                <div class="order-process">
                    <div class="item active">
                        <div class="icon"><img src="images/ic-process1.png" alt=""></div>
                        <p>Đang xử lý</p>
                    </div>
                    <div class="item active">
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
                        <tr>
                            <td>
                                <div class="item-cart v2">
                                    <a href="" class="img"><img src="images/book-pay2.jpg" alt=""></a>
                                    <div class="ct">
                                        <h3 class="title">
                                            <a href="" title="">Giáo trình Hán ngữ 1 + 2 - Phiên bản tiếng Trung Dương Châu</a>
                                        </h3>
                                    </div>
                                </div>    
                            </td>
                            <td align="center">250.000 đ</td>
                            <td align="center">
                                2
                            </td>
                            <td align="right">500.000 đ</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="item-cart v2">
                                    <a href="" class="img"><img src="images/book-pay3.jpg" alt=""></a>
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
                        <tr>
                            <td>
                                <div class="item-cart v2">
                                    <a href="" class="img"><img src="images/book-pay4.jpg" alt=""></a>
                                    <div class="ct">
                                        <h3 class="title">
                                            <a href="" title="">Giáo trình Hán ngữ 1 + 2 - Phiên bản tiếng Trung Dương Châu</a>
                                        </h3>
                                    </div>
                                </div>    
                            </td>
                            <td align="center">122.000 đ</td>
                            <td align="center">
                                1
                            </td>
                            <td align="right">122.000 đ</td>
                        </tr>
                    </table>
                </div>
                <ul class="order-total">
                    <li>Tổng tiền hàng:  <span>1.304.000 đ</span></li>
                    <li>Giảm giá:  <span>13.400 đ</span></li>
                    <li>Phí vận chuyển:  <span>24.000đ</span></li>
                    <li>Tổng số tiền:  <b>1.328.000 đ</b></li>
                    <li>Phương thức thanh toán <small>COD</small></li>
                </ul>
                <div class="order-address-person">
                    <p class="title">địa chỉ nhận hàng</p>
                    <ul>
                        <li><span>Họ và tên:</span>NGUYỄN NHẬT ANH</li>
                        <li><span>Số Điện thoại:</span>(+84) 368 123 123</li>
                        <li><span>Địa chỉ:</span>Tầng 10, tháp C tòa nhà Central Point, Trung Kính Phường Yên Hòa Quận Cầu Giấy Hà Nội</li>
                    </ul>
                    <div class="back-order">
                        <a href="javascript:;" title=""><i class="far fa-long-arrow-alt-left"></i> <span>Trở về đơn hàng</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
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
                                <th>Ngày mua</th>
                                <th>Tổng tiền</th>
                                <th width="26%">Trạng thái thanh toán</th>
                                <th width="20%">Trạng thái đơn hàng</th>
                            </tr>
                            @foreach ($orders as $item)
                                <tr>
                                    <td><a href="javascript:;" title="">{{$item->order_number}}</a></td>
                                    <td>{{$item->created_at}}</td>
                                    <td><b>{{$item->total_amount}}</b></td>
                                    <td>{{$item->payment_status}}</td>
                                    <td>{{$item->status}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        {{ $orders->links()}}
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