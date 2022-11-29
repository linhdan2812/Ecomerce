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
        Xin chào {{$user->name}}
        <div>
            Chúc mừng bạn vừa thanh toán thành công đơn hàng ABC
        </div>
        <div>
            Thông tin chi tiết đơn hàng
        </div>
        <div>
            Xin cảm ơn
        </div>
    </div>
@endcomponent
</body>
</html>
