@extends('/layouts.default') @include('/partials/nav') @section('style')
<link rel="stylesheet" href="/css/main.css" />
@endsection @section('content')
<div class="container">
    <div class="row p-1 my-3">
        @forelse ($rooms as $room)
        @if (count($room->images) > 0)
        <div class="col-6 col-lg-3 my-4">
            <div class="card room__card">
                <div class="image-container">
                    <a href="/room/{{$room->id}}">
                        <img
                            loading="lazy"
                            src="@if (!Str::of($room->images[0]->link)->startsWith('https')) /img/room/@endif{{$room->images[0]->link }}"
                            alt=""
                            style="border-radius: 5px"
                        />
                    </a>
                    <a id="saved" href="{{route('saved')}}">
                        <i class="far fa-heart fa-2x text-danger"></i>
                    </a>
                </div>
                <article class="px-3 py-2 pt-xl-0">
                    <span class="fw-light">{{ Str::limit($room->address, 15) }}</span>
                    <p class="house-title fw-bold">{{ Str::limit($room->title, 35)}}</p>
                    <span>${{$room->price}}</span>
                </article>
            </div>
        </div>
        @endif
        @empty
        <p class="text-center">Sorry your search has returned no result</p>
        @endforelse
    </div>
</div>
{{ $rooms->links('pagination::bootstrap-4') }}
@endsection 
@section('script')
<script src="/js/rooms/rooms.js"></script>
@endsection
