<!-- THIS IS NAV -->
@section('nav')
<nav class="navbar navbar-light bg-light-shaded border-bottom px-sm-2">
    <a class="navbar-brand d-none d-sm-inline" href="/"
        ><img class="w-100" src="/img/logo.png" alt=""
    /></a>
    <div id="form-container" class="d-none d-sm-block">
        <form
            class="form-inline my-lg-0 d-flex justify-content-center"
            action="{{ route('search') }}"
        >
            <input
                id="navSearch"
                class="form-control me-sm-2 rounded"
                type="search"
                name="location"
                placeholder="Search"
                aria-label="Search"
            />
            <button
                type="button"
                class="btn btn-light ms-1"
                data-bs-toggle="modal"
                data-bs-target="#filter"
            >
                <i class="fas fa-sliders-h"></i>
            </button>
            <!-- button for drop down -->
            <!-- Modal -->
            <div
                class="modal fade"
                id="filter"
                tabindex="-1"
                aria-labelledby="#filterLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-gradient bg-white text-dark">
                        <div class="modal-header">
                            <h5 class="modal-title" id="#filterLabel">
                                How many people will be staying ?
                            </h5>
                        </div>
                        <div class="modal-body">
                            <input
                                type="range"
                                name="guest"
                                class="form-range"
                                value="@if(isset($guest)) {{ $guest}} @else 1 @endif"
                                step="1"
                                min="1"
                                max="9"
                                id="guest"
                            />
                            <label
                                for="guest"
                                id="slider__indicator"
                                class="form-label"
                            ></label>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-primary"
                                data-bs-dismiss="modal"
                            >
                                Save changes
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="header__image d-sm-none">
        <img src="/img/navheader.webp" loading="lazy" class="w-100" alt="" />
        <div class="d-flex d-md-none justify-content-center">
            <form
                class="form-inline w-75"
                action="{{ route('search') }}"
            >
            <div class="d-flex">
                <input
                    id="smallNavSearch"
                    class="form-control me-sm-2 rounded"
                    type="search"
                    name="location"
                    placeholder="Search"
                    aria-label="Search"
                />
                <span id="nav_search_btn"
                    ><button
                        id="search__btn"
                        type="submit"
                        class="text-dark"
                        href="{{ route('search') }}"
                    >
                        <i class="fas fa-search"></i></button
                ></span>
            </div>    
                <div class="">
                    <input
                    type="range"
                    name="guest"
                    class="form-range"
                    value="@if (isset($guest)) {{ $guest}} @else 1 @endif"
                    step="1"
                    min="1"
                    max="9"
                    id="guest_sm"
                />
                <label
                                for="guest"
                                id="slider__indicator_sm"
                                class="form-label w-100 text-center"
                            ></label>
            </div>
            </form>
        </div>
    </div>
    <button
        class="navbar-toggler d-none d-lg-block rounded"
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
            @endguest @auth
            <img
                class="w-100"
                src="
            @if (Str::length(auth()->user()->profile) > 11)
                {{ '/img/user/' . auth()->id() . '/profile/' . auth()->user()->profile }}
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
        <ul class="navbar-nav ms-auto">
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
