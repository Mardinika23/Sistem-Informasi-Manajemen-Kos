@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #fcf9ffff 0%, #c1cde1ff 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Segoe UI', sans-serif;
    }
    .login-card {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        padding: 40px 30px;
        width: 100%;
        max-width: 420px;
        animation: fadeIn 0.7s ease-in-out;
    }
    .login-logo {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }
    /* Logo sakura */
    .login-logo img {
        width: 100px;
        height: auto;
        border-radius: 50%; /* membuat logo bulat, hapus jika ingin persegi */
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }
    .login-title {
        font-weight: bold;
        text-align: center;
        color: #2575fc;
        margin-bottom: 25px;
    }
    .btn-login {
        background: #2575fc;
        border: none;
        width: 100%;
        padding: 10px;
        font-weight: 600;
        border-radius: 8px;
        transition: 0.3s;
    }
    .btn-login:hover {
        background: #1b5ed7;
    }
    .form-label {
        font-weight: 500;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-20px);}
        to { opacity: 1; transform: translateY(0);}
    }
</style>

<div class="login-card">
    {{-- Logo Sakura --}}
    <div class="login-logo">
        <img src="{{ asset('images/sakura.jpg') }}" alt="Logo Sakura">
    </div>

    {{-- Judul --}}
    <h3 class="login-title">Admin Manajemen Kost</h3>

    {{-- Form Login --}}
    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Email --}}
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input id="email" type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password"
                   class="form-control @error('password') is-invalid @enderror"
                   name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        {{-- Remember Me --}}
        <div class="mb-3 form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                   {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">Remember Me</label>
        </div>

        {{-- Button Login --}}
        <div class="mb-3">
            <button type="submit" class="btn btn-login text-white">
                Login
            </button>
        </div>

        {{-- Lupa Password --}}
        @if (Route::has('password.request'))
            <div class="text-center">
                <a class="text-decoration-none" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
            </div>
        @endif
    </form>
</div>
@endsection
