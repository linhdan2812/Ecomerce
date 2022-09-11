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
                            <form action="{{route('postcheckout')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row row-40">
                                    <div class="col-lg-7">
                                        <!-- Billing Address -->
                                        <div id="billing-form" class="billing-form">
                                            <h4 class="checkout-title">Billing Address</h4>
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <label>Họ tên</label>
                                                    <input type="text"  name="name" value={{$user->name}} placeholder="{{$user->name}}">
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <label>Địa chỉ Email</label>
                                                    <input type="email" name="email" value={{$user->email}} placeholder="{{$user->email}}">
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <label>Số điện thoại</label>
                                                    <input type="text" name="phone" value={{$user->phone ?? null}} placeholder="{{$user->phone ?? 'Nhập số điện thoại'}}">
                                                </div>
                                                <div class="col-md-6 col-12 form-group select-box">
                                                    <select name="city" id="city" class="form-control">
                                                        <option value="">Tỉnh/Thành Phố</option>
                                                    </select>
                                                    <i class="fas fa-caret-circle-down"></i>
                                                </div>
                                                <div class="col-md-6 col-12 form-group select-box">
                                                    <select name="district" id="district" class="form-control">
                                                        <option value="">Quận/Huyện</option>
                                                    </select>
                                                    <i class="fas fa-caret-circle-down"></i>
                                                </div>
                                                <div class="col-md-6 col-12 form-group select-box">
                                                    <select name="ward" id="ward" class="form-control">
                                                        <option value="">Phường/Xã</option>
                                                    </select>
                                                    <i class="fas fa-caret-circle-down"></i>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <label>Địa chỉ cụ thể</label>
                                                    <input type="text" name="addressdetail" value={{$address->detailadress ?? null}} placeholder="{{$address->detailadress ?? 'Nhập địa chị cụ thể'}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-5">
                                        <div class="row">

                                            <!-- Cart Total -->
                                            <div class="col-12">

                                                <h4 class="checkout-title">Cart Total</h4>

                                                <div class="checkout-cart-total">

                                                    <h4>Product <span>Total</span></h4>
                                                    @php $total = 0 @endphp
                                                    @if (session('cart'))
                                                        @foreach (session('cart') as $id => $details)
                                                            @php $total += $details['price'] * $details['quantity'] @endphp
                                                    <table style="width:100%">
                                                        <tr data-id="{{ $id }}">
                                                            <td style="width:50%" data-th="Product" class="product-name">
                                                                <a href="product-details-basic.html">{{ $details['name'] }}</a>
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
                                                        @endforeach
                                                        @foreach ( $subs as $sub )
                                                        {{$sub}}
                                                        @endforeach
                                                        <li>Cillum dolore tortor nisl X 01 <span>$25.00</span></li>
                                                        
                                                    </ul> --}}  

                                                    <p>Sub Total <span>{{$total}}</span></p>
                                                    <p>Shipping Fee <span>00.00</span></p>

                                                    <h4>Grand Total <span>{{$total}}</span></h4>
                                                    <input type="hidden" name="quantity" value="{{ $details['quantity'] }}">
                                                    <input type="hidden" name="total" value="{{ $total }}">
                                                </div>
                                            </div>

                                            <!-- Payment Method -->
                                            <div class="col-12">

                                                <h4 class="checkout-title">Payment Method</h4>

                                                <div class="checkout-payment-method">

                                                    <div class="single-method">
                                                        <input type="radio" id="payment_check" name="payment-method" value="check">
                                                        <label for="payment_check">Check Payment</label>
                                                        <p data-method="check">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                                    </div>

                                                    <div class="single-method">
                                                        <input type="radio" id="payment_bank" name="payment-method" value="bank">
                                                        <label for="payment_bank">Direct Bank Transfer</label>
                                                        <p data-method="bank">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                                    </div>

                                                    <div class="single-method">
                                                        <input type="radio" id="payment_cash" name="payment-method" value="cash">
                                                        <label for="payment_cash">Cash on Delivery</label>
                                                        <p data-method="cash">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                                    </div>

                                                    <div class="single-method">
                                                        <input type="radio" id="payment_paypal" name="payment-method" value="paypal">
                                                        <label for="payment_paypal">Paypal</label>
                                                        <p data-method="paypal">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                                    </div>

                                                    <div class="single-method">
                                                        <input type="radio" id="payment_payoneer" name="payment-method" value="payoneer">
                                                        <label for="payment_payoneer">Payoneer</label>
                                                        <p data-method="payoneer">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                                    </div>

                                                    <div class="single-method">
                                                        <input type="checkbox" id="accept_terms">
                                                        <label for="accept_terms">I’ve read and accept the terms & conditions</label>
                                                    </div>

                                                </div>

                                                <button class="theme-button place-order-btn">PLACE ORDER</button>
                                                <button class="theme-button place-order-btn"><a href="{{route('thanhtoan')}}/?total={{$total}}">VNPAY</a></button>

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
                document.getElementById("city").innerHTML = text;
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
                document.getElementById("district").innerHTML = text;
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
                document.getElementById("ward").innerHTML = text;
            });
        })
    </script>
@endsection