@extends('layouts.client-layout')

@section('content')

<div class="breadcrumb-area section-space--breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <!--=======  breadcrumb wrapper  =======-->

                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">Checkout</h2>
                    <ul class="breadcrumb-list">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Checkout</li>
                    </ul>
                </div>

                <!--=======  End of breadcrumb wrapper  =======-->
            </div>
        </div>
    </div>
</div>
<div class="page-content-wrapper">
    <!--=======  checkout page wrapper  =======-->
    <div class="checkout-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="checkout-form">
                        <!-- Checkout Form s-->
                        <?php
                        $vnp_TmnCode = 'TMAIHSK1'; //Website ID in VNPAY System
                        $vnp_HashSecret = 'EYKIZFCSMVAZJGORHNILDOPRJGOITIML'; //Secret key
                        $vnp_Url = 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html';
                        $vnp_Returnurl = 'http://localhost/vnpay_php/vnpay_return.php';
                        $vnp_apiUrl = 'http://sandbox.vnpayment.vn/merchant_webapi/merchant.html';
                        //Config input format
                        //Expire
                        $startTime = date('YmdHis');
                        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));
                        ?>
                        <form action="{{ url('thanh-toan') }}" id="create_form" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="language">Loại hàng hóa </label>
                                <select name="order_type" id="order_type" class="form-control">
                                    <option value="topup">Nạp tiền điện thoại</option>
                                    <option value="billpayment">Thanh toán hóa đơn</option>
                                    <option value="fashion">Thời trang</option>
                                    <option value="other">Khác - Xem thêm tại VNPAY</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="order_id">Mã hóa đơn</label>
                                <input class="form-control" id="order_id" name="order_id" type="text" value="<?php echo date("YmdHis") ?>" />
                            </div>
                            <div class="form-group">
                                <label for="amount">Số tiền</label>
                                <input class="form-control" id="amount" name="amount" type="number" value="{{$total}}" />
                            </div>
                            <div class="form-group">
                                <label for="order_desc">Nội dung thanh toán</label>
                                <textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2">Noi dung thanh toan</textarea>
                            </div>
                            <div class="form-group">
                                <label for="bank_code">Ngân hàng</label>
                                <select name="bank_code" id="bank_code" class="form-control">
                                    <option value="">Không chọn</option>
                                    <option value="NCB"> Ngan hang NCB</option>
                                    <option value="AGRIBANK"> Ngan hang Agribank</option>
                                    <option value="SCB"> Ngan hang SCB</option>
                                    <option value="SACOMBANK">Ngan hang SacomBank</option>
                                    <option value="EXIMBANK"> Ngan hang EximBank</option>
                                    <option value="MSBANK"> Ngan hang MSBANK</option>
                                    <option value="NAMABANK"> Ngan hang NamABank</option>
                                    <option value="VNMART"> Vi dien tu VnMart</option>
                                    <option value="VIETINBANK">Ngan hang Vietinbank</option>
                                    <option value="VIETCOMBANK"> Ngan hang VCB</option>
                                    <option value="HDBANK">Ngan hang HDBank</option>
                                    <option value="DONGABANK"> Ngan hang Dong A</option>
                                    <option value="TPBANK"> Ngân hàng TPBank</option>
                                    <option value="OJB"> Ngân hàng OceanBank</option>
                                    <option value="BIDV"> Ngân hàng BIDV</option>
                                    <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                                    <option value="VPBANK"> Ngan hang VPBank</option>
                                    <option value="MBBANK"> Ngan hang MBBank</option>
                                    <option value="ACB"> Ngan hang ACB</option>
                                    <option value="OCB"> Ngan hang OCB</option>
                                    <option value="IVB"> Ngan hang IVB</option>
                                    <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="language">Ngôn ngữ</label>
                                <select name="language" id="language" class="form-control">
                                    <option value="vn">Tiếng Việt</option>
                                    <option value="en">English</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Thời hạn thanh toán</label>
                                <input class="form-control" id="txtexpire" name="txtexpire" type="text" value="<?php echo $expire; ?>" />
                            </div>
                            <div class="form-group">
                                <h3>Thông tin hóa đơn (Billing)</h3>
                            </div>
                            <div class="form-group">
                                <label>Họ tên (*)</label>
                                <input class="form-control" id="txt_billing_fullname" name="txt_billing_fullname" type="text" value="NGUYEN VAN XO" />
                            </div>
                            <div class="form-group">
                                <label>Email (*)</label>
                                <input class="form-control" id="txt_billing_email" name="txt_billing_email" type="text" value="xonv@vnpay.vn" />
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại (*)</label>
                                <input class="form-control" id="txt_billing_mobile" name="txt_billing_mobile" type="text" value="0934998386" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ (*)</label>
                                <input class="form-control" id="txt_billing_addr1" name="txt_billing_addr1" type="text" value="22 Lang Ha" />
                            </div>
                            <div class="form-group">
                                <label>Mã bưu điện (*)</label>
                                <input class="form-control" id="txt_postalcode" name="txt_postalcode" type="text" value="100000" />
                            </div>
                            <div class="form-group">
                                <label>Tỉnh/TP (*)</label>
                                <input class="form-control" id="txt_bill_city" name="txt_bill_city" type="text" value="Hà Nội" />
                            </div>
                            <div class="form-group">
                                <label>Bang (Áp dụng cho US,CA)</label>
                                <input class="form-control" id="txt_bill_state" name="txt_bill_state" type="text" value="" />
                            </div>
                            <div class="form-group">
                                <label>Quốc gia (*)</label>
                                <input class="form-control" id="txt_bill_country" name="txt_bill_country" type="text" value="VN" />
                            </div>
                            <div class="form-group">
                                <h3>Thông tin giao hàng (Shipping)</h3>
                            </div>
                            <div class="form-group">
                                <label>Họ tên (*)</label>
                                <input class="form-control" id="txt_ship_fullname" name="txt_ship_fullname" type="text" value="Nguyễn Thế Vinh" />
                            </div>
                            <div class="form-group">
                                <label>Email (*)</label>
                                <input class="form-control" id="txt_ship_email" name="txt_ship_email" type="text" value="vinhnt@vnpay.vn" />
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại (*)</label>
                                <input class="form-control" id="txt_ship_mobile" name="txt_ship_mobile" type="text" value="0123456789" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ (*)</label>
                                <input class="form-control" id="txt_ship_addr1" name="txt_ship_addr1" type="text" value="Phòng 315, Công ty VNPAY, Tòa nhà TĐL, 22 Láng Hạ, Đống Đa, Hà Nội" />
                            </div>
                            <div class="form-group">
                                <label>Mã bưu điện (*)</label>
                                <input class="form-control" id="txt_ship_postalcode" name="txt_ship_postalcode" type="text" value="1000000" />
                            </div>
                            <div class="form-group">
                                <label>Tỉnh/TP (*)</label>
                                <input class="form-control" id="txt_ship_city" name="txt_ship_city" type="text" value="Hà Nội" />
                            </div>
                            <div class="form-group">
                                <label>Bang (Áp dụng cho US,CA)</label>
                                <input class="form-control" id="txt_ship_state" name="txt_ship_state" type="text" value="" />
                            </div>
                            <div class="form-group">
                                <label>Quốc gia (*)</label>
                                <input class="form-control" id="txt_ship_country" name="txt_ship_country" type="text" value="VN" />
                            </div>
                            <div class="form-group">
                                <h3>Thông tin gửi Hóa đơn điện tử (Invoice)</h3>
                            </div>
                            <div class="form-group">
                                <label>Tên khách hàng</label>
                                <input class="form-control" id="txt_inv_customer" name="txt_inv_customer" type="text" value="Lê Văn Phổ" />
                            </div>
                            <div class="form-group">
                                <label>Công ty</label>
                                <input class="form-control" id="txt_inv_company" name="txt_inv_company" type="text" value="Công ty Cổ phần giải pháp Thanh toán Việt Nam" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" id="txt_inv_addr1" name="txt_inv_addr1" type="text" value="22 Láng Hạ, Phường Láng Hạ, Quận Đống Đa, TP Hà Nội" />
                            </div>
                            <div class="form-group">
                                <label>Mã số thuế</label>
                                <input class="form-control" id="txt_inv_taxcode" name="txt_inv_taxcode" type="text" value="0102182292" />
                            </div>
                            <div class="form-group">
                                <label>Loại hóa đơn</label>
                                <select name="cbo_inv_type" id="cbo_inv_type" class="form-control">
                                    <option value="I">Cá Nhân</option>
                                    <option value="O">Công ty/Tổ chức</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" id="txt_inv_email" name="txt_inv_email" type="text" value="pholv@vnpay.vn" />
                            </div>
                            <div class="form-group">
                                <label>Điện thoại</label>
                                <input class="form-control" id="txt_inv_mobile" name="txt_inv_mobile" type="text" value="02437764668" />
                            </div>
                            <button type="submit" class="btn btn-primary" id="btnPopup">Thanh toán Post</button>
                            <button type="submit" name="redirect" id="redirect" class="btn btn-default">Thanh toán Redirect</button>

                        </form>

                        <div class="col-lg-5">
                            <div class="row">

                                <!-- Cart Total -->
                                <div class="col-12">

                                    <h4 class="checkout-title">Tổng giá đơn hàng</h4>

                                    <div class="checkout-cart-total">
                                        <h4>Sản phẩm <span>Tổng</span></h4>

                                        @php
                                            $total = 0 
                                        @endphp
                                        @if (session('cart'))
                                            @foreach (session('cart') as $id => $details)
                                                <input type="hidden" name="data[]" value="{{$id}}">

                                                @php
                                                    $total += $details['price'] * $details['quantity'] 
                                                @endphp

                                                <table style="width:100%">
                                                    <tr data-id="{{ $id }}">
                                                        <td style="width:50%" data-th="Product" class="product-name">
                                                            <a href="">{{ $details['name'] }}</a>
                                                        </td>
                                                        <td style="width:20;text-align: end;" data-th="Price" class="product-price">
                                                            <span class="price">{{ $details['price'] }}</span>
                                                        </td>
                                                        <td style="width:10%;text-align: end;" data-th="Quantity">
                                                            X {{ $details['quantity'] }}
                                                        </td>
                                                        <td style="width:20%;text-align: end;" data-th="Subtotal" class="total-price">
                                                            <span class="price"> {{ $details['price'] * $details['quantity'] }}</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <br>
                                            @endforeach
                                        @endif
                                        {{-- <ul>
                                                        @foreach ( $quantities as $quantity )
                                                            {{$quantity}}
                                        @endforeach
                                        @foreach ( $names as $name )
                                        {{$name}}
                                        @endforeac
                                        @foreach ( $subs as $sub )
                                        {{$sub}}
                                        @endforeach
                                        <li>Cillum dolore tortor nisl X 01 <span>$25.00</span></li>

                                        </ul> --}}

                                        <p>Tổng tiền tạm tính <span>{{$total}}</span></p>
                                        <p>Phí ship <span>00.00</span></p>

                                        <h4>Tổng cộng <span>{{$total}}</span></h4>
                                        <input type="hidden" name="quantity" value="{{ $details['quantity'] }}">
                                        <input type="hidden" name="amount" value="{{ $total }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--=======  End of checkout page wrapper  =======-->
