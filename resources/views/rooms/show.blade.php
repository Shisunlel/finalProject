@extends('/layouts.default') 
@include('/partials.nav') 
@section('style')
<link rel="stylesheet" href="/css/main.css" />
<link rel="stylesheet" href="/css/show.css" />
@endsection 
@section('content') 
@if (session('success'))
<x-alert-success />
@endif
<div class="container-fluid my-5">
    <div class="container-xxl">
        <div class="d-flex">
            <h2 class="m-0" id="show__header__title">{{$room[0]->title}}</h2>
            @guest
            <form
                class="ms-auto d-inline"
                action="{{ route('saved.store', $room[0]) }}"
                method="POST"
                id="saved"
            >
                @csrf
                <span>
                    <a
                        id="saved__show__page"
                        href="javascript:{}"
                        onclick="document.querySelector('#saved').submit();"
                    >
                        <i class="far fa-heart fa-2x text-danger"></i>
                    </a>
                </span>
            </form>
            @endguest 
            @auth 
            @if (!$room[0]->savedBy(auth()->user()))
            <form
                class="ms-auto d-inline"
                action="{{ route('saved.store', $room[0]) }}"
                method="POST"
                id="saved"
            >
                @csrf
                <span>
                    <a
                        id="saved__show__page"
                        href="javascript:{}"
                        onclick="document.querySelector('#saved').submit();"
                    >
                        <i class="far fa-heart fa-2x text-danger"></i>
                    </a>
                </span>
            </form>
            @else
            <form
                class="ms-auto d-inline"
                action="{{ route('saved.destroy', $room[0]) }}"
                method="POST"
                id="saved"
            >
                @method('DELETE')
                @csrf 
                <span>
                    <a
                        id="saved__show__page"
                        href="javascript:{}"
                        onclick="document.querySelector('#saved').submit();"
                    >
                        <i class="fas fa-heart fa-2x text-danger"></i>
                    </a>
                </span>
            </form>
            @endif 
            @endauth
        </div>
        <p class="m-0 p-0" style="color: #666">
            <sup>$</sup
            ><span class="mx-1 room__price"
                ><strong>{{$room[0]->price}}</strong></span
            >/day
        </p>
        @error('cost')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
        <div class="row mt-2">
            <section class="image col-lg-6">
                <div
                    id="carouselExampleControlsNoTouching"
                    class="carousel slide"
                    data-bs-touch="false"
                    data-bs-interval="false"
                >
                    <div class="carousel-indicators">
                        @if (count($room[0]->images) > 1)
                        <button
                            type="button"
                            data-bs-target="#carouselExampleIndicators"
                            data-bs-slide-to="0"
                            class="active"
                            aria-current="true"
                        ></button>
                        @for ($i=1; $i< count($room[0]->images); $i++)
                        <button
                            type="button"
                            data-bs-target="#carouselExampleIndicators"
                            data-bs-slide-to="{{ $i }}"
                        ></button>
                        @endfor 
                        @endif
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active h-100">
                            <img
                                loading="lazy"
                                src="@if (!Str::of($room[0]->images[0]->link)->startsWith('https'))/img/room/{{$room[0]->id}}/@endif{{$room[0]->images[0]->link}}"
                                class="d-block w-100"
                                alt="slideshow"
                            />
                        </div>
                        @for ($i=1; $i< count($room[0]->images); $i++)
                        <div class="carousel-item h-100">
                            <img
                                loading="lazy"
                                src="@if (!Str::of($room[0]->images[0]->link)->startsWith('https'))/img/room/{{$room[0]->id}}@endif{{$room[0]->images[$i]->link}}"
                                alt="slideshowtoo"
                                class="w-100"
                            />
                        </div>
                        @endfor 
                        @if (count($room[0]->images) > 1)
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
                        @endif
                    </div>
                </div>
            </section>
            <section class="detail my-3 my-lg-0 col-lg-6">
                <div class="accordion accordion-flush" id="main__accordion">
                    <div class="accordion-item">
                        <h2
                            class="accordion-header"
                            id="rating_accordion_header"
                        >
                            <button
                                class="accordion-button"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#rating_accordion"
                                aria-expanded="true"
                                aria-controls="rating_accordion"
                            >
                                Rating & Reviews
                            </button>
                        </h2>
                        <div
                            id="rating_accordion"
                            class="accordion-collapse collapse show"
                            aria-labelledby="rating_accordion_header"
                            data-bs-parent="#main__accordion"
                        >
                            <div class="accordion-body text-left">
                                @php 
                                    $total = 0; 
                                    foreach($room[0]->reviews as $review){ 
                                        $total += $review->rating;
                                    }
                                    if($room[0]->reviews->count()> 0){
                                        $total = $total / $room[0]->reviews->count();
                                    }
                                @endphp
                                @for ($i=floor($total); $i>0; $i--)
                                <i class="fas fa-star text-gold"></i>
                                @endfor 
                                @for ($i=round($total)-$total; $i > 0; $i--)
                                <i class="fas fa-star-half text-gold"></i>
                                @endfor
                                ({{$room[0]->reviews->count()}})
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2
                            class="accordion-header"
                            id="description_accordion_header"
                        >
                            <button
                                class="accordion-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#description_accordion"
                                aria-expanded="false"
                                aria-controls="description_accordion"
                            >
                                Description
                            </button>
                        </h2>
                        <div
                            id="description_accordion"
                            class="accordion-collapse collapse"
                            aria-labelledby="description_accordion_header"
                            data-bs-parent="#main__accordion"
                        >
                            <div class="accordion-body text-left">
                                {!!
                                Str::limit(nl2br(e($room[0]->description)),150,
                                '...') !!} 
                                @if(Str::length($room[0]->description) > 150)
                                <a
                                    type="button"
                                    class="btn btn-light ms-1"
                                    data-bs-toggle="modal"
                                    data-bs-target="#description"
                                >
                                    Read more...
                                </a>
                                @endif
                            </div>
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
                                                {!!
                                                nl2br(e($room[0]->description))
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
                        <h2
                            class="accordion-header"
                            id="address_accordion_header"
                        >
                            <button
                                class="accordion-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#address_accordion"
                                aria-expanded="false"
                                aria-controls="address_accordion"
                            >
                                Address
                            </button>
                        </h2>
                        <div
                            id="address_accordion"
                            class="accordion-collapse collapse"
                            aria-labelledby="address_accordion_header"
                            data-bs-parent="#main__accordion"
                        >
                            <div class="accordion-body">
                                {!! nl2br(e($room[0]->address)) !!}
                            </div>
                        </div>
                    </div>
                    @if (count($room[0]->facilities) > 0)
                    <div class="accordion-item">
                        <h2
                            class="accordion-header"
                            id="facilities_accordion_header"
                        >
                            <button
                                class="accordion-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#facilities_accordion"
                                aria-expanded="false"
                                aria-controls="facilities_accordion"
                            >
                                Facilities
                            </button>
                        </h2>
                        <div
                            id="facilities_accordion"
                            class="accordion-collapse collapse"
                            aria-labelledby="facilities_accordion_header"
                            data-bs-parent="#main__accordion"
                        >
                            <div class="accordion-body">
                                @foreach ($room[0]->facilities as $item)
                                <p>{{ $item->facility  }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="date_accordion_header">
                            <button
                                class="accordion-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#date_accordion"
                                aria-expanded="false"
                                aria-controls="date_accordion"
                            >
                                Date
                            </button>
                        </h2>
                        <div
                            id="date_accordion"
                            class="accordion-collapse collapse"
                            aria-labelledby="date_accordion_header"
                            data-bs-parent="#main__accordion"
                        >
                            <div class="accordion-body">
                                <form
                                    id="checkoutform"
                                    action="{{
                                        route('checkout.index', $room[0])
                                    }}"
                                >
                                    <div class="row">
                                        <div class="col">
                                            <label for="start__date"
                                                >Startdate</label
                                            >
                                            <input
                                                type="date"
                                                class="form-control"
                                                min="{{now()->toDateString()}}"
                                                name="start"
                                                id="start__date"
                                            />
                                            @error('start')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="end__date"
                                                >Enddate</label
                                            >
                                            <input
                                                type="date"
                                                class="form-control"
                                                min="{{ now()->addMonthsNoOverflow()->toDateString() }}"
                                                name="end"
                                                id="end__date"
                                                disabled
                                            />
                                            @error('end')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <input
                                        id="total_cost"
                                        type="number"
                                        name="cost"
                                        hidden
                                    />
                                    <input
                                        id="dur"
                                        type="number"
                                        name="duration"
                                        hidden
                                    />
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2
                            class="accordion-header"
                            id="contact_accordion_header"
                        >
                            <button
                                class="accordion-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#contact_accordion"
                                aria-expanded="false"
                                aria-controls="contact_accordion"
                            >
                                Contact
                            </button>
                        </h2>
                        <div
                            id="contact_accordion"
                            class="accordion-collapse collapse"
                            aria-labelledby="contact_accordion_header"
                            data-bs-parent="#main__accordion"
                        >
                            <div class="accordion-body d-flex">
                                @isset($room[0]->user->phone_number)
                                <div
                                    class="col-6 d-flex justify-content-center"
                                >
                                    <a
                                        class="btn btn-success"
                                        href="tel:{{ $room[0]->user->phone_number}}"
                                        >Call Host</a
                                    >
                                </div>
                                @endisset
                                <div
                                    class="col-6 d-flex justify-content-center"
                                >
                                    <a
                                        class="btn btn-light-accent"
                                        href="mailto:{{ $room[0]->user->email }}"
                                        >Mail Host</a
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="checkout__section row p-2 align-items-center my-3">
                    <div class="col-6 d-flex flex-column px-3">
                        <h5>{{ $room[0]->title }}</h5>
                        <p>Rent for <span id="duration"></span></p>
                    </div>
                    <div
                        class="col-6 text-center d-flex justify-content-center"
                    >
                        <a
                            class="btn btn-dark-shade d-flex justify-content-around"
                            href="javascript:{}"
                            onclick="document.getElementById('checkoutform').submit();"
                            >$<span id="cost"></span
                            ><span
                                ><svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    fill="currentColor"
                                    class="bi bi-arrow-right-circle-fill"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"
                                    /></svg></span
                        ></a>
                    </div>
                </div>
            </section>
        </div>
        <div class="row">
            <section class="review">
                <div class="rating mb-3">
                    @auth 
                    @if ($room[0]->reservedBy(auth()->user()))
                    <h4>Rating and Review</h4>
                    <form
                        action="{{ route('rooms.reviews.store', $room[0]) }}"
                        method="POST"
                    >
                        @csrf
                        <select name="rating" class="form-select" id="rating">
                            <option value="0" selected disabled>0</option>
                            @for ($i = 1; $i <= 50; $i++)
                            <option value="{{ $i / 10 }}">{{ $i / 10 }}</option>
                            @endfor
                        </select>
                    </form>
                    @endif 
                    @endauth
                </div>
                @if (!$room[0]->reviews->isEmpty())
                <h5 id="review__header">
                    <span class="me-2" id="show__all"
                        ><i class="fas fa-chevron-down"></i></span
                    >All reviews
                </h5>
                @endif 
                @auth 
                @if ($room[0]->reservedBy(auth()->user()))
                <div id="review__form__container">
                    <form
                        id="review__form"
                        action="{{ route('rooms.reviews.store', $room[0]) }}"
                        method="POST"
                    >
                        @csrf
                        <textarea
                            name="review"
                            id="review__box"
                            class="form-control"
                            placeholder="Share your experience with others"
                        ></textarea>
                        <input type="submit" id="review__btn" value="Send" />
                    </form>
                </div>
                @endif 
                @endauth 
                @if (!$room[0]->reviews->isEmpty())
                <div id="review__container" class="row my-4">
                    @foreach ($room[0]->reviews as $review)
                    <div class="col-12 col-md-6 my-2">
                        <div class="card py-3">
                            <div class="review__header px-2">
                                <div class="user__wrapper d-flex">
                                    <img
                                        loading="lazy"
                                        src="@foreach ($comment_user as $user) @if ($review->user_id == $user->id) @if (Str::of($user->profile)->startsWith('https')) {{$user->profile}} @else @if (Str::length($user->profile) > 11) {{ '/img/user/' . $user->id . '/profile/' . $user->profile }} @else {{ '/img/'.$user->profile }} @endif @endif @break @endif @endforeach"
                                        class="profile__image"
                                    />
                                    <p class="ms-2 fw-bold">
                                        @foreach ($comment_user as $user) 
                                            @if ($review->user_id == $user->id)
                                                {{$user->username}} 
                                                @break 
                                            @endif
                                        @endforeach
                                    </p>
                                    @auth 
                                    @if ($review->reviewedBy(auth()->user()))
                                    <span class="ms-auto dropdown__hover">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            fill="currentColor"
                                            class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"
                                            />
                                        </svg>
                                        <ul class="dropdown">
                                            <form
                                                id="form__delete__review"
                                                action="{{
                                                    route(
                                                        'reviews.destroy',
                                                        $review
                                                    )
                                                }}"
                                                method="POST"
                                            >
                                                @method('DELETE')
                                                @csrf 
                                                <li>
                                                    <input
                                                        id="remove__input"
                                                        type="submit"
                                                        value="Remove"
                                                    />
                                                </li>
                                            </form>
                                        </ul>
                                    </span>
                                    @endif 
                                    @endauth
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="review__detail" class="card-text">
                                    {!! nl2br(e($review->review_detail)) !!}
                                </p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text text-left">
                                    {{ $review->updated_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </section>
        </div>
    </div>
</div>
@endsection
@section('footer') 
@section('script')
<script src="/js/rooms/rooms.js"></script>
<script>
    const room = {!! json_encode($room[0]->price, JSON_HEX_TAG) !!}
</script>
<script src="/js/rooms/show.js"></script>
@endsection 
@include('/partials.footer') 
@endsection
