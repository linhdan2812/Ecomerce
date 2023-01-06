@extends('layouts.admin-layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @php echo view('admin/charts/firstChart') @endphp
                @php echo view('admin/charts/sencondChart') @endphp
            </div>
            <div class="row">
                @php echo view('admin/charts/listUserAsc') @endphp
                @php echo view('admin/charts/listUserDesc') @endphp
            </div>
        </div>
    </div>
@endsection
