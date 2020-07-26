@extends('layouts.master')
@section('title')
<title>Welcome To KPUM STT Indonesia</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Pemilih</span>
                            <span class="info-box-number">
                                {{ $jumlah_pemilih }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-times"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Belum Memilih</span>
                            <span class="info-box-number">
                                {{ $jumlah_pemilih_belum }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Sudah Memilih</span>
                            <span class="info-box-number">
                                {{-- isi dengan yang udah milih --}}
                                {{ $jumlah_pemilih_sudah }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Paslon</span>
                            <span class="info-box-number">
                                {{ $jumlah_kandidat }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="info-box">
                        <div class="info-box-content">
                            <?php
                                $warna = ['danger', 'warning', 'success', 'info'];
                                $jmldata = count($jumlah_suara);
                                if ($jumlah_pemilih_sudah == 0) {
                                    $jumlah_pemilih_sudah = 1;
                                    $jumlah_pemilih_sudah_show = 0;
                                }else {
                                    $jumlah_pemilih_sudah = $jumlah_pemilih_sudah;
                                    $jumlah_pemilih_sudah_show = $jumlah_pemilih_sudah;
                                }
                            ?>
                            <h3 class="text-center">
                                <strong>Jumlah Perolehan Suara</strong>
                            </h3>
                            @for ($i = 0; $i < $jmldata; $i++) <div class="progress-group mt-4">
                                Pasangan Nomor Urut {{$i + 1}}
                                <span
                                    class="float-right">{{$jumlah_suara[$i]}}/<b>{{$jumlah_pemilih_sudah_show}}</b></span>
                                <div class="progress progress-sm" style="height: 20px">
                                    <div class="progress-bar bg-{{$warna[$i]}}"
                                        style="width: {{$jumlah_suara[$i] / $jumlah_pemilih_sudah * 100}}%">
                                        {{number_format($jumlah_suara[$i] / $jumlah_pemilih_sudah, 4) * 100}} %
                                    </div>
                                </div>
                        </div>
                        @endfor
                        <!-- /.progress-group -->

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
{{-- Modal --}}
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
                    <input class="form-control mb-3" type="text" name="tokenid" id="tokenid" placeholder="ID Token">
                    <button type="submit" class="btn btn-block btn-primary">Masuk</button>
                    <a class="btn btn-block btn-danger" href="/adminlogin">Admin Login</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection