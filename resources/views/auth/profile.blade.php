@extends('/layouts.default') 
@include('/partials.navwithoutsearch') 
@section('style')
<link rel="stylesheet" href="/css/profile.css" />
@endsection 
@section('content')
@if (session('error'))
<div>
    {{session('error')}}
</div>
@endif
<div class="container-fluid">
    <div class="row mt-2">
    @include('/partials.side')
    <div class="col-10 col-md-6" id="editable__info">
        <h2 class="fw-bold my-3">Personal Info</h2>
        <section id="realname__section">
            <div class="info__container">
                <h6 class="fw-bold">Full Name</h6>
                <p>{{auth()->user()->firstname . '   ' . auth()->user()->lastname }}</p>
            </div>
            <div class="info__container hidden">
                <h6 class="fw-bold">Full Name</h6>
                <form class="row g-3" action="{{route('profile.update', auth()->user())}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="col-md-6">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" value="{{auth()->user()->firstname}}">
                        @error('firstname')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                      </div>
                      <div class="col-md-6">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="{{auth()->user()->lastname}}">
                        @error('lastname')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                      </div>
                      <div class="col-md-2 ms-auto">
                      <button class="btn-success btn-sm">Submit</button>
                    </div>
                </form>
            </div>
            <div class="action__link">
                <a type="button">Edit</a>
            </div>
        </section>
        <section id="username__section">
            <div class="info__container">
                <h6 class="fw-bold">Username</h6>
                <p>{{auth()->user()->username}}</p>
            </div>
            <div class="info__container hidden">
                <h6 class="fw-bold">Username</h6>
                <form class="row g-3" action="{{route('profile.update', auth()->user())}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{auth()->user()->username}}">
                        @error('username')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                      </div>
                      <div class="col-md-2 ms-auto">
                      <button class="btn-success btn-sm">Submit</button>
                    </div>
                </form>
            </div>
            <div class="action__link">
                <a type="button">Edit</a>
            </div>
        </section>
        <section id="email__section">
            <div class="info__container">
                <h6 class="fw-bold">Email Address</h6>
                <p>{{auth()->user()->email}}</p>
            </div>
            <div class="info__container hidden">
                <h6 class="fw-bold">Email Address</h6>
                <form class="row g-3" action="{{route('profile.update', auth()->user())}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{auth()->user()->email}}">
                        @error('email')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                      </div>
                      <div class="col-md-2 ms-auto">
                      <button class="btn-success btn-sm">Submit</button>
                    </div>
                </form>
            </div>
            <div class="action__link">
                <a type="button">Edit</a>
            </div>
        </section>
        <section id="date__section">
            <div class="info__container">
                <h6 class="fw-bold">Date of birth</h6>
                <p>{{auth()->user()->dob}}</p>
            </div>
            <div class="info__container hidden">
                <h6 class="fw-bold">Date of birth</h6>
                <form class="row g-3" action="{{route('profile.update', auth()->user())}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <label for="dob" class="form-label">Date of birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="{{auth()->user()->dob}}">
                        @error('dob')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                      </div>
                      <div class="col-md-2 ms-auto">
                      <button class="btn-success btn-sm">Submit</button>
                    </div>
                </form>
            </div>
            <div class="action__link">
                <a type="button">Edit</a>
            </div>
        </section>
        <section id="phone__section">
            <div class="info__container">
                <h6 class="fw-bold">Phone Number</h6>
                <p>{{auth()->user()->phone_number}}</p>
            </div>
            <div class="info__container hidden">
                <h6 class="fw-bold">Phone Number</h6>
                <form class="row g-3" action="{{route('profile.update', auth()->user())}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{auth()->user()->phone_number}}">
                        @error('phone')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                      </div>
                      <div class="col-md-2 ms-auto">
                      <button class="btn-success btn-sm">Submit</button>
                    </div>
                </form>
            </div>
            <div class="action__link">
                <a type="button">Edit</a>
            </div>
        </section>
        <section id="idcard__section">
            <div class="info__container">
                <h6 class="fw-bold">Identification Card</h6>
                <img src="/img/user/{{ auth()->id() . '/id_card/' . auth()->user()->id_card}}" alt="" width="100%" height="100px">
            </div>
            <div class="info__container hidden">
                <h6 class="fw-bold">Identification Card</h6>
                <form class="row g-3" action="{{route('profile.update', auth()->user())}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <label for="idcard" class="form-label">Identification Card</label>
                        <input type="file" class="form-control" id="idcard" name="idcard" accept=".png, .jpeg, .jpg, .svg, .webp">
                        @error('idcard')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                      </div>
                      <div class="col-md-2 ms-auto">
                      <button class="btn-success btn-sm">Submit</button>
                    </div>
                </form>
            </div>
            <div class="action__link">
                <a type="button">Edit</a>
            </div>
        </section>
        <section id="password__section">
            <div class="info__container">
                <h6 class="fw-bold">Password</h6>
                <p>********</p>
            </div>
            <div class="info__container hidden">
                <h6 class="fw-bold">Password</h6>
                <form class="row g-3" action="{{route('profile.update', auth()->user())}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="********">
                        @error('password')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                      </div>
                      <div class="col-md-2 ms-auto">
                      <button class="btn-success btn-sm">Submit</button>
                    </div>
                </form>
            </div>
            <div class="action__link">
                <a type="button">Edit</a>
            </div>
        </section>
        <section id="profile__section">
            <div class="info__container">
                <h6 class="fw-bold">Profile</h6>
                <img src="{{ 'img/user/' . auth()->id() . '/profile/' . auth()->user()->profile}}" alt="">
            </div>
            <div class="info__container hidden">
                <h6 class="fw-bold">Profile</h6>
                <form class="row g-3" action="{{route('profile.update', auth()->user())}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <label for="profile" class="form-label">Profile</label>
                        <input type="file" class="form-control" id="profile" name="profile" accept=".png, .jpeg, .jpg, .svg, .webp">
                        @error('profile')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                      </div>
                      <div class="col-md-2 ms-auto">
                      <button class="btn-success btn-sm">Submit</button>
                    </div>
                </form>
            </div>
            <div class="action__link">
                <a type="button">Edit</a>
            </div>
        </section>
    </div>
    <div class="col-0 col-md-4"></div>
</div>
</div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="/js/auth/profile.js"></script>
@endsection