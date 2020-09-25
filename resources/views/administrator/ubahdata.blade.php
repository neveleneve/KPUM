@extends('layouts.master')

@section('title')
<title>Ubah Data</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1 class="m-0 text-dark">Ubah Data</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card">
                        <form action="/ubahdata" method="POST">
                            {{ csrf_field() }}
                            <div class="card-body">
                                @if (session('info'))
                                <div class="alert alert-{{session('warna')}}" role="alert">
                                    {{session('info')}}
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="namalengkap">Nama Lengkap</label>
                                    <input type="text" name="namalengkap" id="namalengkap" class="form-control"
                                        placeholder="Nama Lengkap" value="{{ucwords(Auth::user()->nama)}}" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="username" name="usernamebaru" id="usernamebaru" class="form-control"
                                        placeholder="Username" value="{{Auth::user()->username}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Konfirmasi Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Konfirmasi Password" required>
                                </div>
                                <input type="hidden" value="{{Auth::user()->id}}" id="iduser" name="iduser">
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