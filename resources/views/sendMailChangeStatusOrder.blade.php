<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thời trang Bamboo StreetWear</title>
</head>
<body>
@component('mail::message')
    <div>
        <h1>Xin chào {{$user->name}}</h1>
        <div>
            <h1>{{ $message }}</h1>
        </div>
        <div>
            <h1>Thông tin chi tiết đơn hàng</h1>
            @foreach($products as $product)
                <label for="">
                    <p>Tên sản phẩm: {{ $product['name'] }}</p>
                </label>
{{--                <label for="">--}}
{{--                    <img src="{{asset('storage/'. $product['image'])}}" alt="">--}}
{{--                </label>--}}
                <label for="">
                    <p>Số lượng: {{ $product['quantity'] }}</p>
                </label>
                <label for="">
                    <p>Giá: {{ $product['price'] }}</p>
                </label>
                <label for="">
                    <p>Giảm giá: {{ $product['discount'] ? $product['discount'] : 'Không'}}</p>
                </label>
                <br><br>
            @endforeach
        </div>
        <div>
            <h1>Xin cảm ơn</h1>
        </div>
    </div>
@endcomponent
</body>
</html>
