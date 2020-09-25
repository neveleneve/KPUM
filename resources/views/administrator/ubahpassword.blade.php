@extends('layouts.master')

@section('title')
<title>Ubah Password</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1 class="m-0 text-dark">Ubah Password</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card">
                        <form action="/ubahpassword" method="POST">
                            {{ csrf_field() }}
                            <div class="card-body">
                                @if (session('info'))
                                <div class="alert alert-{{session('warna')}}" role="alert">
                                    {{session('info')}}
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="passwordlama">Password Lama</label>
                                    <input type="password" name="passwordlama" id="passwordlama" class="form-control"
                                        placeholder="Password Lama" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label for="passwordbaru">Password Baru</label>
                                    <input type="password" name="passwordbaru" id="passwordbaru" class="form-control"
                                        placeholder="Password Baru" required>
                                </div>
                                <div class="form-group">
                                    <label for="passwordbarukonfirm">Konfirmasi Password Baru</label>
                                    <input type="password" name="passwordbarukonfirm" id="passwordbarukonfirm"
                                        class="form-control" placeholder="Konfirmasi Password Baru" required>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="form-group">
                                    <input type="hidden" name="username" id="username"
                                        value="{{Auth::user()->username}}">
                                        <div class="row">
                                            <div class="col-6">
                                                <a href="/admin/setting" class="btn btn-sm btn-danger btn-block">Kembali</a>
                                            </div>
                                            <div class="col-6">
                                                <input type="submit" class="btn btn-sm btn-primary btn-block">
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection