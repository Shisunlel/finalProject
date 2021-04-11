@extends('/layouts.default') 
@include('/partials.navwithoutsearch') 
@section('style')
<link rel="stylesheet" href="/css/profile.css" />
<link rel="stylesheet" href="/css/auth/room.css">
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
<div class="container-fluid">
    <div class="row mt-2">
        @include('/partials.side')
        <div class="col-6 col-lg-3 my-4" id="content">
        @forelse ($rooms as $room)
        @if (count($room->images) > 0)
            <div class="card room__card">
                <div class="image-container">
                    <a href="{{route('rooms.show', $room->id)}}">
                        <img
                            loading="lazy"
                            src="@if (!Str::of($room->images[0]->link)->startsWith('https')) /img/room/{{$room->id}}@endif{{$room->images[0]->link }}"
                            alt="room_img"
                            style="border-radius: 5px"
                        />
                        <form action="{{route('rooms.destroy', $room)}}" method="POST" id="trashed{{$room->id}}">
                            @csrf
                            @method('DELETE')
                            <a id="saved" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="far fa-trash-alt text-danger fa-2x"></i>
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
                                      <button type="button" class="btn btn-primary" onclick="document.querySelector('#trashed{{$room->id}}').submit();">Confirm</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </form> 
                        <a id="saved" href="{{route('rooms.edit', $room)}}">
                            <i class="far fa-edit text-warning fa-2x"></i>
                        </a>
                    </a>
                </div>
                <article class="px-3 py-2 pt-xl-0">
                    <span class="fw-light">{{ Str::limit($room->address, 15) }}</span>
                    <p class="house-title fw-bold">{{ Str::limit($room->title, 35)}}</p>
                    <span>${{$room->price}}</span>
                </article>
            </div>
        @endif
    </div>
        @empty
        <p class="text-center">Sorry you don't own any room, add one <a href="{{route('rooms.create')}}">here!</a></p>
        @endforelse
    </div>
</div>
</div>
{{ $rooms->links('pagination::bootstrap-4') }}
@endsection
@section('footer')
@section('script')
<script>
const toast = document.querySelector(".toast");
const init = new bootstrap.Toast(toast);
//toast appear
if (toast) {
    init.show();
}
</script>
@endsection
@include('/partials.compact_footer')
@endsection
