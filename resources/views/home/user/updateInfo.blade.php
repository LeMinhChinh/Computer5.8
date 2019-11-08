@extends('home.layouts.homeview')
@section('title', "Update Info")

@section('content')
<div class="container">
    <div style="margin-top:20px" class="title-detail">
        <a href="{{ route('user.home') }}">Trang chủ / </a><a href="">Trang cá nhân / </a><a href="" style="color:red">Cập nhật thông tin</a>
    </div>
    <div class="row" style="margin-top:15px">
        <div class="col-md-3">
            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action active" style="font-size:18px">
                    <span class="glyphicon glyphicon-user"></span>
                    </span> {{ Session::get('userSession') }}
                </button>
                <button type="button" class="list-group-item list-group-item-action"><a href="{{ route('user.checkInfo',['id' => $idUser]) }}" style="text-decoration:none">Thông tin cá nhân</a></button>
                <button type="button" class="list-group-item list-group-item-action"><a href="{{ route('user.checkBill',['id' => $idUser ]) }}" style="text-decoration:none">Danh sách đơn hàng</a></button>
                <button type="button" class="list-group-item list-group-item-action"><a href="" style="text-decoration:none">Cập nhật thông tin</a></button>
              </div>
        </div>
        <div class="col-md-9" style="border:1px #ccc solid">
                <div class="col-md-6">
                    <div style="margin:20px 20px">
                        <p><img src="{{ URL::to('/') }}/Uploads/avatar/{{ $infoAcc['avatar'] }}" alt=""class="img-fluid" style="width:300px;height:300px;border-radius:50%"></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" style="margin-top:20px">
                        <label for="userAcc">Username (*)</label>
                        <input type="text" class="form-control" id="userAcc" name="userAcc" value="{{ $infoAcc['username'] }}" readonly >
                    </div>
                    <div class="form-group">
                        <label for="emailAcc">Email (*)</label>
                        <input type="text" class="form-control" id="emailAcc" name="emailAcc" value="{{ $infoAcc['email'] }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="fnameAcc">Full name (*)</label>
                        <input type="text" class="form-control" id="fnameAcc" name="fnameAcc" value="{{ $infoAcc['fullname'] }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="phoneAcc">Phone number (*)</label>
                        <input type="text" class="form-control" id="phoneAcc" name="phoneAcc" value="{{ $infoAcc['phone'] }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="genAcc">Gender (*)</label>
                        <input type="text" class="form-control" id="genAcc" name="genAcc" value="{{ $infoAcc['gender'] }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="ageAcc">Age (*)</label>
                        <input type="text" class="form-control" id="ageAcc" name="ageAcc" value="{{ $infoAcc['age'] }}" readonly>
                    </div>
                    <div class="form-group" style="margin-bottom:20px">
                        <label for="addAcc">Address (*)</label>
                        <input type="text" class="form-control" id="addAcc" name="addAcc" value="{{ $infoAcc['address'] }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
