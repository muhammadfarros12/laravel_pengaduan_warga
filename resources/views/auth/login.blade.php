@extends('layouts.base-auth')

@section('title', 'Login')

@section('content')
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="#">
                    <img src="{{ asset('images/adu.png') }}" alt="Logo" class="img-fluid" style="width: 160px; height: auto;">
                </a>
            </div>
            <h1 class="auth-title">Log in.</h1>
            <p class="auth-subtitle mb-5">
                Log in with your data that we give you.
            </p>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input id="email" name="email" type="email"
                        class="form-control form-control-xl
                        @error('email')
                        is-invalid
                        @enderror"
                        placeholder="Email">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>

                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input id="password" name="password" type="password" class="form-control @error('password') is-invalid
                    @enderror form-control-xl" placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg">Log in</button>
            </form>

            {{-- <div class="text-center mt-5 text-lg fs-4">
                <p class="text-gray-600">
                    Don't have an account? <a href="#" class="font-bold">Sign up</a>.
                </p>
                <p>
                    <a href="#" class="font-bold">Forgot password?</a>.
                </p>
            </div> --}}
        </div>
    </div>

    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right"></div>
    </div>
@endsection
