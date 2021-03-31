<div class="col-2" id="sidebar">
    <ul>
        <li class="{{url()->current() == route('profile') ? 'active' : ''}}"><a href="{{route('profile')}}">Profile</a></li>
        <li class="{{url()->current() == route('view-home') ? 'active' : ''}}"><a href="{{route('view-home')}}">View Home</a></li>
        <li class="{{url()->current() == route('history') ? 'active' : ''}}"><a href="{{route('history')}}">History</a></li>
    </ul>
</div>