<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{{ asset('') }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @include('admin.partials.effect')
</head>
<body>
<header id="header">
    @include('admin.partials.header')
    @include('admin.partials.nav')

</header>
<div id="home">
    <div class="container">
        @yield('content')
    </div>
</div>
<footer id="footer">
    @include('admin.partials.footer')
</footer>
    @include('admin.partials.script')
</body>
</html>
