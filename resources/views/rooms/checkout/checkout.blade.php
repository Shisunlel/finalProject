@extends('layouts.default') 
@section('style')
<link rel="stylesheet" href="/css/checkout.css" />
@endsection 
@section('content')
    <!--Main layout-->
    @if (session('error'))
        <div
            class="toast align-items-center text-white bg-danger bg-gradient border-0"
            role="alert"
            aria-live="assertive"
            aria-atomic="true"
            data-bs-autohide="false"
        >
            <div class="d-flex">
                <div class="toast-body">
                    {{ session("error") }}
                </div>
                <button
                    type="button"
                    class="btn-close btn-close-white me-2 m-auto"
                    data-bs-dismiss="toast"
                    aria-label="Close"
                ></button>
            </div>
        </div>
        @endif
    <main class="mt-5 pt-4">
      <div class="container wow fadeIn">
        <!-- Heading -->
        <header class="d-flex">
        <a href="{{ url()->previous() }}" style="margin-top: 0.4em;">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M16.67 0l2.83 2.829-9.339 9.175 9.339 9.167-2.83 2.829-12.17-11.996z"/></svg>
      </a>
        <h2 class="ms-1 mb-5">Confirm and pay</h2>
      </header>
        <!--Grid row-->
        <div class="row">
          <!--Grid column-->
          <div class="col-lg-8 mb-3 bg-light p-5 order-2 order-lg-1">
            <div>
              <form id="dob_form" action="{{route('profile.update', auth()->user())}}" method="POST">
              @csrf
              @method('PUT')
              </form>
              <form 
              action="{{ route('checkout.store', $room) }}"
              id="checkout__form"
              method="POST"
              enctype="multipart/form-data"
              >
              @csrf
                <!--Grid row-->
                <div class="md-form mb-3">
                  <h6 class="fw-bold">Date</h6>
                  <div class="justify-content-between d-flex">
                    <p class="info__container">{{$request->start}}</p>
                  </div>
                  <input type="hidden" name"trash">
                  <input type="date" name="start" value="{{$request->start}}" hidden>
                  <input type="date" name="end" value="{{$request->end}}" hidden>
                  <input type="number" name="cost" value="{{$request->cost}}" hidden>
                  <input type="number" name="duration" value="{{$request->duration}}" hidden>
                  <input type="number" name="total" value="{{sprintf("%.2f", $request->cost + ($request->service * ($request->duration / 15)))}}" hidden>
                </div>
                <div class="md-form">
                  <h6 class="fw-bold">Guest</h6>
                  <div class="justify-content-between d-flex">
                    <p class="info__container">{{$room->guest}} Guest</p>
                    @error('guest')
                      <div class="text-danger">
                        {{$message}}
                      </div>
                    @enderror
                    <div class="info__container hidden">
                      <label for="guest" class="form-label">How many people will be staying ?</label> <span class="text-danger" id="guest_error"></span>
                      <input type="number" class="form-control" id="guest" name="guest" min="1" max="{{$room->guest}}" value="{{$room->guest}}">
                    </div>
                    <span class="action__link">
                    <a type="button">Edit</a>
                  </span>
                  </div>
                </div>
                <hr />

                <!--Pay-->
                <h6 class="fw-bold">Pay With</h6>
                <select class="form-select mt-2 mb-3" name="Pay-type" aria-label="Default select example">
                  <option selected disabled>Credit Cards or Wings</option>
                  <option value="Credit Cards">Credit Cards</option>
                  <option value="Wings">Wings</option>
                </select>
                <!--email-->
                <h6 class="fw-bold">Billing Address</h6>
                <div class="md-form row mt-2 mb-4">
                @if (!empty(auth()->user()->housenumber || auth()->user()->street || auth()->user()->district || auth()->user()->commune || auth()->user()->province))
                    <span>
                      # {{auth()->user()->housenumber}}, Street {{auth()->user()->street}}, Khan {{auth()->user()->district}}, Sangkat {{auth()->user()->commune}}, {{auth()->user()->provice}}
                    </span>
                @else
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
                  @endif
                </div>
                <span><strong>Required</strong></span>
                <div class="md-form mt-2">
                  <h6 class="fw-bold">Phone Number</h6>
                  <div class="justify-content-between d-flex">
                    @if (Str::contains(auth()->user()->phone_number, '0'))
                    <small class="form-label">{{auth()->user()->phone_number}}</small>
                @else
                <small class="form-label"
                >Add and confirm your phone number to get updated</small
              >
              <div class="info__container hidden my-2">
                <small class="form-label">Phone number should always start with 0</small>
                <input type="text" class="form-control" name="phonenumber" placeholder="Phone number" inputmode="numeric" pattern="[0-9]*" value="{{old('phonenumber')}}">
                @error('phonenumber')
                      <div class="text-danger">
                        {{$message}}
                      </div>
                  @enderror
              </div>
              <a type="button" class="add">Add</a>
                @endif
                  </div>
                </div>
                @if (!empty(auth()->user()->dob))
                <input type="date" name="dob" value="{{auth()->user()->dob}}" hidden>
                @else
                <div class="md-form mt-2">
                  <h6 class="fw-bold">Date of birth</h6>
                  <div class="justify-content-between d-flex">
                    <small class="form-label">
                      Add and confirm your date of birth
                    </small>
                  <div class="info__container hidden my-2">
                        <input type="date" class="form-control" name="dob" form="dob_form" max="{{now()->format('Y-m-d')}}">
                        <button class="btn-success btn-sm mt-2" form="dob_form">Update</button>
                    @error('dob')
                    <div class="text-danger">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                  <a type="button" class="add">Add</a>
                  </div>
                </div>
                @endif
                @if (empty(auth()->user()->id_card))
                <div class="md-form mt-2">
                  <h6 class="fw-bold">Identification Card</h6>
                  <div class="justify-content-between d-flex">
                    <small class="form-label">
                      Host would like to know who will be staying at their place
                    </small>
                  <div class="info__container hidden my-2">
                    <input type="file" class="form-control" id="idcard" name="idcard" accept=".png, .jpeg, .jpg, .svg, .webp">
                    @error('idcard')
                    <div class="text-danger">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                  <a type="button" class="add">Add</a>
                  </div>
                </div>
                @endif
                <div class="md-form mb-3">
                  <h6 class="fw-bold">Profile Picture</h6>
                  @if (Str::contains(auth()->user()->profile, ['.jpg', '.webp', '.svg', '.png', '.jpeg']))
                  <div class="d-flex justify-content-center">
                      <img src="@if (Str::length(auth()->user()->profile) > 11)
                              {{'/img/user/' . auth()->id() . '/profile/' . auth()->user()->profile}}
                              @else
                                  {{'/img/'.auth()->user()->profile}}
                              @endif" alt="profile picture">
                  </div>
                  @else
                  <div class="d-flex justify-content-between">
                    <small class="form-label"
                      >Hosts want to know who will be staying at their
                      place</small>
                      <div class="info__container hidden my-2">
                        <input type="file" class="form-control" name="profile" accept=".png, .jpeg, .jpg, .svg, .webp">
                        @error('profile')
                      <div class="text-danger">
                        {{$message}}
                      </div>
                  @enderror
                      </div>
                    <a type="button" class="add">Add</a>
                  </div>
                  @endif
                </div>

                <div class="row">
                  <div class="col-lg-6 mb-3">
                    <label for="cc-name">Name on card</label>
                    <input
                      type="text"
                      class="form-control"
                      name="card-name"
                      placeholder="Cardholder name"
                      required
                    />
                    @error('card-name')
                      <div class="text-danger">
                        {{$message}}
                      </div>
                  @enderror
                    <small class="form-label"
                      >Full name as displayed on card</small
                    >
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label for="cc-number">Credit card number</label>
                    <input
                      type="text"
                      class="form-control"
                      name="card-number"
                      placeholder="Card number"
                      inputmode="numeric" 
                      pattern="[0-9]*"
                      required
                    />
                    @error('card-number')
                      <div class="text-danger">
                        {{$message}}
                      </div>
                  @enderror
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-3 mb-3">
                    <label for="cc-expiration">Expiration Date</label>
                    <div class="row">
                      <div class="col">
                    <input
                      type="text"
                      class="form-control"
                      name="card-expire-month"
                      placeholder="MM"
                      inputmode="numeric" 
                      pattern="[0-9]*"
                      min="1"
                      max="12"
                      required
                    />
                    @error('card-expire-month')
                      <div class="text-danger">
                        {{$message}}
                      </div>
                  @enderror
                  </div>
                  <div class="col">
                    <input
                      type="text"
                      class="form-control"
                      name="card-expire-year"
                      inputmode="numeric" 
                      pattern="[0-9]*"
                      min="01"
                      placeholder="YY"
                      required
                    />
                    @error('card-expire-year')
                      <div class="text-danger">
                        {{$message}}
                      </div>
                  @enderror
                  </div>
                  </div>
                  </div>
                  <div class="col-lg-3 mb-3">
                    <label for="cc-expiration">CVV</label>
                    <input
                      type="text"
                      class="form-control"
                      name="cvv"
                      inputmode="numeric" 
                      pattern="[0-9]*"
                      placeholder="Security code(CVV)"
                      required
                    />
                    @error('cvv')
                      <div class="text-danger">
                        {{$message}}
                      </div>
                  @enderror
                  </div>
                </div>
                <hr class="mb-4" />
                <section class="💳">
                  <button class="btn btn-success btn-block" type="submit" onclick="return preventUnderage();">
                    Proceed to checkout
                  </button>
                  <label class="ms-2 text-warning" id="💳"></label>
                </section>
              </form>
            </div>
          </div>
          <!--Grid column-->
          <!--Grid column-->
          <div class="col-lg-4 order-1">
            <!-- Heading -->
            <h4 class="d-flex d-md-block d-lg-flex justify-content-between align-items-center mb-3">
              <span class="text-muted">Payments</span>
              <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3 z-depth-1">
              <li
                class="list-group-item d-flex justify-content-between bg-light"
              >
              <div class="row">
                <div class="col-6">
                <img
                  src="{{$room->images[0]->link}}"
                  class="img-fluid rounded"
                />
                </div>
                <div class="col-6 text-center">
                <div>
                  <small class="text-muted">{{Str::limit($room->address, 15)}}</small>
                </div>                
                <div>
                  <p class="fw-bold">{{Str::limit($room->title, 15)}}</p>
                </div>
                <div>
                  <small class="text-muted">{{Str::limit($room->description, 15)}}</small>
                </div>
                @php
                    $total = 0;
                    foreach($room->reviews as $review){
                      $total += $review->rating;
                    }
                @endphp
                <div class="rating">
                  @for ($i=floor($total); $i>0; $i--)
                    <i class="fas fa-star text-gold"></i>
                  @endfor
                  @for ($i=round($total)-$total; $i > 0; $i--)
                    <i class="fas fa-star-half text-gold"></i>
                  @endfor
                </div>
              </div>
              </div>
              </li>
              <li class="list-group-item">
                <p class="mb-2">
                  <strong>Price Detail</strong>
                </p>
                <div class="d-flex justify-content-between mb-2">
                  <span>${{$room->price}} x {{$request->duration}} {{Str::plural('day', $request->duration)}}</span>
                  <label>${{sprintf("%.2f",$request->cost)}}</label>
                </div>
                <div class="d-flex justify-content-between mb-2">
                  <u class="form-label">Service fees</u>
                  <label class="form-label">${{sprintf("%.2f",$request->service)}}<sub>/15 days</sub></label>
                </div>
                <div class="d-flex justify-content-between mt-4">
                  <span class="fw-bold">Total (USD)</span>
                  <p class="fw-bold">${{sprintf("%.2f", $request->cost + ($request->service * ($request->duration / 15)))}}</p>
                </div>
              </li>
            </ul>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
    </main>
@section('footer')
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="/js/rooms/checkout.js"></script>
@endsection
@include('/partials.compact_footer')
@endsection