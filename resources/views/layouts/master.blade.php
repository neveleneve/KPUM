<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="shortcut icon" href="{{url('admin/dist/img/kpum.png')}}" type="image/x-icon">
    <link type="text/css" rel="stylesheet" href="{{url('admin/plugins/fontawesome-free/css/all.min.css')}}">
    <link type="text/css" rel="stylesheet"
        href="{{url('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('admin/plugins/jqvmap/jqvmap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('admin/dist/css/adminlte.min.css')}}">
    <link type="text/css" rel="stylesheet"
        href="{{url('admin/plugins/overlayScrollbars/css/overlayScrollbars.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('admin/plugins/daterangepicker/daterangepicker.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('admin/plugins/summernote/summernote-bs4.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @guest
                <li class="nav-item nav-item-right">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                </li>
                @endguest
                @auth
                <li class="nav-item nav-item-right">
                    <a class="nav-link" href="/logout" onclick="javascript: return confirm('Keluar Sekarang?');">Log
                        Out</a>
                </li>
                @endauth
            </ul>
            @yield('seacrh')
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a class="brand-link" href="/">
                <img src="{{asset('admin/dist/img/kpum.png')}}" alt="KPUM Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-bold">KP</span><span class="brand-text font-weight-light">UM</span>
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    @guest
                    <div class="image">
                        <img src="{{asset('admin/dist/img/boxed-bg.png')}}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="/" class="d-block">Guest</a>
                    </div>
                    @endguest
                    @auth('admin')
                    <div class="image">
                        <img src="{{asset('admin/dist/img/avatar.png')}}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="/" class="d-block">{{ucwords(Auth::user()->nama)}}</a>
                    </div>
                    @endauth
                    @auth('voter')
                    <div class="image">
                        <img src="{{asset('admin/dist/img/avatar.png')}}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="/" class="d-block">Voter</a>
                    </div>
                    @endauth
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        @guest
                        <li class="nav-item">
                            <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/tentang" class="nav-link {{ Request::is('tentang*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-info"></i>
                                <p>
                                    Tentang Kami
                                </p>
                            </a>
                        </li>
                        @endguest
                        @auth('admin')
                        <li class="nav-item">
                            <a href="/admin/dashboard"
                                class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/datacalon"
                                class="nav-link {{ Request::is('admin/datacalon*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Data Calon</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/datapemilih"
                                class="nav-link {{ Request::is('admin/datapemilih*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Data Pemilih</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/administrator"
                                class="nav-link {{ Request::is('admin/administrator*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-lock"></i>
                                <p>Administrator</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/report" class="nav-link {{ Request::is('admin/report*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/setting"
                                class="nav-link {{ Request::is('admin/setting*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cog fa-spin"></i>
                                <p>Pengaturan</p>
                            </a>
                        </li>
                        @endauth
                        @auth('voter')
                        <li class="nav-item">
                            <a href="/voter/dashboard"
                                class="nav-link {{ Request::is('voter/dashboard*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/voter/voting" class="nav-link {{ Request::is('voter/voting*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-vote-yea"></i>
                                <p>Vote Now!!!</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/voter/profil" class="nav-link {{ Request::is('voter/profil*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Profil Calon</p>
                            </a>
                        </li>
                        @endauth
                        <li class="nav-header">LABELS</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p class="text">Important</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>Warning</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Informational</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        @yield('content')
    </div>
    <script src="{{url('admin/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{url('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('admin/plugins/chart.js/Chart.min.js')}}"></script>
    <script src="{{url('admin/plugins/sparklines/sparkline.js')}}"></script>
    <script src="{{url('admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <script src="{{url('admin/plugins/moment/moment.min.js')}}"></script>
    <script src="{{url('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{url('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="{{url('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{url('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <script src="{{url('admin/dist/js/adminlte.js')}}"></script>
    <script src="{{url('admin/dist/js/demo.js')}}"></script>    
</body>

</html>