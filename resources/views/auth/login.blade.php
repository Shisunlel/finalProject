@extends('layouts/default') @section('style')
<link rel="stylesheet" href="/css/auth/register.css" />
@endsection @section('content')
@if (session('error'))
  <div class="alert alert-danger alert-dismissible fade show w-100 m-0" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<div class="main" id="login__main">
    <div class="logo__md d-none d-md-block"></div>
    <div class="image__placeholder d-none d-md-block"></div>
    <div class="register-form p-3 p-md-5">
        <h1
            class="text-center mb-5 text-uppercase text-success"
            id="register-header"
        >
            Login
        </h1>      

        
        <form
            action="{{ route('login') }}"
            id="login__form"
            method="POST"
        >
            @csrf
            
            <div class="holder">
                <div class="form-floating">
                    <input
                        type="email"
                        class="form-control @error('email') border-danger @enderror"
                        id="email"
                        name="email"
                        placeholder="name@example.com"
                        value="{{ old('email') }}"
                    />
                    <label for="email">Email address or Username</label>
                </div>
                @error('email')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            
            <div class="m-5"></div>

            <div class="holder">
                <div class="form-floating ">
                    <input
                        type="password"
                        class="form-control @error('password') border-danger @enderror"
                        id="password"
                        name="password"
                        placeholder="********"
                    />
                    <label for="password">Password</label>
                </div>
                @error('password')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            
            
            <div class="form-text text-end">
                <a id="login__link" href="/login">Forgot Password?</a>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>

            <div class="m-5"></div>

            <button
                type="submit"
                id="registerBtn"
                class="btn form-control mt-3 rounded-pill"
            >
                Login
            </button>
        </form>
    </div>
</div>
@endsection
