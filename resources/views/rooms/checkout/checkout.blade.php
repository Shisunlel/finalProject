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
    <link rel="stylesheet" href="{{asset('css/checkout.css')}}">
    <title>{{strtolower($view_name)}}</title>
</head>
<body>
    <!--Main layout-->
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
          <div class="col-md-8 mb-3 bg-light p-5 order-2 order-md-1">
            <div>
              <form 
              action="{{ route('checkout.store') }}"
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
                    @error('date')
                      <div class="text-danger">
                        {{$message}}
                      </div>
                  @enderror
                    <div class="info__container hidden">
                      <input class="form-control" type="date" name="date" min="{{$request->start}}" max="{{$request->end}}" value="{{$request->start}}">
                    </div>
                    <span class="action__link">
                    <a type="button">Edit</a>
                  </span>
                  </div>
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
                      <label for="guest" class="form-label">How many people will be staying ?</label>
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
                <div class="md-form mt-2 mb-4 d-grid gap-2">
                  <input
                    type="text"
                    name="address"
                    class="form-control"
                    placeholder="Street Address"
                    required
                  />
                  @error('address')
                      <div class="text-danger">
                        {{$message}}
                      </div>
                  @enderror
                  <input
                    type="text"
                    name="housenumber"
                    class="form-control"
                    placeholder="House Number"
                    required
                  />
                  @error('housenumber')
                      <div class="text-danger">
                        {{$message}}
                      </div>
                  @enderror
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
                <input type="text" class="form-control" name="phonenumber" placeholder="Phone number">
              </div>
              <a type="button" class="add">Add</a>
                @endif
                  </div>
                </div>
                <div class="md-form mb-3">
                  <h6 class="fw-bold">Profile Picture</h6>
                  @if (Str::contains(auth()->user()->profile, ['.jpg', '.webp', '.svg', '.png', '.jpeg']))
                  <div class="d-flex justify-content-center">
                      <img src="/img/user/{{ auth()->id() . '/profile/' . auth()->user()->profile}}" alt="">
                  </div>
                  @else
                  <div class="d-flex justify-content-between">
                    <small class="form-label"
                      >Hosts want to know who will be staying at their
                      place</small>
                      <div class="info__container hidden my-2">
                        <input type="file" class="form-control" name="profile" accept=".png, .jpeg, .jpg, .svg, .webp">
                      </div>
                    <a type="button" class="add">Add</a>
                  </div>
                  @endif
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="cc-name">Name on card</label>
                    <input
                      type="text"
                      class="form-control"
                      name="card-name"
                      placeholder="Name"
                      required
                    />
                    <small class="form-label"
                      >Full name as displayed on card</small
                    >
                    <div class="invalid-feedback">Name on card is required</div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="cc-number">Credit card number</label>
                    <input
                      type="text"
                      class="form-control"
                      name="card-number"
                      placeholder="xxxx xxxx xxxx xxxx"
                      required
                    />
                    <div class="invalid-feedback">
                      Credit card number is required
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 mb-3">
                    <label for="cc-expiration">Expiration</label>
                    <input
                      type="text"
                      class="form-control"
                      name="card-expiration"
                      placeholder="MM/YY"
                      required
                    />
                    <div class="invalid-feedback">Expiration date required</div>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="cc-expiration">CVV</label>
                    <input
                      type="text"
                      class="form-control"
                      name="cvv"
                      placeholder="xxxx"
                      required
                    />
                    <div class="invalid-feedback">Security code required</div>
                  </div>
                </div>
                <hr class="mb-4" />
                <button class="btn btn-primary btn-lg btn-block" type="submit">
                  Continue to checkout
                </button>
              </form>
            </div>
          </div>
          <!--Grid column-->
          <!--Grid column-->
          <div class="col-md-4 order-1">
            <!-- Heading -->
            <h4 class="d-flex justify-content-between align-items-center mb-3">
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
    <!--Main layout-->
    <!-- THIS IS FOOTER -->
<footer class="container-fluid text-light-shade bg-dark-accent px-4 py-4 border-top ">
  <hr class="bg-dark-accent">
  <div id="footer-container" class="container">
  <div class="row" id="footer-cp">
    <div id="footer-column" class="col-12 d-flex justify-content-between align-items-center text-left">
      <span>
      <p>&copy; {{ date('Y') }} Rentahouse, Inc. All right reserved </p>
    </span>
    <span>
      <ul class="d-flex flex-row">
        <li class="nav-item"><a href="https://www.facebook.com/shisun8" class="me-4"><i class="fab fa-facebook-f" id="facebook"></i></a></li>
       <li class="nav-item"> <a href="https://www.twitter.com/xqcow" class="me-4"><i class="fab fa-twitter" id="twitter"></i></a></li>
        <li class="nav-item"><a href="https://github.com/Shisunn/" class=""><i class="fab fa-github" id="github"></i></a></li>
      </ul>
    </span>
    </div>
  </div>
</div>
</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="/js/rooms/checkout.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
 <!-- Font Awesome -->
<script src="https://kit.fontawesome.com/7686e548c6.js" crossorigin="anonymous"></script>
</body>
</html>