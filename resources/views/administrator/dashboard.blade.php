@extends('layouts.master')

@section('title')
<title>Admin Dashboard</title>
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
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-vote-yea"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Suara Masuk</span>
                            <span class="info-box-number">
                                {{ $suaramasuk }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Pemilih</span>
                            <span class="info-box-number">
                                {{ $jumlahpemilih }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Calon Peserta</span>
                            <span class="info-box-number">
                                {{ $jumlahcalon }} Pasangan Calon
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-12">
                    <h1 class="m-0 text-dark text-center">Data Pasangan Calon</h1>
                </div>
            </div>
            @foreach ($datacalon as $item)
            <div class="row">                
                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Pasangan Nomor Urut {{$item->no_urut}}</span>
                            <span class="info-box-number">{{$item->ketua}} - {{$item->wakil}}</span>                            
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Suara : {{$item->no_urut}}</span>
                            <span class="info-box-number">Persentase : {{$item->ketua}} - {{$item->wakil}}</span>                            
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection