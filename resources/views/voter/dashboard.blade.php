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
                                <img class="d-block w-100" src="https://www.w3schools.com/bootstrap/chicago.jpg"
                                    alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="https://www.w3schools.com/bootstrap/la.jpg"
                                    alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="https://www.w3schools.com/bootstrap/ny.jpg"
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
            <section id="visimisi" class="pt-4 row justify-content-center">
                <div class="col-6">
                    <h4 class="text-center mb-3">&nbsp;</h4>
                    <h1 class="text-center brand-text font-weight-bold mb-3">Visi dan Misi</h1>
                </div>
                <div class="col-12">
                    <div class="dropdown-divider"></div>
                    <img class="img-fluid" src="https://www.w3schools.com/bootstrap/ny.jpg">
                </div>
            </section>
            <div class="dropdown-divider"></div>
            <section id="vote" class="row pt-4 mb-2 justify-content-center">
                <div class="col-12">
                    <h4 class="text-center mb-3">&nbsp;</h4>
                    <h1 class="text-center brand-text font-weight-bold mb-3">Vote</h1>
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