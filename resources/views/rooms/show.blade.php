@extends('/layouts.default') @include('/partials.nav') @section('style')
<link rel="stylesheet" href="/css/main.css" />
<link rel="stylesheet" href="/css/show.css" />
@endsection @section('content')
{{-- {{$room[0]}} --}}
<div class="container-fluid my-5">
    <div class="container-xxl">
    <h2 class="m-0" id="show__header__title">{{$room[0]->title}}</h2>
    <p class="m-0 p-0" style="color: #666">
        <sup>$</sup
        ><span class="mx-1 room__price"
            ><strong>{{$room[0]->price}}</strong></span
        >/month
    </p>
    <div class="row mt-2">
        <section class="image col-lg-6">
            <div
                id="carouselExampleControlsNoTouching"
                class="carousel slide"
                data-bs-touch="false"
                data-bs-interval="false"
            >
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true"></button>
                @for ($i=1; $i< count($room[0]->images); $i++)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}"></button>
                @endfor
              </div>
                <div class="carousel-inner">
                    <div class="carousel-item active h-100">
                        <img
                            src="@if (!Str::of($room[0]->images[0]->link)->startsWith('https'))/img/room/@endif{{$room[0]->images[0]->link}}"
                            class="d-block w-100"
                            alt="..."
                        />
                    </div>
                    @for ($i=1; $i< count($room[0]->images); $i++)
                    <div class="carousel-item h-100">
                        <img
                            src="@if (!Str::of($room[0]->images[0]->link)->startsWith('https'))/img/room/@endif{{$room[0]->images[$i]->link}}"
                            alt=""
                            class="w-100"
                        />
                    </div>
                    @endfor
                    <button
                        class="carousel-control-prev"
                        type="button"
                        data-bs-target="#carouselExampleControlsNoTouching"
                        data-bs-slide="prev"
                    >
                        <span
                            class="carousel-control-prev-icon"
                            aria-hidden="true"
                        ></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button
                        class="carousel-control-next"
                        type="button"
                        data-bs-target="#carouselExampleControlsNoTouching"
                        data-bs-slide="next"
                    >
                        <span
                            class="carousel-control-next-icon"
                            aria-hidden="true"
                        ></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>
        <section class="detail my-5 my-lg-0 col-lg-6">
            <div class="accordion accordion-flush" id="description__accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button
                            class="accordion-button"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne"
                            aria-expanded="true"
                            aria-controls="flush-collapseOne"
                        >
                            Description
                        </button>
                    </h2>
                    <div
                        id="flush-collapseOne"
                        class="accordion-collapse show"
                        aria-labelledby="flush-headingOne"
                        data-bs-parent="#description__accordion"
                    >
                        <div class="accordion-body text-left">
                            {!! Str::limit(nl2br(e($room[0]->description)),150,
                            '...') !!}
                            @if (Str::length($room[0]->description) > 150)
                            <a
                                type="button"
                                class="btn btn-light ml-1"
                                data-bs-toggle="modal"
                                data-bs-target="#description"
                            >
                                Read more...
                            </a>
                            @endif
                        </div>
                        

                        <!-- button for drop down -->
                        <!-- Modal -->
                        <div
                            class="modal fade"
                            id="description"
                            tabindex="-1"
                            aria-labelledby="#descriptionLabel"
                            aria-hidden="true"
                        >
                            <div
                                class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                            >
                                <div
                                    class="modal-content bg-gradient bg-white text-dark"
                                >
                                    <div class="modal-body">
                                        <p class="text-left">
                                            {!! nl2br(e($room[0]->description))
                                            !!}
                                        </p>
                                    </div>
                                    <div class="modal-footer d-lg-none">
                                        <button
                                            type="button"
                                            class="btn btn-secondary"
                                            data-bs-dismiss="modal"
                                        >
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button
                            class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo"
                            aria-expanded="false"
                            aria-controls="flush-collapseTwo"
                        >
                            Address
                        </button>
                    </h2>
                    <div
                        id="flush-collapseTwo"
                        class="accordion-collapse collapse"
                        aria-labelledby="flush-headingTwo"
                        data-bs-parent="#description__accordion"
                    >
                        <div class="accordion-body">
                            {!! nl2br(e($room[0]->address)) !!}
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button
                            class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree"
                            aria-expanded="false"
                            aria-controls="flush-collapseThree"
                        >
                            Facilities
                        </button>
                    </h2>
                    <div
                        id="flush-collapseThree"
                        class="accordion-collapse collapse"
                        aria-labelledby="flush-headingThree"
                        data-bs-parent="#description__accordion"
                    >
                        <div class="accordion-body">
                            @foreach ($room[0]->facilities as $item)
                            <p>{{ $item->facility  }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFour">
                        <button
                            class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFour"
                            aria-expanded="false"
                            aria-controls="flush-collapseFour"
                        >
                            Date
                        </button>
                    </h2>
                    <div
                        id="flush-collapseFour"
                        class="accordion-collapse collapse"
                        aria-labelledby="flush-headingFour"
                        data-bs-parent="#description__accordion"
                    >
                        <div class="accordion-body">
                            <form action="#">
                                <div class="row">
                                    <div class="col">
                                        <input
                                            type="date"
                                            class="form-control"
                                            min="{{now()->toDateString()}}"
                                            name="start"
                                            id="start__date"
                                        />
                                    </div>
                                    <div class="col">
                                        <input
                                            type="date"
                                            class="form-control"
                                            min="{{ now()->addMonthsNoOverflow()->toDateString() }}"
                                            name="end"
                                            id="end__date"
                                            disabled
                                        />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFive">
                        <button
                            class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFive"
                            aria-expanded="false"
                            aria-controls="flush-collapseFive"
                        >
                            Contact
                        </button>
                    </h2>
                    <div
                        id="flush-collapseFive"
                        class="accordion-collapse collapse"
                        aria-labelledby="flush-headingFive"
                        data-bs-parent="#description__accordion"
                    >
                        <div class="accordion-body d-flex">
                            @isset($room[0]->user->phone_number)
                            <div class="col-6 d-flex justify-content-center">
                                <a class="btn btn-success" href="tel:{{ $room[0]->user->phone_number}}">Call Host</a>
                            </div>
                            @endisset
                            <div class="col-6 d-flex justify-content-center">
                                <a class="btn btn-light-accent" href="mailto:{{ $room[0]->user->email }}">Mail Host</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="checkout__section row p-2 align-items-center my-3">
               <div class="col-6 d-flex flex-column px-3">
                <h5>{{ $room[0]->title }}</h5>
                <p>Rent for 3 days</p>
               </div>
               <div class="col-6 text-center d-flex justify-content-center">
                <a class="btn btn-dark-shade d-flex justify-content-around" href="#">${{ $room[0]->price * 3 }} <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                  </svg></span></a>
               </div>
            </div>
        </section>
    </div>
</div>
</div>
@endsection @section('script')
<script src="/js/rooms/rooms.js"></script>
<script src="/js/rooms/show.js"></script>
@endsection
