<nav id="mainmenu" class="hidden-xs hidden-sm ">
    <div class="container">
        <ul class="x1">
            <li><a href="{{ route('user.home') }}">Trang chủ</a></li>
            <li>
                <a href="">Sản phẩm</a>
                <i class="fa fa-caret-down" aria-hidden="true"></i>
                <ul class="drop2">
                    <li>
                        <a href="">Laptop</a>
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <ul class="drop3">
                            <li><a href="">Laptop Dell</a></li>
                            <li><a href="">Laptop Asus</a></li>
                            <li><a href="">Laptop Lenovo</a></li>
                            <li><a href="">Macbook</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="">Máy tính văn phòng</a>
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <ul class="drop3">
                            <li><a href="">PC Dell</a></li>
                            <li><a href="">PC Asus</a></li>
                            <li><a href="">PC Lenovo</a></li>
                            <li><a href="">PC Acer</a></li>
                        </ul>
                    </li>
                    <li><a href="">Máy tính chơi game</a></li>
                    <li><a href="">Màn hình máy tính</a></li>
                    <li><a href="">Gaming Gear</a></li>
                    <li><a href="">Linh phụ kiện</a></li>
                    <li><a href="">Thiết bị mạng</a></li>
                    {{-- @foreach ($lstCate as $cate)
                        <li>
                            <a href="">{{ $cate['type'] }}</a>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <ul class="drop3">
                                @foreach ($lstName as $name)
                                    @if($cate['id'] == $name['id_type'])
                                        <li><a href="">{{ $name['name_cate'] }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endforeach --}}
                </ul>
            </li>
            <li><a href="">Giới thiệu</a></li>
            <li><a href="">Tin tức</a></li>
            <li><a href="">Tư vấn</a></li>
            <li><a href="">Liên hệ</a></li>
            <li><a href="tel:032.777.5252">HOTLINE: 032.777.5252 (từ 8h-22h cả T7,CN)</a></li>
        </ul>
    </div>
</nav>
