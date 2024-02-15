@extends('layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h4">
            Pasien
        </h1>
    </div>
    <div class="row">
        <div class="col-lg-10 col-md-12 mx-auto">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <h6 class="card-title text-center">
                        Edit Data Pasien
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('pasien.update', $detail_pasen['id']) }}" method="POST" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama_pasien" class="form-label @error('nama_pasien') text-danger @enderror">Nama
                                Pasien</label>
                            <input type="text" name="nama_pasien"
                                class="form-control @error('nama_pasien') is-invalid @enderror" id="nama_pasien"
                                value="{{ old('nama_pasien', $detail_pasen['nama_pasien']) }}">
                            @error('nama_pasien')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label @error('alamat') text-danger @enderror">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="3"
                                placeholder="e.g Jalan dimana">{{ old('alamat', $detail_pasen['alamat']) }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="telepon"
                                class="form-label @error('telepon') text-danger @enderror">Telelpon</label>
                            <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror"
                                id="telepon" value="{{ old('telepon', $detail_pasen['telepon']) }}">
                            @error('telepon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        @php
                            $rsna = old('rumah_sakit', $detail_pasen['id_rumah_sakit']);
                        @endphp
                        <div class="mb-3">
                            <label for="rumah_sakit" class="form-label @error('rumah_sakit') text-danger @enderror">Rumah
                                Sakit</label>
                            <select name="rumah_sakit" id="rumah_sakit"
                                class="form-control @error('rumah_sakit') is-invalid @enderror">
                                <option value="">--PILIH--</option>
                                @foreach ($rs as $r)
                                    <option value="{{ $r->id }}" @if ($rsna == $r->id) selected @endif>
                                        {{ strtoupper($r->nama_rumah_sakit) }}</option>
                                @endforeach
                            </select>
                            @error('rumah_sakit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('pasien.index') }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i>
                        Kembali</a>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
