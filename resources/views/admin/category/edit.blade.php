@extends('layouts.admin-layout')
@section('content')
<div class="content-main">

    <div class="content-mid">
        <div class="col-md-12 mid-content-top">
            <div class="middle-content">
                <div class="col-md-12">
                    <h2>UPDATE CATEGORY</h2>
                </div>
                <div class="col-md-12">
                    <a href="{{route('admin.category.list')}}" class="btn btn-success">Xem tất cả</a>
                </div>
                <div class="col-md-12">
                    @if(Session::has('msg'))
                            <div class="alert alert-success" role="alert">{{Session::get('msg')}}</div>
                        @endif
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="">Title</label>
                            <input class="form-control" type="text" name="title" value="{{$category->title}}">
                        </div>
                        @error('title')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div>
                            <label for="">SLug</label>
                            <textarea class="form-control"  type="text" name="slug" >{{$category->slug}}</textarea>
                        </div>
                        @error('title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div>
                            <label for="">Summary</label>
                            <textarea class="form-control"  type="text" name="summary" >{{$category->summary}}</textarea>
                        </div>
                        @error('summary')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div>
                            <label for="">Status</label>
                            <select name="status" class="form-select form-control" aria-label="Default select example">
                                    <option selected value="{{$category->status}}">{{$category->status}}</option>
                                    <option value="active">active</option>
                                    <option value="inactive">inactive</option>
                            </select>
                        </div>
                        @error('status')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>
                        <div>
                            <button class="btn btn-success" type="submit" class="btn btn-warning">Sửa</button>
                        </div>
                    </form>
                </div>
            </div>
            <link href="{{asset('dashboard/css/owl.carousel.css')}}" rel="stylesheet">
            <script src="{{asset('dashboard/js/owl.carousel.js')}}"></script>
            <script>
                $(document).ready(function() {
                    $("#owl-demo").owlCarousel({
                        items : 3,
                        lazyLoad : true,
                        autoPlay : true,
                        pagination : true,
                        nav:true,
                    });
                });
            </script>
        </div>
        <div class="clearfix"> </div>
    </div>

</div>
@endsection