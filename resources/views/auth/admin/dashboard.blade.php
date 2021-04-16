@extends('/auth.admin.layouts.default')
@section('content')
@foreach ($transcs as $transc)
    @php
        $total[] = $transc->total;
        $month[] = $transc->month;
    @endphp
@endforeach
@foreach ($users as $user)
    @php
        $user_count[] = $user->user_count;
        $user_month[] = $user->month;
    @endphp
@endforeach
@foreach ($rooms as $room)
    @php
        $room_count[] = $room->room_count;
        $room_month[] = $room->month;
    @endphp
@endforeach
<div class="content">
<div class="row">
    <div class="col-12">
    <div class="card card-chart">
        <div class="card-header ">
        <h5 class="card-category">
            Sales Report
        </h5>
        @inject('rent', 'App\Models\Rent')
        <h3 class="card-title"><i class="tim-icons icon-paper text-primary"></i>{{$rent->totalRent()}}</h3>
        </div>
        <div class="card-body">
        <div>
            <canvas id="transc-chart"></canvas>
        </div>
        </div>
    </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
    <div class="card card-chart">
        <div class="card-header">
        <h5 class="card-category">User</h5>
        @inject('maxusr', 'App\Models\User')
        <h3 class="card-title"><i class="tim-icons icon-single-02 text-primary"></i> 
            {{$maxusr->maxUser()}} </h3>
        </div>
        <div class="card-body">
        <div>
            <canvas id="user-chart"></canvas>
        </div>
        </div>
    </div>
    </div>
    <div class="col-lg-6">
    <div class="card card-chart">
        <div class="card-header">
        <h5 class="card-category">Room</h5>
        @inject('maxroom', 'App\Models\Room')
        <h3 class="card-title"><i class="tim-icons icon-istanbul text-info"></i> {{$maxroom->maxRoom()}} </h3>
        </div>
        <div class="card-body">
        <div>
            <canvas id="room-chart"></canvas>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
@endsection
@section('script')
<script src="/assets/js/plugins/chartjs.min.js"></script>
<script>
//transaction
const month = {!! json_encode($month, JSON_HEX_TAG) !!};
const total = {!! json_encode($total, JSON_HEX_TAG) !!};
const labels = month;
const data = {
  labels: labels,
  datasets: [{
    label: 'Monthly report',
    backgroundColor: '#f3a4c5',
    borderColor: '#89ddff',
    data: total,
  }]
};
const config = {
  type: 'line',
  data,
};
var myChart = new Chart(
      document.getElementById('transc-chart'),
      config
);
//user
const user_month = {!! json_encode($user_month, JSON_HEX_TAG) !!};
const user_count = {!! json_encode($user_count, JSON_HEX_TAG) !!};
const data2 = {
  labels: user_month,
  datasets: [{
    label: 'User dataset',
    data: user_count,
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)',
      '#292D3E',
      '#263238',
      '#82aaff',
      '#c3e88d',
      '#676E95',
      '#89ddff',
      '#c792ea',
      '#202331',
      '#414863',

    ],
    hoverOffset: 4
  }]
};
const config2 = {
  type: 'pie',
  data: data2,
};
var myChart2 = new Chart(
      document.getElementById('user-chart'),
      config2
);

//room
const room_month = {!! json_encode($room_month, JSON_HEX_TAG) !!};
const room_count = {!! json_encode($room_count, JSON_HEX_TAG) !!};
const data3 = {
  labels: room_month,
  datasets: [{
    label: 'Room dataset',
    data: room_count,
    backgroundColor: [
        'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)',
      '#292D3E',
      '#263238',
      '#82aaff',
      '#c3e88d',
      '#676E95',
      '#89ddff',
      '#c792ea',
      '#202331',
      '#414863',
    ],
    hoverOffset: 4
  }]
};
const config3 = {
  type: 'doughnut',
  data: data3,
};
var myChart3 = new Chart(
      document.getElementById('room-chart'),
      config3
);
new PerfectScrollbar('.wrapper');
  </script>
@endsection
