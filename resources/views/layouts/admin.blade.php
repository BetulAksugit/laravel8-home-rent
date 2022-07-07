<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('assets') }}/admin/images/favicon.png" type="image/png"> <!-- Favicon-->
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/plugins/morrisjs/morris.min.css" />
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/css/main.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/css/color_skins.css">
    @yield('css')
    @yield('javascript')
</head>
<body class="theme-purple">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="{{ asset('assets') }}/admin/images/logo.svg" width="48" height="48" alt="Compass"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
@include('admin._header')
@include('admin._sidebar')

@yield('content')
@include('admin._footer')
@yield('footer')
</body>
</html>
