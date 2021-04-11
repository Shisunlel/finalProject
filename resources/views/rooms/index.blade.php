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
                        <form action="{{route('saved.store', $room)}}" method="POST" id="saved{{$room->id}}">
                            @csrf
                            <a id="saved" href="javascript:{}" onclick="document.querySelector('#saved{{$room->id}}').submit();">
                                <i class="far fa-heart fa-2x text-danger"></i>
                            </a>
                        </form>  
                    @endguest
                    @auth
                        @if (!$room->savedBy(auth()->user()))
                            <form action="{{route('saved.store', $room)}}" method="POST" id="saved{{$room->id}}">
                                @csrf
                                <a id="saved" href="javascript:{}" onclick="document.querySelector('#saved{{$room->id}}').submit();">
                                    <i class="far fa-heart fa-2x text-danger"></i>
                                </a>
                            </form>
                        @else
                            <form action="{{route('saved.destroy', $room)}}" method="POST" id="saved{{$room->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <a id="saved" href="javascript:{}" onclick="document.querySelector('#saved{{$room->id}}').submit();">
                                        <i class="fas fa-heart fa-2x text-danger"></i>
                                    </a>
                            </form>
                        @endif
                    @endauth
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
@section('sticky')
    <!-- STICKY PROFILE -->
<div class="container-fluid text-center sticky-hide" id="sticky-fluid">
    <div class="container">
      <div class="row">
      <div class="col-3 @guest col-4 @endguest ">
        <div class="sticky-container">
          {{-- HOME --}}
          <p class="sticky-icon"><span><a href="/"><svg fill="skyblue" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20 7.093v-5.093h-3v2.093l3 3zm4 5.907l-12-12-12 12h3v10h7v-5h4v5h7v-10h3zm-5 8h-3v-5h-8v5h-3v-10.26l7-6.912 7 6.99v10.182z"/></svg></a></span></p>
          </div>
      </div>
      <div class="col-3 @guest col-4 @endguest">
        <div class="sticky-container">
          {{-- SEARCH --}}
          <p class="sticky-icon"><span><a href="#smallNavSearch"><svg fill="skyblue" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M23.111 20.058l-4.977-4.977c.965-1.52 1.523-3.322 1.523-5.251 0-5.42-4.409-9.83-9.829-9.83-5.42 0-9.828 4.41-9.828 9.83s4.408 9.83 9.829 9.83c1.834 0 3.552-.505 5.022-1.383l5.021 5.021c2.144 2.141 5.384-1.096 3.239-3.24zm-20.064-10.228c0-3.739 3.043-6.782 6.782-6.782s6.782 3.042 6.782 6.782-3.043 6.782-6.782 6.782-6.782-3.043-6.782-6.782zm2.01-1.764c1.984-4.599 8.664-4.066 9.922.749-2.534-2.974-6.993-3.294-9.922-.749z"/></svg></a></span></p>
        </div>
      </div>
      @auth
        <div class="col-3">
        <div class="sticky-container">
          {{-- SAVED --}}
          <p class="sticky-icon"><span><a href="{{route('saved.index')}}"><svg fill="skyblue" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12 21.593c-5.63-5.539-11-10.297-11-14.402 0-3.791 3.068-5.191 5.281-5.191 1.312 0 4.151.501 5.719 4.457 1.59-3.968 4.464-4.447 5.726-4.447 2.54 0 5.274 1.621 5.274 5.181 0 4.069-5.136 8.625-11 14.402m5.726-20.583c-2.203 0-4.446 1.042-5.726 3.238-1.285-2.206-3.522-3.248-5.719-3.248-3.183 0-6.281 2.187-6.281 6.191 0 4.661 5.571 9.429 12 15.809 6.43-6.38 12-11.148 12-15.809 0-4.011-3.095-6.181-6.274-6.181"/></svg></a></span></p>
        </div>
      </div>
      <div class="col-3">
        <div class="sticky-container">
          {{-- ACCOUNT --}}
          <p class="sticky-icon"><span><a href="{{route('profile')}}"><svg fill="skyblue" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm8.127 19.41c-.282-.401-.772-.654-1.624-.85-3.848-.906-4.097-1.501-4.352-2.059-.259-.565-.19-1.23.205-1.977 1.726-3.257 2.09-6.024 1.027-7.79-.674-1.119-1.875-1.734-3.383-1.734-1.521 0-2.732.626-3.409 1.763-1.066 1.789-.693 4.544 1.049 7.757.402.742.476 1.406.22 1.974-.265.586-.611 1.19-4.365 2.066-.852.196-1.342.449-1.623.848 2.012 2.207 4.91 3.592 8.128 3.592s6.115-1.385 8.127-3.59zm.65-.782c1.395-1.844 2.223-4.14 2.223-6.628 0-6.071-4.929-11-11-11s-11 4.929-11 11c0 2.487.827 4.783 2.222 6.626.409-.452 1.049-.81 2.049-1.041 2.025-.462 3.376-.836 3.678-1.502.122-.272.061-.628-.188-1.087-1.917-3.535-2.282-6.641-1.03-8.745.853-1.431 2.408-2.251 4.269-2.251 1.845 0 3.391.808 4.24 2.218 1.251 2.079.896 5.195-1 8.774-.245.463-.304.821-.179 1.094.305.668 1.644 1.038 3.667 1.499 1 .23 1.64.59 2.049 1.043z"/></svg></a></span></p>
        </div>
      </div>
      @endauth
      @guest
     <div class="col-4">
        <div class="sticky-container">
          {{-- LOGIN --}}
          <p class="sticky-icon"><span><a href="{{route('login.index')}}"><svg fill="skyblue" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm8.127 19.41c-.282-.401-.772-.654-1.624-.85-3.848-.906-4.097-1.501-4.352-2.059-.259-.565-.19-1.23.205-1.977 1.726-3.257 2.09-6.024 1.027-7.79-.674-1.119-1.875-1.734-3.383-1.734-1.521 0-2.732.626-3.409 1.763-1.066 1.789-.693 4.544 1.049 7.757.402.742.476 1.406.22 1.974-.265.586-.611 1.19-4.365 2.066-.852.196-1.342.449-1.623.848 2.012 2.207 4.91 3.592 8.128 3.592s6.115-1.385 8.127-3.59zm.65-.782c1.395-1.844 2.223-4.14 2.223-6.628 0-6.071-4.929-11-11-11s-11 4.929-11 11c0 2.487.827 4.783 2.222 6.626.409-.452 1.049-.81 2.049-1.041 2.025-.462 3.376-.836 3.678-1.502.122-.272.061-.628-.188-1.087-1.917-3.535-2.282-6.641-1.03-8.745.853-1.431 2.408-2.251 4.269-2.251 1.845 0 3.391.808 4.24 2.218 1.251 2.079.896 5.195-1 8.774-.245.463-.304.821-.179 1.094.305.668 1.644 1.038 3.667 1.499 1 .23 1.64.59 2.049 1.043z"/></svg></a></span></p>
        </div>
      </div>
      @endguest
    </div>
  </div>
  </div>
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

