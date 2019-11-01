<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @include('home.partials.effect')
</head>
<body>
<header id="header">
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0"></script>
    <div class="wrap">
    @include('home.partials.header')
    @include('home.partials.nav')

</header>
<div id="home">
    <div class="container">
        @yield('content')
    </div>
</div>
<footer id="footer">
    @include('home.partials.footer')
</footer>
    @include('home.partials.script')
</body>
</html>
