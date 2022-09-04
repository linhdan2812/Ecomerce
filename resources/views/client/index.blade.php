@extends('layouts.client-layout')
@section('content')
<!--====================  hero slider area ====================-->

<div class="hero-slider-area section-space">
        <!-- START REVOLUTION SLIDER 5.4.7 fullwidth mode -->
        <div id="rev_slider_23_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.7">
            <ul>
                <!-- SLIDE  -->
                @foreach($bannerSlide as $item)
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
                                        <a href="shop-left-sidebar.html"><img src="{{asset('client/img/categories/category-1.jpg')}}" class="img-fluid" alt=""></a>
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
                                        <a href="shop-left-sidebar.html"><img src="{{asset('client/img/categories/category-2.jpg')}}" class="img-fluid" alt=""></a>
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
                                        <a href="shop-left-sidebar.html"><img src="{{asset('client/img/categories/category-3.jpg')}}" class="img-fluid" alt=""></a>
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
                                            <img src="{{asset('client/img/banners/simple-banner-1.jpg')}}" class="img-fluid" alt="">
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
                                            <img src="{{asset('client/img/banners/simple-banner-2.jpg')}}" class="img-fluid" alt="">
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
                                            <img src="{{asset('client/img/banners/simple-banner-3.jpg')}}" class="img-fluid" alt="">
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
                                        <img src="{{asset('client/img/brands/brand-2.png')}}" class="img-fluid" alt="">
                                    </a>
                                </div>

                                <!--=======  End of single brand  =======-->
                            </div>
                            <div class="col-md-4 col-sm-6 col-12">
                                <!--=======  single brand  =======-->

                                <div class="single-brand">
                                    <a href="shop-left-sidebar.html">
                                        <img src="{{asset('client/img/brands/brand-12.png')}}" class="img-fluid" alt="">
                                    </a>
                                </div>

                                <!--=======  End of single brand  =======-->
                            </div>
                            <div class="col-md-4 col-sm-6 col-12">
                                <!--=======  single brand  =======-->

                                <div class="single-brand">
                                    <a href="shop-left-sidebar.html">
                                        <img src="{{asset('client/img/brands/brand-15.png')}}" class="img-fluid" alt="">
                                    </a>
                                </div>

                                <!--=======  End of single brand  =======-->
                            </div>
                            <div class="col-md-4 col-sm-6 col-12">
                                <!--=======  single brand  =======-->

                                <div class="single-brand">
                                    <a href="shop-left-sidebar.html">
                                        <img src="{{asset('client/img/brands/brand-4.png')}}" class="img-fluid" alt="">
                                    </a>
                                </div>

                                <!--=======  End of single brand  =======-->
                            </div>
                            <div class="col-md-4 col-sm-6 col-12">
                                <!--=======  single brand  =======-->

                                <div class="single-brand">
                                    <a href="shop-left-sidebar.html">
                                        <img src="{{asset('client/img/brands/brand-6.png')}}" class="img-fluid" alt="">
                                    </a>
                                </div>

                                <!--=======  End of single brand  =======-->
                            </div>
                            <div class="col-md-4 col-sm-6 col-12">
                                <!--=======  single brand  =======-->

                                <div class="single-brand">
                                    <a href="shop-left-sidebar.html">
                                        <img src="{{asset('client/img/brands/brand-11.png')}}" class="img-fluid" alt="">
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

    <!--====================  End of call to action area  ====================-->
@endsection