<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bamboo StreetWear - Nơi hội tụ của dân chơi</title>
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
    <link href="
    {{ asset('client/account/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
    <!-- <link href="fonts/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet"> -->
    <link href="
    {{ asset('client/account/fonts/fontawesome-pro-5.8.2-web/css/all.min.css') }}" type="text/css"
        rel="stylesheet">
    <link href="
    {{ asset('client/account/fonts/elegantIcon/elegantIcon.css') }}" type="text/css" rel="stylesheet">
    <link href="
    {{ asset('client/account/css/slick.css') }}" type="text/css" rel="stylesheet">
    <link href="
    {{ asset('client/account/css/owl.carousel.min.css') }}" type="text/css" rel="stylesheet">
    <link href="
    {{ asset('client/account/css/datepicker.min.css') }}" type="text/css" rel="stylesheet">
    <link href="
    {{ asset('client/account/css/daterangepicker.css') }}" type="text/css" rel="stylesheet">
    <link href="
    {{ asset('client/account/css/animate.css') }}" type="text/css" rel="stylesheet">
    <link href="
    {{ asset('client/account/css/main.css') }}" type="text/css" rel="stylesheet">

</head>

<body>
    <!--=======  header offer sticker  =======-->

    <div class="header-offer-sticker text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Sản phẩm mới & Giảm giá lên tới 70%. <a href="">Mua ngay</a></p>
                </div>
            </div>
        </div>
    </div>

    <!--=======  End of header offer sticker  =======-->

    <!--====================  header area ====================-->

    <div class="header-area header-area--one header-sticky">

        <!--=======  header info area  =======-->
        <div class="header-info-area d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-info-wrapper">

                            <div class="header-contact-info">
                                <ul class="header-contact-info__list">
                                    <li><i class="pe-7s-phone"></i> <a href="tel://12452456012">(1245) 2456 012 </a></li>
                                    <li><i class="pe-7s-mail-open"></i> <a href="mailto:info@yourdomain.com">info@yourdomain.com</a></li>
                                </ul>
                            </div>

                            <div class="header-logo text-center">
                                <a href="index.html">
                                    <img src="{{asset('client/img/logo.png')}}" class="img-fluid" alt="">
                                </a>
                            </div>

                            <div class="header-icon-area">
                                <div class="account-dropdown">
                                    @if(Auth::check())
                                    <a href="#">My account<i class="pe-7s-angle-down"></i></a>

                                    <ul class="account-dropdown__list">
                                        <li><a href="{{route('myaccount')}}">Tài khoản của tôi</a></li>
                                        <li><a href="cart.html">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="order-tracking.html">Order Tracking</a></li>
                                        <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                                    </ul>
                                    @else
                                    <a title="Register or Login" href="{{route('login')}}">Login</a>
                                    @endif
                                </div>
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
                                                            <a href="javascript:void(0)" class="wishlist-cart-icon"><i class="fa fa-shopping-basket"></i> ADD TO CART</a>
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
                                                                        <img src="{{ $details['image'] }}" height="100px" width="80px" />
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
                                                    <a href="{{ route('getcheckout') }}" class="theme-button theme-button--alt theme-button--minicart-button theme-button--minicart-button--alt mb-0">CHECKOUT</a>
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

        <div class="header-navigation-area header-navigation-area--dark d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2">
                        <div class="header-logo header-logo--sticky">
                            <a href="index.html">
                                <img src="{{asset('client/img/logo-alt.png')}}" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="header-navigation-wrapper">
                            <nav>
                                <ul>
                                    <li class="">
                                        <a href="{{route('client.home')}}">Trang chủ</a>
                                    </li>
                                    <li class="">
                                        <a href="{{route('shop')}}">Cửa hàng</a>
                                    </li>
                                    <li class="">
                                        <a href="">Tin tức</a>
                                    </li>
                                    <!-- <li class="has-children">
                                        <a href="javascript:void(0)">PAGE</a>
                                        <ul class="submenu submenu--column-1">
                                            <li><a href="about-us.html">About Us</a></li>
                                            <li><a href="contact-us.html">Contact Us</a></li>
                                            <li><a href="faq.html">F.A.Q</a></li>
                                            <li><a href="service.html">Our Service</a></li>
                                        </ul>
                                    </li> -->
                                    <!-- <li class="has-children">
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
                                    </li> -->
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
                                                        <a href="javascript:void(0)" class="wishlist-cart-icon"><i class="fa fa-shopping-basket"></i> ADD TO CART</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="minicart-wrapper__buttons mb-0">
                                                <a href="wishlist.html" class="theme-button theme-button--minicart-button mb-0">VIEW WISHLIST</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--=======  End of navigation area  =======-->

        <!--=======  mobile navigation area  =======-->

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
        </div>

        <!--=======  End of mobile navigation area  =======-->
    </div>

    <!--====================  End of header area  ====================-->
    
    @yield('content')

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

    <div class="offcanvas-mobile-menu" id="offcanvas-mobile-menu">
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
                                <li><i class="pe-7s-mail-open"></i> <a href="mailto:info@yourdomain.com">info@yourdomain.com</a></li>
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

    </div>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="
        {{ asset('client/account/js/jquery.js') }}" type="text/javascript"></script>
    <script src="
        {{ asset('client/account/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="
        {{ asset('client/account/js/slick.min.js') }}" type="text/javascript"></script>
    <script src="
        {{ asset('client/account/js/owl.carousel.min.js') }}" type="text/javascript"></script>
    <script src="
        {{ asset('client/account/js/wow.min.js') }}" type="text/javascript"></script>
    <script src="
        {{ asset('client/account/js/wow.min.js') }}" type="text/javascript"></script>
    <script src="
        {{ asset('client/account/js/scrollspy.js') }}" type="text/javascript"></script>
    <script src="
        {{ asset('client/account/js/jquery.sticky-kit.js') }}" type="text/javascript"></script>
    <script src="
        {{ asset('client/account/js/script.js') }}" type="text/javascript"></script>
    <script src="
        {{ asset('client/account/js/moment.min.js') }}" type="text/javascript"></script>
    <script src="
        {{ asset('client/account/js/datepicker.min.js') }}" type="text/javascript"></script>
    <script src="
        {{ asset('client/account/js/daterangepicker.js') }}" type="text/javascript"></script>

</body>

</html>