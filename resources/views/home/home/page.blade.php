@extends('home.layouts.homeview')
@section('title', "Home")
@section('content')

    <section id="featured">
        <div class="hidden-xs col-sm-4 col-md-3">
            <div class="boxleft">
                <div class="titboxl">
                    <i class="fa fa-bars fa-x2 fa-lg" aria-hidden="true"></i>
                    <span>Danh mục sản phẩm</span>
                </div>
                <div class="ctboxleft">
                    <ul class="mnboxl">
                        @foreach ($lstCate as $cate)
                        <li>
                            <a href="{{ route('user.listproduct',['idtype' => $cate['id']]) }}">{{ $cate['type'] }}</a>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <ul class="mnboxl_1">
                                    @foreach ($lstName as $name)
                                        @if($cate['id'] == $name['id_type'])
                                            <li><a href="{{ route('user.filterproduct',['idtype' => $name['id_type'],'idtrade' => $name['id_trade']]) }}">{{ $name['type'] }} {{ $name['name_trade'] }}</a></li>
                                        @endif
                                    @endforeach
                            </ul>
                        </li>
                        @endforeach
                        <li>
                            <a href="{{ route('user.errorpage') }}">Máy tính chơi game</a>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <ul class="mnboxl_1">
                                <li><a href="{{ route('user.errorpage') }}">Đang cập nhật</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('user.errorpage') }}">Màn hình máy tính</a>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <ul class="mnboxl_1">
                                <li><a href="{{ route('user.errorpage') }}">Đang cập nhật</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('user.errorpage') }}">Gaming Gear</a>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <ul class="mnboxl_1">
                                <li><a href="{{ route('user.errorpage') }}">Đang cập nhật</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('user.errorpage') }}">Linh phụ kiện</a>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <ul class="mnboxl_1">
                                <li><a href="{{ route('user.errorpage') }}">Đang cập nhật</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('user.errorpage') }}">Thiết bị mạng</a>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <ul class="mnboxl_1">
                                <li><a href="{{ route('user.errorpage') }}">Đang cập nhật</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-9">
            <div class="slider-wrapper theme-default">
                <div id="slider" class="nivoSlider">
                    <a href=""><img src="../home/images/acb.jpg" alt="" /></a>
                    <a href=""><img src="../home/images/abc.jpg" alt="" /></a>
                </div>
            </div>
        </div>
        <div class="banner clearfix">
            <div class="col-xs-12 col-sm-6">

            </div>
            <div class="col-xs-12 col-sm-6">

            </div>
        </div>
    </section>
    <section id="main" class="mt-4">
        <div id="maincontent" class="col-xs-12 col-sm-12 col-md-12">
            <div class="boxmain spmoi">
                <div class="tit-boxmain">
                    <h3><span>Sản phẩm mới</span></h3>
                </div>
                <div class="ct-boxmain" style="margin-top:20px">
                    <div class="row">
                        <div id="spmoi" class="owl-carousel">
                            @foreach ($lstHotProduct as $hotPr)
                                <div class="item" {{ route('user.detailProduct',['id' => $hotPr['id']]) }}>
                                    <div class="boxsp">
                                        <div class="imgsp">
                                            @if ($hotPr['id_type'] ==1)
                                                <a href=""><img class="imgproduct" src="{{ URL::to('/') }}/Uploads/images/{{ $hotPr['image'] }}" style="height:190px"></a>
                                            @elseif($hotPr['id_type'] ==2)
                                                <a href=""><img class="imgproduct" src="{{ URL::to('/') }}/Uploads/images/{{ $hotPr['image'] }}" style="height:190px"></a>
                                            @endif
                                            <div class="img-label">
                                                <img src="../home/images/new.png">
                                            </div>
                                        </div>
                                        <div class="namesp">
                                            {{-- <a href="">{{ $hotPr['name'] }}</a> --}}
                                            <p class="namesp">{{ $hotPr['name'] }} <br>  {{ $hotPr['ram'] }} / {{ $hotPr['color'] }} / {{ $hotPr['cpu'] }}</p>
                                        </div>
                                        @if ($hotPr['price'] != $hotPr['promo_price'])
                                            <div class="pricesp"><span>Giá bán: </span>{{ number_format($hotPr['price'] ,0 ,'.' ,'.').'' }}&#8363;</div>
                                            <div class="pricesp-promo">Giá khuyến mãi:<span>{{ number_format($hotPr['promo_price'] ,0 ,'.' ,'.').' ' }}&#8363;</span></div>
                                        @elseif($hotPr['price'] == $hotPr['promo_price'])
                                            <div class="pricesp-default"><span>Giá bán: </span>{{ number_format($hotPr['price'] ,0 ,'.' ,'.').'' }}&#8363;</div>
                                            <div class="pricesp"></div>
                                        @endif
                                        <div class="button-hd">
                                            {{-- <a href=""><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>   --}}
                                            <a href="{{ route('user.detailProduct',['id' => $hotPr['id']]) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="row" style="margin-top:10px">
                                            <div class="col-md-6">
                                                    @if ($hotPr['quantity'] != 0)
                                                        <a href="#" style="color:#2cc067;text-decoration:none;padding-left:15px">
                                                            <span class="glyphicon glyphicon-ok"></span>
                                                            Còn hàng
                                                        </a>
                                                    @elseif($hotPr['quantity'] ==0)
                                                        <a href="#" style="color:red;text-decoration:none;padding-left:15px">
                                                            <span class="glyphicon glyphicon-remove"></span>
                                                            Hết hàng
                                                        </a>
                                                    @endif
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <a href="{{ route('user.addCart',['id' => $hotPr['id'],'quant' => $hotPr['quantity']]) }}" style="color:red;text-decoration:none;padding-right:15px">
                                                    <span class="glyphicon glyphicon-shopping-cart"></span>
                                                    Giỏ hàng
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="boxmain">
                <div class="tit-boxmain">
                    <h3><span>Laptop</span></h3>
                </div>
                <div class="ct-boxmain row m0">
                   @foreach ($lstLaptop as $laptop)
                        <div class="col-xs-6 col-sm-4 col-md-3 p5" style="margin-top:20px">
                            <div class="boxsp">
                                <div class="imgsp">
                                    <a href=""><img class="imgproduct" src="{{ URL::to('/') }}/Uploads/images/{{ $laptop['image'] }}" style="height:190px"></a>
                                    {{-- <div class="img-label">
                                        <img src="home/images/hot.png">
                                    </div> --}}
                                </div>
                                <div class="namesp">
                                    <p class="namesp">{{ $laptop['name'] }} <br>  {{ $laptop['ram'] }} / {{ $laptop['color'] }} / {{ $laptop['cpu'] }}</p>
                                </div>
                                @if ($laptop['price'] != $laptop['promo_price'])
                                    <div class="pricesp"><span>Giá bán: </span>{{ number_format($laptop['price'] ,0 ,'.' ,'.').'' }}&#8363;</div>
                                    <div class="pricesp-promo">Giá khuyến mãi:<span>{{ number_format($laptop['promo_price'] ,0 ,'.' ,'.').'' }}&#8363;</span></div>
                                @elseif($laptop['price'] == $laptop['promo_price'])
                                    <div class="pricesp-default"><span>Giá bán: </span>{{ number_format($laptop['price'] ,0 ,'.' ,'.').'' }}&#8363;</div>
                                    <div class="pricesp"></div>
                                @endif
                                <div class="button-hd">
                                    <a href="{{ route('user.detailProduct',['id' => $laptop['id']]) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                </div>
                                <div class="row" style="margin-top:10px">
                                    <div class="col-md-6">
                                        @if ($laptop['quantity'] != 0)
                                            <a href="#" style="color:#2cc067;text-decoration:none;padding-left:15px">
                                                <span class="glyphicon glyphicon-ok"></span>
                                                Còn hàng
                                            </a>
                                        @elseif($laptop['quantity'] ==0)
                                            <a href="#" style="color:red;text-decoration:none;padding-left:15px">
                                                <span class="glyphicon glyphicon-remove"></span>
                                                Hết hàng
                                            </a>
                                        @endif
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <a href="{{ route('user.addCart',['id' => $laptop['id'],'quant' => $laptop['quantity']]) }}" style="color:red;text-decoration:none;padding-right:15px">
                                            <span class="glyphicon glyphicon-shopping-cart"></span>
                                            Giỏ hàng
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                   @endforeach

                </div>
            </div>
            <div class="boxmain">
                <div class="tit-boxmain">
                    <h3><span>Máy tính để bàn</span></h3>
                </div>
                <div class="ct-boxmain row m0">
                    @foreach ($lstPC as $pc)
                        <div class="col-xs-6 col-sm-4 col-md-3 p5" style="margin-top:20px">
                            <div class="boxsp">
                                <div class="imgsp">
                                    <a href=""><img class="imgproduct" src="{{ URL::to('/') }}/Uploads/images/{{ $pc['image'] }}" style="height:190px"></a>
                                    {{-- <div class="img-label">
                                        <img src="home/images/hot.png">
                                    </div> --}}
                                </div>
                                <div class="namesp">
                                    <p class="namesp">{{ $pc['name'] }} <br>  {{ $pc['ram'] }} / {{ $pc['color'] }} / {{ $pc['cpu'] }}</p>
                                </div>
                                @if ($pc['price'] != $pc['promo_price'])
                                    <div class="pricesp"><span>Giá bán: </span>{{ number_format($pc['price'] ,0 ,'.' ,'.').' đ' }}</div>
                                    <div class="pricesp-promo">Giá khuyến mãi:<span>{{ number_format($pc['promo_price'] ,0 ,'.' ,'.').'' }}&#8363;</span></div>
                                @elseif($pc['price'] == $pc['promo_price'])
                                    <div class="pricesp-default"><span>Giá bán: </span>{{ number_format($pc['price'] ,0 ,'.' ,'.').'' }}&#8363;</div>
                                    <div class="pricesp"></div>
                                @endif

                                <div class="button-hd">
                                    <a href="{{ route('user.detailProduct',['id' => $pc['id']]) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                </div>
                                <div class="row" style="margin-top:10px">
                                    <div class="col-md-6">
                                            @if ($pc['quantity'] != 0)
                                                <a href="#" style="color:#2cc067;text-decoration:none;padding-left:15px">
                                                <span class="glyphicon glyphicon-ok"></span>
                                                Còn hàng
                                            </a>
                                            @elseif($pc['quantity'] ==0)
                                                <a href="#" style="color:red;text-decoration:none;padding-left:15px">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                    Hết hàng
                                                </a>
                                            @endif
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <a href="{{ route('user.addCart',['id' => $pc['id'],'quant' => $pc['quantity']]) }}" style="color:red;text-decoration:none;padding-right:15px">
                                            <span class="glyphicon glyphicon-shopping-cart"></span>
                                            Giỏ hàng
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
