<nav id="mainmenu" class="hidden-xs hidden-sm ">
    <div class="container">
        <ul class="x1">
            <li><a href="{{ route('user.home') }}">Trang chủ</a></li>
            <li>
                <a href="">Sản phẩm</a>
                <i class="fa fa-caret-down" aria-hidden="true"></i>
                <ul class="drop2">
                    @foreach ($lstCate as $cate)
                        <li>
                            <a href="{{ route('user.listproduct',['idtype' => $cate['id']]) }}">{{ $cate['type'] }}</a>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <ul class="drop3">
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
            </li>
            <li><a href="">Sản phẩm</a></li>
            <li><a href="">Giới thiệu</a></li>
            <li><a href="">Tin tức</a></li>
            <li><a href="">Tư vấn</a></li>
            <li><a href="">Liên hệ</a></li>
            <li><a href="tel:032.777.5252">HOTLINE: 032.777.5252 (từ 8h-22h cả T7,CN)</a></li>
        </ul>
    </div>
</nav>
