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
                        Edit Data Rumah Sakit
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('rumah-sakit.update', $data_rs['id']) }}" method="POST" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama_rsedit" class="form-label @error('nama_rsedit') text-danger @enderror">Nama
                                Rumah Sakit</label>
                            <input type="text" name="nama_rsedit"
                                class="form-control @error('nama_rsedit') is-invalid @enderror" id="nama_rsedit"
                                value="{{ old('nama_rsedit', $data_rs['nama_rumah_sakit']) }}">
                            @error('nama_rsedit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat_edit"
                                class="form-label @error('alamat_edit') text-danger @enderror">Alamat</label>
                            <textarea class="form-control @error('alamat_edit') is-invalid @enderror" name="alamat_edit" id="alamat_edit"
                                rows="3" placeholder="e.g Jalan dimana">{{ old('alamat_edit', $data_rs['alamat']) }}</textarea>
                            @error('alamat_edit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email_edit"
                                class="form-label @error('email_edit') text-danger @enderror">Email</label>
                            <input type="email_edit" class="form-control @error('email_edit') is-invalid @enderror"
                                name="email_edit" id="email_edit" value="{{ old('email_edit', $data_rs['email']) }}">
                            @error('email_edit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tlp_edit"
                                class="form-label @error('tlp_edit') text-danger @enderror">Telelpon</label>
                            <input type="text" name="tlp_edit"
                                class="form-control @error('tlp_edit') is-invalid @enderror" id="tlp_edit"
                                value="{{ old('tlp_edit', $data_rs['telepon']) }}">
                            @error('tlp_edit')
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
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
