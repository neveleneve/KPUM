@extends('layouts.master')

@section('title')
<title>Data Pemilih</title>
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
                    <form action="/tambahtoken" method="post">
                        {{ csrf_field() }}
                        <input type="submit" value="Tambah Token Pemilih" class="btn btn-outline-danger btn-flat btn-block">
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-danger">
                            <tr>
                                <th>Token ID</th>
                                <th>Status</th>
                                <th>Waktu Pemilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_pemilih as $item)
                            <tr>
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
@endsection