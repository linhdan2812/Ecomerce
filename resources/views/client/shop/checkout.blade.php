@extends('index')

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
                                                    <label>Name</label>
                                                    <input type="text"  name="name" value={{$users->name}} placeholder="{{$users->name}}">
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <label>Email Address*</label>
                                                    <input type="email" name="email" value={{$users->email}} placeholder="{{$users->email}}">
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <label>Phone no*</label>
                                                    <input type="text" name="phone" placeholder="Phone number">
                                                </div>
                                                <div class="col-12">
                                                    <label>Company Name</label>
                                                    <input type="text" name="" placeholder="Company Name">
                                                </div>
                                                <div class="col-12">
                                                    <label>Address*</label>
                                                    <input type="text" name="address1" placeholder="Address line 1">
                                                    <input type="text" name="address2" placeholder="Address line 2">
                                                </div>
                                                {{-- <div class="col-md-6 col-12">
                                                    <label>Country*</label>
                                                    <select name="" class="nice-select">
                                                        <option>Bangladesh</option>
                                                        <option>China</option>
                                                        <option>country</option>
                                                        <option>India</option>
                                                        <option>Japan</option>
                                                    </select>
                                                </div> --}}
                                                <div class="col-md-6 col-12">
                                                    <label>Town/City*</label>
                                                    <input type="text" name="city" placeholder="Town/City">
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
                                                        
                                                    <tr  data-id="{{ $id }}">
                                                            <td data-th="Product" class="product-name">
                                                                <a href="product-details-basic.html">{{ $details['name'] }}</a>
                                                            </td>
                                                            <td data-th="Price" class="product-price"><span class="price">${{ $details['price'] }}</span></td>
                                                            <td data-th="Quantity">
                                                            {{ $details['quantity'] }}
                                                            </td>
                                                            <td data-th="Subtotal" class="total-price"><span class="price"> ${{ $details['price'] * $details['quantity'] }}</span></td>
                                                </tr>
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
                                                    <p>Shipping Fee <span>$00.00</span></p>

                                                    <h4>Grand Total <span>{{$total}}</span></h4>
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

@endsection