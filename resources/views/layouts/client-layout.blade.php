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
    {{ asset('client/account/fonts/fontawesome-pro-5.8.2-web/css/all.min.css') }}" type="text/css" rel="stylesheet">
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
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.0/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.0/slick-theme.css" />
    <style>
        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
            border-radius: 0 !important;
        }

        /* Modal Content */
        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            border: 1px solid #888 !important;
            width: 80%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s;
            border-radius: 0 !important;
            border: 1px solid #EBEBEB !important;
        }

        /* Add Animation */
        @-webkit-keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        @keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        /* The Close Button */
        .close {
            color: white;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-header {
            padding: 2px 16px;
        }

        .modal-body {
            padding: 2px 16px;
        }

        .modal-body h1 {
            font-size: 15;
            color: red
        }

        .modal-footer {
            padding: 2px 16px;
        }
    </style>
</head>

<body>
    @php
    $user_id = Auth()->user()->id ?? null;
    $notificationsRead = \DB::table('notifications')->where('user_id',$user_id)->where('read_at',0)->get();
    $allNotifications = \DB::table('notifications')->where('user_id',$user_id)->get();
    $wishlists = \DB::table('wishlists')->where('user_id',$user_id)->get();
    @endphp
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
                                <a href="{{ route('home') }}">
                                    <img src="{{asset('client/img/logo.png')}}" class="img-fluid" alt="">
                                </a>
                            </div>

                            <div class="header-icon-area">
                                <div class="account-dropdown">
                                    @if(Auth::check())
                                    <a href="#">
                                        @php
                                            echo Auth::user()->name
                                        @endphp
                                    </a>

                                    <ul class="account-dropdown__list">
                                        <li><a href="{{route('myaccount')}}">Tài khoản của tôi</a></li>
                                        <li><a href="{{ route('shop') }}">Cửa hàng</a></li>
                                        <li><a href="{{ route('getcheckout') }}">Thanh toán</a></li>
                                        <li><a href="{{ route('orders') }}">Lịch sửa mua hàng</a></li>
                                        <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                                    </ul>
                                    @else
                                    <a title="Register or Login" href="{{route('login')}}">Đăng nhập</a>
                                    @endif
                                </div>
                                <div class="header-icon">
                                    <ul class="header-icon__list">
                                        <li><a href="javascript:void(0)" id="search-icon"><i class="fa fa-search"></i></a></li>
                                        <li>
                                            @if(!empty($notificationsRead))
                                        <li><a href="javascript:void(0)" id="notifications"><i class="fa fa-bell"></i><span class="item-count">{{$notificationsRead->count() ?? 0}}</span></a></li>
                                        @endif
                                        <li>
                                            @if(!empty($wishlists))
                                            <a href="{{ route('wishlist') }}"><i class="fa fa-heart"></i><span class="item-count">{{$wishlists->count() ?? 0}}</span></a>
                                            @endif
                                        </li>
                                        <li>
                                            <a href="{{ route('cart') }}"><i class="fa fa-shopping-basket"></i><span class="item-count">{{ count((array) session('cart')) }}</span></a>
                                            <div class="minicart-wrapper">
                                                <p class="minicart-wrapper__title">CART</p>

                                                <div class="minicart-wrapper__items ps-scroll">
                                                    @if(session('cart'))
                                                    @foreach(session('cart') as $id => $details)
                                                    <div class="minicart-wrapper__items__single">
                                                        <a href="javascript:void(0)" class="close-icon"><i class="pe-7s-close"></i></a>
                                                        <div class="image">
                                                            <a href="product-details-basic.html">
                                                                <img src="{{asset('storage/'. $details['image'])}}" height="100px" width="80px" class="img-fluid" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="content">
                                                            <p class="product-title"><a href="product-details-basic.html">{{ $details['name'] }}</a></p>
                                                            @if($details['discount'])
                                                            <p class="product-calculation"><span class="count">{{ $details['quantity'] }}</span> x <span class="price">{{ number_format($details['discount']) }} VND</span></p>
                                                            @else
                                                            <p class="product-calculation"><span class="count">{{ $details['quantity'] }}</span> x <span class="price">{{ number_format($details['price']) }} VND</span></p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                </div>
                                                @php $total = 0 @endphp
                                                @foreach((array) session('cart') as $id => $details)
                                                @php $total += $details['price'] * $details['quantity'] @endphp
                                                @endforeach
                                                <p class="minicart-wrapper__subtotal">Tổng: <span>{{ number_format($total) }} VND</span></p>

                                                <div class="minicart-wrapper__buttons">
                                                    <a href="{{ route('cart') }}" class="theme-button theme-button--minicart-button">Xem Giỏ Hàng</a>
                                                </div>
                                            </div>
                                            <!-- <div class="minicart-wrapper">
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
                                                            <img src="{{asset('storage/'. $details['image'])}}" height="100px" width="80px" />
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
                                            </div> -->
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
                            <a href="{{ route('home') }}">
                                <img src="{{asset('client/img/logo-alt.png')}}" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="header-navigation-wrapper">
                            <nav>
                                <ul>
                                    <li class="">
                                        <a href="{{route('home')}}">Trang chủ</a>
                                    </li>
                                    <li class="">
                                        <a href="{{route('shop')}}">Cửa hàng</a>
                                    </li>
                                    <li class="">
                                        <a href="">Tin tức</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--=======  End of navigation area  =======-->
    </div>

    <!--====================  End of header area  ====================-->

    @yield('content')

    <!--====================  footer ====================-->

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/63220ecf54f06e12d894b87b/1gcugjmsq';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
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
    </div>

    <!--====================  End of footer  ====================-->
    <!--====================  offcanvas items ====================-->

    <!--====================  End of offcanvas items  ====================-->
    <!--=======  search overlay  =======-->

    <div class="search-overlay" id="search-overlay">

        <!--=======  close icon  =======-->

        <span class="close-icon search-close-icon">
            <a href="javascript:void(0)" id="search-close-icon">
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
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                @if(!empty($allNotifications))
                @foreach ($allNotifications as $item)
                <h1>{{ $item->type}}</h1>
                <p>{{ $item->data}}</p>
                @endforeach
                @endif
            </div>
            <div class="modal-footer">
            </div>
        </div>

    </div>
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
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $('#notifications').on('click', function() {
            let url = "{{ route('updateNotification') }}";
            $.get(url);
            $('#modalNotification').show();
        })
    </script>
    <script type="text/javascript">
        window.onload = function() {
            $('.slider').slick({
                autoplay: true,
                autoplaySpeed: 1500,
                arrows: true,
                prevArrow: '<button type="button" class="slick-prev"></button>',
                nextArrow: '<button type="button" class="slick-next"></button>',
                centerMode: true,
                slidesToShow: 3,
                slidesToScroll: 1
            });
        };
    </script>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("notifications");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>
