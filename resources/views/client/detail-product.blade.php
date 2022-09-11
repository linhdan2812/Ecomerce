@extends('layouts.client-layout')
@section('content')
    <div class="breadcrumb-area section-space--breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <!--=======  breadcrumb wrapper  =======-->

                    <div class="breadcrumb-wrapper">
                        <h2 class="page-title">Shop</h2>
                        <ul class="breadcrumb-list">
                            <li><a href="/">Home</a></li>
                            <li><a href="/shop">Shop</a></li>
                            <li class="active">Shop product</li>
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
        <!--=======  single product slider details area  =======-->

        <div class="single-product-slider-details-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <!--=======  product details slider area  =======-->

                        <div class="product-details-slider-area product-details-slider-area--side-move">

                            <div class="product-badge-wrapper">
                                <span class="hot">Hot</span>
                            </div>

                            <div class="row row-5">
                                <div class="col-md-9 order-1 order-md-2">
                                    <div class="big-image-wrapper">
                                        <div class="enlarge-icon">
                                            <a class="btn-zoom-popup" href="javascript:void(0)" data-tippy="Click to enlarge" data-tippy-placement="left" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"><i class="pe-7s-expand1"></i></a>
                                        </div>
                                        <div class="product-details-big-image-slider-wrapper product-details-big-image-slider-wrapper--side-space theme-slick-slider" data-slick-setting='{
                    "slidesToShow": 1,
                    "slidesToScroll": 1,
                    "arrows": false,
                    "autoplay": false,
                    "autoplaySpeed": 5000,
                    "fade": true,
                    "speed": 500,
                    "prevArrow": {"buttonClass": "slick-prev", "iconClass": "fa fa-angle-left" },
                    "nextArrow": {"buttonClass": "slick-next", "iconClass": "fa fa-angle-right" }
                }' data-slick-responsive='[
                    {"breakpoint":1501, "settings": {"slidesToShow": 1, "arrows": false} },
                    {"breakpoint":1199, "settings": {"slidesToShow": 1, "arrows": false} },
                    {"breakpoint":991, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} },
                    {"breakpoint":767, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} },
                    {"breakpoint":575, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} },
                    {"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} }
                ]'>
                                            <div class="single-image">
                                                <img src="{{asset('storage/'. $productDetail->photo)}}" class="img-fluid" alt="">
                                            </div>
                                            <div class="single-image">
                                                <img src="assets/img/products/big1-2.jpg" class="img-fluid" alt="">
                                            </div>
                                            <div class="single-image">
                                                <img src="assets/img/products/big1-3.jpg" class="img-fluid" alt="">
                                            </div>
                                            <div class="single-image">
                                                <img src="assets/img/products/big1-4.jpg" class="img-fluid" alt="">
                                            </div>
                                            <div class="single-image">
                                                <img src="assets/img/products/big1-5.jpg" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 order-2 order-md-1">
                                    <div class="product-details-small-image-slider-wrapper product-details-small-image-slider-wrapper--vertical-space theme-slick-slider" data-slick-setting='{
                "slidesToShow": 3,
                "slidesToScroll": 1,
                "centerMode": false,
                "arrows": true,
                "vertical": true,
                "autoplay": false,
                "autoplaySpeed": 5000,
                "speed": 500,
                "asNavFor": ".product-details-big-image-slider-wrapper",
                "focusOnSelect": true,
                "prevArrow": {"buttonClass": "slick-prev", "iconClass": "fa fa-angle-up" },
                "nextArrow": {"buttonClass": "slick-next", "iconClass": "fa fa-angle-down" }
            }' data-slick-responsive='[
                {"breakpoint":1501, "settings": {"slidesToShow": 3, "arrows": true} },
                {"breakpoint":1199, "settings": {"slidesToShow": 3, "arrows": true} },
                {"breakpoint":991, "settings": {"slidesToShow": 3, "arrows": true, "slidesToScroll": 1} },
                {"breakpoint":767, "settings": {"slidesToShow": 3, "arrows": false, "slidesToScroll": 1, "vertical": false, "centerMode": true} },
                {"breakpoint":575, "settings": {"slidesToShow": 3, "arrows": false, "slidesToScroll": 1, "vertical": false, "centerMode": true} },
                {"breakpoint":479, "settings": {"slidesToShow": 2, "arrows": false, "slidesToScroll": 1, "vertical": false, "centerMode": true} }
            ]'>
                                        <div class="single-image">
                                            <img src="{{asset('storage/'. $productDetail->photo)}}" class="img-fluid" alt="">
                                        </div>
                                        <div class="single-image">
                                            <img src="assets/img/products/big1-2.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="single-image">
                                            <img src="assets/img/products/big1-3.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="single-image">
                                            <img src="assets/img/products/big1-4.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="single-image">
                                            <img src="assets/img/products/big1-5.jpg" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <!--=======  End of product details slider area  =======-->
                    </div>
                    <div class="col-lg-6">
                        <!--=======  product details description area  =======-->

                        <div class="product-details-description-wrapper">
                            <h2 class="item-title">{{$productDetail->title}}</h2>
                            <p class="price">
                                <span class="main-price discounted">{{$productDetail->price}}</span>
                                <span class="discounted-price">{{$productDetail->discount ?? null}}</span>
                            </p>

                            <p class="description">{{$productDetail->description ?? null}}</p>

                            <div class="add-to-cart-btn d-inline-block">
                                <a class="theme-button theme-button--alt" href="{{ route('add.to.cart', $productDetail->id) }}">BUY NOW</a>
                            </div>

                            <div class="quick-view-other-info">
                                <div class="other-info-links">
                                    <a href="{{ route('postWishlist',['id'=> $productDetail->id]) }}"><i class="fa fa-heart-o"></i> ADD TO WISHLIST</a>
                                    <a href="javascript:void(0)"><i class="fa fa-exchange"></i> COMPARE</a>
                                </div>

                                <div class="product-brand">
                                    <a href="shop-left-sidebar.html">
                                        <img src="assets/img/brands/brand-2.png" class="img-fluid" alt="">
                                    </a>
                                </div>

                                <table>
                                    <tr class="single-info">
                                        <td class="quickview-title">Brand: </td>
                                        <td class="quickview-value">{{$productDetail->brand_id ?? null}}</td>
                                    </tr>
                                    <tr class="single-info">
                                        <td class="quickview-title">SKU: </td>
                                        <td class="quickview-value">12345</td>
                                    </tr>
                                    <tr class="single-info">
                                        <td class="quickview-title">Categories: </td>
                                        <td class="quickview-value">
                                            <a href="#">{{$productDetail->category_id ?? null}}</a>
                                        </td>
                                    </tr>
                                    <tr class="single-info">
                                        <td class="quickview-title">Tags: </td>
                                        <td class="quickview-value">
                                            <a href="#">Decor</a>,
                                            <a href="#">Light</a>
                                        </td>
                                    </tr>
                                    <tr class="single-info">
                                        <td class="quickview-title">Share on: </td>
                                        <td class="quickview-value">
                                            <ul class="quickview-social-icons">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!--=======  End of product details description area  =======-->
                    </div>
                </div>
            </div>
        </div>

        <!--=======  End of single product slider details area  =======-->

        <!--=======  single product description tab area  =======-->

        <div class="single-product-description-tab-area section-space">
            <!--=======  description tab navigation  =======-->

            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            <div class="description-tab-navigation">
                <div class="nav nav-tabs justify-content-center" id="nav-tab2" role="tablist">
                    <a class="nav-item nav-link active" id="description-tab" data-toggle="tab" href="#product-description" role="tab" aria-selected="true">DESCRIPTION</a>
                    <a class="nav-item nav-link" id="additional-info-tab" data-toggle="tab" href="#product-additional-info" role="tab" aria-selected="false">ADDITIONAL INFORMATION</a>
                    <a class="nav-item nav-link" id="review-tab" data-toggle="tab" href="#product-review" role="tab" aria-selected="false">REVIEWS ({{$listComments->count()}})</a>
                </div>
            </div>

            <!--=======  End of description tab navigation  =======-->

            <!--=======  description tab content  =======-->


            <div class="single-product-description-tab-content">

                <div class="tab-content">

                    <div class="tab-pane fade show active" id="product-description" role="tabpanel" aria-labelledby="description-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!--=======  description content  =======-->

                                    <div class="description-content">
                                        <p class="long-desc">Inspired by the simplistic style of traditional Scandinavian design, this cone shaped ceiling pendant adds an understated elegance to any interior design scheme.
                                            Strung on a 3m coloured cord, this simple yet stylish ceiling light can be hung above your breakfast bar or dining table to enhance your surroundings.
                                            A modern interpretation of a classic pendant light, Annular is available in a choice of muted colourways and will look wonderful hung alone, or as a cluster for greater visual impact.</p>

                                        <p><b>Light source: Integrated LED (non-replaceable) with 30,000 hour life span.</b></p>
                                        <p><b>Specification: EU 220-Volts</b></p>
                                        <p><b>Ceiling rose: White – included</b></p>
                                        <p><b>Cable: 3 metre adjustable textile cord.</b></p>
                                        <p><b>Approximate net product weight: 2.6kg</b></p>
                                        <p><b>This product is hardwired – professional installation recommended.</b></p>
                                    </div>

                                    <!--=======  End of description content  =======-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="product-additional-info" role="tabpanel" aria-labelledby="additional-info-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!--=======  additional info content  =======-->

                                    <div class="additional-info-content">
                                        <table class="additional-info-table">
                                            <tbody>
                                                <tr>
                                                    <th>Dimensions</th>
                                                    <td class="product_dimensions">300 x 24 x 32 cm</td>
                                                </tr>

                                                <tr>
                                                    <th>color</th>
                                                    <td>
                                                        <p>Black, Lavender Grey, Pink, White</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!--=======  End of additional info content  =======-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="product-review" role="tabpanel" aria-labelledby="review-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!--=======  review content  =======-->

                                    <div class="review-content-wrapper">
                                        <!--=======  review comments  =======-->

                                        <div class="review-comments">

                                            <h4 class="review-comment-title"> {{$listComments->count()}} REVIEWS FOR OLIVIA SHAYN COVER CHAIR</h4>

                                            <!--=======  single-review comment  =======-->
                                        
                                        @foreach ($listComments as $item)
                                            <div class="single-review-comment">
                                                <div class="single-review-comment__image">
                                                    <img src="" class="img-fluid" alt="{{ $item->user_id }}">
                                                </div>

                                                <div class="single-review-comment__content">
                                                    <div class="review-time"><i class="fa fa-calendar"></i>{{ $item->created_at }}</div>
                                                    <p class="review-text">{{ $item->content }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                            <!--=======  End of single-review comment  =======-->

                                        </div>

                                        <!--=======  End of review comments  =======-->

                                        <!--=======  review comment form  =======-->

                                        <div class="review-comment-form">
                                            <h4 class="review-comment-title">Add a review</h4>
                                            <p class="review-comment-subtitle">Your email address will not be published. Required fields are marked *</p>

                                            <form action="{{ route('postComment') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                {{-- <div class="form-group">
                                                    <label for="reviewerName">Name <span>*</span> </label>
                                                    <input type="text" id="reviewerName" value="" name="reviewerName" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="reviewerEmail">Email <span>*</span> </label>
                                                    <input type="email" id="reviewerEmail" value="" name="reviewerEmail" required>
                                                </div> --}}
                                                <div class="form-group">
                                                    <label for="reviewComment">Your review <span>*</span></label>
                                                    <textarea name="reviewComment" id="reviewComment" cols="30" rows="10"></textarea>
                                                </div>
                                                <input type="hidden" name="product_id" id="product_id" value="{{$productDetail->id}}">
                                                <button type="submit" class="theme-button">SUBMIT</button>
                                            </form>
                                        </div>

                                        <!--=======  End of review comment form  =======-->
                                    </div>

                                    <!--=======  End of review content  =======-->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

            <!--=======  End of description tab content  =======-->

        </div>

        <!--=======  End of single product description tab area  =======-->

        <!--====================  related product slider area ====================-->

        <div class="product-slider-area section-space">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="section-title-area text-center">
                            <h2 class="section-title">RELATED PRODUCTS</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <!--=======  product slider wrapper  =======-->

                        <div class="product-slider-wrapper theme-slick-slider" data-slick-setting='{
                        "slidesToShow": 4,
                        "slidesToScroll": 4,
                        "arrows": true,
                        "dots": true,
                        "autoplay": false,
                        "speed": 500,
                        "prevArrow": {"buttonClass": "slick-prev", "iconClass": "fa fa-angle-left" },
                        "nextArrow": {"buttonClass": "slick-next", "iconClass": "fa fa-angle-right" }
                    }' data-slick-responsive='[
                        {"breakpoint":1501, "settings": {"slidesToShow": 4, "slidesToScroll": 4, "arrows": false} },
                        {"breakpoint":1199, "settings": {"slidesToShow": 3, "slidesToScroll": 3, "arrows": false} },
                        {"breakpoint":991, "settings": {"slidesToShow": 2,"slidesToScroll": 2, "arrows": true, "dots": false} },
                        {"breakpoint":767, "settings": {"slidesToShow": 2,"slidesToScroll": 2,  "arrows": true, "dots": false} },
                        {"breakpoint":575, "settings": {"slidesToShow": 2, "slidesToScroll": 2,"arrows": false, "dots": true} },
                        {"breakpoint":479, "settings": {"slidesToShow": 1,"slidesToScroll": 1, "arrows": true, "dots": false} }
                    ]'>
                            @if($listSameProducts)
                                @foreach ($listSameProducts as $item)
                                    <div class="col">
                                        <!--=======  single short view product  =======-->

                                        <div class="single-grid-product">
                                            <div class="single-grid-product__image">
                                                <div class="product-badge-wrapper">
                                                    <span class="onsale">-17%</span>
                                                    <span class="hot">Hot</span>
                                                </div>
                                                <a href="product-details-basic.html" class="image-wrap">
                                                    <img src="{{asset('storage/'. $item->photo)}}" class="img-fluid" alt="">
                                                    <img src="{{asset('storage/'. $item->photo)}}" class="img-fluid" alt="">
                                                </a>
                                                <div class="product-hover-icon-wrapper">
                                                    <span class="single-icon single-icon--quick-view"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme = "sharpborder" ><i class="fa fa-search"></i></a></span>
                                                    <span class="single-icon single-icon--add-to-cart"><a href="{{ route('postWishlist',['id'=> $productDetail->id]) }}" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme = "sharpborder" ><i class="fa fa-shopping-basket"></i> <span>ADD TO CART</span></a></span>
                                                    <span class="single-icon single-icon--compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme = "sharpborder" ><i class="fa fa-exchange"></i></a></span>
                                                </div>
                                            </div>
                                            <div class="single-grid-product__content">
                                                <h3 class="title"><a href="product-details-basic.html">{{ $item->title }}</a></h3>
                                                <div class="price"><span class="main-price discounted">{{ $item->price }}</span> <span class="discounted-price">{{ $item->discount }}</span></div>
                                                <div class="rating">
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="color">
                                                    <ul>
                                                        <li><a class="active" href="#" data-tippy="Black" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="roundborder"><span class="color-picker black"></span></a></li>
                                                        <li><a href="#" data-tippy="Blue" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="roundborder"><span class="color-picker blue"></span></a></li>
                                                        <li><a href="#" data-tippy="Brown" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="roundborder"><span class="color-picker brown"></span></a></li>
                                                    </ul>
                                                </div>
                                                <a href="#" class="favorite-icon" data-tippy="Add to Wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left">
                                                    <i class="fa fa-heart-o"></i>
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <!--=======  End of single short view product  =======-->
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <!--=======  End of product slider wrapper  =======-->
                    </div>
                </div>
            </div>
        </div>

        <!--====================  End of related product slider area  ====================-->

    </div>
@endsection