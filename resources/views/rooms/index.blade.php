@extends('/layouts.default')
@include('/partials/nav')
@section('style')
    <link rel="stylesheet" href="/css/main.css">
@endsection
@section('content')
<div class="container">
    <div class="row p-1">
      @forelse ($rooms as $room)
        <div class="col-6 col-lg-3 mt-4 mt-md-5">
            <div class="card">
            <div class="image-container">
                <a href="/house/{{$room->id}}">
                <img loading="lazy" class="rounded" src="{{$room->images[0]->link}}" alt="" />
                </a>
                <a id="saved" href="/saved">
                  <i class="far fa-heart fa-2x text-danger"></i>
                </a>
            </div>
            <article class="p-2">
                <span>{{ Str::limit($room->address, 15) }}</span>
                <p class="house-title">{{ Str::limit($room->title, 35)}}</p>
                <span>${{$room->price}}</span>
            </article>
            </div>
      </div>
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