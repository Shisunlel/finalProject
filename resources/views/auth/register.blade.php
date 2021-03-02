@extends('layouts/default') @section('style')
<link rel="stylesheet" href="/css/auth/register.css" />
@endsection @section('content')
<div class="main">
    <div class="logo__md d-none d-md-block">

    </div>
    <div class="image__placeholder d-none d-md-block">
        
    </div>
    <div class="register-form p-3 p-md-5">
        <h1 class="text-center mb-5 text-uppercase text-success" id="register-header">Register</h1>
        <form action="{{ route('register') }}" id="register__form" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6 mb-3 md-mb-0"><div class="form-floating">
                    <input
                        type="text"
                        class="form-control  @error('firstname') border-danger @enderror"
                        id="firstname"
                        name="firstname"
                        placeholder="John"
                        value="{{ old('firstname') }}"
                    />
                    <label for="firstname">First Name</label>
                </div>
            
                @error('firstname')
                <div class="text-danger">
                {{ $message}}
            </div>
            @enderror

        </div>
                <div class="col-12 col-md-6"><div class="form-floating">
                    <input
                        type="text"
                        class="form-control @error('lastname') border-danger
                    @enderror"
                        id="lastname"
                        name="lastname"
                        placeholder="Doe"
                        value="{{ old('lastname') }}"
                    />
                    <label for="lastname">Last Name</label>
                </div>
                @error('lastname')
                <div class="text-danger">
                {{ $message}}
            </div>
            @enderror
            </div>
            </div>
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
                <label for="email">Email address</label>
            </div>
            @error('email')
                <div class="text-danger">
                {{ $message}}
            </div>
            @enderror
        </div>
        <div class="holder">
            <div class="form-floating">
                <input
                    type="username"
                    class="form-control @error('username') border-danger @enderror"
                    id="username"
                    name="username"
                    placeholder="username"
                    value="{{ old('username') }}"
                />
                <label for="username">Username</label>
            </div>
            @error('username')
                <div class="text-danger">
                {{ $message}}
            </div>
            @enderror
        </div>
        <div class="holder">
            <div class="form-floating">
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
                {{ $message}}
            </div>
            @enderror
        </div>
            <div class="holder">
            <div class="form-floating">
                <input
                    type="password"
                    class="form-control @error('password_confirmation') border-danger @enderror"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="********"
                />
                <label for="password_confirmation">Reenter Password</label>
            </div>
            @error('password_confirmation')
                <div class="text-danger">
                {{ $message}}
            </div>
            @enderror
        </div>
            <div class="form-text text-end">
                <a id="login__link" href="/login">Already a member?</a>
            </div>
            <button type="submit" id="registerBtn" class="btn form-control mt-3 rounded-pill">Register</button>
        </form>
    </div>
</div>
@endsection
