@extends('layouts.authmaster')

@section('content')
<div class=" p-3 text-center m-auto border">
    <h1 class="text-xl fw-bolder">Selamat Datang!</h1>
    <h4 class="text-sm fw-light">Sistem ini milik Bakesbangpol Kota Kediri.</h4>
    <p class="text-sm fw-light mb-3">Silahkan login dengan akun anda.</p>
    <div class="mb-3">
        <img src="{{asset('img/logo_kediri.svg')}}" alt="" style="width: 100px;">
    </div>
    <div class="login-form mb-2">
        <form action="{{route('login')}}" method="POST">
            @csrf
            <div>
                <input type="text" name="email" id="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror w-75 m-auto mb-2">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div>
                <input type="password" name="password" id="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror w-75 m-auto mb-4">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button class="btn btn-custom w-75 m-auto">Login</button>
        </form>
    </div>
    <div>
        <p>Belum memiliki akun? <a href="{{ route('register') }}" class="text-decoration-none">Daftar</a></p>
    </div>
</div>
@endsection