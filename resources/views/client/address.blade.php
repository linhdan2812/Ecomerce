@extends('layouts.account')
@section('section')
<style>
    .display{display:none;}
</style>
    <div class="col-lg-9">
        <div class="main-content">
            <div class="top-content">
                <h4 class="title">danh sách địa chỉ</h4>
                <button class="btn" data-toggle="modal" id="getcity"     data-target="#addAddress"><i class="far fa-plus"></i>thêm địa chỉ
                    mới</button>
            </div>
            @if($address)
                <div class="body-content">
                    <div class="address-list">
                        @foreach ($address as $item)
                            <div class="address-item">
                                <div class="left-address">
                                    <div class="info-item">
                                        <div class="info-label">Họ và tên:</div>
                                        <div class="info-ct name">{{Auth()->user()->name}}
                                            @if($item->status == 1)<span class="label">Mặc định</span>
                                            @else
                                            @endif
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">Số điện thoại:</div>
                                        <div class="info-ct">{{Auth()->user()->phone ?? null}}</div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">Địa chỉ:</div>
                                        <div class="info-ct">{{$item->data}}</div>
                                    </div>
                                </div>
                                <div class="right-address">
                                    @if($item->status != 1) 
                                        <div class="top">
                                            <a href="javascript:;" class="delete" data-toggle="modal" data-target="#exampleModal">Xóa</a>
                                        </div>
                                    @endif
                                    @if($item->status == 0)
                                        <div class="bottom">
                                            <a  class="btn" href="{{route('setDefaut',['id'=>$item->id])}}" class="setDefaut" >Thiết lập mặc định</a>
                                        </div>
                                    @if
                                </div>
                            </div>
                              <!-- Modal -->
                              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Xác nhận Xóa</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <a href="{{ route('deleteAddres',[ 'id' => $item->id ]) }}"  style="width:100px; text-align:center" class="btn btn-primary">Xác nhận</a>
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                  </div>
                                </div>
                              </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
        <div class="modal-content display">
            <div class="header">
                <h4 class="title">thêm địa chỉ mới</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                </button>
            </div>
            <form action="{{route('postAddress')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="body">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Họ và tên" class="form-control">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" placeholder="Số điện thoại" class="form-control">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="form-group select-box">
                        <select name="city" id="city" class="form-control">
                            <option value="">Tỉnh/Thành Phố</option>
                        </select>
                        <i class="fas fa-caret-circle-down"></i>
                    </div>
                    <div class="form-group select-box">
                        <select name="district" id="district" class="form-control">
                            <option value="">Quận/Huyện</option>
                        </select>
                        <i class="fas fa-caret-circle-down"></i>
                    </div>
                    <div class="form-group select-box">
                        <select name="ward" id="ward" class="form-control">
                            <option value="">Phường/Xã</option>
                        </select>
                        <i class="fas fa-caret-circle-down"></i>
                    </div>
                    <div class="form-group">
                        <input type="text" name="detaileadress" placeholder="Toà nhà, tên đường, số nhà..." class="form-control">
                    </div>
                    <div class="form-group button">
                        <button class="btn">đăng ký</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- <div class="modal fade" id="addAddress" tabindex="-1" role="dialog" aria-labelledby="addAddressLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="header">
                    <h4 class="title">thêm địa chỉ mới</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                    </button>
                </div>
                <form action="{{route('postAddress')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="body">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Họ và tên" class="form-control">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" placeholder="Số điện thoại" class="form-control">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="form-group select-box">
                            <select name="city" id="city" class="form-control">
                                <option value="">Tỉnh/Thành Phố</option>
                            </select>
                            <i class="fas fa-caret-circle-down"></i>
                        </div>
                        <div class="form-group select-box">
                            <select name="district" id="district" class="form-control">
                                <option value="">Quận/Huyện</option>
                            </select>
                            <i class="fas fa-caret-circle-down"></i>
                        </div>
                        <div class="form-group select-box">
                            <select name="ward" id="ward" class="form-control">
                                <option value="">Phường/Xã</option>
                            </select>
                            <i class="fas fa-caret-circle-down"></i>
                        </div>
                        <div class="form-group">
                            <input type="text" name="detaileadress" placeholder="Toà nhà, tên đường, số nhà..." class="form-control">
                        </div>
                        <div class="form-group button">
                            <button class="btn">đăng ký</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        let url = "{{route('getCity')}}"
        $.get(url).done(function( data ) {
            let text = "";
            data.forEach(element => {
                text +=`
                        <option value="${element.name}" data-id="${element.id}">${element.name}</option>
                        `; 
            });
            document.getElementById("city").innerHTML =  '<option >Tỉnh/Thành Phố</option>' + text;
        });
    });
    $('#getcity').click(function(){
        $('.display').toggle('display');
    })
    $('#city').change(function(){
        let city = $( "#city option:selected" ).data("id");
        let city2 = $( "#city option:selected" ).text();
        let url = "{{route('getDistrict')}}"
        $.get(url,{id:city , text:city2}).done(function( data ) {
            const entries = Object.entries(data);
            let text = "";
            entries.forEach(element => {
                text +=`
                        <option value="${element[1]}" data-id="${element[0]}">${element[1]}</option>
                        `; 
            });
            document.getElementById("district").innerHTML = '<option >Quận/Huyện</option>' + text;
        });
    });
    $('#district').change(function(){
        let district = $( "#district option:selected" ).data("id");
        let district2 = $( "#district option:selected" ).text();
        let url = "{{route('getWard')}}"
        $.get(url,{id:district, text:district2}).done(function( data ) {
            let text = "";
            const entries = Object.entries(data);
            entries.forEach(element => {
                text +=`
                        <option value="${element[1]}">${element[1]}</option>
                        `; 
            });
            document.getElementById("ward").innerHTML = '<option >Phường/Xã</option>' + text;
        });
    })
</script>
<script>
    $('.delete').click(function(){
        
    })
</script>
@endsection
