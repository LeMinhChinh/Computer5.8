@extends('home.layouts.homeview')
@section('title', "Check Bill")

@section('content')
    <div class="container" style="width:1300px">
        <div style="margin-top:20px" class="title-detail">
            <a href="{{ route('user.home') }}">Trang chủ / </a><a href="">Trang cá nhân / </a><a href=""  style="color:red">Thông tin đơn hàng</a>
            @if ($approvalError)
                <div class="alert alert-danger">
                    <h6>{{ $approvalError }}</h6>
                </div>
            @endif

            @if ($deleteSuccess)
                <div class="alert alert-success">
                    <h6>{{ $deleteSuccess }}</h6>
                </div>
            @endif
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
            <div class="col-md-9">
                <div style="border:1px #ccc solid">
                    <div style="border-bottom:1px solid #ccc">
                        <h2 style="color:red;padding-left:20px">Danh sách đơn hàng</h2>
                    </div>
                    <table class="table table-hover table-cart" id="">
                        <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($info as $info)
                                <tr>
                                    <td>{{ $info['id'] }}</td>
                                    <td>{{ $info['fullname'] }}</td>
                                    <td>{{ $info['phone'] }}</td>
                                    <td>{{ $info['address'] }}</td>
                                    <td>{{ number_format($info['total'] ,0 ,'.' ,'.').'' }}&#8363;</td>
                                    <td>{{ $info['status'] == 0 ? "Đang Đợi Duyệt" : "Đã Duyệt"}}</td>
                                    <td>
                                        <a href="" class="btn btn-primary">Xem chi tiết</a>
                                    </td>
                                    <td >
                                        <a href="{{ route('user.deleteBill',['id' => $info['id']]) }}" class="btn btn-danger" onclick="return confirm('Bạn Có Chắc Chắn Muốn Hủy Đơn Hàng Này Không ??')">Hủy Đơn Hàng</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
