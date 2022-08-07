@extends('index')
   
@section('content')
    
<div class="row">
    <div class="col-lg-12">
        <!--=======  banner grid wrapper  =======-->

        <div class="banner-grid-wrapper">
            <div class="row">
                <div class="col-md-4">
                    <!--=======  single banner  =======-->
                    @foreach ($products as $item)
                        <div class="single-banner">
                            <div class="single-banner__image">
                                <a href="shop-left-sidebar.html">
                                    <img src="{{$item->photo}}" class="img-fluid" alt="">
                                </a>
                            </div>

                            <div class="single-banner__content single-banner__content--overlay">
                                <p class="banner-small-text">{{$item->title}}</p>
                                <p class="banner-big-text">{{$item->description}}</p>
                                <p class="banner-small-text banner-small-text--end">{{$item->price}}</p>
                                <a href="{{ route('add.to.cart', $item->id) }}" class="theme-button theme-button--alt theme-button--banner">SHOP NOW</a>
                            </div>
                        </div>
                    @endforeach

                    <!--=======  End of single banner  =======-->
                </div>
            </div>
        </div>

        <!--=======  End of banner grid wrapper  =======-->
    </div>
</div>
@endsection
