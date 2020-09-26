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
                    <h1 class="m-0 text-dark">Data Administrator</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card">
                        <form action="/admin/administrator/update" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" id="id" name="id" value="{{$dataadmin[0]->id}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input class="form-control" type="text" name="nama" id="nama"
                                                value="{{$dataadmin[0]->nama}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input class="form-control" type="text" name="username" id="username"
                                                value="{{$dataadmin[0]->username}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="level">Level</label>
                                            <select class="form-control" name="level" id="level">
                                                <option value="0" {{$dataadmin[0]->level == 0 ? 'selected' : ''}}>Super
                                                    Admin</option>
                                                <option value="1" {{$dataadmin[0]->level == 1 ? 'selected' : ''}}>Admin
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="password">Ubah Password</label>
                                            <input class="form-control" type="password" name="password" id="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="level">Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option value="0" {{$dataadmin[0]->status == 0 ? 'selected' : ''}}>Tidak
                                                    Aktif</option>
                                                <option value="1" {{$dataadmin[0]->status == 1 ? 'selected' : ''}}>Aktif
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-6">
                                        <a class="btn btn-danger btn-block" href="/admin/administrator">Kembali</a>
                                    </div>
                                    <div class="col-6">
                                        <input class="btn btn-primary btn-block" type="submit" value="Ubah Data">
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