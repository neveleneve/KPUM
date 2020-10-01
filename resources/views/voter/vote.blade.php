@extends('layouts.master')

@section('title')
<title>Vote Now!!!</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1 class="m-0 text-dark">Vote Now</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach ($datacalon as $data)
                <div class="col-{{12/$jumlahcalon}} col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Pasangan Calon Nomor {{$data->no_urut}}
                            </h3>
                        </div>
                        <div class="card-body">
                            <img class="card-img" src="{{asset('admin/dist/img/'.$data->gambar)}}" alt="">
                            <form action="/voter/vote" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" id="id" value="{{$data->id}}">
                                <input type="hidden" name="idpemilih" id="idpemilih" value="{{Auth::user()->id}}">
                                <button class="btn btn-primary btn-block" onclick="javascript: return confirm('Pilih Pasangan Calon Nomor Urut {{$data->no_urut}}');">PILIH</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection