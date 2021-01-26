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
                    <button class="btn btn-outline-danger btn-flat btn-block" data-toggle="modal"
                        data-target="#modaltambahcalon">Tambah
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
                                                <img class="card-img" style="width: 70%"
                                                    src="{{asset('admin/dist/img/'.$data->gambar)}}">
                                            </div>
                                            <div class="text-center">
                                                <label>Ketua : </label>{{' '.$data->ketua}}
                                                <br>
                                                <label>Wakil Ketua : </label>{{' '.$data->wakil}}
                                            </div>
                                            <h3 class="text-center mb-2">Visi</h3>
                                            <p class="text-center mb-4">{{$data->visi}}</p>
                                            <h3 class="text-center mb-2">Misi</h3>
                                            <pre class="text-center"><h5>{{$data->misi}}</h5></pre>
                                            <button class="btn btn-primary btn-block view mb-2" data-toggle="modal"
                                                data-target="#modalbio{{$data->no_urut}}">
                                                Lihat Biodata
                                            </button>
                                            @if ($jumlahsuara == 0 || $jumlahsuara == null)
                                            <a href="{{ route('hapuscalon', [$data->id]) }}"
                                                class="btn btn-danger btn-block"
                                                onclick="return confirm('Yakin Akan Menghapus Data?');">
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
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Calon</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <form action="/tambahcalon" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input class="form-control mb-3" type="text" name="no_urut" id="no_urut" placeholder="Nomor Urut" required>
                    <input class="form-control mb-3" type="text" name="ketua" id="ketua" placeholder="Nama Ketua" required>
                    <input class="form-control mb-3" type="text" name="nimketua" id="nimketua"
                        placeholder="Nomor Induk Mahasiswa" required>
                    <select class="form-control mb-3" name="jurusanketua" id="jurusanketua" required>
                        <option disabled selected>Jurusan Ketua</option>
                        <option value="Teknik Informatika">Teknik Informatika (IF)</option>
                        <option value="Sistem Informasi">Sistem Informasi (SI)</option>
                        <option value="Komputer Akuntansi">Komputer Akuntansi (KA)</option>
                    </select>
                    <input class="form-control mb-3" type="text" name="angkatanketua" id="angkatanketua"
                        placeholder="Angkatan Ketua" required>
                    <p>==========================================================</p>
                    <input class="form-control mb-3" type="text" name="wakil" id="wakil" placeholder="Nama Wakil Ketua" required>
                    <input class="form-control mb-3" type="text" name="nimwakil" id="nimwakil"
                        placeholder="Nomor Induk Mahasiswa" required>
                    <select class="form-control mb-3" name="jurusanwakil" id="jurusanwakil" required>
                        <option disabled selected>Jurusan Wakil</option>
                        <option value="Teknik Informatika">Teknik Informatika (IF)</option>
                        <option value="Sistem Informasi">Sistem Informasi (SI)</option>
                        <option value="Komputer Akuntansi">Komputer Akuntansi (KA)</option>
                    </select>
                    <input class="form-control mb-3" type="text" name="angkatanwakil" id="angkatanwakil"
                        placeholder="Angkatan Wakil Ketua" required>
                    <p>==========================================================</p>
                    <textarea class="form-control mb-3" name="visi" id="visi" rows="5" placeholder="Visi" required></textarea>
                    <textarea class="form-control mb-3" name="misi" id="misi" rows="10" placeholder="Misi" required></textarea>
                    <p>==========================================================</p>
                    <input class="form-control mb-3" type="file" name="gambar" id="gambar"
                        placeholder="Gambar Pasangan Calon" required>
                    <input type="submit" class="btn btn-primary btn-block" value="Tambah Data">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection