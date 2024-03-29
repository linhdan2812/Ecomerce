@extends('layouts.client-layout')
@section('content')
    <div class="breadcrumb-area section-space--breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <!--=======  breadcrumb wrapper  =======-->

                    <div class="breadcrumb-wrapper">
                        <h2 class="page-title">Cửa hàng</h2>
                        <ul class="breadcrumb-list">
                            <li><a href="/">Trang chủ</a></li>
                            <li><a href="/shop">Cửa hàng</a></li>
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
                            <div class="row row-5">
                                <div class="col-md-9 order-1 order-md-2">
                                    <div class="big-image-wrapper">
                                        <div class="enlarge-icon">
                                            <a class="btn-zoom-popup" href="javascript:void(0)"
                                                data-tippy="Click to enlarge" data-tippy-placement="left"
                                                data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                data-tippy-delay="50" data-tippy-arrow="true"
                                                data-tippy-theme="sharpborder"><i class="pe-7s-expand1"></i></a>
                                        </div>
                                        <div class="product-details-big-image-slider-wrapper product-details-big-image-slider-wrapper--side-space theme-slick-slider"
                                            data-slick-setting='{
                                                "slidesToShow": 1,
                                                "slidesToScroll": 1,
                                                "arrows": false,
                                                "autoplay": false,
                                                "autoplaySpeed": 5000,
                                                "fade": true,
                                                "speed": 500,
                                                "prevArrow": {"buttonClass": "slick-prev", "iconClass": "fa fa-angle-left" },
                                                "nextArrow": {"buttonClass": "slick-next", "iconClass": "fa fa-angle-right" }
                                            }'
                                            data-slick-responsive='[
                                                {"breakpoint":1501, "settings": {"slidesToShow": 1, "arrows": false} },
                                                {"breakpoint":1199, "settings": {"slidesToShow": 1, "arrows": false} },
                                                {"breakpoint":991, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} },
                                                {"breakpoint":767, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} },
                                                {"breakpoint":575, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} },
                                                {"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} }
                                            ]'>
                                            <div class="single-image">
                                                <img src="{{ asset('storage/' . $productDetail['photo']) }}"
                                                    class="img-fluid" alt="">
                                            </div>
                                            <div class="single-image">
                                                @if ($productDetail->images)
                                                    @foreach (json_decode($productDetail->images) as $item)
                                                        <img class="" width="100px" height="100px"
                                                            src="{{ asset('storage/' . $item) }}" alt="">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 order-2 order-md-1">
                                    <div class="product-details-small-image-slider-wrapper product-details-small-image-slider-wrapper--vertical-space theme-slick-slider"
                                        data-slick-setting='{
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
                                        }'
                                        data-slick-responsive='[
                                            {"breakpoint":1501, "settings": {"slidesToShow": 3, "arrows": true} },
                                            {"breakpoint":1199, "settings": {"slidesToShow": 3, "arrows": true} },
                                            {"breakpoint":991, "settings": {"slidesToShow": 3, "arrows": true, "slidesToScroll": 1} },
                                            {"breakpoint":767, "settings": {"slidesToShow": 3, "arrows": false, "slidesToScroll": 1, "vertical": false, "centerMode": true} },
                                            {"breakpoint":575, "settings": {"slidesToShow": 3, "arrows": false, "slidesToScroll": 1, "vertical": false, "centerMode": true} },
                                            {"breakpoint":479, "settings": {"slidesToShow": 2, "arrows": false, "slidesToScroll": 1, "vertical": false, "centerMode": true} }
                                        ]'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--=======  End of product details slider area  =======-->
                    </div>
                    <div class="col-lg-6">
                        <!--=======  product details description area  =======-->
                        <div class="product-details-description-wrapper">
                            <form action="{{route('add.to.cart.post')}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="{{$productDetail->id}}">
                            <h2 class="item-title">{{ $productDetail->title }}</h2>
                            @if (empty($productDetail->discount))
                                <div class="price">
                                    <span class="discounted-price">{{ number_format($productDetail->price) }} VND</span>
                                </div>
                            @else
                                <div class="price">
                                    <span class="main-price discounted">{{ number_format($productDetail->price) }}
                                        VND</span><br>
                                    <span class="discounted-price">{{ number_format($productDetail->discount) }} VND</span>
                                </div>
                            @endif
                            <p class="description">{!! $productDetail->description ?? '' !!}</p>
                                @csrf
                                <div class="flex mt-5" style="display: flex;">
                                    <h1 class="stock" style="font-size: 20px;font-weight: bolder;margin-right: 20px;">Số lượng</h1>
                                    @if($productDetail->stock <= 0)
                                        <p style="margin: 5px 0 0 15px">Sản phẩm đã hết hàng</p>
                                    @else
                                        <input type="number" name="stock" min="1" value="1">
                                        <p style="margin: 5px 0 0 15px">{{$productDetail->stock}} sản phẩm có sẵn</p>
                                    @endif
                                </div>
                                <div class="flex mt-5" style="display: flex;">
                                    <h1 class="stock" style="font-size: 20px;font-weight: bolder;margin-right: 20px;">Màu sắc</h1>
                                    @if($productDetail->color)
                                        @foreach(json_decode($productDetail->color) as $color)
                                            @if($color != null)
                                                <input type="radio" name="color" style="margin: 0 2px 0 20px" value="{{$color}}"><p style="margin-top: 5px;">{{$color}}</p>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                                <div class="flex mt-5" style="display: flex;">
                                    <h1 class="stock" style="font-size: 20px;font-weight: bolder;margin-right: 20px;">Size</h1>
                                    @if($productDetail->size)
                                        @foreach(json_decode($productDetail->size) as $size)
                                            <input type="radio" name="size" style="margin: 0 2px 0 20px" value="{{$size}}"><p style="margin-top: 5px;">{{$size}}</p>
                                        @endforeach
                                    @endif
                                </div>
                                <br>
                                @if($errors->any())
                                    <h4 style="color: red;">{{$errors->first()}}</h4>
                                @endif
                                @if($productDetail->stock > 0)
                                    <div class="add-to-cart-btn d-inline-block">
                                        <button type="submit" class="theme-button theme-button--alt mt-5">Thêm vào giỏ hàng</button>
                                    </div>
                                @endif
                            </form>
                            <div class="add-to-cart-btn d-inline-block">
                                <a class="theme-button theme-button--alt mt-5"
                                   href="{{ route('postWishlist', ['id' => $productDetail->id]) }}">Thêm vào danh sách yêu thích</a>
                            </div>

                            <div class="quick-view-other-info">
                                <table>
                                    <tr class="single-info">
                                        <td class="quickview-title">
                                            Danh mục sản phẩm: <a
                                                href="#">{{ $productDetail->category->title ?? null }}</a>
                                        </td>
                                    </tr>
{{--                                    <div class="other-info-links">--}}
{{--                                        <a href="{{ route('postWishlist', ['id' => $productDetail->id]) }}"><i--}}
{{--                                                class="fa fa-heart-o"></i>Thêm vào danh sách yêu thích</a>--}}
{{--                                        --}}{{-- <a href="javascript:void(0)"><i class="fa fa-exchange"></i>So sánh</a> --}}
{{--                                    </div>--}}
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

            @if (Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            <div class="description-tab-navigation">
                <div class="nav nav-tabs justify-content-center" id="nav-tab2" role="tablist">
                    <a class="nav-item nav-link active" id="description-tab" data-toggle="tab" href="#product-description"
                        role="tab" aria-selected="true">Chi tiết sản phẩm</a>
                    <a class="nav-item nav-link" id="additional-info-tab" data-toggle="tab" href="#product-additional-info"
                        role="tab" aria-selected="false">Thông tin bổ sung</a>
                    <a class="nav-item nav-link" id="review-tab" data-toggle="tab" href="#product-review" role="tab"
                        aria-selected="false">Đánh giá ({{ $listComments->count() }})</a>
                </div>
            </div>

            <!--=======  End of description tab navigation  =======-->

            <!--=======  description tab content  =======-->


            <div class="single-product-description-tab-content">

                <div class="tab-content">

                    <div class="tab-pane fade show active" id="product-description" role="tabpanel"
                        aria-labelledby="description-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!--=======  description content  =======-->

                                    <div class="description-content">
                                        <p class="long-desc">
                                            {!! $productDetail->description ? $productDetail->description : 'Chưa có thông tin chi tiết cho sản phẩm !' !!}
                                        </p>
                                    </div>

                                    <!--=======  End of description content  =======-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="product-additional-info" role="tabpanel"
                        aria-labelledby="additional-info-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!--=======  additional info content  =======-->

                                    <div class="additional-info-content">
                                        <table class="additional-info-table">
                                            <tbody>
                                                <tr>
                                                    <th>Size</th>
                                                    <td class="product_dimensions">
                                                        <p>
                                                            @if ($productDetail->size)
                                                                @foreach (json_decode($productDetail->size) as $index => $item)
                                                                    {{ $item }}
                                                                    @if ($index < count(json_decode($productDetail->size)) - 1)
                                                                        ,
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th>Màu Sắc</th>
                                                    <td>
                                                        <p>
                                                            @if ($productDetail->color)
                                                                @foreach (json_decode($productDetail->color) as $index => $item)
                                                                    {{ $item }}
                                                                    @if ($index < count(json_decode($productDetail->color)) - 2)
                                                                        ,
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </p>
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

                                            <h4 class="review-comment-title"> {{ $listComments->count() }} Người đã đánh
                                                giá</h4>

                                            <!--=======  single-review comment  =======-->

                                            @foreach ($listComments as $item)
                                                <div class="single-review-comment">
                                                    <div class="single-review-comment__image">
                                                        @php
                                                            $user = \DB::table('users')
                                                                ->where('id', $item->user_id)
                                                                ->first();
                                                        @endphp
                                                        <img src="{{ $user->photo }}" class="img-fluid"
                                                            alt="{{ $item->user_id }}">
                                                    </div>

                                                    <div class="single-review-comment__content">
                                                        <div class="review-time"><i
                                                                class="fa fa-calendar"></i>{{ $item->created_at }}</div>
                                                        <p class="review-text">{{ $item->content }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!--=======  End of single-review comment  =======-->

                                        </div>

                                        <!--=======  End of review comments  =======-->

                                        <!--=======  review comment form  =======-->

                                        <div class="review-comment-form">
                                            <h4 class="review-comment-title">Thêm đánh giá của bạn</h4>
                                            <p class="review-comment-subtitle">Email của bạn sẽ không được hiển thị công
                                                khai. Các trường bắt buộc được đánh dấu *</p>

                                            <form action="{{ route('postComment') }}" method="POST"
                                                enctype="multipart/form-data">
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
                                                    <label for="reviewComment">Đánh giá của bạn <span>*</span></label>
                                                    <textarea name="reviewComment" id="reviewComment" cols="30" rows="10"></textarea>
                                                </div>
                                                <input type="hidden" name="product_id" id="product_id"
                                                    value="{{ $productDetail->id }}">
                                                <button type="submit" class="theme-button">Gửi</button>
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
                            <h2 class="section-title">Sản phẩm liên quan</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <!--=======  product slider wrapper  =======-->

                        <div class="product-slider-wrapper theme-slick-slider"
                            data-slick-setting='{
                        "slidesToShow": 4,
                        "slidesToScroll": 4,
                        "arrows": true,
                        "dots": true,
                        "autoplay": false,
                        "speed": 500,
                        "prevArrow": {"buttonClass": "slick-prev", "iconClass": "fa fa-angle-left" },
                        "nextArrow": {"buttonClass": "slick-next", "iconClass": "fa fa-angle-right" }
                    }'
                            data-slick-responsive='[
                        {"breakpoint":1501, "settings": {"slidesToShow": 4, "slidesToScroll": 4, "arrows": false} },
                        {"breakpoint":1199, "settings": {"slidesToShow": 3, "slidesToScroll": 3, "arrows": false} },
                        {"breakpoint":991, "settings": {"slidesToShow": 2,"slidesToScroll": 2, "arrows": true, "dots": false} },
                        {"breakpoint":767, "settings": {"slidesToShow": 2,"slidesToScroll": 2,  "arrows": true, "dots": false} },
                        {"breakpoint":575, "settings": {"slidesToShow": 2, "slidesToScroll": 2,"arrows": false, "dots": true} },
                        {"breakpoint":479, "settings": {"slidesToShow": 1,"slidesToScroll": 1, "arrows": true, "dots": false} }
                    ]'>

                            @if ($listSameProducts)
                                @foreach ($listSameProducts as $item)
                                    <div class="col">
                                        <!--=======  single short view product  =======-->

                                        <div class="single-grid-product">
                                            <div class="single-grid-product__image">
                                                {{--                                                <div class="product-badge-wrapper"> --}}
                                                {{--                                                    <span class="onsale">-17%</span> --}}
                                                {{--                                                    <span class="hot">Hot</span> --}}
                                                {{--                                                </div> --}}
                                                <a href="{{ route('detailProduct', ['id' => $item->id]) }}"
                                                    class="image-wrap">
                                                    <img src="{{ asset('storage/' . $item->photo) }}" class="img"
                                                        alt="" height="400px">
                                                    {{--                                                    <img src="{{asset('storage/'. $item->photo)}}" class="img-fluid" alt=""> --}}
                                                </a>
                                                <div class="product-hover-icon-wrapper">
                                                    <span class="single-icon single-icon--quick-view"><a
                                                            class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                                                            data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                            data-tippy-delay="50" data-tippy-arrow="true"
                                                            data-tippy-theme="sharpborder"><i
                                                                class="fa fa-search"></i></a></span>
                                                    <span class="single-icon single-icon--add-to-cart"><a
                                                            href="{{ route('postWishlist', ['id' => $productDetail->id]) }}"
                                                            data-tippy="Add to cart" data-tippy-inertia="true"
                                                            data-tippy-animation="shift-away" data-tippy-delay="50"
                                                            data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                                class="fa fa-shopping-basket"></i> <span>ADD TO
                                                                CART</span></a></span>
                                                    <span class="single-icon single-icon--compare"><a href="#"
                                                            data-tippy="Compare" data-tippy-inertia="true"
                                                            data-tippy-animation="shift-away" data-tippy-delay="50"
                                                            data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                                class="fa fa-exchange"></i></a></span>
                                                </div>
                                            </div>
                                            <div class="single-grid-product__content">
                                                <h3 class="title"><a
                                                        href="{{ route('detailProduct', ['id' => $item->id]) }}">{{ $item->title }}</a>
                                                </h3>
                                                @if (empty($item->discount))
                                                    <div class="price">
                                                        <span class="discounted-price">{{ number_format($item->price) }}
                                                            VND</span>
                                                    </div>
                                                @else
                                                    <div class="price">
                                                        <span
                                                            class="main-price discounted">{{ number_format($item->price) }}
                                                            VND</span><br>
                                                        <span
                                                            class="discounted-price">{{ number_format($item->discount) }}
                                                            VND</span>
                                                    </div>
                                                @endif
                                                <a href="#" class="favorite-icon" data-tippy="Add to Wishlist"
                                                    data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                    data-tippy-delay="50" data-tippy-arrow="true"
                                                    data-tippy-theme="sharpborder" data-tippy-placement="left">
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
