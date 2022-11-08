@extends('layouts.client-layout')
@section('content')
    <!--====================  hero slider area ====================-->

    {{-- <div class="hero-slider-area section-space">
        <!-- START REVOLUTION SLIDER 5.4.7 fullwidth mode -->
        <div id="rev_slider_23_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.7">
            <ul>
                <!-- SLIDE  -->
                @if (!empty($bannerSlide))
                    @foreach ($bannerSlide as $item)
                    <li data-index="rs-53" data-transition="slideoverdown,slidingoverlayvertical,cube-horizontal,3dcurtain-vertical" data-slotamount="default,default,default,default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default,default,default,default" data-easeout="default,default,default,default" data-masterspeed="980,default,default,default" data-thumb="" data-delay="7010" data-rotate="0,0,0,0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('storage/'. $item->photo)}}" alt="" width="1920" height="1080" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption   tp-resizeme" id="slide-53-layer-5" data-x="['left','center','center','center']" data-hoffset="['1111','203','127','68']" data-y="['top','middle','middle','middle']" data-voffset="['242','-58','-16','-25']" data-fontsize="['80','90','90','60']" data-lineheight="['80','100','100','70']" data-width="none" data-height="['170','none','none','none']" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"delay":770,"speed":1850,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power2.easeInOut"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5; max-width: 170px; max-width: 170px; white-space: nowrap; font-size: 80px; line-height: 80px; font-weight: 300; color: #000000; letter-spacing: -2px;font-family:Source Sans Pro;"></div>

                            <!-- LAYER NR. 2 -->
                            <a class="tp-caption Robin-Button-New rev-btn " href="shop-left-sidebar.html" target="_self" id="slide-53-layer-7" data-x="['left','center','center','center']" data-hoffset="['1257','209','135','68']" data-y="['top','middle','top','top']" data-voffset="['445','123','612','440']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="button" data-actions='' data-responsive_offset="on" data-responsive="off" data-frames='[{"delay":770,"speed":1500,"frame":"0","from":"x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"nothing"},{"frame":"hover","speed":"300","ease":"Power0.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(255,255,255);bg:rgb(34,34,34);bc:rgb(0,0,0);"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[12,12,12,12]" data-paddingright="[25,25,25,25]" data-paddingbottom="[12,12,12,12]" data-paddingleft="[25,25,25,25]" style="z-index: 6; white-space: nowrap; font-size: 16px; line-height: 21px; font-weight: 700; color: #000000; font-family:Source Sans Pro;background-color:rgba(247,177,19,0);border-color:rgba(0,0,0,1);border-style:solid;border-width:2px 2px 2px 2px;border-radius:5px 5px 5px 5px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;text-decoration: none;">SHOP NOW!
                            </a>
                    </li>
                    @endforeach
                @endif
            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
    </div>


    <!--====================  End of hero slider area  ====================-->
    <!--====================  category grid  ====================-->

    <div class="category-area section-space--small">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="section-title-area text-center">
                        <h2 class="section-title">Trending Categories</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">

                    <!--=======  ctaegory grid wrapper  =======-->

                    <div class="category-grid-wrapper">
                        <div class="row">
                            <div class="col-md-4">
                                <!--=======  single-category  =======-->

                                <div class="single-category single-category--type-one text-center">
                                    <div class="single-category--type-one__image">
                                        <a href="shop-left-sidebar.html"><img src="{{asset('client/img/categories/category-1.jpg')}}')}}" class="img-fluid" alt=""></a>
                                    </div>
                                    <div class="single-category--type-one__content">
                                        <h2 class="title mb-0">Living Room</h2>
                                        <a href="shop-left-sidebar.html" class="category-button category-button--shop-now">SHOP NOW <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>

                                <!--=======  End of single-category  =======-->
                            </div>
                            <div class="col-md-4">
                                <!--=======  single-category  =======-->

                                <div class="single-category single-category--type-one text-center">
                                    <div class="single-category--type-one__image">
                                        <a href="shop-left-sidebar.html"><img src="{{asset('client/img/categories/category-2.jpg')}}')}}" class="img-fluid" alt=""></a>
                                    </div>
                                    <div class="single-category--type-one__content">
                                        <h2 class="title mb-0">Outdoor</h2>
                                        <a href="shop-left-sidebar.html" class="category-button category-button--shop-now">SHOP NOW <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>

                                <!--=======  End of single-category  =======-->
                            </div>
                            <div class="col-md-4">
                                <!--=======  single-category  =======-->

                                <div class="single-category single-category--type-one text-center">
                                    <div class="single-category--type-one__image">
                                        <a href="shop-left-sidebar.html"><img src="{{asset('client/img/categories/category-3.jpg')}}')}}" class="img-fluid" alt=""></a>
                                    </div>
                                    <div class="single-category--type-one__content">
                                        <h2 class="title mb-0">Bedroom Lighting</h2>
                                        <a href="shop-left-sidebar.html" class="category-button category-button--shop-now">SHOP NOW <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>

                                <!--=======  End of single-category  =======-->
                            </div>
                        </div>
                    </div>

                    <!--=======  End of ctaegory grid wrapper  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--====================  End of category grid   ====================-->
    <!--====================  banner grid area ====================-->

    <div class="banner-area section-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  banner grid wrapper  =======-->

                    <div class="banner-grid-wrapper">
                        <div class="row">
                            <div class="col-md-4">
                                <!--=======  single banner  =======-->

                                <div class="single-banner">
                                    <div class="single-banner__image">
                                        <a href="shop-left-sidebar.html">
                                            <img src="{{asset('client/img/banners/simple-banner-1.jpg')}}')}}" class="img-fluid" alt="">
                                        </a>
                                    </div>

                                    <div class="single-banner__content single-banner__content--overlay">
                                        <p class="banner-small-text">OUTDOOR ENTERTAINING</p>
                                        <p class="banner-big-text">Decorative Lighting</p>
                                        <p class="banner-small-text banner-small-text--end">50% Off For Limited Time</p>
                                        <a href="shop-left-sidebar.html" class="theme-button theme-button--alt theme-button--banner">SHOP NOW</a>
                                    </div>
                                </div>

                                <!--=======  End of single banner  =======-->
                            </div>
                            <div class="col-md-4">
                                <!--=======  single banner  =======-->

                                <div class="single-banner">
                                    <div class="single-banner__image">
                                        <a href="shop-left-sidebar.html">
                                            <img src="{{asset('client/img/banners/simple-banner-2.jpg')}}')}}" class="img-fluid" alt="">
                                        </a>
                                    </div>

                                    <div class="single-banner__content single-banner__content--overlay">
                                        <p class="banner-small-text">BROWSE OUR CURATED COLLECTIONS</p>
                                        <p class="banner-big-text">New In</p>
                                        <p class="banner-small-text banner-small-text--end">Liang & Eimil</p>
                                        <a href="shop-left-sidebar.html" class="theme-button theme-button--alt theme-button--banner">SHOP NOW</a>
                                    </div>
                                </div>

                                <!--=======  End of single banner  =======-->
                            </div>
                            <div class="col-md-4">
                                <!--=======  single banner  =======-->

                                <div class="single-banner">
                                    <div class="single-banner__image">
                                        <a href="shop-left-sidebar.html">
                                            <img src="{{asset('client/img/banners/simple-banner-3.jpg')}}')}}" class="img-fluid" alt="">
                                        </a>
                                    </div>

                                    <div class="single-banner__content single-banner__content--overlay">
                                        <p class="banner-small-text">STYLING SAVINGS</p>
                                        <p class="banner-big-text">Designer Furniture</p>
                                        <p class="banner-small-text banner-small-text--end">30% Off Armchairs</p>
                                        <a href="shop-left-sidebar.html" class="theme-button theme-button--alt theme-button--banner">SHOP NOW</a>
                                    </div>
                                </div>

                                <!--=======  End of single banner  =======-->
                            </div>
                        </div>
                    </div>

                    <!--=======  End of banner grid wrapper  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--====================  End of banner grid area  ====================-->
    <!--====================  featured brand ====================-->

    <div class="featured-brand section-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h2 class="section-title">Featured Brands</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!--=======  featured brand wrapper  =======-->

                    <div class="featured-brand-wrapper">
                        <div class="row align-items-center">
                            <div class="col-md-4 col-sm-6 col-12">
                                <!--=======  single brand  =======-->

                                <div class="single-brand">
                                    <a href="shop-left-sidebar.html">
                                        <img src="{{asset('client/img/brands/brand-2.png')}}')}}" class="img-fluid" alt="">
                                    </a>
                                </div>

                                <!--=======  End of single brand  =======-->
                            </div>
                            <div class="col-md-4 col-sm-6 col-12">
                                <!--=======  single brand  =======-->

                                <div class="single-brand">
                                    <a href="shop-left-sidebar.html">
                                        <img src="{{asset('client/img/brands/brand-12.png')}}')}}" class="img-fluid" alt="">
                                    </a>
                                </div>

                                <!--=======  End of single brand  =======-->
                            </div>
                            <div class="col-md-4 col-sm-6 col-12">
                                <!--=======  single brand  =======-->

                                <div class="single-brand">
                                    <a href="shop-left-sidebar.html">
                                        <img src="{{asset('client/img/brands/brand-15.png')}}')}}" class="img-fluid" alt="">
                                    </a>
                                </div>

                                <!--=======  End of single brand  =======-->
                            </div>
                            <div class="col-md-4 col-sm-6 col-12">
                                <!--=======  single brand  =======-->

                                <div class="single-brand">
                                    <a href="shop-left-sidebar.html">
                                        <img src="{{asset('client/img/brands/brand-4.png')}}')}}" class="img-fluid" alt="">
                                    </a>
                                </div>

                                <!--=======  End of single brand  =======-->
                            </div>
                            <div class="col-md-4 col-sm-6 col-12">
                                <!--=======  single brand  =======-->

                                <div class="single-brand">
                                    <a href="shop-left-sidebar.html">
                                        <img src="{{asset('client/img/brands/brand-6.png')}}')}}" class="img-fluid" alt="">
                                    </a>
                                </div>

                                <!--=======  End of single brand  =======-->
                            </div>
                            <div class="col-md-4 col-sm-6 col-12">
                                <!--=======  single brand  =======-->

                                <div class="single-brand">
                                    <a href="shop-left-sidebar.html">
                                        <img src="{{asset('client/img/brands/brand-11.png')}}')}}" class="img-fluid" alt="">
                                    </a>
                                </div>

                                <!--=======  End of single brand  =======-->
                            </div>
                        </div>
                    </div>

                    <!--=======  End of featured brand wrapper  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--====================  End of featured brand  ====================-->
    <!--====================  call to action area ====================-->

    <div class="cta-area cta-bg cta-bg--one">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1">
                    <!--=======  cta content wrapper  =======-->

                    <div class="cta-content-wrapper">
                        <div class="cta-content">
                            <h3 class="title">Can’t find what you’re <br> looking for?</h3>
                                <p class="subtitle">Challenge our designers to find your most coveted pieces. <br> We will <em>source it</em> and <em>deliver it</em>to your door.</p>
                                <a href="contact-us.html" class="theme-button theme-button--cta">ASK US NOW!</a>
                        </div>
                    </div>

                    <!--=======  End of cta content wrapper  =======-->
                </div>
            </div>
        </div>
    </div>

{{--  --}}
    <!--====================  hero slider area ====================-->
    <style>
        .slider {
            width: 100%;
            height: 60%;
            margin: 20px auto;
            text-align: center;
            padding: 20px;
            color: white;

            .parent-slide {
                padding: 15px;
            }

            img {
                display: block;
                margin: auto;
            }
        }
    </style>
    <div class="slider">
        @if (!empty($bannerSlide))
            @foreach ($bannerSlide as $item)
                <div class="slide">
                    <img src="{{ asset('storage/' . $item->photo) }}" alt="" class="img-responsive" />
                    <img src="https://scontent.fhan2-1.fna.fbcdn.net/v/t1.6435-9/131291436_432142931277233_160483647895410291_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=8bfeb9&_nc_ohc=Ira2REx8FiYAX__ppla&_nc_ht=scontent.fhan2-1.fna&oh=00_AfCj7B5JSW3B3LjlXL7tEN_47MtfVxxfeuW6VplsHXWA-Q&oe=638F9BBB"
                        alt="" class="img-responsive" />
                    <h1>{$item->title}</h1>
                </div>
            @endforeach
        @endif

    </div>

    <!--====================  End of hero slider area  ====================-->

    <!--====================  banner masonry area ====================-->

    <div class="banner-area section-space">
        <div class="container">
            <div class="row masonry-layout--banner">
                
                @if (empty($arrivals))
                    @foreach ($arrivals as $item)
                        <div class="col-md-4 masonry-item--banner">
                            <!--=======  single banner  =======-->

                            <div class="single-banner">
                                <div class="single-banner__image">
                                    <a href="shop-left-sidebar.html">
                                        <img src="{{ asset('client/img/banners/banner-homepage2_1.png') }}" class="img-fluid"
                                            alt="">
                                    </a>
                                </div>

                                <div class="single-banner__content single-banner__content--overlay">
                                    <p class="banner-small-text">NEW COLLECTION</p>
                                    <p class="banner-big-text">From 99$</p>
                                    <p class="banner-small-text banner-small-text--end">Complete your interior with our wide range
                                        <br>
                                        of furniture</p>
                                    <a href="shop-left-sidebar.html"
                                        class="theme-button theme-button--banner theme-button--banner--two">SHOP NOW</a>
                                </div>
                            </div>

                            <!--=======  End of single banner  =======-->
                        </div>
                        <div class="col-md-8 masonry-item--banner">
                            <!--=======  single banner  =======-->

                            <div class="single-banner">
                                <div class="single-banner__image">
                                    <a href="shop-left-sidebar.html">
                                        <img src="{{ asset('client/img/banners/banner-homepage2_3.png') }}" class="img-fluid"
                                            alt="">
                                    </a>
                                </div>

                                <div class="single-banner__content single-banner__content--overlay">
                                    <p class="banner-small-text">DISCOVERY</p>
                                    <p class="banner-big-text">Designer Lighting</p>
                                    <p class="banner-small-text banner-small-text--end">From table lamps to chandeliers, discover
                                        over 200 lighting solutions.</p>
                                    <a href="shop-left-sidebar.html"
                                        class="theme-button theme-button--banner theme-button--banner--two">SHOP NOW</a>
                                </div>
                            </div>

                            <!--=======  End of single banner  =======-->
                        </div>
                        <div class="col-md-8 masonry-item--banner">
                            <!--=======  single banner  =======-->

                            <div class="single-banner">
                                <div class="single-banner__image">
                                    <a href="shop-left-sidebar.html">
                                        <img src="{{ asset('client/img/banners/banner-homepage2_4.png') }}" class="img-fluid"
                                            alt="">
                                    </a>
                                </div>

                                <div class="single-banner__content single-banner__content--overlay">
                                    <p class="banner-small-text">LUXURY FURNISHINGS FOR EVERY ROOM</p>
                                    <p class="banner-big-text">Plants Everywhere</p>
                                    <p class="banner-small-text banner-small-text--end">Refresh your interior for less with our wide
                                        range of contemporary furniture.</p>
                                    <a href="shop-left-sidebar.html"
                                        class="theme-button theme-button--banner theme-button--banner--two">SHOP NOW</a>
                                </div>
                            </div>

                            <!--=======  End of single banner  =======-->
                        </div>
                        <div class="col-md-4 masonry-item--banner">
                            <!--=======  single banner  =======-->

                            <div class="single-banner">
                                <div class="single-banner__image">
                                    <a href="shop-left-sidebar.html">
                                        <img src="{{ asset('client/img/banners/banner-homepage2_2.png') }}" class="img-fluid"
                                            alt="">
                                    </a>
                                </div>

                                <div class="single-banner__content single-banner__content--overlay">
                                    <p class="banner-small-text">DESIGNER LIGHTING</p>
                                    <p class="banner-big-text">Marble Stuffs</p>
                                    <p class="banner-small-text banner-small-text--end">25% Off For Limited Time</p>
                                    <a href="shop-left-sidebar.html"
                                        class="theme-button theme-button--banner theme-button--banner--two">SHOP NOW</a>
                                </div>
                            </div>

                            <!--=======  End of single banner  =======-->
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <!--====================  End of banner masonry area  ====================-->
    <!--====================  product slider area ====================-->

    <div class="product-slider-area section-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="section-title-area text-center">
                        <h2 class="section-title">New Arrivals</h2>
                        <p class="section-subtitle">Our traditional dining tables, chairs, case pieces and other traditional
                            dining furniture are geared toward those who appreciate the simplicity and true craftsmanship.
                        </p>
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

                        <div class="col">
                            <!--=======  single short view product  =======-->

                            <div class="single-grid-product">
                                <div class="single-grid-product__image">
                                    <div class="product-badge-wrapper">
                                        <span class="onsale">-17%</span>
                                        <span class="hot">Hot</span>
                                    </div>
                                    <a href="product-details-basic.html" class="image-wrap">
                                        <img src="{{ asset('client/img/products/product-9-1-270x360.jpg') }}"
                                            class="img-fluid" alt="">
                                        <img src="{{ asset('client/img/products/product-9-2-270x360.jpg') }}"
                                            class="img-fluid" alt="">
                                    </a>
                                    <div class="product-hover-icon-wrapper">
                                        <span class="single-icon single-icon--quick-view"><a class="cd-trigger"
                                                href="#qv-1" data-tippy="Quick View" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                    class="fa fa-search"></i></a></span>
                                        <span class="single-icon single-icon--add-to-cart"><a href="#"
                                                data-tippy="Add to cart" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                    class="fa fa-shopping-basket"></i> <span>ADD TO CART</span></a></span>
                                        <span class="single-icon single-icon--compare"><a href="#"
                                                data-tippy="Compare" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                    class="fa fa-exchange"></i></a></span>
                                    </div>
                                </div>
                                <div class="single-grid-product__content">
                                    <h3 class="title"><a href="product-details-basic.html">Lighting Lamp</a></h3>
                                    <div class="price"><span class="main-price discounted">$145</span> <span
                                            class="discounted-price">$110</span></div>
                                    <div class="rating">
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="color">
                                        <ul>
                                            <li><a class="active" href="#" data-tippy="Black"
                                                    data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                    data-tippy-delay="50" data-tippy-arrow="true"
                                                    data-tippy-theme="roundborder"><span
                                                        class="color-picker black"></span></a></li>
                                            <li><a href="#" data-tippy="Blue" data-tippy-inertia="true"
                                                    data-tippy-animation="shift-away" data-tippy-delay="50"
                                                    data-tippy-arrow="true" data-tippy-theme="roundborder"><span
                                                        class="color-picker blue"></span></a></li>
                                            <li><a href="#" data-tippy="Brown" data-tippy-inertia="true"
                                                    data-tippy-animation="shift-away" data-tippy-delay="50"
                                                    data-tippy-arrow="true" data-tippy-theme="roundborder"><span
                                                        class="color-picker brown"></span></a></li>
                                        </ul>
                                    </div>
                                    <a href="#" class="favorite-icon" data-tippy="Add to Wishlist"
                                        data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                                        data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                        data-tippy-placement="left">
                                        <i class="fa fa-heart-o"></i>
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </div>
                            </div>

                            <!--=======  End of single short view product  =======-->
                        </div>

                        <div class="col">
                            <!--=======  single short view product  =======-->

                            <div class="single-grid-product">
                                <div class="single-grid-product__image">

                                    <a href="product-details-basic.html" class="image-wrap">
                                        <img src="{{ asset('client/img/products/product-10-1-270x360.jpg') }}"
                                            class="img-fluid" alt="">
                                    </a>
                                    <div class="product-hover-icon-wrapper">
                                        <span class="single-icon single-icon--quick-view"><a class="cd-trigger"
                                                href="#qv-1" data-tippy="Quick View" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                    class="fa fa-search"></i></a></span>
                                        <span class="single-icon single-icon--add-to-cart"><a href="#"
                                                data-tippy="Add to cart" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                    class="fa fa-shopping-basket"></i> <span>ADD TO CART</span></a></span>
                                        <span class="single-icon single-icon--compare"><a href="#"
                                                data-tippy="Compare" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                    class="fa fa-exchange"></i></a></span>
                                    </div>
                                </div>
                                <div class="single-grid-product__content">
                                    <h3 class="title"><a href="product-details-basic.html">Jane Lauren Design Chair</a>
                                    </h3>
                                    <div class="price"><span class="main-price">$98</span></div>
                                    <div class="rating">
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star"></i>
                                    </div>

                                    <a href="#" class="favorite-icon" data-tippy="Add to Wishlist"
                                        data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                                        data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                        data-tippy-placement="left">
                                        <i class="fa fa-heart-o"></i>
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </div>
                            </div>

                            <!--=======  End of single short view product  =======-->
                        </div>

                        <div class="col">
                            <!--=======  single short view product  =======-->

                            <div class="single-grid-product">
                                <div class="single-grid-product__image">
                                    <div class="product-badge-wrapper">
                                        <span class="hot">Hot</span>
                                    </div>
                                    <a href="product-details-basic.html" class="image-wrap">
                                        <img src="{{ asset('client/img/products/product-11-1-270x360.jpg') }}"
                                            class="img-fluid" alt="">
                                        <img src="{{ asset('client/img/products/product-11-2-270x360.jpg') }}"
                                            class="img-fluid" alt="">
                                    </a>
                                    <div class="product-hover-icon-wrapper">
                                        <span class="single-icon single-icon--quick-view"><a class="cd-trigger"
                                                href="#qv-1" data-tippy="Quick View" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                    class="fa fa-search"></i></a></span>
                                        <span class="single-icon single-icon--add-to-cart"><a href="#"
                                                data-tippy="Add to cart" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                    class="fa fa-shopping-basket"></i> <span>ADD TO CART</span></a></span>
                                        <span class="single-icon single-icon--compare"><a href="#"
                                                data-tippy="Compare" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                    class="fa fa-exchange"></i></a></span>
                                    </div>
                                </div>
                                <div class="single-grid-product__content">
                                    <h3 class="title"><a href="product-details-basic.html">Jane Lauren Gregory Chair</a>
                                    </h3>
                                    <div class="price"><span class="main-price discounted">$125</span> <span
                                            class="discounted-price">$90</span></div>
                                    <div class="rating">
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star"></i>
                                    </div>

                                    <a href="#" class="favorite-icon" data-tippy="Add to Wishlist"
                                        data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                                        data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                        data-tippy-placement="left">
                                        <i class="fa fa-heart-o"></i>
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </div>
                            </div>

                            <!--=======  End of single short view product  =======-->
                        </div>

                        <div class="col">
                            <!--=======  single short view product  =======-->

                            <div class="single-grid-product">
                                <div class="single-grid-product__image">
                                    <div class="product-badge-wrapper">
                                        <span class="onsale">-10%</span>
                                    </div>
                                    <a href="product-details-basic.html" class="image-wrap">
                                        <img src="{{ asset('client/img/products/product-12-1-270x360.jpg') }}"
                                            class="img-fluid" alt="">
                                        <img src="{{ asset('client/img/products/product-12-2-270x360.jpg') }}"
                                            class="img-fluid" alt="">
                                    </a>
                                    <div class="product-hover-icon-wrapper">
                                        <span class="single-icon single-icon--quick-view"><a class="cd-trigger"
                                                href="#qv-1" data-tippy="Quick View" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                    class="fa fa-search"></i></a></span>
                                        <span class="single-icon single-icon--add-to-cart"><a href="#"
                                                data-tippy="Add to cart" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                    class="fa fa-shopping-basket"></i> <span>ADD TO CART</span></a></span>
                                        <span class="single-icon single-icon--compare"><a href="#"
                                                data-tippy="Compare" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                    class="fa fa-exchange"></i></a></span>
                                    </div>
                                </div>
                                <div class="single-grid-product__content">
                                    <h3 class="title"><a href="product-details-basic.html">Candice Desk Lamp</a></h3>
                                    <div class="price"><span class="main-price">$100</span></div>
                                    <div class="rating">
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star"></i>
                                    </div>

                                    <a href="#" class="favorite-icon" data-tippy="Add to Wishlist"
                                        data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                                        data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                        data-tippy-placement="left">
                                        <i class="fa fa-heart-o"></i>
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </div>
                            </div>

                            <!--=======  End of single short view product  =======-->
                        </div>

                        <div class="col">
                            <!--=======  single short view product  =======-->

                            <div class="single-grid-product">
                                <div class="single-grid-product__image">

                                    <a href="product-details-basic.html" class="image-wrap">
                                        <img src="{{ asset('client/img/products/product-13-1-270x360.jpg') }}"
                                            class="img-fluid" alt="">
                                        <img src="{{ asset('client/img/products/product-13-2-270x360.jpg') }}"
                                            class="img-fluid" alt="">
                                    </a>
                                    <div class="product-hover-icon-wrapper">
                                        <span class="single-icon single-icon--quick-view"><a class="cd-trigger"
                                                href="#qv-1" data-tippy="Quick View" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                    class="fa fa-search"></i></a></span>
                                        <span class="single-icon single-icon--add-to-cart"><a href="#"
                                                data-tippy="Add to cart" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                    class="fa fa-shopping-basket"></i> <span>ADD TO CART</span></a></span>
                                        <span class="single-icon single-icon--compare"><a href="#"
                                                data-tippy="Compare" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                    class="fa fa-exchange"></i></a></span>
                                    </div>
                                </div>
                                <div class="single-grid-product__content">
                                    <h3 class="title"><a href="product-details-basic.html">Ovora Step stool</a></h3>
                                    <div class="price"><span class="main-price discounted">$185</span> <span
                                            class="discounted-price">$140</span></div>
                                    <div class="rating">
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="color">
                                        <ul>
                                            <li><a class="active" href="#" data-tippy="Black"
                                                    data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                    data-tippy-delay="50" data-tippy-arrow="true"
                                                    data-tippy-theme="roundborder"><span
                                                        class="color-picker black"></span></a></li>
                                            <li><a href="#" data-tippy="Blue" data-tippy-inertia="true"
                                                    data-tippy-animation="shift-away" data-tippy-delay="50"
                                                    data-tippy-arrow="true" data-tippy-theme="roundborder"><span
                                                        class="color-picker blue"></span></a></li>
                                            <li><a href="#" data-tippy="Brown" data-tippy-inertia="true"
                                                    data-tippy-animation="shift-away" data-tippy-delay="50"
                                                    data-tippy-arrow="true" data-tippy-theme="roundborder"><span
                                                        class="color-picker brown"></span></a></li>
                                        </ul>
                                    </div>
                                    <a href="#" class="favorite-icon" data-tippy="Add to Wishlist"
                                        data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                                        data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                        data-tippy-placement="left">
                                        <i class="fa fa-heart-o"></i>
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </div>
                            </div>

                            <!--=======  End of single short view product  =======-->
                        </div>

                        <div class="col">
                            <!--=======  single short view product  =======-->

                            <div class="single-grid-product">
                                <div class="single-grid-product__image">
                                    <div class="product-badge-wrapper">
                                        <span class="onsale">-17%</span>
                                        <span class="hot">Hot</span>
                                    </div>
                                    <a href="product-details-basic.html" class="image-wrap">
                                        <img src="{{ asset('client/img/products/product-14-1-270x360.jpg') }}"
                                            class="img-fluid" alt="">
                                        <img src="{{ asset('client/img/products/product-14-2-270x360.jpg') }}"
                                            class="img-fluid" alt="">
                                    </a>
                                    <div class="product-hover-icon-wrapper">
                                        <span class="single-icon single-icon--quick-view"><a class="cd-trigger"
                                                href="#qv-1" data-tippy="Quick View" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                    class="fa fa-search"></i></a></span>
                                        <span class="single-icon single-icon--add-to-cart"><a href="#"
                                                data-tippy="Add to cart" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                    class="fa fa-shopping-basket"></i> <span>ADD TO CART</span></a></span>
                                        <span class="single-icon single-icon--compare"><a href="#"
                                                data-tippy="Compare" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                    class="fa fa-exchange"></i></a></span>
                                    </div>
                                </div>
                                <div class="single-grid-product__content">
                                    <h3 class="title"><a href="product-details-basic.html">Jane Lauren Carson Chair</a>
                                    </h3>
                                    <div class="price"><span class="main-price">$145</span></div>
                                    <div class="rating">
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star"></i>
                                    </div>

                                    <a href="#" class="favorite-icon" data-tippy="Add to Wishlist"
                                        data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                                        data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                        data-tippy-placement="left">
                                        <i class="fa fa-heart-o"></i>
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </div>
                            </div>

                            <!--=======  End of single short view product  =======-->
                        </div>

                        <div class="col">
                            <!--=======  single short view product  =======-->

                            <div class="single-grid-product">
                                <div class="single-grid-product__image">
                                    <div class="product-badge-wrapper">
                                        <span class="onsale">-17%</span>
                                        <span class="hot">Hot</span>
                                    </div>
                                    <a href="product-details-basic.html" class="image-wrap">
                                        <img src="{{ asset('client/img/products/product-15-1-270x360.jpg') }}"
                                            class="img-fluid" alt="">
                                        <img src="{{ asset('client/img/products/product-15-2-270x360.jpg') }}"
                                            class="img-fluid" alt="">
                                    </a>
                                    <div class="product-hover-icon-wrapper">
                                        <span class="single-icon single-icon--quick-view"><a class="cd-trigger"
                                                href="#qv-1" data-tippy="Quick View" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                    class="fa fa-search"></i></a></span>
                                        <span class="single-icon single-icon--add-to-cart"><a href="#"
                                                data-tippy="Add to cart" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                    class="fa fa-shopping-basket"></i> <span>ADD TO CART</span></a></span>
                                        <span class="single-icon single-icon--compare"><a href="#"
                                                data-tippy="Compare" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                    class="fa fa-exchange"></i></a></span>
                                    </div>
                                </div>
                                <div class="single-grid-product__content">
                                    <h3 class="title"><a href="product-details-basic.html">Alexa Classic Towels</a></h3>
                                    <div class="price"><span class="main-price discounted">$14</span> <span
                                            class="discounted-price">$11</span></div>
                                    <div class="rating">
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="color">
                                        <ul>
                                            <li><a class="active" href="#" data-tippy="Black"
                                                    data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                    data-tippy-delay="50" data-tippy-arrow="true"
                                                    data-tippy-theme="roundborder"><span
                                                        class="color-picker black"></span></a></li>
                                            <li><a href="#" data-tippy="Blue" data-tippy-inertia="true"
                                                    data-tippy-animation="shift-away" data-tippy-delay="50"
                                                    data-tippy-arrow="true" data-tippy-theme="roundborder"><span
                                                        class="color-picker blue"></span></a></li>
                                            <li><a href="#" data-tippy="Brown" data-tippy-inertia="true"
                                                    data-tippy-animation="shift-away" data-tippy-delay="50"
                                                    data-tippy-arrow="true" data-tippy-theme="roundborder"><span
                                                        class="color-picker brown"></span></a></li>
                                        </ul>
                                    </div>
                                    <a href="#" class="favorite-icon" data-tippy="Add to Wishlist"
                                        data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                                        data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                        data-tippy-placement="left">
                                        <i class="fa fa-heart-o"></i>
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </div>
                            </div>

                            <!--=======  End of single short view product  =======-->
                        </div>

                        <div class="col">
                            <!--=======  single short view product  =======-->

                            <div class="single-grid-product">
                                <div class="single-grid-product__image">

                                    <a href="product-details-basic.html" class="image-wrap">
                                        <img src="{{ asset('client/img/products/product-16-1-270x360.jpg') }}"
                                            class="img-fluid" alt="">
                                        <img src="{{ asset('client/img/products/product-16-2-270x360.jpg') }}"
                                            class="img-fluid" alt="">
                                    </a>
                                    <div class="product-hover-icon-wrapper">
                                        <span class="single-icon single-icon--quick-view"><a class="cd-trigger"
                                                href="#qv-1" data-tippy="Quick View" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                    class="fa fa-search"></i></a></span>
                                        <span class="single-icon single-icon--add-to-cart"><a href="#"
                                                data-tippy="Add to cart" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                    class="fa fa-shopping-basket"></i> <span>ADD TO CART</span></a></span>
                                        <span class="single-icon single-icon--compare"><a href="#"
                                                data-tippy="Compare" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                    class="fa fa-exchange"></i></a></span>
                                    </div>
                                </div>
                                <div class="single-grid-product__content">
                                    <h3 class="title"><a href="product-details-basic.html">Olivia Shayn Cover Chair</a>
                                    </h3>
                                    <div class="price"><span class="main-price">$98</span></div>
                                    <div class="rating">
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star"></i>
                                    </div>

                                    <a href="#" class="favorite-icon" data-tippy="Add to Wishlist"
                                        data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                                        data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                        data-tippy-placement="left">
                                        <i class="fa fa-heart-o"></i>
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </div>
                            </div>

                            <!--=======  End of single short view product  =======-->
                        </div>

                    </div>

                    <!--=======  End of product slider wrapper  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--====================  End of product slider area  ====================-->
    <!--====================  category masonry area ====================-->

    <div class="category-area section-space">
        <div class="container">
            <div class="row masonry-layout--category">
                <div class="col-md-6 masonry-item--category">

                    <!--=======  single category  =======-->

                    <div class="single-category single-category--type-two">
                        <div class="single-category--type-two__image">
                            <a href="shop-left-sidebar.html">
                                <img src="{{ asset('client/img/categories/category-out-doors.jpg') }}" class="img-fluid"
                                    alt="">
                            </a>
                        </div>

                        <div class="single-category--type-two__content">
                            <h3 class="title">Outdoor</h3>
                            <span class="count">(3 items)</span>
                        </div>
                    </div>

                    <!--=======  End of single category  =======-->

                </div>
                <div class="col-md-6 masonry-item--category">
                    <!--=======  single category  =======-->

                    <div class="single-category single-category--type-two">
                        <div class="single-category--type-two__image">
                            <a href="shop-left-sidebar.html">
                                <img src="{{ asset('client/img/categories/category-living-room-masonry.jpg') }}"
                                    class="img-fluid" alt="">
                            </a>
                        </div>

                        <div class="single-category--type-two__content">
                            <h3 class="title">Living Room</h3>
                            <span class="count">(37 items)</span>
                        </div>
                    </div>

                    <!--=======  End of single category  =======-->
                </div>
                <div class="col-md-9 masonry-item--category">
                    <!--=======  single category  =======-->

                    <div class="single-category single-category--type-two">
                        <div class="single-category--type-two__image">
                            <a href="shop-left-sidebar.html">
                                <img src="{{ asset('client/img/categories/category-bathroom.jpg') }}" class="img-fluid"
                                    alt="">
                            </a>
                        </div>

                        <div class="single-category--type-two__content">
                            <h3 class="title">Bathroom</h3>
                            <span class="count">(2 items)</span>
                        </div>
                    </div>

                    <!--=======  End of single category  =======-->
                </div>
                <div class="col-md-3 masonry-item--category grid-sizer">
                    <!--=======  single category  =======-->

                    <div class="single-category single-category--type-two">
                        <div class="single-category--type-two__image">
                            <a href="shop-left-sidebar.html">
                                <img src="{{ asset('client/img/categories/category-dinning-chairs.jpg') }}"
                                    class="img-fluid" alt="">
                            </a>
                        </div>

                        <div class="single-category--type-two__content">
                            <h3 class="title">Dining Chairs</h3>
                            <span class="count">(3 items)</span>
                        </div>
                    </div>

                    <!--=======  End of single category  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--====================  End of category masonry area  ====================-->
    <!--====================  product double row area ====================-->

    <div class="product-double-row-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="section-title-area text-center">
                        <h2 class="section-title">Featured Items</h2>
                        <p class="section-subtitle">From a welcoming new collection of lounge seating to an executive chair
                            that melds craft with ergonomics, We want to show you some of our featured products here</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!--=======  product row wrapper  =======-->

                    <div class="product-row-wrapper">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-6 col-custom-sm-6">
                                <!--=======  single short view product  =======-->

                                <div class="single-grid-product">
                                    <div class="single-grid-product__image">
                                        <div class="product-badge-wrapper">
                                            <span class="onsale">-17%</span>
                                            <span class="hot">Hot</span>
                                        </div>
                                        <a href="product-details-basic.html" class="image-wrap">
                                            <img src="{{ asset('client/img/products/product-9-1-270x360.jpg') }}"
                                                class="img-fluid" alt="">
                                            <img src="{{ asset('client/img/products/product-9-2-270x360.jpg') }}"
                                                class="img-fluid" alt="">
                                        </a>
                                        <div class="product-hover-icon-wrapper">
                                            <span class="single-icon single-icon--quick-view"><a class="cd-trigger"
                                                    href="#qv-1" data-tippy="Quick View" data-tippy-inertia="true"
                                                    data-tippy-animation="shift-away" data-tippy-delay="50"
                                                    data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                        class="fa fa-search"></i></a></span>
                                            <span class="single-icon single-icon--add-to-cart"><a href="#"
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
                                        <h3 class="title"><a href="product-details-basic.html">Lighting Lamp</a></h3>
                                        <div class="price"><span class="main-price discounted">$145</span> <span
                                                class="discounted-price">$110</span></div>
                                        <div class="rating">
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="color">
                                            <ul>
                                                <li><a class="active" href="#" data-tippy="Black"
                                                        data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-theme="roundborder"><span
                                                            class="color-picker black"></span></a></li>
                                                <li><a href="#" data-tippy="Blue" data-tippy-inertia="true"
                                                        data-tippy-animation="shift-away" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-theme="roundborder"><span
                                                            class="color-picker blue"></span></a></li>
                                                <li><a href="#" data-tippy="Brown" data-tippy-inertia="true"
                                                        data-tippy-animation="shift-away" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-theme="roundborder"><span
                                                            class="color-picker brown"></span></a></li>
                                            </ul>
                                        </div>
                                        <a href="#" class="favorite-icon" data-tippy="Add to Wishlist"
                                            data-tippy-inertia="true" data-tippy-animation="shift-away"
                                            data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                            data-tippy-placement="left">
                                            <i class="fa fa-heart-o"></i>
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
                                </div>

                                <!--=======  End of single short view product  =======-->
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-custom-sm-6">
                                <!--=======  single short view product  =======-->

                                <div class="single-grid-product">
                                    <div class="single-grid-product__image">

                                        <a href="product-details-basic.html" class="image-wrap">
                                            <img src="{{ asset('client/img/products/product-10-1-270x360.jpg') }}"
                                                class="img-fluid" alt="">
                                        </a>
                                        <div class="product-hover-icon-wrapper">
                                            <span class="single-icon single-icon--quick-view"><a class="cd-trigger"
                                                    href="#qv-1" data-tippy="Quick View" data-tippy-inertia="true"
                                                    data-tippy-animation="shift-away" data-tippy-delay="50"
                                                    data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                        class="fa fa-search"></i></a></span>
                                            <span class="single-icon single-icon--add-to-cart"><a href="#"
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
                                        <h3 class="title"><a href="product-details-basic.html">Jane Lauren Design
                                                Chair</a></h3>
                                        <div class="price"><span class="main-price">$98</span></div>
                                        <div class="rating">
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star"></i>
                                        </div>

                                        <a href="#" class="favorite-icon" data-tippy="Add to Wishlist"
                                            data-tippy-inertia="true" data-tippy-animation="shift-away"
                                            data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                            data-tippy-placement="left">
                                            <i class="fa fa-heart-o"></i>
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
                                </div>

                                <!--=======  End of single short view product  =======-->
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-custom-sm-6">
                                <!--=======  single short view product  =======-->

                                <div class="single-grid-product">
                                    <div class="single-grid-product__image">
                                        <div class="product-badge-wrapper">
                                            <span class="hot">Hot</span>
                                        </div>
                                        <a href="product-details-basic.html" class="image-wrap">
                                            <img src="{{ asset('client/img/products/product-11-1-270x360.jpg') }}"
                                                class="img-fluid" alt="">
                                            <img src="{{ asset('client/img/products/product-11-2-270x360.jpg') }}"
                                                class="img-fluid" alt="">
                                        </a>
                                        <div class="product-hover-icon-wrapper">
                                            <span class="single-icon single-icon--quick-view"><a class="cd-trigger"
                                                    href="#qv-1" data-tippy="Quick View" data-tippy-inertia="true"
                                                    data-tippy-animation="shift-away" data-tippy-delay="50"
                                                    data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                        class="fa fa-search"></i></a></span>
                                            <span class="single-icon single-icon--add-to-cart"><a href="#"
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
                                        <h3 class="title"><a href="product-details-basic.html">Jane Lauren Gregory
                                                Chair</a></h3>
                                        <div class="price"><span class="main-price discounted">$125</span> <span
                                                class="discounted-price">$90</span></div>
                                        <div class="rating">
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star"></i>
                                        </div>

                                        <a href="#" class="favorite-icon" data-tippy="Add to Wishlist"
                                            data-tippy-inertia="true" data-tippy-animation="shift-away"
                                            data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                            data-tippy-placement="left">
                                            <i class="fa fa-heart-o"></i>
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
                                </div>

                                <!--=======  End of single short view product  =======-->
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-custom-sm-6">
                                <!--=======  single short view product  =======-->

                                <div class="single-grid-product">
                                    <div class="single-grid-product__image">
                                        <div class="product-badge-wrapper">
                                            <span class="onsale">-10%</span>
                                        </div>
                                        <a href="product-details-basic.html" class="image-wrap">
                                            <img src="{{ asset('client/img/products/product-12-1-270x360.jpg') }}"
                                                class="img-fluid" alt="">
                                            <img src="{{ asset('client/img/products/product-12-2-270x360.jpg') }}"
                                                class="img-fluid" alt="">
                                        </a>
                                        <div class="product-hover-icon-wrapper">
                                            <span class="single-icon single-icon--quick-view"><a class="cd-trigger"
                                                    href="#qv-1" data-tippy="Quick View" data-tippy-inertia="true"
                                                    data-tippy-animation="shift-away" data-tippy-delay="50"
                                                    data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                        class="fa fa-search"></i></a></span>
                                            <span class="single-icon single-icon--add-to-cart"><a href="#"
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
                                        <h3 class="title"><a href="product-details-basic.html">Candice Desk Lamp</a></h3>
                                        <div class="price"><span class="main-price">$100</span></div>
                                        <div class="rating">
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star"></i>
                                        </div>

                                        <a href="#" class="favorite-icon" data-tippy="Add to Wishlist"
                                            data-tippy-inertia="true" data-tippy-animation="shift-away"
                                            data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                            data-tippy-placement="left">
                                            <i class="fa fa-heart-o"></i>
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
                                </div>

                                <!--=======  End of single short view product  =======-->
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-custom-sm-6">
                                <!--=======  single short view product  =======-->

                                <div class="single-grid-product">
                                    <div class="single-grid-product__image">

                                        <a href="product-details-basic.html" class="image-wrap">
                                            <img src="{{ asset('client/img/products/product-13-1-270x360.jpg') }}"
                                                class="img-fluid" alt="">
                                            <img src="{{ asset('client/img/products/product-13-2-270x360.jpg') }}"
                                                class="img-fluid" alt="">
                                        </a>
                                        <div class="product-hover-icon-wrapper">
                                            <span class="single-icon single-icon--quick-view"><a class="cd-trigger"
                                                    href="#qv-1" data-tippy="Quick View" data-tippy-inertia="true"
                                                    data-tippy-animation="shift-away" data-tippy-delay="50"
                                                    data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                        class="fa fa-search"></i></a></span>
                                            <span class="single-icon single-icon--add-to-cart"><a href="#"
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
                                        <h3 class="title"><a href="product-details-basic.html">Ovora Step stool</a></h3>
                                        <div class="price"><span class="main-price discounted">$185</span> <span
                                                class="discounted-price">$140</span></div>
                                        <div class="rating">
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="color">
                                            <ul>
                                                <li><a class="active" href="#" data-tippy="Black"
                                                        data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-theme="roundborder"><span
                                                            class="color-picker black"></span></a></li>
                                                <li><a href="#" data-tippy="Blue" data-tippy-inertia="true"
                                                        data-tippy-animation="shift-away" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-theme="roundborder"><span
                                                            class="color-picker blue"></span></a></li>
                                                <li><a href="#" data-tippy="Brown" data-tippy-inertia="true"
                                                        data-tippy-animation="shift-away" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-theme="roundborder"><span
                                                            class="color-picker brown"></span></a></li>
                                            </ul>
                                        </div>
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
                            <div class="col-lg-3 col-md-4 col-sm-6 col-custom-sm-6">
                                <!--=======  single short view product  =======-->

                                <div class="single-grid-product">
                                    <div class="single-grid-product__image">
                                        <div class="product-badge-wrapper">
                                            <span class="onsale">-17%</span>
                                            <span class="hot">Hot</span>
                                        </div>
                                        <a href="product-details-basic.html" class="image-wrap">
                                            <img src="{{ asset('client/img/products/product-14-1-270x360.jpg') }}"
                                                class="img-fluid" alt="">
                                            <img src="{{ asset('client/img/products/product-14-2-270x360.jpg') }}"
                                                class="img-fluid" alt="">
                                        </a>
                                        <div class="product-hover-icon-wrapper">
                                            <span class="single-icon single-icon--quick-view"><a class="cd-trigger"
                                                    href="#qv-1" data-tippy="Quick View" data-tippy-inertia="true"
                                                    data-tippy-animation="shift-away" data-tippy-delay="50"
                                                    data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                        class="fa fa-search"></i></a></span>
                                            <span class="single-icon single-icon--add-to-cart"><a href="#"
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
                                        <h3 class="title"><a href="product-details-basic.html">Jane Lauren Carson
                                                Chair</a></h3>
                                        <div class="price"><span class="main-price">$145</span></div>
                                        <div class="rating">
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star"></i>
                                        </div>

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
                            <div class="col-lg-3 col-md-4 col-sm-6 col-custom-sm-6">
                                <!--=======  single short view product  =======-->

                                <div class="single-grid-product">
                                    <div class="single-grid-product__image">
                                        <div class="product-badge-wrapper">
                                            <span class="onsale">-17%</span>
                                            <span class="hot">Hot</span>
                                        </div>
                                        <a href="product-details-basic.html" class="image-wrap">
                                            <img src="{{ asset('client/img/products/product-15-1-270x360.jpg') }}"
                                                class="img-fluid" alt="">
                                            <img src="{{ asset('client/img/products/product-15-2-270x360.jpg') }}"
                                                class="img-fluid" alt="">
                                        </a>
                                        <div class="product-hover-icon-wrapper">
                                            <span class="single-icon single-icon--quick-view"><a class="cd-trigger"
                                                    href="#qv-1" data-tippy="Quick View" data-tippy-inertia="true"
                                                    data-tippy-animation="shift-away" data-tippy-delay="50"
                                                    data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                        class="fa fa-search"></i></a></span>
                                            <span class="single-icon single-icon--add-to-cart"><a href="#"
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
                                        <h3 class="title"><a href="product-details-basic.html">Alexa Classic Towels</a>
                                        </h3>
                                        <div class="price"><span class="main-price discounted">$14</span> <span
                                                class="discounted-price">$11</span></div>
                                        <div class="rating">
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="color">
                                            <ul>
                                                <li><a class="active" href="#" data-tippy="Black"
                                                        data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                        data-tippy-delay="50" data-tippy-arrow="true"
                                                        data-tippy-theme="roundborder"><span
                                                            class="color-picker black"></span></a></li>
                                                <li><a href="#" data-tippy="Blue" data-tippy-inertia="true"
                                                        data-tippy-animation="shift-away" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-theme="roundborder"><span
                                                            class="color-picker blue"></span></a></li>
                                                <li><a href="#" data-tippy="Brown" data-tippy-inertia="true"
                                                        data-tippy-animation="shift-away" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-theme="roundborder"><span
                                                            class="color-picker brown"></span></a></li>
                                            </ul>
                                        </div>
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
                            <div class="col-lg-3 col-md-4 col-sm-6 col-custom-sm-6">
                                <!--=======  single short view product  =======-->

                                <div class="single-grid-product">
                                    <div class="single-grid-product__image">

                                        <a href="product-details-basic.html" class="image-wrap">
                                            <img src="{{ asset('client/img/products/product-16-1-270x360.jpg') }}"
                                                class="img-fluid" alt="">
                                            <img src="{{ asset('client/img/products/product-16-2-270x360.jpg') }}"
                                                class="img-fluid" alt="">
                                        </a>
                                        <div class="product-hover-icon-wrapper">
                                            <span class="single-icon single-icon--quick-view"><a class="cd-trigger"
                                                    href="#qv-1" data-tippy="Quick View" data-tippy-inertia="true"
                                                    data-tippy-animation="shift-away" data-tippy-delay="50"
                                                    data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                        class="fa fa-search"></i></a></span>
                                            <span class="single-icon single-icon--add-to-cart"><a href="#"
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
                                        <h3 class="title"><a href="product-details-basic.html">Olivia Shayn Cover
                                                Chair</a></h3>
                                        <div class="price"><span class="main-price">$98</span></div>
                                        <div class="rating">
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star"></i>
                                        </div>

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

                        </div>
                    </div>

                    <!--=======  End of product row wrapper  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--====================  End of product double row area  ====================-->
    <!--====================  blog slider ====================-->

    <div class="blog-slider-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="section-title-area text-center">
                        <h2 class="section-title">From Our Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  blog slider wrapper  =======-->

                    <div class="blog-slider-wrapper theme-slick-slider"
                        data-slick-setting='{
                        "slidesToShow": 3,
                        "slidesToScroll": 3,
                        "arrows": true,
                        "autoplay": false,
                        "autoplaySpeed": 5000,
                        "speed": 500,
                        "prevArrow": {"buttonClass": "slick-prev", "iconClass": "fa fa-angle-left" },
                        "nextArrow": {"buttonClass": "slick-next", "iconClass": "fa fa-angle-right" }
                    }'
                        data-slick-responsive='[
                        {"breakpoint":1501, "settings": {"slidesToShow": 3, "arrows": false} },
                        {"breakpoint":1199, "settings": {"slidesToShow": 3, "arrows": false} },
                        {"breakpoint":991, "settings": {"slidesToShow": 2, "arrows": false, "slidesToScroll": 2} },
                        {"breakpoint":767, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} },
                        {"breakpoint":575, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} },
                        {"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} }
                    ]'>
                        <!--=======  single blog post  =======-->
                        <div class="col">

                            <div class="single-slider-blog-post">
                                <div class="single-slider-blog-post__image">
                                    <a href="blog-post-left-sidebar.html">
                                        <img src="{{ asset('client/img/blog/slider/one-550x360.jpg') }}"
                                            class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="single-slider-blog-post__content">
                                    <h3 class="post-title"><a href="blog-post-left-sidebar.html">The Difference Between
                                            Green Furniture and Sustainable Furniture</a></h3>
                                    <p class="post-meta">By <a href="#" class="post-author">admin</a> <span
                                            class="separator">|</span> <a href="#">January 21, 2019</a></p>
                                    <p class="post-excerpt">Many furniture companies claim their products are “green,” a
                                        designation usually referring to material sourcing. Maybe their sofa frames are made
                                        out of dumpster-sourced scrap metal or their cushions are…</p>
                                    <a href="blog-post-left-sidebar.html" class="blog-readmore-link">Read more <i
                                            class="fa fa-caret-right"></i></a>
                                </div>
                            </div>

                        </div>
                        <!--=======  End of single blog post  =======-->
                        <!--=======  single blog post  =======-->
                        <div class="col">

                            <div class="single-slider-blog-post">
                                <div class="single-slider-blog-post__image">
                                    <a href="blog-post-left-sidebar.html">
                                        <img src="{{ asset('client/img/blog/slider/two-550x360.jpg') }}"
                                            class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="single-slider-blog-post__content">
                                    <h3 class="post-title"><a href="blog-post-left-sidebar.html">A Busy Person Guide To
                                            Getting Organized Room</a></h3>
                                    <p class="post-meta">By <a href="#" class="post-author">admin</a> <span
                                            class="separator">|</span> <a href="#">January 21, 2019</a></p>
                                    <p class="post-excerpt">Many furniture companies claim their products are “green,” a
                                        designation usually referring to material sourcing. Maybe their sofa frames are made
                                        out of dumpster-sourced scrap metal or their cushions are…</p>
                                    <a href="blog-post-left-sidebar.html" class="blog-readmore-link">Read more <i
                                            class="fa fa-caret-right"></i></a>
                                </div>
                            </div>

                        </div>
                        <!--=======  End of single blog post  =======-->
                        <!--=======  single blog post  =======-->
                        <div class="col">

                            <div class="single-slider-blog-post">
                                <div class="single-slider-blog-post__image">
                                    <a href="blog-post-left-sidebar.html">
                                        <img src="{{ asset('client/img/blog/slider/three-550x360.jpg') }}"
                                            class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="single-slider-blog-post__content">
                                    <h3 class="post-title"><a href="blog-post-left-sidebar.html">Three Sneaky Storage
                                            Solutions For Small Spaces</a></h3>
                                    <p class="post-meta">By <a href="#" class="post-author">admin</a> <span
                                            class="separator">|</span> <a href="#">January 21, 2019</a></p>
                                    <p class="post-excerpt">Many furniture companies claim their products are “green,” a
                                        designation usually referring to material sourcing. Maybe their sofa frames are made
                                        out of dumpster-sourced scrap metal or their cushions are…</p>
                                    <a href="blog-post-left-sidebar.html" class="blog-readmore-link">Read more <i
                                            class="fa fa-caret-right"></i></a>
                                </div>
                            </div>

                        </div>
                        <!--=======  End of single blog post  =======-->
                        <!--=======  single blog post  =======-->
                        <div class="col">

                            <div class="single-slider-blog-post">
                                <div class="single-slider-blog-post__image">
                                    <a href="blog-post-left-sidebar.html">
                                        <img src="{{ asset('client/img/blog/slider/four-550x360.jpg') }}"
                                            class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="single-slider-blog-post__content">
                                    <h3 class="post-title"><a href="blog-post-left-sidebar.html">The Future of Senior
                                            Housing</a></h3>
                                    <p class="post-meta">By <a href="#" class="post-author">admin</a> <span
                                            class="separator">|</span> <a href="#">January 21, 2019</a></p>
                                    <p class="post-excerpt">Many furniture companies claim their products are “green,” a
                                        designation usually referring to material sourcing. Maybe their sofa frames are made
                                        out of dumpster-sourced scrap metal or their cushions are…</p>
                                    <a href="blog-post-left-sidebar.html" class="blog-readmore-link">Read more <i
                                            class="fa fa-caret-right"></i></a>
                                </div>
                            </div>

                        </div>
                        <!--=======  End of single blog post  =======-->
                        <!--=======  single blog post  =======-->
                        <div class="col">

                            <div class="single-slider-blog-post">
                                <div class="single-slider-blog-post__image">
                                    <a href="blog-post-left-sidebar.html">
                                        <img src="{{ asset('client/img/blog/slider/five-550x360.jpg') }}"
                                            class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="single-slider-blog-post__content">
                                    <h3 class="post-title"><a href="blog-post-left-sidebar.html">Creating An Organized
                                            Multi-Use Room</a></h3>
                                    <p class="post-meta">By <a href="#" class="post-author">admin</a> <span
                                            class="separator">|</span> <a href="#">January 21, 2019</a></p>
                                    <p class="post-excerpt">Many furniture companies claim their products are “green,” a
                                        designation usually referring to material sourcing. Maybe their sofa frames are made
                                        out of dumpster-sourced scrap metal or their cushions are…</p>
                                    <a href="blog-post-left-sidebar.html" class="blog-readmore-link">Read more <i
                                            class="fa fa-caret-right"></i></a>
                                </div>
                            </div>

                        </div>
                        <!--=======  End of single blog post  =======-->
                        <!--=======  single blog post  =======-->
                        <div class="col">

                            <div class="single-slider-blog-post">
                                <div class="single-slider-blog-post__image">
                                    <a href="blog-post-left-sidebar.html">
                                        <img src="{{ asset('client/img/blog/slider/six-550x360.jpg') }}"
                                            class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="single-slider-blog-post__content">
                                    <h3 class="post-title"><a href="blog-post-left-sidebar.html">Sustainable Furniture
                                            in Modern World</a></h3>
                                    <p class="post-meta">By <a href="#" class="post-author">admin</a> <span
                                            class="separator">|</span> <a href="#">January 21, 2019</a></p>
                                    <p class="post-excerpt">Many furniture companies claim their products are “green,” a
                                        designation usually referring to material sourcing. Maybe their sofa frames are made
                                        out of dumpster-sourced scrap metal or their cushions are…</p>
                                    <a href="blog-post-left-sidebar.html" class="blog-readmore-link">Read more <i
                                            class="fa fa-caret-right"></i></a>
                                </div>
                            </div>

                        </div>
                        <!--=======  End of single blog post  =======-->

                    </div>

                    <!--=======  End of blog slider wrapper  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--====================  End of blog slider  ====================-->
    <!--====================  brand logo slider ====================-->

    <div class="brand-logo-slider-area bg--light-grey">
        <div class="container wide">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  brand logo slider wrapper  =======-->

                    <div class="brand-logo-slider-wrapper theme-slick-slider"
                        data-slick-setting='{
                        "slidesToShow": 6,
                        "arrows": true,
                        "autoplay": false,
                        "autoplaySpeed": 5000,
                        "speed": 500,
                        "prevArrow": {"buttonClass": "slick-prev", "iconClass": "fa fa-angle-left" },
                        "nextArrow": {"buttonClass": "slick-next", "iconClass": "fa fa-angle-right" }
                    }'
                        data-slick-responsive='[
                        {"breakpoint":1501, "settings": {"slidesToShow": 5} },
                        {"breakpoint":1199, "settings": {"slidesToShow": 4} },
                        {"breakpoint":991, "settings": {"slidesToShow": 3} },
                        {"breakpoint":767, "settings": {"slidesToShow": 2} },
                        {"breakpoint":575, "settings": {"slidesToShow": 2} },
                        {"breakpoint":479, "settings": {"slidesToShow": 1} }
                    ]'>

                        <!--=======  single brand logo  =======-->

                        <div class="single-brand-logo">
                            <a href="shop-left-sidebar.html">
                                <img src="{{ asset('client/img/brands/brand-2.png') }}" class="img-fluid"
                                    alt="">
                            </a>
                        </div>

                        <!--=======  End of single brand logo  =======-->

                        <!--=======  single brand logo  =======-->

                        <div class="single-brand-logo">
                            <a href="shop-left-sidebar.html">
                                <img src="{{ asset('client/img/brands/brand-3.png') }}" class="img-fluid"
                                    alt="">
                            </a>
                        </div>

                        <!--=======  End of single brand logo  =======-->

                        <!--=======  single brand logo  =======-->

                        <div class="single-brand-logo">
                            <a href="shop-left-sidebar.html">
                                <img src="{{ asset('client/img/brands/brand-4.png') }}" class="img-fluid"
                                    alt="">
                            </a>
                        </div>

                        <!--=======  End of single brand logo  =======-->

                        <!--=======  single brand logo  =======-->

                        <div class="single-brand-logo">
                            <a href="shop-left-sidebar.html">
                                <img src="{{ asset('client/img/brands/brand-6.png') }}" class="img-fluid"
                                    alt="">
                            </a>
                        </div>

                        <!--=======  End of single brand logo  =======-->

                        <!--=======  single brand logo  =======-->

                        <div class="single-brand-logo">
                            <a href="shop-left-sidebar.html">
                                <img src="{{ asset('client/img/brands/brand-7.png') }}" class="img-fluid"
                                    alt="">
                            </a>
                        </div>

                        <!--=======  End of single brand logo  =======-->

                        <!--=======  single brand logo  =======-->

                        <div class="single-brand-logo">
                            <a href="shop-left-sidebar.html">
                                <img src="{{ asset('client/img/brands/brand-11.png') }}" class="img-fluid"
                                    alt="">
                            </a>
                        </div>

                        <!--=======  End of single brand logo  =======-->

                        <!--=======  single brand logo  =======-->

                        <div class="single-brand-logo">
                            <a href="shop-left-sidebar.html">
                                <img src="{{ asset('client/img/brands/brand-12.png') }}" class="img-fluid"
                                    alt="">
                            </a>
                        </div>

                        <!--=======  End of single brand logo  =======-->
                    </div>

                    <!--=======  End of brand logo slider wrapper  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--====================  End of brand logo slider  ====================-->\

    <!--=====  End of quick view  ======-->
    <!-- scroll to top  -->
    <button class="scroll-top">
        <i class="fa fa-angle-up"></i>
    </button>
    <!-- end of scroll to top -->
    <html>
<head>
    <title>How to Install And Use CKEditor In Laravel? - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2 mt-5">
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white">How to Install And Use CKEditor In Laravel? - ItSolutionStuff.com</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control"/>
                            </div>  
                            <div class="form-group">
                                <label><strong>Description :</strong></label>
                                <textarea class="ckeditor form-control" name="description"></textarea>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success btn-sm">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</body>
   
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
  
</html>
@endsection
