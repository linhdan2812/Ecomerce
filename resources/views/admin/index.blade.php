@extends('layouts.admin-layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            {{-- thống kê doanh thu --}}
            <div class="row">
                @php echo view('admin/charts/firstChart') @endphp
                @php echo view('admin/charts/sencondChart') @endphp
            </div>
            {{-- thông kê về người dùng mua hàng --}}
            <div class="row">
                @php echo view('admin/charts/listUserAsc') @endphp
                @php echo view('admin/charts/listUserDesc') @endphp
            </div>
            {{-- thống kê về mua nhiều/ít sản phẩm --}}
            <div class="row">
                @php echo view('admin/charts/listProductAsc') @endphp
                @php echo view('admin/charts/listProductDesc') @endphp
            </div>
        </div>
    </div>
@endsection
