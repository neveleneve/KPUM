<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>
    @yield('search')
    <ul class="navbar-nav ml-auto">
        @guest        
        <li class="nav-item nav-item-right">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#login-modal">Login</a>
        </li>
        @endguest
        @auth
        <li class="nav-item nav-item-right">
            <a class="nav-link" href="/logout" onclick="javascript: return confirm('Keluar Sekarang?');">Log Out</a>
        </li>
        @endauth
    </ul>
</nav>