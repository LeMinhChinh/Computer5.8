@extends('home.layouts.homeview')
@section('title', "Cart Page")

@section('content')
    <div class="container">
        <div style="margin:20px 0px" class="title-detail">
            <a href="{{ route('user.home') }}">Trang chủ / </a><a href="" style="color:red">Giỏ hàng</a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('user.home') }}" class="btn btn-primary" style="margin-bottom:20px">Tiếp tục mua hàng</a>
            </div>
            <div class="col-md-3">
                <button class="btn btn-danger" style="margin:0 0 20px 445px">Xóa giỏ hàng</button>
            </div>
        </div>
        <div>
            <div style="border:1px #ccc solid">
                <div style="border-bottom:1px solid #ccc">
                    <h2 style="color:red;padding-left:20px">Thông tin giỏ hàng</h2>
                </div>
                @foreach ($carts as $item)
                <div style="border-bottom:1px solid #ccc;padding:20px 20px">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ URL::to('/') }}/Uploads/images/{{ $item['attributes']['image'] }}" alt=""class="img-fluid" style="height:230px">
                        </div>
                        <div class="col-md-5">
                            <p class="product-title" style="font-size:18px">{{ $item['name'] }}</p><div>
                            <div class="product-title">
                                <ul>
                                    <li>Bộ vi xử lí : {{ $item['attributes']['cpu'] }}</li>
                                    <li>Ram : {{ $item['attributes']['ram'] }}</li>
                                    <li>Màu sắc : {{ $item['attributes']['color'] }}</li>
                                </ul>
                            </div>
                            <p><a href="" class="fa fa-trash" style="color:red;text-decoration:none;font-size:15px;padding:50px 0 0 20px">  Xóa sản phẩm</a></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <p class="product-title">Price : {{ number_format($item['price'] ,0 ,'.' ,'.').'' }}&#8363;</p>
                            <p><input type="number" value="{{ $item['quantity'] }}"></p>
                            <p class="product-title">Total : {{ number_format($item['price']*$item['quantity'] ,0 ,'.' ,'.').'' }}&#8363;</p>
                            <p><a href="" class="fa fa-trash" style="color:red;text-decoration:none;font-size:15px;padding:60px 0 0 20px">  Cập nhật số lượng</a></p>
                        </div>
                    </div>
                </div>
                @endforeach
                <div>
                    {{-- <p>Tổng tiền đơn hàng : </p> --}}
                    @if(isset($Total))
                        <p class="product-title" style="padding:20px 0 0 800px;font-size:18px">Tổng tiền đơn hàng : {{ number_format($Total ,0 ,'.' ,'.').'' }}&#8363;</p>
                    @else
                        <p class="product-title" style="padding-left:800px">Tổng tiền đơn hàng : {{ '0' }}&#8363;</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
