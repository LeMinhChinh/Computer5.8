@extends('home.layouts.homeview')
@section('title', "Infomation Personal")

@section('content')
    <div class="container">
        <div style="margin-top:20px" class="title-detail">
            <a href="{{ route('user.home') }}">Trang chủ / </a><a href="" style="color:red">Trang cá nhân</a>
        </div>
        <div class="row" style="margin-top:15px">
            <div class="col-md-3">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action active" style="font-size:18px">
                        <span class="glyphicon glyphicon-user"></span>
                        </span> {{ Session::get('userSession') }}
                    </button>
                    <button type="button" class="list-group-item list-group-item-action"><a href="{{ route('user.checkInfo') }}" style="text-decoration:none">Thông tin cá nhân</a></button>
                    <button type="button" class="list-group-item list-group-item-action"><a href="{{ route('user.checkBill',['id' => $idUser ]) }}" style="text-decoration:none">Danh sách đơn hàng</a></button>
                    <button type="button" class="list-group-item list-group-item-action"><a href="{{ route('user.updateInfo',['id' => $idUser]) }}" style="text-decoration:none">Cập nhật thông tin</a></button>
                  </div>
            </div>
            <div class="col-md-9">
                <h1 style="color:red;text-align:center">Chào mừng </span> {{ Session::get('userSession') }} đã đến với cửa hàng của chúng tôi</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if ($successOrder)
                    <div class="alert alert-success">
                        <h6>{{ $successOrder }}</h6>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
