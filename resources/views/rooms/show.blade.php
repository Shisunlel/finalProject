@extends('/layouts.default')
@include('/partials.nav')
@section('style')
    <link rel="stylesheet" href="/css/main.css">
@endsection
@section('content')
{{$room[0]}}
<div class="container my-3">
    <div class="row">
        <section class="image col-lg-6">
            @foreach ($room[0]->images as $image)
                <img src="{{ $image->link }}" alt="" class="w-100">
            @endforeach
        </section>
        <section class="detail col-lg-6"></section>
    </div>
</div>
@endsection
@section('script')
    <script src="/js/rooms/rooms.js"></script>
@endsection