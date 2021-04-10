@extends('/layouts.default') 
@include('/partials.navwithoutsearch') 
@section('style')
<link rel="stylesheet" href="/css/saved.css" />
@endsection 
@section('content')
{{-- {{ $wishlist }}
{{ $room }} --}}
<div class="container">
    <div class="row p-1 my-3">
        @forelse ($wishlist as $wish)
            @foreach ($room as $_room)
                @if ($wish->room_id == $_room->id)
                    <div class="col-12 col-md-6 col-lg-4 my-3">
                        <div class="card room__card">
                            <div class="image-container">
                                <a href="{{route('rooms.show', $_room)}}">
                                    <img
                                        loading="lazy"
                                        src="@if (!Str::of($_room->images[0]->link)->startsWith('https')) /img/room/@endif{{$_room->images[0]->link }}"
                                        alt=""
                                        style="border-radius: 5px"
                                    />
                                </a>
                                <form class="d-none d-md-inline-flex" action="{{route('saved.destroy', $_room)}}" method="POST" id="saved">
                                    @csrf
                                    @method('DELETE')
                                    <a id="saved" href="javascript:{}" onclick="document.querySelector('#saved').submit();">
                                        <i class="fas fa-heart fa-2x text-danger"></i>
                                    </a>
                                </form>
                            </div>
                            <article class="px-3 py-2 pt-xl-0">
                                <span class="fw-light">{{ Str::limit($_room->address, 15) }}</span>
                                <p class="house-title fw-bold">{{ Str::limit($_room->title, 35)}}</p>
                                <span>${{$_room->price}}</span>
                            </article>
                            <div class="saved__icon ms-auto me-2 d-flex justify-content-center align-items-center">
                                <form class="d-block d-md-none" action="{{route('saved.destroy', $_room)}}" method="POST" id="saved">
                                    @csrf
                                    @method('DELETE')
                                    <a id="saved" href="javascript:{}" onclick="document.querySelector('#saved').submit();">
                                        <i class="fas fa-heart fa-2x text-danger"></i>
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @empty
        <div class="col-12 d-flex justify-content-center align-items-center">
            <p>
                You have nothing on your wishlist start adding one <a href="/#search">now</a>
            </p>
        </div>    
        @endforelse
    </div>
</div>
{{ $wishlist->links('pagination::bootstrap-4') }}
@endsection
@section('footer')
@include('/partials.footer')
@endsection