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
                    <h4 class="text-center mb-3 font-weight-light d-none d-lg-block">SEKOLAH TINGGI TEKNOLOGI INDONESIA
                        TANJUNGPINANG</h4>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{asset('/images/1.JPG')}}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('/images/2.JPG')}}" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('/images/3.JPG')}}" alt="Third slide">
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
            @if ($jumlahcalon == 0)

            @else

            <div class="dropdown-divider"></div>
            <section id="visimisi" class="pt-4 row justify-content-center">
                <div class="col-12">
                    <h4 class="text-center mb-3">&nbsp;</h4>
                    <h1 class="text-center brand-text font-weight-bold mb-3">Visi dan Misi</h1>
                    <div class="dropdown-divider mb-3"></div>
                </div>
                @foreach ($data_visi_misi as $data)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Paslon Nomor Urut {{$data->no_urut}}
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <img class="card-img" style="width: 70%"
                                    src="{{asset('admin/dist/img/'.$data->gambar)}}">
                            </div>
                            <div class="text-center">
                                <label>Ketua : </label>{{' '.$data->ketua}}
                                <br>
                                <label>Wakil Ketua : </label>{{' '.$data->wakil}}
                            </div>
                            <h3 class="text-center mb-2">Visi</h3>
                            <p class="text-center mb-4">{{$data->visi}}</p>
                            <h3 class="text-center mb-2">Misi</h3>
                            <pre class="text-center"><h5>{{$data->misi}}</h5></pre>
                        </div>
                    </div>
                </div>
                @endforeach
            </section>
            @endif
            @if ($jumlahcalon == 0)

            @else

            <div class="dropdown-divider"></div>
            <section id="vote" class="row pt-4 mb-2 justify-content-center">
                <div class="col-12">
                    <h4 class="text-center mb-3">&nbsp;</h4>
                    <h1 class="text-center brand-text font-weight-bold mb-3">Vote</h1>
                    <div class="dropdown-divider mb-3"></div>
                </div>
                @foreach ($datacalon as $data)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Pasangan Calon Nomor {{$data->no_urut}}
                            </h3>
                        </div>
                        <div class="card-body">
                            <img class="card-img" src="{{asset('admin/dist/img/'.$data->gambar)}}" alt="">
                            <form action="/voter/vote" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" id="id" value="{{$data->id}}">
                                <input type="hidden" name="idpemilih" id="idpemilih" value="{{Auth::user()->id}}">
                                <button class="btn btn-primary btn-block"
                                    onclick="javascript: return confirm('Pilih Pasangan Calon Nomor Urut {{$data->no_urut}}');">PILIH
                                    NOMOR {{$data->no_urut}}</button>
                            </form>

                        </div>
                    </div>
                </div>
                @endforeach
            </section>
            @endif
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