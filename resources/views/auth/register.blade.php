@extends('layouts.authmaster')

@section('content')

<div class=" p-3 text-center m-auto border">
    <h1 class="text-xl fw-bolder">Register!</h1>
    <p class="text-sm fw-light mb-3">Silahkan mendaftar untuk menggunakan sistem keputusan Bakesbangpol Kota Kediri</p>
    <div class="login-form mb-2">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div>
                <input type="text" name="name" id="name" placeholder="Nama Lengkap" class="form-control @error('name') is-invalid @enderror w-75 m-auto mb-2" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div>
                <input type="text" name="username" id="username" placeholder="Username" class="form-control @error('username') is-invalid @enderror w-75 m-auto mb-2" value="{{ old('username') }}" required autocomplete="username" autofocus>
                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div>
                <input type="text" name="email" id="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror w-75 m-auto mb-2" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div>
                <input type="password" name="password" id="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror w-75 m-auto mb-2">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div>
                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Password Confirmation" class="form-control w-75 m-auto mb-4">
            </div>

            <button type="submit" class="btn btn-custom w-75 m-auto">Register</button>
        </form>
    </div>
    <div>
        <p>Sudah memiliki akun? <a href="{{ route('login') }}" class="text-decoration-none">Login</a></p>
    </div>
</div>

@endsection