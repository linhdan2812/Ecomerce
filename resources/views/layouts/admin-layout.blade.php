<!--
=========================================================
 Light Bootstrap Dashboard - v2.0.1
=========================================================

 Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/light-bootstrap-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.  -->
 <!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('admin/img/favicon.ico')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Light Bootstrap Dashboard - Free Bootstrap 4  Admin Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/css/light-bootstrap-dashboard.css?v=2.0.0')}} " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('admin/css/demo.css')}}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="{{asset('admin/js/core/jquery.3.2.1.min.js')}}" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        const pusher = new Pusher('7f612ad69a21be6f9def', {
            cluster: 'ap1'
        });

        const channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            // alert(JSON.stringify(data));
            alert(JSON.stringify(data.message));
        });
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="{{asset('admin/img/sidebar-5.jpg')}}">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text">
                        Bamboo StreetWear
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.dashboard')}}">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Thống kê</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('admin.product.list') }}">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Sản phẩm</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('admin.category.list') }}">
                            <i class="nc-icon nc-notes"></i>
                            <p>Loại hàng</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('admin.banner.list') }}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Banner</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('admin.blog.list') }}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Blog</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('admin.order.list') }}">
                            <i class="nc-icon nc-atom"></i>
                            <p>Đơn hàng</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('admin.error.order.list') }}">
                            <i class="nc-icon nc-atom"></i>
                            <p>Sản phẩm hoàn về</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('admin.coupon.list') }}">
                            <i class="nc-icon nc-pin-3"></i>
                            <p>Giảm giá</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('admin.comment.list') }}">
                            <i class="nc-icon nc-pin-3"></i>
                            <p>Bình luận</p>
                        </a>
                    </li>
{{--                    <li>--}}
{{--                        <a class="nav-link" href="">--}}
{{--                            <i class="nc-icon nc-bell-55"></i>--}}
{{--                            <p>Cài đặt</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>
            </div>
        </div>
        @if(Auth::user()->role==="admin")
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav ml-auto">
{{--                            @foreach($notifications as $key)--}}
{{--                                <li class="nav-item dropdown mr-2" id="{{ $key->id }}">--}}
                            <li class="nav-item dropdown mr-2 user">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    <i class="fa fa-bell text-black" style="display: flex;line-height: normal !important;top: 7px !important;">
{{--                                            @if($key->unread)--}}
{{--                                                <span class="badge badge-danger pending">{{ $key->unread }}</span>--}}
                                        <span class="badge badge-danger pending">0</span>
{{--                                            @endif--}}
                                    </i>
                                </a>
                            </li>
{{--                            @endforeach--}}
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <span class="no-icon">{{Auth::user()->name}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('logout')}}">
                                    <span class="no-icon">Đăng xuất</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            @yield('content')
        </div>
        @endif
    </div>
</body>
<!--   Core JS Files   -->
<script src='https://cdn.jsdelivr.net/lodash/4.17.2/lodash.min.js'></script>
<script src="{{asset('admin/js/core/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
<script src="{{asset('admin/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{asset('admin/js/plugins/bootstrap-switch.js')}}"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="{{asset('admin/js/plugins/chartist.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('admin/js/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="{{asset('admin/js/light-bootstrap-dashboard.js?v=2.0.0')}} " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('admin/js/demo.js')}}"></script>
<script src="{{asset('admin/js/coupon.js')}}"></script>
<script src="{{asset('admin/js/editCoupon.js')}}"></script>
</html>
