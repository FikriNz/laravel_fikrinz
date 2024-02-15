@extends('layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h4">
            Rumah Sakit
        </h1>
        <a href="{{ route('rumah-sakit.index') }}" class="btn btn-sm btn-dark"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
    <div class="row">
        <div class="col-lg-10 col-md-12 mx-auto">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <h6 class="card-title text-center">
                        Detail Data Rumah Sakit
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2 col-md-12">
                            <strong>ID</strong>
                            <p class="text-muted">{{ $detail['id'] }}</p>
                            <hr>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <strong>Nama Rumah Sakit</strong>
                            <p class="text-muted">{{ $detail['nama_rumah_sakit'] }}</p>
                            <hr>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <strong>Email</strong>
                            <p class="text-muted">{{ $detail['email'] }}</p>
                            <hr>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <strong>Telepon</strong>
                            <p class="text-muted">{{ $detail['telepon'] }}</p>
                            <hr>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <strong>Alamat</strong>
                            <p class="text-muted">{{ $detail['alamat'] }}</p>
                            <hr>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <strong>Created At</strong>
                            <p class="text-muted">{{ $detail['created_at'] }}</p>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
