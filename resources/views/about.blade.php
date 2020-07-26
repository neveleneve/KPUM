@extends('layouts.master')
@section('title')
<title>Tentang Kami</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1 class="m-0 text-dark">Tentang Kami</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="login-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Login</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/voterloginproses" method="post">
                    {{ csrf_field() }}
                    <input class="form-control mb-3" type="text" name="tokenid" id="tokenid" placeholder="ID Token">
                    <button type="submit" class="btn btn-block btn-primary">Masuk</button>
                    <a class="btn btn-block btn-danger" href="/adminlogin">Admin Login</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
