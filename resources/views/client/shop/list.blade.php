@extends('layouts.client-layout')
@section('content')
<!--====================  breadcrumb area ====================-->

<div class="breadcrumb-area section-space--breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <!--=======  breadcrumb wrapper  =======-->

                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">Cửa hàng</h2>
                    <ul class="breadcrumb-list">
                        <li><a href="">Trang chủ</a></li>
                        <li class="active">Cửa hàng</li>
                    </ul>
                </div>

                <!--=======  End of breadcrumb wrapper  =======-->
            </div>
        </div>
    </div>
</div>

<!--====================  End of breadcrumb area  ====================-->

<!--====================  page content wrapper ====================-->

<div class="page-content-wrapper">
    <!--=======  shop page area  =======-->

    <div class="shop-page-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1">
                    <!--=======  shop sidebar wrapper  =======-->

                    <div class="shop-sidebar-wrapper">


                        <!--=======  single sidebar widget  =======-->

                        <div class="single-sidebar-widget">
                            <h2 class="single-sidebar-widget__title">Tìm kiếm theo Giá</h2>
                            <div class="sidebar-price">
                                <div id="price-range"></div>
                                <div class="output-wrapper">
                                    <input type="text" id="price-amount" class="price-amount" readonly>
                                </div>
                            </div>
                        </div>

                        <!--=======  End of single sidebar widget  =======-->

                        <!--=======  single sidebar widget  =======-->

                        <div class="single-sidebar-widget">
                            <h2 class="single-sidebar-widget__title">Tìm kiếm theo Loại hàng</h2>

                            <ul class="single-sidebar-widget__dropdown" id="single-sidebar-widget__dropdown">
                                <li class="has-children"><a href="shop-left-sidebar.html">Bathroom</a>
                                    <ul class="sub-menu">
                                        <li><a href="shop-left-sidebar.html">Bathroom Accessories</a></li>
                                        <li><a href="shop-left-sidebar.html">Bathroom Storage</a></li>
                                        <li><a href="shop-left-sidebar.html">Bathroom Textiles</a></li>
                                    </ul>
                                </li>
                                <li class="has-children"><a href="shop-left-sidebar.html">Bedroom</a>
                                    <ul class="sub-menu">
                                        <li><a href="shop-left-sidebar.html">Bedroom Lighting</a></li>
                                        <li><a href="shop-left-sidebar.html">Bedroom Textiles & Rugs</a></li>
                                        <li><a href="shop-left-sidebar.html">Beds</a></li>
                                        <li><a href="shop-left-sidebar.html">Wardrobes</a></li>
                                    </ul>
                                </li>
                                <li class="has-children"><a href="shop-left-sidebar.html">Dining Room</a>
                                    <ul class="sub-menu">
                                        <li><a href="shop-left-sidebar.html">Dining Chairs</a></li>
                                        <li><a href="shop-left-sidebar.html">Dining sets</a></li>
                                        <li><a href="shop-left-sidebar.html">Dining Tables</a></li>
                                        <li><a href="shop-left-sidebar.html">Stools & Benches</a></li>
                                    </ul>
                                </li>
                                <li class="has-children"><a href="shop-left-sidebar.html">Living Room</a>
                                    <ul class="sub-menu">
                                        <li><a href="shop-left-sidebar.html">Armchairs</a></li>
                                        <li><a href="shop-left-sidebar.html">Cabinets</a></li>
                                        <li><a href="shop-left-sidebar.html">Chairs</a></li>
                                        <li><a href="shop-left-sidebar.html">Decorative Lighting</a></li>
                                        <li><a href="shop-left-sidebar.html">Footstools</a></li>
                                        <li><a href="shop-left-sidebar.html">Living Room Lighting</a></li>
                                        <li><a href="shop-left-sidebar.html">Sofas</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop-left-sidebar.html">Outdoor</a></li>
                                <li><a href="shop-left-sidebar.html">Uncategorized</a></li>
                            </ul>
                        </div>

                        <!--=======  End of single sidebar widget  =======-->

                        <!--=======  single sidebar widget  =======-->

                        <div class="single-sidebar-widget">
                            <h2 class="single-sidebar-widget__title">Tìm kiếm theo Thương hiệu</h2>
                            <ul class="single-sidebar-widget__dropdown">
                                <li><a href="shop-left-sidebar.html">Alexa</a></li>
                                <li><a href="shop-left-sidebar.html">Benington</a></li>
                                <li><a href="shop-left-sidebar.html">Candice</a></li>
                                <li><a href="shop-left-sidebar.html">Juliet Rowley</a></li>
                                <li><a href="shop-left-sidebar.html">Olivia Shayn</a></li>
                                <li><a href="shop-left-sidebar.html">Sarah Stencil</a></li>
                            </ul>
                        </div>

                        <!--=======  End of single sidebar widget  =======-->
                    </div>

                    <!--=======  End of shop sidebar wrapper  =======-->
                </div>

                <div class="col-lg-9 order-1 order-lg-2">
                    <!--=======  shop content wrapper  =======-->

                    <div class="shop-content-wrapper">

                        <!--=======  shop header wrapper  =======-->

                        <div class="shop-header">
                            <div class="row align-items-center">
                                <div class="col-sm-6 col-12">
                                    <!--=======  header left content  =======-->

                                    <div class="shop-header__left">
                                        <p class="result-text d-inline-block mb-0">Hiển thị 1–9 trong số 50 kết quả</p>
                                    </div>

                                    <!--=======  End of header left content  =======-->
                                </div>

                                <div class="col-sm-6 col-12">

                                    <!--=======  header right content  =======-->

                                    <div class="shop-header__right d-flex justify-content-start justify-content-sm-end align-items-center">
                                        <div class="sort-by-dropdown">
                                            <select name="sort-by" id="sort-by" class="nice-select">
                                                <option value="0">Sắp xếp</option>
                                                <option value="0">Sort By Average Rating</option>
                                                <option value="0">Sort By Newness</option>
                                                <option value="0">Sort By Price: Low to High</option>
                                                <option value="0">Sort By Price: High to Low</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!--=======  End of header right content  =======-->

                                </div>
                            </div>
                        </div>

                        <!--=======  End of shop header wrapper  =======-->

                        <!--=======  shop product wrapper  =======-->

                        <div class="shop-product-wrap shop-product-wrap--with-sidebar row grid">

                            @foreach($products as $item)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-custom-sm-6 col-12">
                                <!--=======  grid view product  =======-->

                                <div class="single-grid-product">
                                    <div class="single-grid-product__image">
                                        <div class="product-badge-wrapper">
                                            <span class="onsale">-17%</span>
                                            <span class="hot">Mới</span>
                                        </div>
                                        <a href="" class="image-wrap">
                                            <img src="{{asset('storage/'. $item->photo)}}" class="img-fluid" alt="{{ $item->name }}">
                                        </a>
                                        <div class="product-hover-icon-wrapper">
                                            <span class="single-icon single-icon--add-to-cart"><a href="{{ route('add.to.cart', $item->id) }}" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"> <i class="fa fa-shopping-basket"></i> <span>Thêm vào giỏ hàng</span> </a></span>
                                        </div>
                                    </div>
                                    <div class="single-grid-product__content">
                                        <h3 class="title"><a href="{{ route('detailProduct',['id'=> $item->id]) }}">{{$item->title}}</a></h3>
                                        @if($item->discount == '')
                                            <div class="price">
                                                <span class="main-price discounted">{{$item->price}}</span>
                                            </div>
                                        @else
                                            <div class="price">
                                                <span class="main-price discounted">{{$item->price}}</span>
                                                <span class="discounted-price">{{$item->discount}}</span>
                                            </div>
                                        @endif
                                        <!-- <div class="rating">
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star"></i>
                                        </div> -->
                                        <!-- <div class="color">
                                            <ul>
                                                <li><a class="active" href="#" data-tippy="Black" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="roundborder"><span class="color-picker black"></span></a></li>
                                                <li><a href="#" data-tippy="Blue" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="roundborder"><span class="color-picker blue"></span></a></li>
                                                <li><a href="#" data-tippy="Brown" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="roundborder"><span class="color-picker brown"></span></a></li>
                                            </ul>
                                        </div> -->
                                        <a href="{{ route('postWishlist',['id'=> $item->id]) }}" class="favorite-icon" data-tippy="Add to Wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left">
                                            <i class="fa fa-heart-o"></i>
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
                                </div>

                                <!--=======  End of grid view product  =======-->
                                
                            </div>
                            @endforeach

                        </div>

                        <!--=======  End of shop product wrapper  =======-->

                        <!--=======  pagination wrapper  =======-->

                       {{$products->links() }}

                        <!--=======  End of pagination wrapper  =======-->

                    </div>

                    <!--=======  End of shop content wrapper  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=======  End of shop page area  =======-->
</div>

<!--====================  End of page content wrapper  ====================-->
@endsection