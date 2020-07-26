<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a class="brand-link" href="">
        <img src="{{asset('admin/dist/img/kpum.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-bold">KP</span><span class="brand-text font-weight-light">UM</span>
    </a>
    <div
        class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition ">
        <div class="os-resize-observer-host observed">
            <div class="os-resize-observer">

            </div>
        </div>
        <div class="os-size-auto-observer observed">
            <div class="os-resize-observer"></div>
        </div>
        <div class="os-content-glue"></div>
        {{-- div untuk isi sidebar mulai --}}
        <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible">
                <div class="os-content">
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
                            <a href="/" class="d-block">{{ucwords(Auth::user()->nama) }}</a>
                        </div>
                        @endauth
                        @auth('voter')
                        <div class="image">
                            <img src="{{asset('admin/dist/img/boxed-bg.png')}}" class="img-circle elevation-2"
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
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/tentang" class="nav-link {{ Request::is('tentang') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-info"></i>
                                    <p>About</p>
                                </a>
                            </li>
                            @endguest
                            @auth('admin')
                            <li class="nav-item">
                                <a href="/admin/dashboard"
                                    class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
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
                                    class="nav-link {{ Request::is('voter/dashboard') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/voter/voting"
                                    class="nav-link {{ Request::is('voter/voting') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-vote-yea"></i>
                                    <p>Vote Now!!!</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/voter/profil"
                                    class="nav-link {{ Request::is('voter/profil') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>Profil Calon</p>
                                </a>
                            </li>
                            @endauth
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        {{-- div untuk isi sidebar akhir--}}
        <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle">
                </div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle">

                </div>
            </div>
        </div>
        <div class="os-scrollbar-corner"></div>
    </div>
</aside>