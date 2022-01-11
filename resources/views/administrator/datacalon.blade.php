@extends('layouts.master')

@section('title')
<title>Data Calon</title>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1 class="m-0 text-dark">Data Calon</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-12">
                    <button class="btn btn-outline-danger btn-flat btn-block" data-toggle="modal" data-target="#modaltambahcalon">Tambah
                        Calon</button>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Calon</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($data_visi_misi as $data)
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">
                                                Paslon Nomor Urut {{$data->no_urut}}
                                            </h4>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-center mb-3">
                                                <img class="card-img" style="width: 70%" src="{{asset('admin/dist/img/'.$data->gambar)}}">
                                            </div>
                                            <div class="text-center">
                                                <label>Ketua : </label>{{' '.$data->ketua}}
                                                <br>
                                                <label>Wakil Ketua : </label>{{' '.$data->wakil}}
                                            </div>
                                            <h3 class="text-center mb-2">Visi</h3>
                                            <p class="text-center mb-4">{{$data->visi}}</p>
                                            <h3 class="text-center mb-2">Misi</h3>
                                            <pre style="white-space:pre-wrap; word-wrap:break-word;">{{ $data->misi }}</pre>
                                            <button class="btn btn-primary btn-block view mb-2" data-toggle="modal" data-target="#modalbio{{$data->no_urut}}">
                                                Lihat Biodata
                                            </button>
                                            @if ($jumlahsuara == 0 || $jumlahsuara == null)
                                            <a href="{{ route('hapuscalon', [$data->id]) }}" class="btn btn-danger btn-block" onclick="return confirm('Yakin Akan Menghapus Data?');">
                                                Hapus Data Calon
                                            </a>
                                            @else
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modalbio{{$data->no_urut}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Biodata</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <p>============================</p>
                                                <label>Ketua</label>
                                                <p>{{$data->ketua}}</p>
                                                <label>Nomor Induk Mahasiswa</label>
                                                <p>{{$data->nimketua}}</p>
                                                <label>Jurusan</label>
                                                <p>{{$data->jurusanketua}}</p>
                                                <label>Angkatan</label>
                                                <p>Tahun {{$data->angkatanketua}}</p>
                                                <p>============================</p>
                                                <label>Wakil Ketua</label>
                                                <p>{{$data->wakil}}</p>
                                                <label>Nomor Induk Mahasiswa</label>
                                                <p>{{$data->nimwakil}}</p>
                                                <label>Jurusan</label>
                                                <p>{{$data->jurusanwakil}}</p>
                                                <label>Angkatan</label>
                                                <p>Tahun {{$data->angkatanwakil}}</p>
                                                <p>============================</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="modaltambahcalon">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Calon</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/tambahcalon" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-12">
                            <label for="no_urut">Nomor Urut Pasangan Calon</label>
                            <input class="form-control mb-3" type="text" name="no_urut" id="no_urut" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="ketua">Nama Calon Ketua</label>
                            <input class="form-control mb-3" type="text" name="ketua" id="ketua" required>
                            <label for="nimketua">Nomor Induk Mahasiswa Calon Ketua</label>
                            <input class="form-control mb-3" type="text" name="nimketua" id="nimketua" required>
                            <label for="jurusanketua">Jurusan Calon Ketua</label>
                            <select class="form-control mb-3" name="jurusanketua" id="jurusanketua" required>
                                <option value="Teknik Informatika">Teknik Informatika (IF)</option>
                                <option value="Sistem Informasi">Sistem Informasi (SI)</option>
                                <option value="Komputer Akuntansi">Komputer Akuntansi (KA)</option>
                            </select>
                            <label for="angkatanketua">Angkatan Calon Ketua</label>
                            <input class="form-control mb-3" type="text" name="angkatanketua" id="angkatanketua" required>
                        </div>
                        <div class="col-6">
                            <label for="wakil">Nama Calon Wakil Ketua</label>
                            <input class="form-control mb-3" type="text" name="wakil" id="wakil" required>
                            <label for="nimwakil">Nomor Induk Mahasiswa Calon Wakil Ketua</label>
                            <input class="form-control mb-3" type="text" name="nimwakil" id="nimwakil" required>
                            <label for="jurusanwakil">Jurusan Calon Wakil Ketua</label>
                            <select class="form-control mb-3" name="jurusanwakil" id="jurusanwakil" required>
                                <option value="Teknik Informatika">Teknik Informatika (IF)</option>
                                <option value="Sistem Informasi">Sistem Informasi (SI)</option>
                                <option value="Komputer Akuntansi">Komputer Akuntansi (KA)</option>
                            </select>
                            <label for="angkatanwakil">Angkatan Calon Wakil Ketua</label>
                            <input class="form-control mb-3" type="text" name="angkatanwakil" id="angkatanwakil" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="visi">Visi Pasangan Calon</label>
                            <textarea class="form-control mb-3" name="visi" id="visi" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="misi">Misi Pasangan Calon</label>
                            <textarea class="form-control mb-3" name="misi" id="misi" rows="10" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="gambar">Gambar Pasangan Calon</label>
                            <input class="form-control mb-3" type="file" name="gambar" id="gambar" required>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Tambah Data">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection