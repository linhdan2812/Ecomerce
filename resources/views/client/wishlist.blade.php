@extends('layouts.client-layout')
@section('content')
<div class="breadcrumb-area section-space--breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <!--=======  breadcrumb wrapper  =======-->

                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">Wishlist</h2>
                    <ul class="breadcrumb-list">
                        <li><a href="">Home</a></li>
                        <li class="active">Wishlist</li>
                    </ul>
                </div>

                <!--=======  End of breadcrumb wrapper  =======-->
            </div>
        </div>
    </div>
</div>
<div class="page-content-wrapper">
    <!--=======  shopping cart wrapper  =======-->

    <div class="shopping-cart-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  cart table  =======-->

                    <div class="cart-table-container">
                        <table class="cart-table">
                            <thead>
                                <tr>
                                    <th class="product-name" colspan="2">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-quantity">Stock Status</th>
                                    <th class="product-subtotal">&nbsp;</th>
                                    <th class="product-remove">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="product-details-basic.html">
                                            <img src="{{asset('storage/'. $item->photo)}}" class="img-fluid" alt="">
                                        </a>
                                    </td>
                                    <td class="product-name">
                                        <a href="product-details-basic.html">{{ $item->title }}</a>
                                        <span class="product-variation">Color: Black</span>
                                    </td>

                                    <td class="product-price"><span class="price">{{ $item->price }}</span></td>

                                    <td class="product-quantity">
                                        <div class="pro-qty d-inline-block mx-0">
                                            <input type="text" value="1">
                                        </div>
                                    </td>

                                    <td class="stock-status">
                                        <span class="stock-stat-message">{{ $item->stock  == 0 ? 'IN STOCK' : 'done'}}</span>
                                    </td>

                                    <td class="add-to-cart"><button class="theme-button theme-button--alt theme-button--wishlist"><a href="{{ route('add.to.cart', $item->id) }}">ADD TO CART</a></button></td>

                                    <td class="product-remove">
                                        <a href="">
                                            <i class="pe-7s-close"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!--=======  End of cart table  =======-->
                </div>

            </div>
        </div>
    </div>

    <!--=======  End of shopping cart wrapper  =======-->
</div>
@endsection