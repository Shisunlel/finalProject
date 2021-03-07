<!-- THIS IS NAV -->
@section('nav')
<nav class="navbar navbar-light bg-light-shaded border-bottom px-sm-2">
    <a class="navbar-brand d-none d-sm-inline" href="/"
      ><img class="w-100" src="/img/logo.png" alt=""
    /></a>
    <div id="form-container" class="d-none d-sm-block">
      <form class="form-inline my-lg-0 justify-content-end" action="{{ route('search')}}" method="POST">
        @csrf
        <input
          id="navSearch"
          class="form-control me-sm-2 rounded"
          type="search"
          name="q"
          placeholder="Search"
          aria-label="Search"
          required
        />
      </form>
    </div>
    <div class="header__image d-sm-none">
      <img src="/img/navheader.jpg" class="w-100" alt="">
      <div class="d-flex d-md-none justify-content-center">
        <form class="form-inline d-flex w-75" action="{{ route('search')}}" method="POST">
          @csrf
          <input
            id="smallNavSearch"
            class="form-control me-sm-2 rounded"
            type="search"
            name="q"
            placeholder="Search"
            aria-label="Search"
            required
          />
          <span id="nav_search_btn"
                      ><button id="search__btn" type="submit" class="text-dark" href="{{ route('search') }}"
                        ><i class="fas fa-search"></i></button
                    ></span>
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
        @endguest
        @auth
        <img
        class="w-100"
        src="
        @if (Str::length(auth()->user()->profile) > 11)
            {{ auth()->user()->profile }}
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
      <ul class="navbar-nav ml-auto">
        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{route('register')}}">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">Login</a>
        </li>
        <hr width="100%" style="background: rgba(255, 255, 255, 0.5); margin:5px 0" />
        @endguest
        @auth
        <li class="nav-item">
          <span class="navbar-text" style="color:#111;"
            >Welcome, {{auth()->user()->username}}</span
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('room.new')}}">Become a host</a>
        </li>
        @endauth
        <li class="nav-item">
          <a class="nav-link" href="/help">Help</a>
        </li>
        @auth
        <hr width="100%" style="background: rgba(255, 255, 255, 0.5); margin:5px 0" />
        <li class="nav-item">
          <form id="logoutForm" action="{{route('logout')}}" method="POST">
            @csrf
            <a class="nav-link" href="javascript:{}" onclick="document.getElementById('logoutForm').submit();">Logout</a>
          </form>
        </li>
        @endauth
      </ul>
    </div>
  </nav>
@endsection