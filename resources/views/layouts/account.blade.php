@extends('layouts.client-layout')
@section('content')

<div class="wrap">
    <section class="page-pri book-shop-page">
        <div class="container">
            <div class="block-account">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="account-box wow fadeInLeft">
                            <div class="top-account">
                                <img src="{{ Auth::user()->photo }}" width="50px" alt="{{ Auth::user()->name }}">
                                <div class="info">
                                    <span>Tài khoản</span>
                                    <span class="name">{{ Auth::user()->name }}</span>
                                </div>
                            </div>
                            <ul class="account-list">
                                <li><a href="{{ route('myaccount') }}" title=""><i class="fas fa-user"></i>Thông tin
                                        tài khoản</a></li>
                                <li><a href="{{ route('address') }}" title=""><i
                                            class="fas fa-map-marker-alt"></i>Danh sách địa chỉ</a></li>
                                <li><a href="{{ route('orders') }}" title=""><i class="fas fa-box-full"></i>Đơn hàng của tôi</a></li>
                                {{--<li><a href="" title=""><i class="fas fa-wallet"></i>Ví của tôi</a></li>
                                <li><a href="" title=""><i class="fas fa-dollar-sign"></i>Tài khoản xu</a></li>
                                <li><a href="" title=""><i class="fas fa-gift"></i>Quà tặng</a></li>
                                <li><a href="" title=""><i class="fas fa-sign-out-alt"></i>Đăng xuất</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    @yield('section')
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
@endsection
