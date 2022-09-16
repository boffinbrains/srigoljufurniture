<!DOCTYPE html>
<html>

<head>
    @IncludeIf('layouts.home.head')
</head>

<body>
    <!--<div id="preloader">-->
    <!--    <img src="{{asset('home/images/logo.svg')}}" alt="">-->
    <!--</div>-->

    @IncludeIf('layouts.home.header')
    @yield('body')
    @IncludeIf('layouts.home.footer')
</body>

</html>
