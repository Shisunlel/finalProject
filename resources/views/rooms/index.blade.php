@extends('/layouts.default') 
@include('/partials/nav') 
@section('style')
<link rel="stylesheet" href="/css/main.css" />
@endsection 
@section('content')
<div class="container">
    <div class="row p-1 my-3">
        @forelse ($rooms as $room) 
        @if (count($room->images) > 0)
        <div class="col-6 col-lg-3 my-4">
            <div class="card room__card">
                <div class="image-container">
                    <a href="{{route('rooms.show', $room->id)}}">
                        <img
                            loading="lazy"
                            src="@if (!Str::of($room->images[0]->link)->startsWith('https')) /img/room/{{$room->id}}/@endif{{$room->images[0]->link }}"
                            alt="room_img"
                            style="border-radius: 5px"
                        />
                    </a>
                    @guest
                    <form
                        action="{{ route('saved.store', $room) }}"
                        method="POST"
                        id="saved{{$room->id}}"
                    >
                        @csrf
                        <a
                            id="saved"
                            href="javascript:{}"
                            onclick="document.querySelector('#saved{{$room->id}}').submit();"
                        >
                            <i class="far fa-heart fa-2x text-danger"></i>
                        </a>
                    </form>
                    @endguest 
                    @auth 
                    @if (!$room->savedBy(auth()->user()))
                    <form
                        action="{{ route('saved.store', $room) }}"
                        method="POST"
                        id="saved{{$room->id}}"
                    >
                        @csrf
                        <a
                            id="saved"
                            href="javascript:{}"
                            onclick="document.querySelector('#saved{{$room->id}}').submit();"
                        >
                            <i class="far fa-heart fa-2x text-danger"></i>
                        </a>
                    </form>
                    @else
                    <form
                        action="{{ route('saved.destroy', $room) }}"
                        method="POST"
                        id="saved{{$room->id}}"
                    >
                        @method('DELETE')
                        @csrf 
                        <a
                            id="saved"
                            href="javascript:{}"
                            onclick="document.querySelector('#saved{{$room->id}}').submit();"
                        >
                            <i class="fas fa-heart fa-2x text-danger"></i>
                        </a>
                    </form>
                    @endif 
                    @endauth
                </div>
                <article class="px-3 py-2 pt-xl-0">
                    <span
                        class="fw-light"
                        >{{ Str::limit($room->address, 15) }}</span
                    >
                    <p class="house-title fw-bold">
                        {{ Str::limit($room->title, 35)}}
                    </p>
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
@section('footer') 
@section('script')
<script>
    const guest_val = {!! json_encode(app('request')->input('guest'), JSON_HEX_TAG) !!}
</script>
<script src="/js/rooms/rooms.js"></script>
@endsection 
@include('/partials.footer') 
@endsection
