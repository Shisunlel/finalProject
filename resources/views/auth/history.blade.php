@extends('/layouts.default') 
@include('/partials.navwithoutsearch') 
@section('style')
<link rel="stylesheet" href="/css/history.css" />
@endsection 
@section('content')
<div class="container-fluid">
    <div class="row mt-2">
        @include('/partials.side')
        <div class="col-10 table-responsive" id="content">
            <table class="table table-dark table-striped table-hover">
                <thead class="table-palenight">
                    <tr>
                      <th scope="col">Date</th>
                      <th scope="col">Title</th>
                      <th scope="col">Duration</th>
                      <th scope="col">Cost</th>
                      <th scope="col">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($detail as $item)
                    <tr>
                        <td>{{$item->created_at->format('d-M-Y')}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->duration}}</td>
                        <td>${{$item->cost}}</td>
                        <td>${{$item->total}}</td>
                    </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('footer')
@include('/partials.compact_footer')
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@endsection
