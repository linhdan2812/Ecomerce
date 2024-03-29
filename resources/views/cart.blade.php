@extends('index')

@section('content')
    <div class="page-content-wrapper">
        <!--=======  shopping cart wrapper  =======-->

        <div class="shopping-cart-area">
            <form action="{{route('getcheckout')}}" method="get" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!--=======  cart table  =======-->

                            <div class="cart-table-container">
                                <table class="cart-table">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Tên sản phẩm</th>
                                            <th class="product-name">Ảnh sản phẩm</th>
                                            <th class="product-price">Giá</th>
                                            <th style="width:15%" class="product-quantity">Số lượng</th>
                                            <th style="" class="product-quantity">Màu sắc</th>
                                            <th style="" class="product-quantity">Size</th>
                                            <th class="product-subtotal">Tổng giá</th>
                                            <th class="product-remove">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total = 0 @endphp
                                        @if (session('cart'))
                                        @foreach (session('cart') as $id => $details)
                                        @php $a = DB::table('products')->find($details['id'] ?? $id) @endphp
                                        @php $total += $details['price'] * $details['quantity'] @endphp
                                        <tr data-id="{{ $id }}">
                                            <input type="hidden" name="id" value="{{ $id }}">
                                            <td data-th="Product" class="product-name">
                                                <a href="{{ route('detailProduct',['id'=> $id]) }}">{{ $details['name'] }}</a>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <img src="{{asset('storage/'. $details['image'])}}"
                                                            width="100" height="100" class="img-responsive" />
                                                </div>
                                            </td>
                                            @if($details['discount'])
                                            <td data-th="Price" class="product-price"><span class="price">{{ number_format($details['discount']) }} VNĐ</span></td>
                                            @else
                                            <td data-th="Price" class="product-price"><span class="price">{{ number_format($details['price']) }} VNĐ</span></td>
                                            @endif
                                            <td data-th="Quantity">
                                                <input type="number"value="{{ $details['quantity'] }}" name="quantity" min="1"
                                                    class="form-control quantity update-cart" oninput="this.value = Math.round(this.value);"/>
                                            </td>
                                            <input type="hidden" name="stock" value="{{ $a->stock }} ?? 0">
                                            
                                            @if(!$details['color'])
                                                <td data-th="Subtotal" class="total-price"><span class="color">
                                                    <select name="color[]" class="form-control">
                                                        @foreach ( json_decode($a->color) as $index => $item )
                                                            <option value="{{$item}}">{{$item}}</option>
                                                        @endforeach
                                                    </select>
                                                </span></td>
                                            @else
                                                <td data-th="Subtotal" class="total-price"><span class="color"> {{$details['color'] }}</span></td>
                                            @endif
                                            @if(!$details['size'])
                                                <td data-th="Subtotal" class="total-price"><span class="size">
                                                    <select name="size[]" class="form-control">
                                                        @foreach ( json_decode($a->size) as $index => $item )
                                                            <option value="{{$item}}">{{$item}}</option>
                                                        @endforeach
                                                    </select>
                                                </span></td>
                                            @else
                                                <td data-th="Subtotal" class="total-price"><span class="size"> {{$details['size'] }}</span></td>
                                            @endif
                                            @if($details['discount'])
                                            <td data-th="Subtotal" class="total-price"><span class="price"> {{ number_format($details['discount'] * $details['quantity']) }} VNĐ</span></td>
                                            @else
                                            <td data-th="Subtotal" class="total-price"><span class="price"> {{ number_format($details['price'] * $details['quantity']) }} VNĐ</span></td>
                                            @endif
                                            <td class="product-remove" data-th="">
                                                <a href="{{route('removeProduct', ['id' => $id])}}">
                                                    <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <input type="hidden" name="id[]" value="{{ $id }}">
                                        <input type="hidden" name="stock[]" value="{{ $a->stock }}">
                                        <input type="hidden" name="color[]" value="{{ $details['color'] }}">
                                        <input type="hidden" name="size[]" value="{{ $details['size'] }}">
                                        <input type="hidden" name="quantity[]" value="{{ $details['quantity'] }}">
                                        <input type="hidden" name="sub[]" value=" {{ $details['price'] * $details['quantity'] }} VNĐ">
                                        <input type="hidden" name="name[]" value="{{ $details['name'] }}">
                                        <input type="hidden" id="total" name="total" value="{{ $total }}">
                                        <input type="hidden" id="newTotal" name="newTotal" value="">
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            <!--=======  End of cart table  =======-->
                        </div>
                        <div class="col-lg-12">
                            <!--=======  coupon area  =======-->

                            <div class="cart-coupon-area">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <!--=======  coupon form  =======-->

                                        <div class="coupon-form">
                                            <div class="row row-5">
                                                <div class="col-md-7 col-sm-7">
                                                    <input type="text" name="coupon" value="" id="coupon" placeholder="Nhập mã giảm giá">
                                                </div>
                                                <div class="col-md-5 col-sm-5">
                                                    <a href="#" id="checkcoupon" class="theme-button theme-button--silver">Áp dụng</a>
                                                </div>
                                            </div>
                                        </div>

                                        <!--=======  End of coupon form  =======-->
                                    </div>
                                </div>
                            </div>

                            <!--=======  End of coupon area  =======-->
                        </div>

                        <div class="col-lg-7">
                            <div class="cart-calculation-area">
                                <h3>Mã giảm giá đang có</h3>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Tên mã giảm giá</th>
                                            <th scope="col">Giảm giá</th>
                                            <th scope="col">Đơn tối thiểu</th>
                                            <th scope="col">Hạn sử dụng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $stt = 1;
                                        @endphp
                                        @foreach($coupons as $coupon)
                                        <tr>
                                            <td scope="row">{{$stt++}}</td>
                                            <td>{{$coupon->code}}</td>
                                            @if($coupon->type == 'percent')
                                            <td>{{$coupon->value}} %</td>
                                            <td>Cả đơn hàng</td>
                                            @elseif($coupon->type == 'fixed')
                                            <td>{{number_format($coupon->value,0,',')}}VND</td>
                                            <td>{{number_format($coupon->minbill,0,',')}}VND</td>
                                            @elseif($coupon->type == 'all')
                                            <td>{{$coupon->value}} %</td>
                                            <td>Cả đơn hàng</td>
                                            @endif
                                            <td>{{$coupon->expired_at}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="cart-calculation-area">
                                <h2 class="cart-calculation-area__title">Tổng hóa đơn</h2>

                                <table class="cart-calculation-table">
                                    <tr>
                                        <th>Giá</th>
                                        <td class="subtotal">{{ number_format($total) }} VNĐ</td>
                                    </tr>
                                    <tr>
                                        <th>Số Lượng</th>
                                        {{-- <td class="subtotal">{{ number_format($total) }} VNĐ</td> --}}
                                    </tr>
                                    <tr>
                                        <th>Giảm giá</th>
                                        <td class="coupon" id="getCoupon"></td>
                                    </tr>
                                    <tr>
                                        <th>Tổng tiền</th>
                                        <td class="total" id="finalTotal">{{ number_format($total) }} VNĐ</td>
                                    </tr>
                                </table>

                                <div class="cart-calculation-button">
                                    <a href="{{ route('shop') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>&nbsp;Quay lại</a>
                                    <button class="btn btn-success" >Thanh toán</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!--=======  End of shopping cart wrapper  =======-->
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(".update-cart").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
        $("#checkcoupon").click(function(e) {
            e.preventDefault();
            var coupon = $('#coupon').val();
            var total = $('#total').val();
            $.ajax({
                url: '{{ route('checkCoupon') }}',
                method: "get",
                data: {
                    coupon : coupon,
                    total : total
                },
                success: function(response) {
                    if (response) {
                        $("#getCoupon").text(new Intl.NumberFormat({ style: 'currency'}).format(response[0]) +' VNĐ');
                        $("#finalTotal").text(new Intl.NumberFormat({ style: 'currency'}).format(response[1]) +' VNĐ');
                        $("#newTotal").val(response[1]);
                    }
                }
            });
        });
    </script>
@endsection
