<!-- THIS IS NAV -->
@section('nav')
<nav class="navbar navbar-light navbar-expand-md bg-light-shaded border-bottom px-2">
    <a class="navbar-brand" href="/"
        ><img class="w-100" src="/img/logo.png" alt=""
    /></a>
    <button
        class="navbar-toggler rounded"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
    >
        <span class="navbar-toggler-icon"></span>
        <span id="navProfile">
            @guest
            <img
                class="w-100"
                src="https://icon-library.com/images/no-user-image-icon/no-user-image-icon-26.jpg"
                alt=""
            />
            @endguest 
            @auth
            <img
                class="w-100"
                src="
        @if (Str::length(auth()->user()->profile) > 11)
            {{ 'img/user/' . auth()->id() . '/profile/' . auth()->user()->profile }}
        @else
            {{ '/img/'.auth()->user()->profile }}
        @endif
        "
                alt="profile.picture"
            />
            @endauth
        </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav align-items-center ms-auto">
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register.index') }}">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login.index') }}">Login</a>
            </li>
            <hr
                width="100%"
                style="background: rgba(255, 255, 255, 0.5); margin: 5px 0"
            />
            @endguest @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile') }}"
                    >Profile</a
                >
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('rooms.create') }}"
                    >Become a host</a
                >
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('saved.index') }}"
                    >Saved</a
                >
            </li>
            @endauth
            <li class="nav-item">
                <a class="nav-link" href="/help">Help</a>
            </li>
            @auth
            <hr
                width="100%"
                style="background: rgba(255, 255, 255, 0.5); margin: 5px 0"
            />
            <li class="nav-item">
                <form
                    id="logoutForm"
                    action="{{ route('logout') }}"
                    method="POST"
                >
                    @csrf
                    <a
                        class="nav-link"
                        href="javascript:{}"
                        onclick="document.getElementById('logoutForm').submit();"
                        >Logout</a
                    >
                </form>
            </li>
            @endauth
        </ul>
    </div>
</nav>
@endsection
