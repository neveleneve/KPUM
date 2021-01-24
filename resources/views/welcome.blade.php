@extends('layouts.guestmaster')
@section('title')
<title>Komisi Pemilihan Umum Mahasiswa STT Indonesia Tanjungpinang</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <section id="beranda" class="row">
                <div class="col-12">
                    <h4 class="text-center font-weight-bold d-none d-lg-block">KOMISI PEMILIHAN UMUM MAHASISWA</h4>
                    <h4 class="text-center mb-3 font-weight-light d-none d-lg-block">SEKOLAH TINGGI TEKNOLOGI INDONESIA TANJUNGPINANG</h4>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{asset('/images/1.JPG')}}"
                                    alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('/images/2.JPG')}}"
                                    alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('/images/3.JPG')}}"
                                    alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </section>
            <div class="dropdown-divider"></div>
            <section id="cara" class="pt-4 row justify-content-center">
                <div class="col-6">
                    <h4 class="text-center mb-3">&nbsp;</h4>
                    <h1 class="text-center brand-text font-weight-bold mb-3">Cara Memilih</h1>
                </div>
                <div class="col-12">
                    <div class="dropdown-divider"></div>
                    <img class="img-fluid" src="https://www.w3schools.com/bootstrap/ny.jpg">
                </div>
            </section>
            <div class="dropdown-divider"></div>
            <section id="tentang" class="row pt-4 mb-2 justify-content-center">
                <div class="col-12">
                    <h4 class="text-center mb-3">&nbsp;</h4>
                    <h1 class="text-center brand-text font-weight-bold mb-3">Tentang</h1>
                    <div class="col-12">
                        <div class="dropdown-divider mb-3"></div>
                        <div class="card card-default">
                            <div class="card-body">
                                <div class="text-center mb-4">
                                    <img class="mx-auto img-thumbnail" src="{{ asset('/admin/dist/img/kpum.png') }}" alt="">
                                </div>
                                <p>
                                    <strong>
                                        Komisi Pemilihan Umum Mahasiswa Sekolah Tinggi Teknologi Indonesia Tanjungpinang
                                    </strong>
                                    merupakan badan yang dibentuk oleh Majelis Permusywaratan Mahasiswa Sekolah Tinggi
                                    Teknologi Indonesia Tanjungpinang dalam rangka melakukan pemilihan Presiden dan
                                    Wakil Presiden Mahasiswa Sekolah Tinggi Teknologi Indonesia Tanjungpinang
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<div class="modal fade" id="login-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Login</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/voterloginproses" method="post">
                    {{ csrf_field() }}
                    <input class="form-control mb-3" type="text" name="tokenid" id="tokenid" placeholder="ID Token"
                        required>
                    <button type="submit" class="btn btn-block btn-dark">Masuk</button>
                    <a class="btn btn-block btn-light border" href="/adminlogin">Admin Login</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('customjs')
<script lang="Javascript" type="text/javascript">
    $('.nav-link').click(function() {
        var sectionTo = $(this).attr('href');
        $('html, body').animate({
            scrollTop: $(sectionTo).offset().top
        }, 1000);
    });
</script>
@endsection