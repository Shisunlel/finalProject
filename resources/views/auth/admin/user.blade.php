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
                    <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="modal" data-target="#removeModal{{$user->id}}">
                        <i class="tim-icons icon-simple-remove"></i>
                    </button>
                                        <!-- Modal -->
                    <div class="modal fade" id="removeModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="removeModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="removeModalLabel">Are you sure ?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="tim-icons icon-simple-remove"></i>
                            </button>
                            </div>
                            <div class="modal-body text-warning">
                            You cannot undo this action one confirmed !!
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form id="removed{{$user->id}}" action="{{route('dash.profile.destroy', $user)}}" method="POST">
                                @method('DELETE')
                                @csrf
                            <button type="button" class="btn btn-danger" onclick="document.getElementById('removed{{$user->id}}').submit();">Delete</button>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>    
    <div class="d-flex justify-content-end">
        {!! $users->links() !!}
    </div>
</div>
@endsection