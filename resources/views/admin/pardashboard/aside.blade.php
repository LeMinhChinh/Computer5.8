<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
        <i class="fas fa-fw fa-home"></i>
        <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link dropdown-toggle" href="" id="pagesDropdown" role="button" data-toggle="dropdown">
            <i class="fas fa-fw fa-tv"></i>
            <span>Product</span></a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown" style="background-color:#212529;">
        <a class="dropdown-item" href="{{ route('admin.product') }}" style="color:rgba(255, 255, 255, 0.5)">
            <i class="fas fa-fw fa-list-ul"></i>
            <span>View All Product</span>
        </a>
        <a class="dropdown-item" href="{{ route('admin.listLaptop') }}" style="color:rgba(255, 255, 255, 0.5)">
            <i class="fas fa-fw fa-laptop"></i>
            <span>Laptop</span>
        </a>
        <a class="dropdown-item" href="{{ route('admin.listpc') }}" style="color:rgba(255, 255, 255, 0.5)">
            <i class="fas fa-fw fa-desktop"></i>
            <span>PC</span>
        </a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.bill') }}">
        <i class="fas fa-fw fa-file-invoice"></i>
        <span>Bill Order</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.news') }}">
        <i class="fas fa-fw fa-newspaper"></i>
        <span>News</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.account') }}">
        <i class="fas fa-fw fa-users"></i>
        <span>Users</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.home') }}">
        <i class="fas fa-fw fas fa-hand-point-left"></i>
        <span>Back page</span></a>
    </li>
</ul>
