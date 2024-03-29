<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Robin - Furniture eCommerce Bootstrap4 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="{{asset('client/img/favicon.ico')}}">

    <!--=============================================
    =            CSS  files       =
    =============================================-->

    <!-- Vendor CSS -->
    <link href="{{asset('client/css/vendors.css')}}" rel="stylesheet">
    <!-- Main CSS -->
    <link href="{{asset('client/css/style.css')}}" rel="stylesheet">


    <!-- Revolution Slider CSS -->
    <link href="{{asset('client/revolution/css/settings.css')}}" rel="stylesheet">
    <link href="{{asset('client/revolution/css/navigation.css')}}" rel="stylesheet">
    <link href="{{asset('client/revolution/custom-setting.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


</head>

<body>

    <!--====================  header area ====================-->

    <div class="header-area header-area--one header-sticky">

        <!--=======  header info area  =======-->

        <div class="header-info-area d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-info-wrapper">
                            <div class="header-logo text-center">
                                <a href="{{ route('home')}}">
                                    <img src="{{asset('client/img/logo.png')}}" class="img-fluid" alt="">
                                </a>
                            </div>

                            <div class="header-icon-area">
                                <div class="header-icon">
                                    <ul class="header-icon__list">
                                        <li><a href="javascript:void(0)" id="search-icon"><i class="fa fa-search"></i></a></li>
                                        <li>
                                            <a href="wishlist.html"><i class="fa fa-heart-o"></i><span class="item-count">1</span></a>
                                            <div class="minicart-wrapper">
                                                <p class="minicart-wrapper__title">WISHLIST</p>

                                                <div class="minicart-wrapper__items ps-scroll">
                                                    <div class="minicart-wrapper__items__single">
                                                        <a href="javascript:void(0)" class="close-icon"><i class="pe-7s-close"></i></a>
                                                        <div class="image">
                                                            <a href="product-details-basic.html">
                                                                <img src="{{asset('client/img/products/product-1-90x100.jpg')}}" class="img-fluid" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="content">
                                                            <p class="product-title"><a href="product-details-basic.html">Atelier Fuji NC Chair</a></p>
                                                            <p class="product-calculation"><span class="price">$900</span></p>
                                                            <a href="javascript:void(0)" class="wishlist-cart-icon"><i class="fa fa-shopping-basket"></i> Thêm vào giỏ hàng</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="minicart-wrapper__buttons mb-0">
                                                    <a href="wishlist.html" class="theme-button theme-button--minicart-button mb-0">VIEW WISHLIST</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="{{ route('cart') }}"><i class="fa fa-shopping-basket"></i><span class="item-count">{{ count((array) session('cart')) }}</span></a>
                                            <div class="minicart-wrapper">
                                                <p class="minicart-wrapper__title">CART</p>
                                                <div class="minicart-wrapper__items ps-scroll">
                                                    <div class="row total-header-section">
                                                        <div class="col-lg-6 col-sm-6 col-6">
                                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                                        </div>
                                                        @php $total = 0 @endphp
                                                        @foreach((array) session('cart') as $id => $details)
                                                            @php $total += $details['price'] * $details['quantity'] @endphp
                                                        @endforeach
                                                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                                            <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                                                        </div>
                                                    </div>
                                                @if(session('cart'))
                                                            @foreach(session('cart') as $id => $details)
                                                                <div class="row cart-detail">
                                                                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                                        <img src="{{ $details['image'] }}" />
                                                                    </div>
                                                                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                                        <p>{{ $details['name'] }}</p>
                                                                        <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                <div class="minicart-wrapper__buttons">
                                                    <a href="{{ route('cart') }}" class="theme-button theme-button--minicart-button">VIEW CART</a>
                                                    <a href="checkout.html" class="theme-button theme-button--alt theme-button--minicart-button theme-button--minicart-button--alt mb-0">CHECKOUT</a>
                                                </div>
                                                <p class="minicart-wrapper__featuretext">Free Shipping on All Orders Over $100!</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--=======  End of header info area  =======-->

        <!--=======  navigation area  =======-->
        {{-- Suy nghĩ về việc bỏ nó đi
        <div class="header-navigation-area header-navigation-area--dark d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2">
                        <div class="header-logo header-logo--sticky">
                            <a href="">
                                <img src="{{asset('client/img/logo-alt.png')}}" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="header-navigation-wrapper">
                            <nav>
                                <ul>
                                    <li class="has-children">
                                        <a href="index.html">HOME</a>
                                        <ul class="submenu submenu--home-variation">
                                            <li class="submenu--home-variation__item">
                                                <p class="submenu--home-variation__item__title"><a href="index.html">HOMEPAGE 01</a></p>
                                                <div class="submenu--home-variation__item__image">
                                                    <a href="index.html"><img src="{{asset('client/img/menu-image/home1.jpg')}}" class="img-fluid" alt=""></a>
                                                </div>
                                            </li>
                                            <li class="submenu--home-variation__item">
                                                <p class="submenu--home-variation__item__title"><a href="index-2.html">HOMEPAGE 02</a></p>
                                                <div class="submenu--home-variation__item__image">
                                                    <a href="index-2.html"><img src="{{asset('client/img/menu-image/home2.jpg')}}" class="img-fluid" alt=""></a>
                                                </div>
                                            </li>
                                            <li class="submenu--home-variation__item">
                                                <p class="submenu--home-variation__item__title"><a href="index-3.html">HOMEPAGE 03</a></p>
                                                <div class="submenu--home-variation__item__image">
                                                    <a href="index-3.html"><img src="{{asset('client/img/menu-image/home3.jpg')}}" class="img-fluid" alt=""></a>
                                                </div>
                                            </li>
                                            <li class="submenu--home-variation__item">
                                                <p class="submenu--home-variation__item__title"><a href="index-4.html">HOMEPAGE 04</a></p>
                                                <div class="submenu--home-variation__item__image">
                                                    <a href="index-4.html"><img src="{{asset('client/img/menu-image/home4.jpg')}}" class="img-fluid" alt=""></a>
                                                </div>
                                            </li>
                                            <li class="submenu--home-variation__item">
                                                <p class="submenu--home-variation__item__title"><a href="index-5.html">HOMEPAGE 05</a></p>
                                                <div class="submenu--home-variation__item__image">
                                                    <a href="index-5.html"><img src="{{asset('client/img/menu-image/home5.jpg')}}" class="img-fluid" alt=""></a>
                                                </div>
                                            </li>
                                            <li class="submenu--home-variation__item">
                                                <p class="submenu--home-variation__item__title"><a href="index.html">HOMEPAGE 06</a></p>
                                                <div class="submenu--home-variation__item__image">
                                                    <a href="index-6.html"><img src="{{asset('client/img/menu-image/home6.jpg')}}" class="img-fluid" alt=""></a>
                                                </div>
                                            </li>
                                            <li class="submenu--home-variation__item">
                                                <p class="submenu--home-variation__item__title"><a href="index-7.html">HOMEPAGE 07</a></p>
                                                <div class="submenu--home-variation__item__image">
                                                    <a href="index-7.html"><img src="{{asset('client/img/menu-image/home7.jpg')}}" class="img-fluid" alt=""></a>
                                                </div>
                                            </li>
                                            <li class="submenu--home-variation__item">
                                                <p class="submenu--home-variation__item__title"><a href="index-8.html">HOMEPAGE 08</a></p>
                                                <div class="submenu--home-variation__item__image">
                                                    <a href="index-8.html"><img src="{{asset('client/img/menu-image/home8.jpg')}}" class="img-fluid" alt=""></a>
                                                </div>
                                            </li>
                                            <li class="submenu--home-variation__item">
                                                <p class="submenu--home-variation__item__title"><a href="index-9.html">HOMEPAGE 09</a></p>
                                                <div class="submenu--home-variation__item__image">
                                                    <a href="index-9.html"><img src="{{asset('client/img/menu-image/home10.jpg')}}" class="img-fluid" alt=""></a>
                                                </div>
                                            </li>
                                            <li class="submenu--home-variation__item">
                                                <p class="submenu--home-variation__item__title"><a href="instagram-shop.html">Instagram Shop</a></p>
                                                <div class="submenu--home-variation__item__image">
                                                    <a href="instagram-shop.html"><img src="{{asset('client/img/menu-image/home9.jpg')}}" class="img-fluid" alt=""></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="javascript:void(0)">PAGE</a>
                                        <ul class="submenu submenu--column-1">
                                            <li><a href="about-us.html">About Us</a></li>
                                            <li><a href="contact-us.html">Contact Us</a></li>
                                            <li><a href="faq.html">F.A.Q</a></li>
                                            <li><a href="service.html">Our Service</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="javascript:void(0)">ELEMENTS</a>
                                        <ul class="submenu submenu--column-3">
                                            <li>
                                                <ul>
                                                    <li class="megamenu-title">SHOP/PRODUCTS</li>
                                                    <li><a href="element-product-category.html">Product Categories</a></li>
                                                    <li><a href="element-product-carousel.html">Products Carousel</a></li>
                                                    <li><a href="element-product-widget.html">Product Widget</a></li>
                                                    <li><a href="element-recent-product.html">Recent Products</a></li>
                                                    <li><a href="element-sale-product.html">Sale Products</a></li>
                                                    <li><a href="element-featured-product.html">Featured Product</a></li>
                                                    <li><a href="element-top-rated-product.html">Top Rated Products</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li class="megamenu-title">THEMING</li>
                                                    <li><a href="element-blog-post.html">Blog Posts</a></li>
                                                    <li><a href="element-mailchimp-form.html">MailChimp Form</a></li>
                                                    <li><a href="element-accordion-toggles.html">Accordion/Toggles</a></li>
                                                    <li><a href="element-progress-bar.html">Progress Bars</a></li>
                                                    <li><a href="element-countdown-timer.html">Countdown Timer</a></li>
                                                    <li><a href="element-button.html">Buttons</a></li>
                                                    <li><a href="element-testimonial.html">Testimonials</a></li>
                                                    <li><a href="element-google-map.html">Google Maps</a></li>
                                                </ul>
                                            </li>
                                            <li class="megamenu-image">
                                                <img src="{{asset('client/img/menu-image/sofa.png')}}" class="img-fluid" alt="">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="blog.html">BLOG</a>
                                        <ul class="submenu submenu--column-1">
                                            <li class="has-children">
                                                <a href="javascript:void(0)">Blog post list</a>
                                                <ul class="submenu submenu--column-1">
                                                    <li><a href="blog-one-column.html">Blog one column</a> </li>
                                                    <li><a href="blog-two-column.html">Blog two column</a></li>
                                                    <li><a href="blog-left-sidebar.html">Blog left sidebar</a></li>
                                                    <li><a href="blog-right-sidebar.html">Blog right sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li class="has-children">
                                                <a href="javascript:void(0)">Blog post details</a>
                                                <ul class="submenu submenu--column-1">
                                                    <li><a href="blog-post-format-image.html">Blog post format image</a></li>
                                                    <li><a href="blog-post-format-gallery.html">Blog post format gallery</a></li>
                                                    <li><a href="blog-post-format-audio.html">Blog post format audio</a></li>
                                                    <li><a href="blog-post-format-video.html">Blog post format video</a></li>
                                                    <li><a href="blog-post-left-sidebar.html">Blog post left sidebar</a></li>
                                                    <li><a href="blog-post-right-sidebar.html">Blog post right sidebar</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="has-children"><a href="shop-left-sidebar.html">SHOP</a>
                                        <ul class="submenu submenu--column-3">
                                            <li>
                                                <ul>
                                                    <li class="megamenu-title">SHOP PAGES</li>
                                                    <li><a href="shop-fullwidth.html">Shop Fullwidth</a></li>
                                                    <li><a href="shop-list.html">Shop List Layout</a></li>
                                                    <li><a href="shop-no-sidebar.html">Shop No Sidebar</a></li>
                                                    <li><a href="shop-left-sidebar.html">Shop With Left Sidebar</a></li>
                                                    <li><a href="shop-right-sidebar.html">Shop With Right Sidebar</a></li>
                                                    <li><a href="shop-brand.html">Shop By Brand</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li class="megamenu-title">SHOP PAGES(DETAILS)</li>
                                                    <li><a href="product-details-basic.html">Basic</a></li>
                                                    <li><a href="product-details-fullwidth.html">Fullwidth</a></li>
                                                    <li><a href="product-details-sticky.html">Sticky Details</a></li>
                                                    <li><a href="product-details-bottom-thumbnail.html">Bottom thumbnails</a></li>
                                                    <li><a href="product-details-extra-content.html">Extra content</a></li>
                                                    <li><a href="product-details-variation-image.html">Variations Images</a></li>
                                                    <li><a href="product-details-affiliate.html">Product details affiliate</a></li>
                                                    <li><a href="product-details-group.html">Product details group</a></li>
                                                </ul>
                                            </li>
                                            <li class="megamenu-image">
                                                <img src="{{asset('client/img/menu-image/sofa-253x186.jpg')}}" class="img-fluid" alt="">
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="header-icon-area header-icon-area--sticky">
                            <div class="header-icon d-flex justify-content-end">
                                <ul class="header-icon__list header-icon__list header-icon__list header-icon__list--white-icon">
                                    <li><a href="javascript:void(0)" id="search-icon-2"><i class="fa fa-search"></i></a></li>
                                    <li>
                                        <a href="wishlist.html"><i class="fa fa-heart-o"></i><span class="item-count">1</span></a>
                                        <div class="minicart-wrapper">
                                            <p class="minicart-wrapper__title">WISHLIST</p>

                                            <div class="minicart-wrapper__items ps-scroll">
                                                <div class="minicart-wrapper__items__single">
                                                    <a href="javascript:void(0)" class="close-icon"><i class="pe-7s-close"></i></a>
                                                    <div class="image">
                                                        <a href="product-details-basic.html">
                                                            <img src="{{asset('client/img/products/product-1-90x100.jpg')}}" class="img-fluid" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        <p class="product-title"><a href="product-details-basic.html">Atelier Fuji NC Chair</a></p>
                                                        <p class="product-calculation"><span class="price">$900</span></p>
                                                        <a href="javascript:void(0)" class="wishlist-cart-icon"><i class="fa fa-shopping-basket"></i> Thêm vào giỏ hàng</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="minicart-wrapper__buttons mb-0">
                                                <a href="wishlist.html" class="theme-button theme-button--minicart-button mb-0">VIEW WISHLIST</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="cart.html"><i class="fa fa-shopping-basket"></i><span class="item-count">3</span></a>
                                        <div class="minicart-wrapper">
                                            <p class="minicart-wrapper__title">CART</p>

                                            <div class="minicart-wrapper__items ps-scroll">
                                                <div class="minicart-wrapper__items__single">
                                                    <a href="javascript:void(0)" class="close-icon"><i class="pe-7s-close"></i></a>
                                                    <div class="image">
                                                        <a href="product-details-basic.html">
                                                            <img src="{{asset('client/img/products/product-1-90x100.jpg')}}" class="img-fluid" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        <p class="product-title"><a href="product-details-basic.html">Atelier Fuji NC Chair</a></p>
                                                        <p class="product-calculation"><span class="count">1</span> x <span class="price">$900</span></p>
                                                    </div>
                                                </div>
                                                <div class="minicart-wrapper__items__single">
                                                    <a href="javascript:void(0)" class="close-icon"><i class="pe-7s-close"></i></a>
                                                    <div class="image">
                                                        <a href="product-details-basic.html">
                                                            <img src="{{asset('client/img/products/product-2-90x100.jpg')}}" class="img-fluid" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        <p class="product-title"><a href="product-details-basic.html">Jane Lauren Rebel Sofa</a></p>
                                                        <p class="product-calculation"><span class="count">1</span> x <span class="price">$900</span></p>
                                                    </div>
                                                </div>
                                                <div class="minicart-wrapper__items__single">
                                                    <a href="javascript:void(0)" class="close-icon"><i class="pe-7s-close"></i></a>
                                                    <div class="image">
                                                        <a href="product-details-basic.html">
                                                            <img src="{{asset('client/img/products/product-1-90x100.jpg')}}" class="img-fluid" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        <p class="product-title"><a href="product-details-basic.html">Atelier Fuji NC Chair</a></p>
                                                        <p class="product-calculation"><span class="count">1</span> x <span class="price">$900</span></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <p class="minicart-wrapper__subtotal">SUBTOTAL: <span>$1800</span></p>

                                            <div class="minicart-wrapper__buttons">
                                                <a href="cart.html" class="theme-button theme-button--minicart-button">VIEW CART</a>
                                                <a href="checkout.html" class="theme-button theme-button--alt theme-button--minicart-button theme-button--minicart-button--alt mb-0">CHECKOUT</a>
                                            </div>

                                            <p class="minicart-wrapper__featuretext">Free Shipping on All Orders Over $100!</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <!--=======  End of navigation area  =======-->

        <!--=======  mobile navigation area  =======-->
        {{-- Bỏ mobile đi
        <div class="header-mobile-navigation d-block d-lg-none">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6 col-md-6">
                        <div class="header-logo">
                            <a href="index.html">
                                <img src="{{asset('client/img/logo.png')}}" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="mobile-navigation text-right">
                            <ul class="header-icon__list header-icon__list">
                                <li>
                                    <a href="wishlist.html"><i class="fa fa-heart-o"></i><span class="item-count">1</span></a>
                                </li>
                                <li>
                                    <a href="cart.html"><i class="fa fa-shopping-basket"></i><span class="item-count">3</span></a>
                                </li>
                                <li><a href="javascript:void(0)" class="mobile-menu-icon" id="mobile-menu-trigger"><i class="fa fa-bars"></i></a></li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <!--=======  End of mobile navigation area  =======-->
    </div>

    <!--====================  End of header area  ====================-->
    <!--====================  hero slider area ====================-->
 {{-- Để vào 1 section --}}
    {{-- <div class="hero-slider-area section-space">
        <!-- START REVOLUTION SLIDER 5.4.7 fullwidth mode -->
        <div id="rev_slider_23_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.7">
            <ul>
                <!-- SLIDE  -->
                <li data-index="rs-53" data-transition="slideoverdown,slidingoverlayvertical,cube-horizontal,3dcurtain-vertical" data-slotamount="default,default,default,default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default,default,default,default" data-easeout="default,default,default,default" data-masterspeed="980,default,default,default" data-thumb="" data-delay="7010" data-rotate="0,0,0,0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="{{asset('client/img/revimages/homepage01-slide1.jpg')}}" alt="" width="1920" height="1080" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->

                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption   tp-resizeme" id="slide-53-layer-5" data-x="['left','center','center','center']" data-hoffset="['1111','203','127','68']" data-y="['top','middle','middle','middle']" data-voffset="['242','-58','-16','-25']" data-fontsize="['80','90','90','60']" data-lineheight="['80','100','100','70']" data-width="none" data-height="['170','none','none','none']" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"delay":770,"speed":1850,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power2.easeInOut"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5; max-width: 170px; max-width: 170px; white-space: nowrap; font-size: 80px; line-height: 80px; font-weight: 300; color: #000000; letter-spacing: -2px;font-family:Source Sans Pro;">Beautiful<br>
        Craftmanship </div>

                        <!-- LAYER NR. 2 -->
                        <a class="tp-caption Robin-Button-New rev-btn " href="shop-left-sidebar.html" target="_self" id="slide-53-layer-7" data-x="['left','center','center','center']" data-hoffset="['1257','209','135','68']" data-y="['top','middle','top','top']" data-voffset="['445','123','612','440']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="button" data-actions='' data-responsive_offset="on" data-responsive="off" data-frames='[{"delay":770,"speed":1500,"frame":"0","from":"x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"nothing"},{"frame":"hover","speed":"300","ease":"Power0.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(255,255,255);bg:rgb(34,34,34);bc:rgb(0,0,0);"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[12,12,12,12]" data-paddingright="[25,25,25,25]" data-paddingbottom="[12,12,12,12]" data-paddingleft="[25,25,25,25]" style="z-index: 6; white-space: nowrap; font-size: 16px; line-height: 21px; font-weight: 700; color: #000000; font-family:Source Sans Pro;background-color:rgba(247,177,19,0);border-color:rgba(0,0,0,1);border-style:solid;border-width:2px 2px 2px 2px;border-radius:5px 5px 5px 5px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;text-decoration: none;">SHOP NOW!
                        </a>
                </li>
                <!-- SLIDE  -->
                <li data-index="rs-54" data-transition="parallaxtoright,parallaxtoleft,parallaxtotop,parallaxtobottom,parallaxhorizontal,slidingoverlaydown,slidingoverlayleft,slidingoverlayright,slidingoverlayhorizontal" data-slotamount="default,default,default,default,default,default,default,default,default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default,default,default,default,default,default,default,default,default" data-easeout="default,default,default,default,default,default,default,default,default" data-masterspeed="1000,default,default,default,default,default,default,default,default" data-thumb="" data-delay="7000" data-rotate="0,0,0,0,0,0,0,0,0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="{{asset('client/img/revimages/homepage01-slide2.jpg')}}" alt="" width="1920" height="1080" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->

                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption   tp-resizeme" id="slide-54-layer-5" data-x="['left','center','center','center']" data-hoffset="['1078','243','156','43']" data-y="['top','top','top','top']" data-voffset="['252','153','104','64']" data-fontsize="['80','80','70','60']" data-lineheight="['80','80','70','60']" data-width="['468','none','none','none']" data-height="['161','none','none','none']" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"delay":450,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Back.easeIn"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5; min-width: 468px; max-width: 468px; max-width: 161px; max-width: 161px; white-space: nowrap; font-size: 80px; line-height: 80px; font-weight: 300; color: #000000; letter-spacing: -2px;font-family:Source Sans Pro;">Furniture<br>
        New Colection </div>

                        <!-- LAYER NR. 4 -->
                        <a class="tp-caption Robin-Button-New rev-btn " href="shop-left-sidebar.html" target="_self" id="slide-54-layer-7" data-x="['left','center','center','center']" data-hoffset="['1248','249','164','46']" data-y="['top','middle','top','top']" data-voffset="['480','4','308','226']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="button" data-actions='' data-responsive_offset="on" data-responsive="off" data-frames='[{"delay":1080,"speed":940,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"400","ease":"Power4.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(255,255,255);bg:rgb(34,34,34);bc:rgb(0,0,0);"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[12,12,12,12]" data-paddingright="[25,25,25,25]" data-paddingbottom="[12,12,12,12]" data-paddingleft="[25,25,25,25]" style="z-index: 6; white-space: nowrap; font-size: 16px; line-height: 21px; font-weight: 700; color: #000000; font-family:Source Sans Pro;background-color:rgba(247,177,19,0);border-color:rgba(0,0,0,1);border-style:solid;border-width:2px 2px 2px 2px;border-radius:5px 5px 5px 5px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;text-decoration: none;">SHOP NOW!
                        </a>
                </li>
                <!-- SLIDE  -->
                <li data-index="rs-55" data-transition="slidingoverlayhorizontal,fadetoleftfadefromright,fadetotopfadefrombottom,fadetorightfadefromleft,fadetobottomfadefromtop,curtain-2,curtain-1,curtain-3" data-slotamount="default,default,default,default,default,default,default,default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default,default,default,default,default,default,default,default" data-easeout="default,default,default,default,default,default,default,default" data-masterspeed="1000,default,default,default,default,default,default,default" data-thumb="" data-delay="6990" data-rotate="0,0,0,0,0,0,0,0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="{{asset('client/img/revimages/homepage01-slide3.jpg')}}" alt="" width="1920" height="1080" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->

                    <!-- LAYER NR. 5 -->
                    <div class="tp-caption   tp-resizeme" id="slide-55-layer-5" data-x="['left','center','center','left']" data-hoffset="['1102','205','119','209']" data-y="['top','top','top','top']" data-voffset="['253','97','144','134']" data-fontsize="['80','90','80','50']" data-lineheight="['80','90','80','60']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"delay":600,"speed":1500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5; white-space: nowrap; font-size: 80px; line-height: 80px; font-weight: 300; color: #000000; letter-spacing: -2px;font-family:Source Sans Pro;">Green up<br> your Lifestyle </div>

                        <!-- LAYER NR. 6 -->
                        <a class="tp-caption Robin-Button-New rev-btn " href="shop-left-sidebar.html" target="_self" id="slide-55-layer-7" data-x="['left','center','center','left']" data-hoffset="['1226','211','125','259']" data-y="['top','middle','top','top']" data-voffset="['462','-20','372','290']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="button" data-actions='' data-responsive_offset="on" data-responsive="off" data-frames='[{"delay":520,"speed":1330,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"nothing"},{"frame":"hover","speed":"300","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(255,255,255);bg:rgb(34,34,34);bc:rgb(0,0,0);"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[12,12,12,12]" data-paddingright="[25,25,25,25]" data-paddingbottom="[12,12,12,12]" data-paddingleft="[25,25,25,25]" style="z-index: 6; white-space: nowrap; font-size: 16px; line-height: 21px; font-weight: 700; color: #000000; font-family:Source Sans Pro;background-color:rgba(247,177,19,0);border-color:rgba(0,0,0,1);border-style:solid;border-width:2px 2px 2px 2px;border-radius:5px 5px 5px 5px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;text-decoration: none;">SHOP NOW!
                        </a>
                </li>
            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
    </div> --}}


    <!--====================  End of hero slider area  ====================-->
    <!--====================  category grid  ====================-->
 {{-- Để vào 1 section --}}
    {{-- <div class="category-area section-space--small">
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
    </div> --}}

    <!--====================  End of category grid   ====================-->
    <!--====================  banner grid area ====================-->

    <div class="banner-area section-space">
        <div class="container">

            @if(session('success'))
                <div class="alert alert-success">
                {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <!--====================  End of banner grid area  ====================-->
    <!--====================  featured brand ====================-->
    {{-- Để nó vào 1 section --}}
    {{-- <div class="featured-brand section-space">
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
    </div> --}}

    <!--====================  End of featured brand  ====================-->
    <!--====================  call to action area ====================-->
    {{-- Để vào 1 section --}}
    {{-- <div class="cta-area cta-bg cta-bg--one">
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
    </div> --}}

    <!--====================  End of call to action area  ====================-->

    <!--====================  footer ====================-->
    <div class="footer-area">
        <div class="footer-navigation-area">
            <div class="container wide">
                <div class="row">
                    <div class="col-xl-4 col-custom-xl-6 col-lg-6">
                        <div class="row">
                            <div class="col-6 col-sm-4">
                                <div class="footer-widget">
                                    <h4 class="footer-widget__title">ABOUT US</h4>
                                    <nav class="footer-widget__navigation">
                                        <ul>
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">Newsletter Sign Up</a></li>
                                            <li><a href="#">History</a></li>
                                            <li><a href="#">Brands</a></li>
                                            <li><a href="#">Press Office</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                            <li><a href="#">Terms & Conditions</a></li>
                                            <li><a href="#">Privacy Policy</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4">
                                <div class="footer-widget">
                                    <h4 class="footer-widget__title">SERVICES</h4>
                                    <nav class="footer-widget__navigation">
                                        <ul>
                                            <li><a href="#">Price promise</a></li>
                                            <li><a href="#">How to order</a></li>
                                            <li><a href="#">Returns</a></li>
                                            <li><a href="#">UK delivery</a></li>
                                            <li><a href="#">International delivery</a></li>
                                            <li><a href="#">Want it? Can’t find it?</a></li>
                                            <li><a href="#">Customer feedback</a></li>
                                            <li><a href="#">Measuring Advice</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4">
                                <div class="footer-widget">
                                    <h4 class="footer-widget__title">USEFUL LINKS</h4>
                                    <nav class="footer-widget__navigation">
                                        <ul>
                                            <li><a href="#">Privacy Policy</a></li>
                                            <li><a href="#">Returns</a></li>
                                            <li><a href="#">Terms & Conditions</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                            <li><a href="#">Latest News</a></li>
                                            <li><a href="#">Our Sitemap</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-custom-xl-6 col-lg-6">
                        <div class="row">
                            <div class="col-6 col-sm-4">
                                <div class="footer-widget">
                                    <h4 class="footer-widget__title">WORK WITH US</h4>
                                    <nav class="footer-widget__navigation">
                                        <ul>
                                            <li><a href="#">Careers</a></li>
                                            <li><a href="#">Affiliates</a></li>
                                            <li><a href="#">Travel Scholarship</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4">
                                <div class="footer-widget">
                                    <h4 class="footer-widget__title">GIFTS</h4>
                                    <nav class="footer-widget__navigation">
                                        <ul>
                                            <li><a href="#">Gift vouchers</a></li>
                                            <li><a href="#">Return customers</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4">
                                <div class="footer-widget">
                                    <h4 class="footer-widget__title">CATEGORIES</h4>
                                    <nav class="footer-widget__navigation">
                                        <ul>
                                            <li><a href="#">Living Room</a></li>
                                            <li><a href="#">Kitchen</a></li>
                                            <li><a href="#">Bathroom</a></li>
                                            <li><a href="#">Outdoors</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-custom-xl-6 col-lg-6">
                        <div class="footer-widget footer-widget--two">
                            <h4 class="footer-widget__title">10% OFF YOUR FIRST ORDER</h4>
                            <p class="footer-widget__text">Join our community and be the first to know about offers, new collections and interior trends.</p>

                            <div class="newsletter-form-area">
                                <form id="mc-form" class="mc-form">
                                    <div class="footer-widget__newsletter-form">
                                        <input type="email" placeholder="Your Email" required>
                                        <button type="submit">SUBSCRIBE US</button>
                                    </div>
                                </form>
                            </div>
                            <!-- mailchimp-alerts Start -->

                            <div class="mailchimp-alerts">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div><!-- mailchimp-alerts end -->

                        </div>

                        <div class="footer-widget footer-widget--two">
                            <span class="footer-widget__text footer-widget__text--two">Follow us</span>
                            <ul class="footer-widget__social-links">
                                <li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" title="LinkedIn"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#" title="LinkedIn"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#" title="Youtube"><i class="fa fa-youtube-play"></i></a></li>
                            </ul>
                        </div>

                        <div class="footer-payment-logo">
                            <img src="{{asset('client/img/icons/payments.png')}}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-copyright-area">
            <div class="container wide">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text text-center">
                            copyright &copy; 2019 <a href="#">Robin</a>. All Rights Reserved
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====================  End of footer  ====================-->
    <!--====================  offcanvas items ====================-->

    <!--=======  offcanvas mobile menu  =======-->
 {{-- Để vào 1 section --}}
    {{-- <div class="offcanvas-mobile-menu" id="offcanvas-mobile-menu">
        <a href="javascript:void(0)" class="offcanvas-menu-close" id="offcanvas-menu-close-trigger">
            <i class="pe-7s-close"></i>
        </a>

        <div class="offcanvas-wrapper">

            <div class="offcanvas-inner-content">
                <div class="offcanvas-mobile-search-area">
                    <form action="#">
                        <input type="search" placeholder="Search ...">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <nav class="offcanvas-naviagtion">
                    <ul>
                        <li class="menu-item-has-children"><a href="#">Home</a>
                            <ul class="sub-menu">
                                <li><a href="index.html">Home 01</a></li>
                                <li><a href="index-2.html">Home 02</a></li>
                                <li><a href="index-3.html">Home 03</a></li>
                                <li><a href="index-4.html">Home 04</a></li>
                                <li><a href="index-5.html">Home 05</a></li>
                                <li><a href="index-6.html">Home 06</a></li>
                                <li><a href="index-7.html">Home 07</a></li>
                                <li><a href="index-8.html">Home 08</a></li>
                                <li><a href="index-9.html">Home 09</a></li>
                                <li><a href="instagram-shop.html">Instagram Shop</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#">Page</a>
                            <ul class="sub-menu">
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                                <li><a href="faq.html">F.A.Q</a></li>
                                <li><a href="service.html">Our Service</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#">Elements</a>
                            <ul class="sub-menu">
                                <li class="menu-item-has-children"><a href="#">Shop/Products</a>
                                    <ul class="sub-menu">
                                        <li><a href="element-product-category.html">Product Categories</a></li>
                                        <li><a href="element-product-carousel.html">Products Carousel</a></li>
                                        <li><a href="element-product-widget.html">Product Widget</a></li>
                                        <li><a href="element-recent-product.html">Recent Products</a></li>
                                        <li><a href="element-sale-product.html">Sale Products</a></li>
                                        <li><a href="element-featured-product.html">Featured Product</a></li>
                                        <li><a href="element-top-rated-product.html">Top Rated Products</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#">Theming</a>
                                    <ul class="sub-menu">
                                        <li><a href="element-blog-post.html">Blog Posts</a></li>
                                        <li><a href="element-mailchimp-form.html">MailChimp Form</a></li>
                                        <li><a href="element-accordion-toggles.html">Accordion/Toggles</a></li>
                                        <li><a href="element-progress-bar.html">Progress Bars</a></li>
                                        <li><a href="element-countdown-timer.html">Countdown Timer</a></li>
                                        <li><a href="element-button.html">Buttons</a></li>
                                        <li><a href="element-testimonial.html">Testimonials</a></li>
                                        <li><a href="element-google-map.html">Google Maps</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#">Blog</a>
                            <ul class="sub-menu">
                                <li class="menu-item-has-children"><a href="#">Blog post list</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-one-column.html">Blog one column</a> </li>
                                        <li><a href="blog-two-column.html">Blog two column</a></li>
                                        <li><a href="blog-left-sidebar.html">Blog left sidebar</a></li>
                                        <li><a href="blog-right-sidebar.html">Blog right sidebar</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#">Blog post details</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-post-format-image.html">Blog post format image</a></li>
                                        <li><a href="blog-post-format-gallery.html">Blog post format gallery</a></li>
                                        <li><a href="blog-post-format-audio.html">Blog post format audio</a></li>
                                        <li><a href="blog-post-format-video.html">Blog post format video</a></li>
                                        <li><a href="blog-post-left-sidebar.html">Blog post left sidebar</a></li>
                                        <li><a href="blog-post-right-sidebar.html">Blog post right sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#">Shop</a>
                            <ul class="sub-menu">
                                <li class="menu-item-has-children"><a href="#">Shop Pages</a>
                                    <ul class="sub-menu">
                                        <li><a href="shop-fullwidth.html">Shop Fullwidth</a></li>
                                        <li><a href="shop-list.html">Shop List Layout</a></li>
                                        <li><a href="shop-no-sidebar.html">Shop No Sidebar</a></li>
                                        <li><a href="shop-left-sidebar.html">Shop With Left Sidebar</a></li>
                                        <li><a href="shop-right-sidebar.html">Shop With Right Sidebar</a></li>
                                        <li><a href="shop-brand.html">Shop By Brand</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#">Shop Pages(Details)</a>
                                    <ul class="sub-menu">
                                        <li><a href="product-details-basic.html">Basic</a></li>
                                        <li><a href="product-details-fullwidth.html">Fullwidth</a></li>
                                        <li><a href="product-details-sticky.html">Sticky Details</a></li>
                                        <li><a href="product-details-bottom-thumbnail.html">Bottom thumbnails</a></li>
                                        <li><a href="product-details-extra-content.html">Extra content</a></li>
                                        <li><a href="product-details-variation-image.html">Variations Images</a></li>
                                        <li><a href="product-details-affiliate.html">Product details affiliate</a></li>
                                        <li><a href="product-details-group.html">Product details group</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>

                <div class="offcanvas-widget-area">
                    <div class="off-canvas-contact-widget">
                        <div class="header-contact-info">
                            <ul class="header-contact-info__list">
                                <li><i class="pe-7s-phone"></i> <a href="tel://12452456012">(1245) 2456 012 </a></li>
                                <li> <a href="mailto:"></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--Off Canvas Widget Social Start-->
                    <div class="off-canvas-widget-social">
                        <a href="#" title="Facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" title="Twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" title="LinkedIn"><i class="fa fa-linkedin"></i></a>
                        <a href="#" title="Youtube"><i class="fa fa-youtube-play"></i></a>
                        <a href="#" title="Vimeo"><i class="fa fa-vimeo-square"></i></a>
                    </div>
                    <!--Off Canvas Widget Social End-->
                </div>
            </div>
        </div>

    </div> --}}

    <!--=======  End of offcanvas mobile menu  =======-->

    <!--====================  End of offcanvas items  ====================-->
    <!--=======  search overlay  =======-->

    <div class="search-overlay" id="search-overlay">

        <!--=======  close icon  =======-->

        <span class="close-icon search-close-icon">
        <a href="javascript:void(0)"  id="search-close-icon">
            <i class="pe-7s-close"></i>
        </a>
    </span>

        <!--=======  End of close icon  =======-->

        <!--=======  search overlay content  =======-->

        <div class="search-overlay-content">
            <div class="input-box">
                <form action="https://demo.hasthemes.com/robin-preview/robin/index.html">
                    <input type="search" placeholder="Search Products...">
                </form>
            </div>
            <div class="search-hint">
                <span># Hit enter to search or ESC to close</span>
            </div>
        </div>

        <!--=======  End of search overlay content  =======-->
    </div>

    <!--=======  End of search overlay  =======-->
    <!-- scroll to top  -->
    <button class="scroll-top">
        <i class="fa fa-angle-up"></i>
    </button>
    <!-- end of scroll to top -->
    <!--=============================================
    =            JS files        =
    =============================================-->

    <!-- Vendor JS -->
    <script src="{{asset('client/js/vendors.js')}}"></script>

    <!-- Active JS -->
    <script src="{{asset('client/js/active.js')}}"></script>

    <!--=====  End of JS files ======-->


    <!-- Revolution Slider JS -->
    <script src="{{asset('client/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{asset('client/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('client/revolution/revolution-active.js')}}"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script type="text/javascript" src="{{asset('client/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    @yield('scripts')
</body>

</html>
