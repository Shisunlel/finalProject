@extends('/auth.admin.layouts.default')
@section('content')
<div class="content">
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>DOB</th>
                <th>Phone Number</th>
                <th>Profile</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td class="text-center">{{$user->id}}</td>
                <td>{{$user->lastname . ' ' . $user->firstname}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->dob}}</td>
                <td>{{$user->phone_number}}</td>
                <td>
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="@if (Str::of($user->profile)->startsWith('https')) {{$user->profile}} @else @if (Str::length($user->profile) > 11) {{ '/img/user/' . $user->id . '/profile/' . $user->profile }} @else {{ '/img/'.$user->profile }} @endif @endif">
                  </span>
                </td>
                <td class="td-actions text-center">
                    <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
                        <i class="tim-icons icon-simple-remove"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>    
</div>
@endsection