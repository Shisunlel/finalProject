@extends('/layouts.default') 
@include('/partials.navwithoutsearch') 
@section('style')
<link rel="stylesheet" href="/css/history.css" />
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
            data-bs-delay="2500"
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
@section('script')
<script>
const toast = document.querySelector(".toast");
const init = new bootstrap.Toast(toast);
if(toast){
  init.show();
}
</script>
@endsection
@include('/partials.compact_footer')
@endsection
