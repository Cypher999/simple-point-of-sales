<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{config('app.name')}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @yield('navbar')
    @yield('sidebar')
    
    <!-- <div class="content-wrapper"> -->
        @yield('content')
    <!-- </div> -->

    @yield('footer')
</div>
</body>
</html>
