@extends('layouts.client-layout')
@section('content')
<!--====================  breadcrumb area ====================-->
<style>
    .w-5 .h-5 {
        display: none;
    }
</style>
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
                <div class="col-lg-12 order-1 order-lg-2">
                    <!--=======  shop content wrapper  =======-->

                    <div class="shop-content-wrapper">

                        <!--=======  shop header wrapper  =======-->

                        <div class="shop-header">
                            <div class="row align-items-center">
                                <div class="col-sm-6 col-12">
                                    <!--=======  header left content  =======-->

                                    {{-- <div class="shop-header__left">
                                        <p class="result-text d-inline-block mb-0">Hiển thị 1–9 trong số 50 kết quả</p>
                                    </div> --}}

                                    <!--=======  End of header left content  =======-->
                                </div>

                                <div class="col-sm-6 col-12">
                                    <form action="{{ route('shop')}}" method="get">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Tìm kiếm theo tên</label>
                                            <input type="text" class="form-control" name="title" id="title" placeholder="Nhập tìm kiếm...">
                                        </div>
                                        <div div class="shop-header__right d-flex justify-content-start justify-content-sm-end align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sort" id="exampleRadios1" value="price" checked>
                                                <label class="form-check-label" for="exampleRadios1">Giá</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sort" id="exampleRadios2" value="title">
                                                <label class="form-check-label" for="exampleRadios2">Tên</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sort" id="exampleRadios2" value="updated_at">
                                                <label class="form-check-label" for="exampleRadios2">Mới/Cũ</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sort_by" id="exampleRadios1" value="desc" checked>
                                                <label class="form-check-label" for="exampleRadios1">Giảm dần</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sort_by" id="exampleRadios2" value="asc">
                                                <label class="form-check-label" for="exampleRadios2">Tăng dần</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary my-1">Tìm kiếm</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!--=======  End of shop header wrapper  =======-->

                        <!--=======  shop product wrapper  =======-->

                        <div class="shop-product-wrap shop-product-wrap--with-sidebar row grid">

                            @foreach($products as $item)
                            <div class="col-lg-2 col-md-6 col-sm-6 col-custom-sm-6 col-12">
                                <!--=======  grid view product  =======-->
                                <div class="single-grid-product">
                                    <div class="single-grid-product__image">
                                        <a href="{{ route('detailProduct',['id'=> $item->id]) }}" class="image-wrap">
                                            <img src="{{asset('storage/'. $item->photo)}}" class="img-fluid" alt="{{ $item->name }}" style="width: 100%;height: 250px;">
                                        </a>
                                        <div class="product-hover-icon-wrapper">
                                            <span class="single-icon single-icon--add-to-cart" style="width: 100%">
                                                <a href="{{ route('add.to.cart', $item->id) }}" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                    <i class="fa fa-shopping-basket"></i>
                                                    <span>Thêm vào giỏ hàng</span> </a></span>
                                        </div>
                                    </div>
                                    <div class="single-grid-product__content">
                                        <h3 class="title"><a href="{{ route('detailProduct',['id'=> $item->id]) }}">{{$item->title}}</a></h3>
                                        @if(empty($item->discount))
                                        <div class="price">
                                            <span class="discounted-price">{{number_format($item->price)}} VND</span>
                                        </div>
                                        @else
                                        <div class="price">
                                            <span class="main-price discounted">{{ number_format($item->price)}} VND</span><br>
                                            <span class="discounted-price">{{ number_format($item->discount)}} VND</span>
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