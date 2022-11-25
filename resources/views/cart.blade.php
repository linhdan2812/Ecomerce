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
                                            <th class="product-subtotal">Tổng giá</th>
                                            <th class="product-remove">&nbsp;</th>
                                        </tr>
                                    </thead>
                                            @php $total = 0 @endphp
                                            @if (session('cart'))
                                                @foreach (session('cart') as $id => $details)
                                                    @php $total += $details['price'] * $details['quantity'] @endphp

                                            <tr  data-id="{{ $id }}">

                                                    <td data-th="Product" class="product-name">
                                                        <a href="">{{ $details['name'] }}</a>
{{--                                                        <span class="product-variation">Color: Black</span>--}}
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            {{-- <a href="product-details-basic.html"> --}}
                                                            <img src="{{asset('storage/'. $details['image'])}}"
                                                                 width="100" height="100" class="img-responsive" />
                                                            {{-- </a> --}}
                                                        </div>
                                                    </td>

                                                    <td data-th="Price" class="product-price"><span class="price">${{ $details['price'] }}</span></td>
                                                    <td data-th="Quantity">
                                                        <input type="number"value="{{ $details['quantity'] }}" min="1"
                                                            class="form-control quantity update-cart" oninput="this.value = Math.round(this.value);"/>
                                                    </td>
                                                    <td data-th="Subtotal" class="total-price"><span class="price"> ${{ $details['price'] * $details['quantity'] }}</span></td>
                                                    <td class="product-remove" data-th="">
                                                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                                                    </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                        <input type="hidden" name="quantity[]" value="{{ $details['quantity'] }}">
                                        <input type="hidden" name="sub[]" value="${{ $details['price'] * $details['quantity'] }}">
                                        <input type="hidden" name="name[]" value="{{ $details['name'] }}">
                                        <input type="hidden" name="total" value="{{ $total }}">
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
                                            <form action="#">
                                                <div class="row row-5">
                                                    <div class="col-md-7 col-sm-7">
                                                        <input type="text" name="coupon" value="" id="coupon" placeholder="Nhập mã giảm giá">
                                                    </div>
                                                    <div class="col-md-5 col-sm-5">
                                                        <button class="theme-button theme-button--silver">Áp dụng</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!--=======  End of coupon form  =======-->
                                    </div>
                                </div>
                            </div>

                            <!--=======  End of coupon area  =======-->
                        </div>

                        <div class="col-lg-6 offset-lg-6">
                            <div class="cart-calculation-area">
                                <h2 class="cart-calculation-area__title">Tổng hóa đơn</h2>

                                <table class="cart-calculation-table">
                                    <tr>
                                        <th>Giá</th>
                                        <td class="subtotal">${{ $total }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tổng tiền</th>
                                        <td class="total">${{ $total }}</td>
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
    </script>
@endsection
