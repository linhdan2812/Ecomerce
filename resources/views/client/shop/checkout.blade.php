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
                            <form action="{{ url('thanh-toan') }}" id="create_form" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row row-40">
                                    <div class="col-lg-7">
                                        <div id="billing-form" class="billing-form">
                                            <h4 class="checkout-title">Tạo mới đơn hàng</h4>
                                            <div class="form-group">
                                                <label for="language">Loại hàng hóa </label>
                                                <select name="order_type" id="order_type" class="form-control">
                                                    <option value="billpayment">Thanh toán hóa đơn</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" id="order_id" name="order_id" type="hidden"
                                                    value="<?php echo date('YmdHis'); ?>" />
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" id="order_desc" name="order_desc" type="hidden"
                                                    value="Thanh toan hoa don mua hang" />
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
                                                <input type="hidden" name="language" value="vn" id="language">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" id="txtexpire" name="txtexpire" type="hidden"
                                                    value="<?php echo $expire; ?>" />
                                            </div>
                                        </div>
                                        <div id="billing-form" class="billing-form">
                                            <div class="form-group">
                                                <label >Họ tên (*)</label>
                                                <input class="form-control" id="txt_billing_fullname"
                                                    name="txt_billing_fullname" type="text" placeholder="Nhập vào họ tên"/>             
                                            </div>
                                            <div class="form-group">
                                                <label >Email (*)</label>
                                                <input class="form-control" id="txt_billing_email"
                                                    name="txt_billing_email" type="text" placeholder="Nhập vào email"/>   
                                            </div>
                                            <div class="form-group">
                                                <label >Số điện thoại (*)</label>
                                                <input class="form-control" id="txt_billing_mobile"
                                                    name="txt_billing_mobile" type="text" placeholder="Nhập vào số điện thoại"/>   
                                            </div>
                                            <div class="form-group select-box">
                                                <label >Tỉnh/TP (*)</label>
                                                <select name="txt_bill_city" id="city" class="form-control">
                                                    <option value="">Tỉnh/Thành Phố</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label >Địa chỉ cụ thể (*)</label>
                                                <input class="form-control" id="txt_billing_addr1"
                                                    name="txt_billing_addr1" type="text" placeholder="Nhập vào địa chỉ"/>   
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-5">
                                        <div class="row">

                                            <!-- Cart Total -->
                                            <div class="col-12">

                                                <h4 class="checkout-title">Tổng giá đơn hàng</h4>

                                                <div class="checkout-cart-total">

                                                    <h4>Sản phẩm <span>Tổng</span></h4>
                                                    @php $total = 0 @endphp
                                                    @if (session('cart'))
                                                        @foreach (session('cart') as $id => $details)
                                                        <input type="hidden" name="data[]" value="{{$id}}">
                                                            @php $total += $details['price'] * $details['quantity'] @endphp
                                                    <table style="width:100%">
                                                        <tr data-id="{{ $id }}">
                                                            <td style="width:50%" data-th="Product" class="product-name">
                                                                <a href="">{{ $details['name'] }}</a>
                                                            </td>
                                                            <td style="width:20;text-align: end;%" data-th="Price" class="product-price"><span class="price">{{ $details['price'] }}</span></td>
                                                            <td style="width:10%;text-align: end;" data-th="Quantity" >
                                                                X           {{ $details['quantity'] }}
                                                            </td>
                                                            <td style="width:20%;text-align: end;" data-th="Subtotal" class="total-price"><span class="price"> {{ $details['price'] * $details['quantity'] }}</span></td>
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

                                            <!-- Payment Method -->
                                            <div class="col-12">
                                                <button type="submit" name="redirect" id="redirect" class="theme-button place-order-btn">Thanh toán</button>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </form>
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
       $( document ).ready(function(){
            let url = "{{route('getCity')}}"
            $.get(url).done(function( data ) {
                let text = "";
                data.forEach(element => {
                    text +=`
                            <option value="${element.name}" data-id="${element.id}">${element.name}</option>
                            `; 
                });
                document.getElementById("city").innerHTML = '<option >Tỉnh/Thành Phố</option>' + text;
            });
        });
        $('#city').change(function(){
            let city = $( "#city option:selected" ).data("id");
            let city2 = $( "#city option:selected" ).text();
            let url = "{{route('getDistrict')}}"
            $.get(url,{id:city , text:city2}).done(function( data ) {
                const entries = Object.entries(data);
                let text = "";
                entries.forEach(element => {
                    text +=`
                            <option value="${element[1]}" data-id="${element[0]}">${element[1]}</option>
                            `; 
                });
                document.getElementById("district").innerHTML = '<option >Quận/Huyện</option>' + text;
            });
        });
        $('#district').change(function(){
            let district = $( "#district option:selected" ).data("id");
            let district2 = $( "#district option:selected" ).text();
            let url = "{{route('getWard')}}"
            $.get(url,{id:district, text:district2}).done(function( data ) {
                let text = "";
                const entries = Object.entries(data);
                entries.forEach(element => {
                    text +=`
                            <option value="${element[1]}">${element[1]}</option>
                            `; 
                });
                document.getElementById("ward").innerHTML = '<option >Phường/Xã</option>' + text;
            });
        })
    </script>
@endsection