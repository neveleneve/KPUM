<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @yield('title')
    <link rel="stylesheet" href="{{ asset('/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/dist/css/adminlte.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body @yield('bodycustom') class="hold-transition sidebar-collapse layout-top-nav layout-navbar-fixed">
    <div class="wrapper">
        @include('layouts/incl/guestnav')
        @yield('content')
        <footer class="main-footer text-center">
        <strong>Copyright &copy; 2021 <a href="{{url('/')}}">Komisi Pemilihan Umum Mahasiswa Tanjungpinang</a>.</strong>
        </footer>
    </div>
    <script src="{{ asset('/admin/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/admin/dist/js/adminlte.min.js') }}"></script>
    @yield('customjs')
</body>

</html>