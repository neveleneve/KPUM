@extends('layouts.master')

@section('title')
<title>Administrator</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1 class="m-0 text-dark">Administrator</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            @if (Auth::user()->level == 0)
            <div class="row mb-3">
                <div class="col-12">
                    <button class="btn btn-outline-danger btn-flat btn-block" data-toggle="modal" data-target="#modaltambahadmin">
                        Tambah Data Admin
                    </button>
                </div>
            </div>
            @else

            @endif
            <div class="row mb-3">
                <div class="col-12">
                    <table class="table table-hover table-bordered">
                        <thead class="bg-danger text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Admin</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @foreach ($dataadmin as $item)
                            <tr>
                                <td class="text-center">{{$no++}}</td>
                                <td class="text-center">{{ucwords( $item->nama)}}</td>
                                <td class="text-center">{{$item->username}}</td>
                                <td class="text-center">
                                    @if ($item->level == 0)
                                    Super Admin
                                    @else
                                    Admin
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if (Auth::user()->username == $item->username)
                                    <a href="/admin/setting" class="btn btn-sm btn-outline-warning">
                                        <i class="fa fas fa-spin fa-cog text-dark"></i>
                                    </a>
                                    @else
                                    @if ($item->level == 0)

                                    @else
                                    <a class="btn btn-sm btn-outline-primary"
                                        href="/admin/administrator/view/{{$item->username}}" title="Lihat Data">
                                        <i class="fa fas fa-eye text-dark"></i>
                                    </a>
                                    @if ($item->level == Auth::user()->level)

                                    @else
                                    <a class="btn btn-sm btn-outline-danger" title="Hapus Data Data" onclick="return confirm('Hapus Data Admin?')" href="/admin/administrator/hapusadmin/{{$item->id}}">
                                        <i class="fa fas fa-trash text-dark"></i>
                                    </a>
                                    @endif
                                    @endif
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="float-right">
                        {{ $dataadmin->render("pagination::bootstrap-4") }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="modaltambahadmin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Admin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <form action="/tambahadmin" method="POST">
                    {{ csrf_field() }}
                    <input class="form-control mb-3" type="text" placeholder="Nama Lengkap" id="nama" name="nama"
                        required>
                    <input class="form-control mb-3" type="text" placeholder="Username" id="username" name="username"
                        required>
                    <div class="row">
                        <div class="col-6">
                            <a class="btn btn-sm btn-danger btn-block text-light" data-dismiss="modal">Kembali</a>
                        </div>
                        <div class="col-6">
                            <input type="submit" class="btn btn-sm btn-primary btn-block" value="Tambah Data Admin">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection