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
                {{-- <button type="button" class="list-group-item list-group-item-action"><a href="{{ route('user.checkInfo',['id' => $idUser]) }}" style="text-decoration:none">Thông tin cá nhân</a></button> --}}
                <button type="button" class="list-group-item list-group-item-action"><a href="{{ route('user.checkInfo') }}" style="text-decoration:none">Thông tin cá nhân</a></button>
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
                <form action="{{ route('user.handleUpdateInfo',['id' => $infoAcc['id']]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if ($messages)
                        <div class="alert alert-danger">
                            <h6>{{ $messages }}</h6>
                        </div>
                    @endif

                    @if ($errorAvatar)
                        <div class="alert alert-danger">
                            <h6>{{ $errorAvatar }}</h6>
                        </div>
                    @endif

                    @if ($updateInfoError)
                        <div class="alert alert-danger">
                            <h6>{{ $updateInfoError }}</h6>
                        </div>
                    @endif

                    <div class="col-md-6">
                        <div class="form-group" style="margin-top:20px">
                            <label for="userAcc">Username (*)</label>
                            <input type="text" class="form-control" id="userAcc" name="userAcc" value="{{ $infoAcc['username'] }}">
                        </div>
                        <div class="form-group">
                            <label for="emailAcc">Email (*)</label>
                            <input type="text" class="form-control" id="emailAcc" name="emailAcc" value="{{ $infoAcc['email'] }}">
                        </div>
                        <div class="form-group">
                            <label for="fnameAcc">Full name (*)</label>
                            <input type="text" class="form-control" id="fnameAcc" name="fnameAcc" value="{{ $infoAcc['fullname'] }}">
                        </div>
                        <div class="form-group">
                            <label for="phoneAcc">Phone number (*)</label>
                            <input type="text" class="form-control" id="phoneAcc" name="phoneAcc" value="{{ $infoAcc['phone'] }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Gender (*)</label>
                            <div class="row" style="margin-top:5px">
                                <div class="col-sm-4">
                                    <label class="radio-inline">
                                        <input type="radio" id="maleRadio" name="gender" value="1" {{ $infoAcc['gender'] == 1 ? 'checked=checked' : '' }}>Nam
                                    </label>
                                </div>
                                <div class="col-sm-4">
                                    <label class="radio-inline">
                                        <input type="radio" id="femaleRadio" name="gender" value="0" {{ $infoAcc['gender'] == 0 ? 'checked=checked' : '' }}>Nữ
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ageAcc">Age (*)</label>
                            <input type="date" class="form-control" id="ageAcc" name="ageAcc" value="{{ $infoAcc['age'] }}">
                        </div>
                        <div class="form-group">
                            <label for="addAcc">Address (*)</label>
                            <input type="text" class="form-control" id="addAcc" name="addAcc" value="{{ $infoAcc['address'] }}">
                        </div>
                        <div class="form-group" style="margin-bottom:20px">
                            <label for="avtAcc">Avatar (*)</label>
                            <input type="file" class="form-control" id="avtAcc" name="avtAcc">
                        </div>
                        <button type="submit" class="btn btn-primary" id="btnConfirm" name="btnConfirm" style="margin-left:40%;margin-bottom:20px">Confirm</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
