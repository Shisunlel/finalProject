<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Custom Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
            href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&family=Poppins:wght@300;400;600&family=Akaya+Telivigala&family=RocknRoll+One&family=Oswald&display=swap"
            rel="stylesheet"
        />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/auth/register.css" />
    <title>Login</title>
</head>
<body>
<div class="main" id="login__main">
    <div class="logo__md d-none d-md-block"></div>
    <div class="image__placeholder d-none d-md-block"></div>
    <div class="register-form p-3 p-md-5">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show w-100 m-0" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show w-100 m-0" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <h1
            class="text-center mb-5 text-uppercase text-success"
            id="register-header"
        >
            Login
        </h1>      
        <form
            action="{{ route('login.store') }}"
            id="login__form"
            method="POST"
        >
            @csrf
            <div class="holder">
                <div class="form-floating">
                    <input
                        type="username"
                        class="form-control @error('username') border-danger @enderror"
                        id="username"
                        name="username"
                        placeholder="johndoe"
                        value="{{ old('username') }}"
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
            
            <div class="row mb-2">
                <div class="col-6">
                    <div class="form-text text-start">
                        <a id="login__link" href="{{route('register.index')}}">New here?</a>
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="form-text text-end">
                        <a id="forget__password" href="#">Forget Password?</a>
                    </div>
                </div>
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
<script src="/js/auth/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script>
const toast = document.querySelector(".toast");
const init = new bootstrap.Toast(toast);
//toast appear
if (toast) {
    init.show();
}
    
</script>
</body>
</html>