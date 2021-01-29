<nav id="nav" class="main-header navbar navbar-expand-lg navbar-light navbar-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="/" class="navbar-brand">
            <img src="{{ asset('/admin/dist/img/kpum.png') }}" class="brand-image d-none d-lg-inline"
                style="opacity: .8">
            <span class="brand-text font-weight-bold">KP</span><span class="brand-text font-weight-light">UM</span>
        </a>
        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <ul class="navbar-nav">
                @guest
                <li class="nav-item">
                    <a {{Request::url() == url('/') ? 'href=#beranda' : 'href=/'}} class="nav-link">Beranda</a>
                </li>
                <li class="nav-item">
                    <a {{Request::url() == url('/') ? 'href=#cara' : 'href=/'}} class="nav-link">Cara Memilih</a>
                </li>
                <li class="nav-item">
                    <a {{Request::url() == url('/') ? 'href=#tentang' : 'href=/'}} class="nav-link">Tentang</a>
                </li>
                <li class="nav-item">
                    <a href="/cek-voter" class="nav-link">Cek Status Pemilih</a>
                </li>
                @endguest
                @auth('voter')
                @if ($jumlahcalon == 0)
                <li class="nav-item">
                    <a href="{{url('/voter/dashboard')}}" class="nav-link">Beranda</a>
                </li>
                @else
                <li class="nav-item">
                    <a href="#beranda" class="nav-link">Beranda</a>
                </li>
                @if (strtotime("now") > $tutup[0]->inttanggal - 3600)
                <li class="nav-item">
                    <a href="#hasil" class="nav-link">Hasil Perhitungan</a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="#visimisi" class="nav-link">Visi dan Misi</a>
                </li>
                <li class="nav-item">
                    <a href="#vote" class="nav-link">Vote</a>
                </li>
                @endif
                @endauth
            </ul>
        </div>
        @guest
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="dropdown-divider"></div>
                    <a href="#" data-toggle="modal" data-target="#login-modal" class="dropdown-item">
                        <i class="fas fa-vote-yea mr-2"></i> Masuk untuk Memilih
                    </a>
                    <div class="dropdown-divider"></div>
                    <span class="dropdown-item dropdown-footer">STT Indonesia Tanjungpinang</span>
                </div>
            </li>
        </ul>
        @endguest
        @auth
        <ul class="order-1 order-md-3 navbar-nav ml-auto">
            <li>
                <a class="nav-link">{{Auth::user()->nama}}</a>
            </li>
            <li class="nav-item nav-item-right">
                <a title="Keluar" class="nav-link" href="/logout"
                    onclick="javascript: return confirm('Keluar Sekarang?');">
                    <i class="fa fas fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>
        @endauth
    </div>
</nav>