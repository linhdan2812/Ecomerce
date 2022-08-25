{{-- @extends('layouts.client-layout')
@section('content') --}}
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
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<div class="wrap">
    <section class="page-pri book-shop-page">
        <div class="container">
            <div class="block-account">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="account-box wow fadeInLeft">
                            <div class="top-account">
                                <img src="{{ Auth::user()->photo }}" alt="{{ Auth::user()->name }}">
                                <div class="info">
                                    <span>Tài khoản</span>
                                    <span class="name">{{ Auth::user()->name }}</span>
                                </div>
                            </div>
                            <ul class="account-list">
                                <li class="active"><a href="" title=""><i class="fas fa-user"></i>Thông tin
                                        tài khoản</a></li>
                                <li><a href="{{ route('address') }}" title=""><i
                                            class="fas fa-map-marker-alt"></i>Danh sách địa chỉ</a></li>
                                {{-- <li><a href="" title=""><i class="fas fa-box-full"></i>Đơn hàng của tôi</a></li>
                                <li><a href="" title=""><i class="fas fa-wallet"></i>Ví của tôi</a></li>
                                <li><a href="" title=""><i class="fas fa-dollar-sign"></i>Tài khoản xu</a></li>
                                <li><a href="" title=""><i class="fas fa-gift"></i>Quà tặng</a></li>
                                <li><a href="" title=""><i class="fas fa-sign-out-alt"></i>Đăng xuất</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
    <div id="fb-root"></div>
    <script type="text/javascript">
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
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
{{-- @endsection --}}
