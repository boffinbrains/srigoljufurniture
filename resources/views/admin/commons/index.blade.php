<!DOCTYPE html>
<html>

<head>
    @include('admin.commons.head')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            @include('admin.commons.header')
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            @include('admin.commons.sidebar')
        </aside>
        <div class="content-wrapper overflow-auto" style="padding-top:1%;max-height:400px">
            @yield('content')
        </div>
        <footer class="main-footer">
            @include('admin.commons.footer')
        </footer>
    </div>
</body>

</html>