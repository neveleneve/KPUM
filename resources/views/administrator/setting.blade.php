@extends('layouts.master')

@section('title')
<title>Pengaturan</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1 class="m-0 text-dark">Pengaturan Data Personal Admin</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Username</label>
                                <h6>{{Auth::user()->username}}</h6>
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <h6>{{ ucwords(Auth::user()->nama)}}</h6>
                            </div>
                            <div class="form-group">
                                <label>Level User</label>
                                @if (Auth::user()->level == 0)
                                <h6>Super Admin</h6>
                                @else
                                <h6>Admin</h6>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="/admin/setting/ubahpassword" class="btn btn-sm btn-danger float-right">Ubah Password</a>
                            <a href="/admin/setting/ubahdata" class="btn btn-sm btn-primary">Ubah Data Personal</a>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Waktu Pembukaan Pemilihan</label>
                                <h6>{{ date('d M Y H:i:s', $databuka[0]['inttanggal']) }}</h6>
                            </div>
                            <div class="form-group">
                                <label>Waktu Penutupan Pemilihan</label>
                                <h6>{{ date('d M Y H:i:s', $datatutup[0]['inttanggal']) }}</h6>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                @if (strtotime('now') < $datatutup[0]['inttanggal'] && strtotime('now') > $databuka[0]['inttanggal'])
                                    <h6>Buka</h6>
                                @else
                                    <h6>Tutup</h6>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer">                            
                            <a href="/admin/setting/ubahtanggal" class="btn btn-sm btn-primary">Atur Tanggal Pemilihan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection