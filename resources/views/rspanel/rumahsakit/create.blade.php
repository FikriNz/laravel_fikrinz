@extends('layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h4">
            Rumah Sakit
        </h1>
    </div>
    <div class="row">
        <div class="col-lg-10 col-md-12 mx-auto">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <h6 class="card-title text-center">
                        Tambah Data Rumah Sakit
                    </h6>
                </div>
                <form action="{{ route('rumah-sakit.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nama_rumahsakit"
                                class="form-label @error('nama_rumahsakit') text-danger @enderror">Nama
                                Rumah
                                Sakit</label>
                            <input type="text" name="nama_rumahsakit"
                                class="form-control @error('nama_rumahsakit') is-invalid @enderror" id="nama_rumahsakit"
                                value="{{ old('nama_rumahsakit') }}" placeholder="e.g RS.Fulan bin Fulan">
                            @error('nama_rumahsakit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label @error('alamat') text-danger @enderror">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="3"
                                placeholder="e.g Jalan dimana">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label @error('email') text-danger @enderror">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                id="email" placeholder="e.g email@gmail.com" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="telepon"
                                class="form-label @error('telepon') text-danger @enderror">Telelpon</label>
                            <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror"
                                id="telepon" placeholder="e.g 08222" value="{{ old('telepon') }}">
                            @error('telepon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('rumah-sakit.index') }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i>
                            Kembali</a>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
