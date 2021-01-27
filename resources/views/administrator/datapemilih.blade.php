@extends('layouts.master')

@section('title')
<title>Data Pemilih</title>
@endsection

@section('search')
<form action="/admin/datapemilih" method="POST" class="form-inline ml-0 ml-md-3">
    {{ csrf_field() }}
    <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" id="cari" name="cari" type="search" placeholder="Search"
            aria-label="Search" value="{{$nim}}">
        <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</form>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1 class="m-0 text-dark">Data Pemilh</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
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
            <div class="row mb-3">
                <div class="col-12">
                    <button data-toggle="modal" data-target="#modalpemilih"
                        class="btn btn-outline-danger btn-flat btn-block">Tambah Data Pemilih</button>
                </div>
            </div>
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-danger">
                            <tr>
                                <th></th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Token</th>
                                <th>Status</th>
                                <th>Waktu Pemilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($data_pemilih) == 0)
                            <tr>
                                <td colspan="6" class="text-center">
                                    Data Kosong
                                </td>
                            </tr>
                            @else
                            @foreach ($data_pemilih as $item)
                            <tr>
                                <td>
                                    @if ($item->status == 0)
                                    <form action="/admin/datapemilih/hapus" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" id="id" value="{{$item->id}}">
                                        <button class="btn btn-danger btn-block" type="submit"
                                            onclick="return confirm('Hapus Data Pemilih?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    @else

                                    @endif
                                </td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->nim}}</td>
                                <td>{{$item->token_id}}</td>
                                <td>
                                    @if ($item->status == 0)
                                    Belum Memilih
                                    @else
                                    Sudah Memilih
                                    @endif
                                </td>
                                <td>
                                    @if ($item->updated_at == null)
                                    -
                                    @else
                                    {{$item->updated_at->format('d M Y, H:i:s')}}
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="float-right">
                        {{ $data_pemilih->render("pagination::bootstrap-4") }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="modalpemilih">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Login</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/tambahtoken" method="post">
                    {{ csrf_field() }}
                    <input class="form-control mb-3" type="text" name="nama" id="nama" placeholder="Nama Pemilih"
                        required onkeypress="return isCharKey(event)">
                    <input class="form-control mb-3" type="text" name="nim" id="nim" placeholder="Nomor Induk Mahasiswa"
                        required onkeypress="return isNumberKey(event)">
                    <button type="submit" class="btn btn-block btn-dark">Tambah Pemilih</button>
                    <a class="btn btn-block btn-light border" data-dismiss="modal">Batal</a>
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
    function isCharKey(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return true;
        return false;
    }
</script>
@endsection