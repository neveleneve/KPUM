@extends('layouts.guestmaster')
@section('title')
<title>Komisi Pemilihan Umum Mahasiswa STT Indonesia Tanjungpinang - Cek Data Pemilih</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            @if (session('pemberitahuan'))
            <div class="row">
                <div class="col-12">
                    <div class="alert bg-{{session('warna')}} alert-dismissable text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{session('pemberitahuan')}}
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center mb-3 font-weight-bold">Cek Data Pemilih</h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="text-center card-body">
                            <form method="POST" action="{{url('/cek-pemilih')}}">
                                {{ csrf_field() }}
                                <label for="ninm">Nomor Induk Mahasiswa</label>
                                @if (session('nim'))
                                <input type="text" name="nim" id="nim" placeholder="Masukkan Nomor Induk Mahasiswa"
                                    value="{{session('nim')}}" class="form-control" required
                                    onkeypress="return isNumberKey(event)">
                                @else
                                <input type="text" name="nim" id="nim" placeholder="Masukkan Nomor Induk Mahasiswa"
                                    class="form-control" required onkeypress="return isNumberKey(event)">
                                @endif
                                <br>
                                <button type="submit" class="btn btn-block btn-dark">Cek!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if (session('tiada'))
            <div id="nodatapemilih" class="row justify-content-center text-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header bg-danger">
                            <h5 class="font-weight-bold">{{session('tiada')}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if (session('ada'))
            <div id="datapemilih" class="row justify-content-center text-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h5 class="font-weight-bold">{{session('ada')}}</h5>
                        </div>
                        <div class="card-body">
                            <label for="nama">Nama Pemilih</label>
                            <p id="nama">{{session('data')[0]->nama}}</p>
                            <label for="nim">Nomor Induk Mahasiswa</label>
                            <p id="nim">{{session('data')[0]->nim}}</p>
                            <label for="jurusan">Jurusan</label>
                            <p id="jurusan">
                                @php
                                if (substr(session('data')[0]->nim, 0, -5) == 12) {
                                echo 'Teknik Informatika';
                                }
                                if (substr(session('data')[0]->nim, 0, -5) == 32) {
                                echo 'Sistem Informasi';
                                }
                                if (substr(session('data')[0]->nim, 0, -5) == 42) {
                                echo 'Komputer Akuntansi';
                                }
                                @endphp
                            </p>
                            <label for="angkatan">Angkatan</label>
                            <p id="angkatan">
                                20{{substr(session('data')[0]->nim, 2, -3)}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
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
                    <input class="form-control mb-3" type="text" name="nim" id="nim" placeholder="Nomor Induk Mahasiswa"
                        onkeypress="return isNumberKey(event)">
                    <input class="form-control mb-3" type="text" name="tokenid" id="tokenid" placeholder="ID Token">
                    <button type="submit" class="btn btn-block btn-primary">Masuk</button>
                    <a class="btn btn-block btn-danger" href="/adminlogin">Admin Login</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('customjs')
<script>
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    setTimeout(function(){
        $('#datapemilih').show();// or fade, css display however you'd like.
    }, 5000);
</script>
@endsection