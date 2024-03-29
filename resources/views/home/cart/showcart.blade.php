@extends('home.layouts.homeview')
@section('title', "Cart Page")

@section('content')
    <div class="container">
        <div style="margin:20px 0px" class="title-detail">
            <a href="{{ route('user.home') }}">Trang chủ / </a><a href="" style="color:red">Giỏ hàng</a>
        </div>
        <div>
            <a href="{{ route('user.home') }}" class="btn btn-primary" style="margin-bottom:20px">Tiếp tục mua hàng</a>
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

        @if ($errorLogin)
            <div class="alert alert-danger">
                <h6>{{ $errorLogin }}</h6>
            </div>
        @endif

        @if ($errorTotal)
            <div class="alert alert-danger">
                <h6>{{ $errorTotal }}</h6>
            </div>
        @endif

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
                            <p style="padding:50px 0 0 20px;color:red"><a href="{{ route('user.deleteProduct',['id' => $item['id']]) }}" style="text-decoration:none;font-size:15px" class="btn btn-danger">    Xóa sản phẩm</a></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <p class="product-title">Giá : {{ number_format($item['price'] ,0 ,'.' ,'.').'' }}&#8363;</p>
                            <p><input type="number" value="{{ $item['quantity'] }}" min="1" class="qty"></p>
                            <p class="product-title">Tổng giá : {{ number_format($item['price']*$item['quantity'] ,0 ,'.' ,'.').'' }}&#8363;</p>
                            <button type="submit" class="btn btn-primary updatecart" style="margin-top:60px">Cập nhật số lượng</button>
                            <input type="hidden" name="" value="{{ $item['id'] }}" class="idcart">
                        </div>
                    </div>
                </div>
                @endforeach
                <div style="border-bottom:1px solid #ccc">
                    @if(isset($Total))
                        <p class="product-title" style="padding:20px 0 0 425px;font-size:18px">Tổng tiền đơn hàng : {{ number_format($Total ,0 ,'.' ,'.').'' }}&#8363;</p>
                    @else
                        <p class="product-title" style="padding:20px 0 0 425px;font-size:18px">Tổng tiền đơn hàng : {{ '0' }}&#8363;</p>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('user.deleteCart') }}" class="btn btn-danger" style="margin:10px 40%;height:50px;padding-top:15px">Xóa giỏ hàng</a>
                    </div>
                    <div class="col-md-6" style="border-left:1px solid #ccc">
                        <a href="{{ route('user.orderCart') }}" class="btn btn-primary" style="margin:10px 40%;height:50px;padding-top:15px">Đặt hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $('.updatecart').click(function(){
			var self = $(this);
			let id = self.parent().find('input[class=idcart]').val();
			let quantity = self.prev().prev().find('input[type=number]').val();
			$.ajax({
				url   : "{{ route('user.updateCart') }}",
				type  : "POST",
				data  : {id:id,quantity:quantity},
				beforesend: function(){
					seft.text('Loading..');
				},
				success:function(data){
					if(data ==='err'){
                        alert('Có Lỗi Xảy ra Vui lòng thử lại');
                    }else{
                        window.location = 'show-cart';
                    }
				}
			});
		});
    </script>
@endpush
