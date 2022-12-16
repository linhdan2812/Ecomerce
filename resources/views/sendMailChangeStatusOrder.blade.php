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
        <h1>Xin chào {{$user->name}}</h1>
        <div>
            <h1>{{ $message }}</h1>
        </div>
        <h1>Thông tin chi tiết đơn hàng</h1>
        @foreach($products as $product)
            <h3>Tên sản phẩm: {{ $product['name'] }}</h3>
            <h3>Số lượng: {{ $product['quantity'] }}</h3>
            <h3>Giá: {{ $product['price'] }}</h3>
            <h3>Giảm giá: {{ $product['discount'] ?? 'Không'}}</h3><br>
        @endforeach
        Xin cảm ơn
@endcomponent
</body>
</html>
