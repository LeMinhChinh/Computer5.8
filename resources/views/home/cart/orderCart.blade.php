@extends('home.layouts.homeview')
@section('title', "Order Cart")

@section('content')
    <div class="container">
        <div style="margin:20px 0px" class="title-detail">
            <a href="{{ route('user.home') }}">Trang chủ / </a><a href="" style="color:red">Đặt hàng</a>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div style="border:1px #ccc solid">
                    <div style="border-bottom:1px solid #ccc">
                        <h2 style="color:red;padding-left:20px">Thông tin đơn hàng</h2>
                    </div>
                        @foreach ($carts as $item)
                        <div style="border-bottom:1px solid #ccc;padding:20px 20px">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ URL::to('/') }}/Uploads/images/{{ $item['attributes']['image'] }}" alt=""class="img-fluid" style="height:230px">
                                </div>
                                <div class="col-md-6">
                                    <p class="product-title" style="font-size:18px">{{ $item['name'] }}</p>
                                    <div>
                                        <div>
                                            <ul>
                                                <li>Bộ vi xử lí : {{ $item['attributes']['cpu'] }}</li>
                                                <li>Ram : {{ $item['attributes']['ram'] }}</li>
                                                <li>Màu sắc : {{ $item['attributes']['color'] }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p class="product-title" style="color:red">Giá : {{ number_format($item['price'] ,0 ,'.' ,'.').'' }}&#8363;</p>
                                    <p>Số lượng : {{ $item['quantity'] }}</p>
                                    <p class="product-title" style="color:red">Tổng giá : {{ number_format($item['price']*$item['quantity'] ,0 ,'.' ,'.').'' }}&#8363;</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div style="border-bottom:1px solid #ccc">
                            <p class="product-title" style="padding:20px 0 0 150px;font-size:18px">Tổng tiền đơn hàng : {{ number_format($Total ,0 ,'.' ,'.').'' }}&#8363;</p>
                        </div>
                </div>
            </div>
            <div class="col-md-5">
                <form action="{{ route('user.createBill') }}" method="POST">
                    @csrf
                    <div style="border:1px solid red">
                        <div style="background-color:#de0b00;height:63px">
                            <p style="color:#fff;font-size:20px;padding:15px 0 0 15px">Thông tinh khách hàng</p>
                        </div>
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
                        <div>
                            <p style="font-size:15px;padding:5px 0 0 5px">Để đặt hàng, quý khách vui lòng <a href="{{ route('admin.login') }}" style="text-decoration:none;color:black"><b>đăng nhập</b></a></p>
                            <div style="margin:0 10px">
                                <div class="form-group">
                                    <label for="nameCt" class="control-label">Họ và tên (*)</label>
                                    <div>
                                        <input type="text" id="nameCt" name="nameCt" placeholder="Họ và tên người nhân hàng" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phoneCt" class="control-label">Số điện thoại (*)</label>
                                    <div>
                                        <input type="text" id="phoneCt" name="phoneCt" placeholder="Số điện thoại người nhận hàng" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="emailCt" class="control-label">Email (*)</label>
                                    <div>
                                        <input type="text" id="emailCt" name="emailCt" placeholder="Email người nhận hàng" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="addCt" class="control-label">Địa chỉ (*)</label>
                                    <div>
                                        <input type="text" id="addCt" name="addCt" placeholder="Địa chỉ giao hàng" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="noteCt" class="control-label">Ghi chú</label>
                                    <div>
                                        <textarea name="noteCt" id="" cols="30" rows="2" class="form-control" placeholder="Ghi chú yêu cầu khi giao hàng"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="payCt" class="control-label">Thanh toán</label>
                                    <div>
                                        <label class="radio-inline">
                                            <input type="radio" id="directRadio" name="payCt" value="1">Thanh toán khi nhận hàng
                                        </label>
                                        <br><br>
                                        <label class="radio-inline">
                                            <input type="radio" id="IndirectRadio" name="payCt" value="0">Thanh toán qua thẻ ngân hàng
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="border-top:1px solid red">
                            <button type="submit" class="btn btn-success" style="margin:10px 0 10px 165px;width:120px;height:45px">Đặt hàng</button>
                            <p style="font-size:18px;padding:5px 0 0 50px">Vui lòng chờ điện thoại xác nhận từ chúng tôi</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