</div>

<!--====================  End of page content wrapper  ====================-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        let url = "{{route('getCity')}}"
        $.get(url).done(function(data) {
            let text = "";
            data.forEach(element => {
                text += `
                            <option value="${element.name}" data-id="${element.id}">${element.name}</option>
                            `;
            });
            document.getElementById("city").innerHTML = '<option >Tỉnh/Thành Phố</option>' + text;
        });
    });
    $('#city').change(function() {
        let city = $("#city option:selected").data("id");
        let city2 = $("#city option:selected").text();
        let url = "{{route('getDistrict')}}"
        $.get(url, {
            id: city,
            text: city2
        }).done(function(data) {
            const entries = Object.entries(data);
            let text = "";
            entries.forEach(element => {
                text += `
                            <option value="${element[1]}" data-id="${element[0]}">${element[1]}</option>
                            `;
            });
            document.getElementById("district").innerHTML = '<option >Quận/Huyện</option>' + text;
        });
    });
    $('#district').change(function() {
        let district = $("#district option:selected").data("id");
        let district2 = $("#district option:selected").text();
        let url = "{{route('getWard')}}"
        $.get(url, {
            id: district,
            text: district2
        }).done(function(data) {
            let text = "";
            const entries = Object.entries(data);
            entries.forEach(element => {
                text += `
                            <option value="${element[1]}">${element[1]}</option>
                            `;
            });
            document.getElementById("ward").innerHTML = '<option >Phường/Xã</option>' + text;
        });
    })
</script>
@endsection