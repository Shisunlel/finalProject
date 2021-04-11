@extends('/layouts.default') 
@include('/partials.navwithoutsearch') 
@section('style')
<link rel="stylesheet" href="/css/profile.css" />
@endsection 
@section('content')
@if (session('success'))
        <div
            class="toast align-items-center text-white bg-success bg-gradient border-0"
            role="alert"
            aria-live="assertive"
            aria-atomic="true"
            data-bs-autohide="true"
            data-bs-animation="true"
            data-bs-delay="2000"
        >
            <div class="d-flex">
                <div class="toast-body">
                    {{ session("success") }}
                </div>
            </div>
        </div>
@endif
@if (session('error'))
        <div
            class="toast align-items-center text-white bg-danger bg-gradient border-0"
            role="alert"
            aria-live="assertive"
            aria-atomic="true"
            data-bs-autohide="true"
            data-bs-animation="true"
            data-bs-delay="2000"
        >
            <div class="d-flex">
                <div class="toast-body">
                    {{ session("error") }}
                </div>
            </div>
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
                      <button class="btn-success btn-sm">Update</button>
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
                        <label for="username" class="form-label">username must be over 6 characters and unique</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{auth()->user()->username}}">
                        @error('username')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                      </div>
                      <div class="col-md-2 ms-auto">
                      <button class="btn-success btn-sm">Update</button>
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
                        <label for="email" class="form-label">email must be unique</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{auth()->user()->email}}">
                        @error('email')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                      </div>
                      <div class="col-md-2 ms-auto">
                      <button class="btn-success btn-sm">Update</button>
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
                        <label for="dob" class="form-label">ensure that you are over 18</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="{{auth()->user()->dob}}" max="{{now()}}">
                        @error('dob')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                      </div>
                      <div class="col-md-2 ms-auto">
                      <button class="btn-success btn-sm">Update</button>
                    </div>
                </form>
            </div>
            <div class="action__link">
                <a type="button">Edit</a>
            </div>
        </section>
        <section id="address__section">
            <div class="info__container">
                <h6 class="fw-bold">Address</h6>
                @if (!empty(auth()->user()->housenumber || auth()->user()->street || auth()->user()->district || auth()->user()->commune || auth()->user()->province))
                <p>{{auth()->user()->housenumber}}, Street {{auth()->user()->street}}, Khan {{auth()->user()->district}}, Sangkat {{auth()->user()->commune}}, {{auth()->user()->provice}}</p>
                @else
                <p class="form-label">Wew, nothing here</p>
                @endif
            </div>
            <div class="info__container hidden">
                <h6 class="fw-bold">Address</h6>
                <form class="row g-3" action="{{route('profile.update', auth()->user())}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <label for="address" class="form-label mt-3">your address will be use when making a purchase</label>
                        <div class="col-12 col-lg-6 mt-2">
                            <input
                              type="text"
                              name="housenumber"
                              class="form-control"
                              placeholder="លេខផ្ទះ"
                              value="{{old('housenumber')}}"
                              required
                            />
                            @error('housenumber')
                                <div class="text-danger">
                                  {{$message}}
                                </div>
                            @enderror
                          </div>
                          <div class="col-12 col-lg-6 mt-2">
                            <input
                              type="text"
                              name="street"
                              class="form-control"
                              placeholder="ផ្លូវ"
                              value="{{old('street')}}"
                              required
                            />
                            @error('street')
                                <div class="text-danger">
                                  {{$message}}
                                </div>
                            @enderror
                            </div>
                          <div class="col-12 col-lg-6 mt-2">
                            <input
                              type="text"
                              name="commune"
                              class="form-control"
                              placeholder="ខណ្ឌ"
                              value="{{old('commune')}}"
                              required
                            />
                            @error('commune')
                                <div class="text-danger">
                                  {{$message}}
                                </div>
                            @enderror
                            </div>
                            <div class="col-12 col-lg-6 mt-2">
                              <input
                                type="text"
                                name="district"
                                class="form-control"
                                placeholder="សង្កាត់"
                                value="{{old('district')}}"
                                required
                              />
                              @error('district')
                                  <div class="text-danger">
                                    {{$message}}
                                  </div>
                              @enderror
                              </div>
                              <div class="col-12 mt-2">
                                <input
                                  type="text"
                                  name="province"
                                  class="form-control"
                                  placeholder="ខេត្ត"
                                  value="{{old('province')}}"
                                  required
                                />
                                @error('province')
                                    <div class="text-danger">
                                      {{$message}}
                                    </div>
                                @enderror
                                </div>
                    </div>
                    <div class="col-md-2 ms-auto">
                    <button class="btn-success btn-sm">Update</button>
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
                        <label for="phone" class="form-label">a unique phone number</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{auth()->user()->phone_number}}">
                        @error('phone')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                      </div>
                      <div class="col-md-2 ms-auto">
                      <button class="btn-success btn-sm">Update</button>
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
                <img src="/img/user/{{ auth()->id() . '/id_card/' . auth()->user()->id_card}}" alt="id" width="100%" height="100px">
            </div>
            <div class="info__container hidden">
                <h6 class="fw-bold">Identification Card</h6>
                <form class="row g-3" action="{{route('profile.update', auth()->user())}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <input type="file" class="form-control" id="idcard" name="idcard" accept=".png, .jpeg, .jpg, .svg, .webp">
                        @error('idcard')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                      </div>
                      <div class="col-md-2 ms-auto">
                      <button class="btn-success btn-sm">Update</button>
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
                    <div class="col-md-12 gap-3">
                        <label for="password" class="form-label">Current password</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" placeholder="********">
                        @error('current_password')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                        <label for="password" class="form-label">New password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="********">
                        @error('new_password')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                        <label for="password" class="form-label">Password confirmation</label>
                        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" placeholder="********">
                        @error('confirm_password')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                      </div>
                      <div class="col-md-2 ms-auto">
                      <button class="btn-success btn-sm">Update</button>
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
                <img src="{{ 'img/user/' . auth()->id() . '/profile/' . auth()->user()->profile}}" alt="profile" height="100px">
            </div>
            <div class="info__container hidden">
                <h6 class="fw-bold">Profile</h6>
                <form class="row g-3" action="{{route('profile.update', auth()->user())}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <input type="file" class="form-control" id="profile" name="profile" accept=".png, .jpeg, .jpg, .svg, .webp">
                        @error('profile')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                      </div>
                      <div class="col-md-2 ms-auto">
                      <button class="btn-success btn-sm">Update</button>
                    </div>
                </form>
            </div>
            <div class="action__link">
                <a type="button">Edit</a>
            </div>
        </section>
        <section id="remove__section">
                <form class="ms-auto" id="removed" action="{{route('profile.destroy', auth()->user())}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-danger" id="removed" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Delete account
                    </a>
                    <div class="modal" id="deleteModal"> 
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Are you sure?</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                              <button type="button" class="btn btn-danger" onclick="document.getElementById('removed').submit();">Delete</button>
                            </div>
                          </div>
                        </div>
                      </div>
                </form>
        </section>
    </div>
    <div class="col-0 col-md-4"></div>
</div>
</div>
@endsection
@section('footer')
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="/js/auth/profile.js"></script>
@endsection
@include('/partials.compact_footer')
@endsection
