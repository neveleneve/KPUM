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
                <div class="col-6">
                    <div class="card">
                        <div class="text-center card-body">
                            <form id="ceknimmhs">
                                {{ csrf_field() }}
                                <label for="ninm">Nomor Induk Mahasiswa</label>
                                <input type="text" name="nim" id="nim" placeholder="Masukkan Nomor Induk Mahasiswa"
                                    class="form-control" onkeypress="return isNumberKey(event)">
                                <br>
                                <button id="ceknim" class="btn btn-block btn-dark">Cek!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="prosesdatapemilih" class="row justify-content-center text-center" style="display: none">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h5 class="font-weight-bold">Mencari Data Pemilih&nbsp;<i
                                    class="fas fa-spinner fa-pulse"></i></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div id="nodatapemilih" class="row justify-content-center text-center" style="display: none">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header bg-danger">
                            <h5 class="font-weight-bold">Data Pemilih Tidak Ditemukan</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div id="datapemilih" class="row justify-content-center text-center" style="display: none">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h5 class="font-weight-bold">Data Pemilih</h5>
                        </div>
                        <div class="card-body">
                            <label for="nama">Nama Pemilih</label>
                            <p id="nama">&nbsp;</p>
                            <label for="nim">Nomor Induk Mahasiswa</label>
                            <p id="nim">&nbsp;</p>
                            <label for="jurusan">Jurusan</label>
                            <p id="jurusan">&nbsp;</p>
                            <label for="angkatan">Angkatan</label>
                            <p id="angkatan">&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
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
    $("#cek-nim").on('submit', function (e) {
        e.preventDefault();
        $('#prosesdatapemilih').slideToggle(1000);
        $.ajax({
            url: '/cek-pemilih',
            type: 'get',
            data: {id: document.getElementById('nim').value},
            dataType: 'json',
            success: function (data) {
                $('#prosesdatapemilih').slideToggle(1000);
               
            },
        });
    });
</script>
@endsection