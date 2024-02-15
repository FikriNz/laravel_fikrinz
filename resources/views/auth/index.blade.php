@extends('layouts.guest')
@section('content')
    <form action="{{ route('auth') }}" method="POST" autocomplete="off">
        @csrf
        <center>
            <img class="mb-4" src="{{ asset('assets/img/bootstrap-logo.svg') }}" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        </center>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="form-floating mb-2">
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                id="username" placeholder="Username" value="{{ old('username') }}">
            <label for="username">Username</label>
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-4">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                id="password" placeholder="Password">
            <label for="password">Password</label>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
    </form>
@endsection
