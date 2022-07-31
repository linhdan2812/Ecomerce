@extends('layouts.admin-layout')
@section('content')
    <h2>ADD CATEGORY</h2>
    <div class="content-main">
        <div class="content-mid">
            <div class="col-md-12 mid-content-top">
                <div class="middle-content">
                    <div class="col-md-12">
                        @if(Session::has('msg'))
                            <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
                        @endif
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="">Title</label>
                                <input class="form-control" type="text" name="title">
                            </div>
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div>
                                <label for="">Slug</label>
                                <input class="form-control" type="text" name="slug">
                            </div>
                            @error('slug')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div>
                                <label for="">Summary</label>
                                <input class="form-control" type="text" name="summary">
                            </div>
                            @error('summary')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div class="mt-3">
                                <button class="btn btn-success" type="submit">Add New</button>
                            </div>
                        </form>
                    </div>
                </div>
                <link href="{{asset('dashboard/css/owl.carousel.css')}}" rel="stylesheet">
                <script src="{{asset('dashboard/js/owl.carousel.js')}}"></script>
                <script>
                    $(document).ready(function () {
                        $("#owl-demo").owlCarousel({
                            items: 3,
                            lazyLoad: true,
                            autoPlay: true,
                            pagination: true,
                            nav: true,
                        });
                    });
                </script>
            </div>
            <div class="clearfix"></div>
        </div>

    </div>
@endsection