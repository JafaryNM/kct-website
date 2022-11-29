<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.header')
<body>
    <div id="app">
        @yield('content')
    </div>
    <script type="text/javascript" src="assets/js/main.js"></script>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="../s7.addthis.com/js/300/addthis_widget.js#pubid=ra-606982ba586bca0f"></script>
</body>
</html>
