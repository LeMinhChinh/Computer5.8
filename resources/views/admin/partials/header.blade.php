<div class="topbar">
    <div class="container">
        <div class="col-9 col-md-9 col-xs-9 col-sm-9 p0 hotline-top">
            <img src="../home/images/phone-24.png" alt="hotline"/>
            <p>Điện thoại: <a href="tel:032.777.5252">032.777.5252</a></p>
        </div>
        <div class="col-3 col-md-3 col-xs-3 col-sm-3 login">
            @if(null!==Session::get('emailSession'))
                <li style="width:60%"><a href="{{ route('admin.login') }}" >Xin chào <b>{{ Session::get('userSession') }}</b></a></li>
                <li><a href="{{ route('admin.handleLogout') }}" >Đăng xuất</a></li>
            @else()
                <li style="width:30%"><a href="{{ route('admin.login') }}" >Đăng nhập</a></li>
                <li><a href="{{ route('admin.register') }}">Đăng kí</a></li>
            @endif
        </div>
    </div>
</div>
<div class="header">
    <div class="container">
        <div class="col-xs-12 col-md-4">
            <div id="logo">
                <a href=""><img src="../home/images/logoo.jpg" alt=""></a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div id="search">
                <form action="" method="post">
                    <input type="text" name="txt_search" placeholder="Tìm sản phẩm" />
                    <button type="submit" name="btn_search">Tìm kiếm</button>
                </form>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="cart">
                <div class="discart">
                    <span class="mycart">Giỏ hàng:</span>
                    <span class="count_products_cart">0 sản phẩm</span>
                </div>
                <div class="top-cart-content">
                    xxx
                </div>
            </div>
        </div>
    </div>
</div>
