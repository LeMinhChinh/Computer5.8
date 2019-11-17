@extends('home.layouts.homeview')
@section('title','detailProduct')
@section('content')
    <div class="container">
        <div style="margin-top:20px" class="title-detail">
            <a href="{{ route('user.home') }}">Trang chủ / </a><a href="{{ route('user.listproduct',['idtype' => $detailPr['id_typepr']]) }}">{{ $detailPr['type'] }} / </a><a href="" style="color:red">{{ $detailPr['name_type'] }}</a>
        </div>
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						<div class="preview-pic tab-content">
                        @if ($detailPr['id_typepr'] == 1)
                            <div class="tab-pane active" id="pic-1"><img src="{{ URL::to('/') }}/Uploads/images/{{ $detailPr['image'] }}" /></div>
                        @elseif($detailPr['id_typepr'] == 2)
                            <div class="tab-pane active" id="pic-1"><img src="{{ URL::to('/') }}/Uploads/images/{{ $detailPr['image'] }}" /></div>
                        @endif
                        <a href="{{ route('user.addCart',['id' => $detailPr['id'],'quant' => $detailPr['quantity']]) }}" class="btn btn-primary" style="margin-left:30%;margin-top:50px;line-height:50px">ADD MY CART</a>
						</div>
					</div>
					<div class="details col-md-6" style="font-size:17px">
						<h3 class="product-title">{{ $detailPr['name'] }}</h3>
						<div class="rating">
                            <p class="review-no">Kho hàng : <span style="color:#ffa53f">
                                @if ($detailPr['quantity'] != 0)
                                    Còn hàng
                                @elseif($detailPr['quantity'] == 0)
                                    Hết hàng
                                @endif
                            </span></p>
                        </div>
                        <div>
                            <p class="product-title">Thông số sản phẩm</p>
                            <ul>
                                <li>Bộ vi xử lí : {{ $detailPr['cpu'] }}</li>
                                <li>Ram : {{ $detailPr['ram'] }}</li>
                                <li>Hard drive : {{ $detailPr['hard_drive'] }}</li>
                                <li>Màn hình : {{ $detailPr['screen'] }}</li>
                                <li>Hệ điều hành : {{ $detailPr['operating_system'] }}</li>
                            </ul>
                        </div>
                        <div>
                            @if ($detailPr['price'] != $detailPr['promo_price'])
                                <table class="table" style="background-color:#f0f0f0">
                                    <tbody>
                                        <tr class="table-active">
                                            <td style="width:35%">Giá bán</td>
                                            <td style="font-weight:bolder;text-decoration:line-through;font-size:25px">{{ number_format($detailPr['price'] ,0 ,'.' ,'.').'' }}&#8363;</td>
                                        </tr>
                                        <tr>
                                            <td style="width:35%;height:50px">Giá khuyến mãi</td>
                                            <td style="font-weight:bolder;font-size:25px;color:red">{{ number_format($detailPr['promo_price'] ,0 ,'.' ,'.').'' }}&#8363;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="width:35%;height:50px;text-align:center;color:red;font-weight:bolder">Giảm giá tới {{ $detailPr['percent'] }}%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            @elseif($detailPr['price'] == $detailPr['promo_price'])
                                <table class="table" style="background-color:#f0f0f0">
                                    <tbody>
                                        <tr class="table-active">
                                            <td style="width:35%">Giá bán</td>
                                            <td style="font-weight:bolder;font-size:25px">{{ number_format($detailPr['price'] ,0 ,'.' ,'.').'' }}&#8363;</td>
                                        </tr>
                                        <tr>
                                            <td style="width:35%;height:50px">Giá khuyến mãi</td>
                                            <td style="font-weight:bolder;font-size:25px;color:red">{{ number_format($detailPr['promo_price'] ,0 ,'.' ,'.').'' }}&#8363;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="width:35%;height:50px;text-align:center">Giảm giá tới {{ $detailPr['percent'] }}%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <p>Bảo hành : <span style="color:red">Chính hãng 12 tháng, đổi mới 30 ngày</span></p>
                    </div>

				</div>
			</div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div style="margin-top:40px">
                    <h2 class="product-title">Thông số kĩ thuật</h2>
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td style="width:35%;height:20px">Ram</td>
                                <td>{{ $detailPr['ram'] }}</td>
                            </tr>
                            <tr>
                                <td>Cpu</td>
                                <td>{{ $detailPr['cpu'] }}</td>
                            </tr>
                            <tr>
                                <td>Bộ nhớ trong</td>
                                <td>{{ $detailPr['hard_drive'] }}</td>
                            </tr>
                            <tr>
                                <td>Màu sắc</td>
                                <td>{{ $detailPr['color'] }}</td>
                            </tr>
                            <tr>
                                <td>Màn hình</td>
                                <td>{{ $detailPr['screen'] }}</td>
                            </tr>
                            <tr>
                                <td>Hệ điều hành</td>
                                <td>{{ $detailPr['operating_system'] }}</td>
                            </tr>
                            <tr>
                                <td>Kích thước</td>
                                <td>{{ $detailPr['size'] }}</td>
                            </tr>
                            <tr>
                                <td>Dung lượng pin</td>
                                <td>{{ $detailPr['battery'] }}</td>
                            </tr>
                            <tr>
                                <td>Cân nặng</td>
                                <td>{{ $detailPr['weight'] }}</td>
                            </tr>
                        </tbody>
                        </table>
                </div>
                <div class="fb-comments" data-width="" data-numposts="5"></div>
            </div>
            <div class="col-md-6">
                <div style="margin-top:40px">
                    <h2 class="product-title">Sản phẩm tương đương</h2>
                       @foreach ($similar as $item)
                        <div class="row" style="border-bottom:1px solid #f0f0f0;margin-top:20px">
                            <div class="col-md-4">
                                <a href=""><img class="imgproduct" src="{{ URL::to('/') }}/Uploads/images/{{ $item['image'] }}" style="height:170px"></a>
                            </div>
                            <div class="col-md-8">
                                <a href="{{ route('user.detailProduct',['id' => $item['id']]) }}" style="text-decoration:none;color:black">{{ $item['name'] }} <br>  {{ $item['ram'] }} / {{ $item['color'] }} / {{ $item['cpu'] }}</a>
                                @if ($item['price'] != $item['promo_price'])
                                    <div class="pricesp"><span>Giá bán: </span>{{ number_format($item['price'] ,0 ,'.' ,'.').'' }}&#8363;</div>
                                    <div class="pricesp-promo">Giá khuyến mãi:<span>{{ number_format($item['promo_price'] ,0 ,'.' ,'.').' ' }}&#8363;</span></div>
                                @elseif($item['price'] == $item['promo_price'])
                                    <div class="pricesp-default"><span>Giá bán: </span>{{ number_format($item['price'] ,0 ,'.' ,'.').'' }}&#8363;</div>
                                    <div class="pricesp"></div>
                                @endif
                            </div>
                        </div>
                       @endforeach
                </div>
            </div>
        </div>
	</div>
@endsection
