@extends('home.layouts.homeview')
@section('title', "Check Info")

@section('content')
<div class="container">
    <div style="margin-top:20px" class="title-detail">
        <a href="{{ route('user.home') }}">Trang chủ / </a><a href="">Trang cá nhân / </a><a href="" style="color:red">Thông tin cá nhân</a>
    </div>
    <div class="row" style="margin-top:15px">
        <div class="col-md-3">
            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action active" style="font-size:18px">
                    <span class="glyphicon glyphicon-user"></span>
                    </span> {{ Session::get('userSession') }}
                </button>
                {{-- <button type="button" class="list-group-item list-group-item-action"><a href="{{ route('user.checkInfo',['id' => $idUser]) }}" style="text-decoration:none">Thông tin cá nhân</a></button> --}}
                <button type="button" class="list-group-item list-group-item-action"><a href="{{ route('user.checkInfo') }}" style="text-decoration:none">Thông tin cá nhân</a></button>
                <button type="button" class="list-group-item list-group-item-action"><a href="{{ route('user.checkBill',['id' => $idUser ]) }}" style="text-decoration:none">Danh sách đơn hàng</a></button>
                <button type="button" class="list-group-item list-group-item-action"><a href="{{ route('user.updateInfo',['id' => $idUser]) }}" style="text-decoration:none">Cập nhật thông tin</a></button>
              </div>
        </div>
        <div class="col-md-9" style="border:1px #ccc solid">
                <div class="col-md-6">
                    <div style="margin:20px 20px">
                        <p><img src="{{ URL::to('/') }}/Uploads/avatar/{{ $infoAcc['avatar'] }}" alt=""class="img-fluid" style="width:300px;height:300px;border-radius:50%"></p>
                    </div>
                </div>
                <div class="col-md-6">

                        @if ($updateInfoSuccess)
                            <div class="alert alert-success">
                                <h6>{{ $updateInfoSuccess }}</h6>
                            </div>
                        @endif
                        <div class="form-group" style="margin-top:20px">
                            <label>Tên đăng nhập : {{ $infoAcc['username'] }}</label>
                        </div>
                        <div class="form-group">
                            <label>Email : {{ $infoAcc['email'] }}</label>
                        </div>
                        <div class="form-group">
                            <label>Họ và tên : {{ $infoAcc['fullname'] }}</label>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại : {{ $infoAcc['phone'] }}</label>
                        </div>
                        <div class="form-group">
                            <label>Giới tính :{{ $infoAcc['gender'] == 0 ? "Nữ" : "Nam" }}</label>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ : {{ $infoAcc['address'] }}</label>
                        </div>
                        <div class="form-group" style="margin-bottom:20px">
                            <label>Ngày sinh : {{ $infoAcc['age'] }}</label>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
