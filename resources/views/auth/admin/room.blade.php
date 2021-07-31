@extends('/auth.admin.layouts.default')
@section('content')
<div class="content">
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Address</th>
                <th class="text-right">Price</th>
                <th class="text-right">Qty</th>
                <th class="text-right">Guest</th>
                <th class="text-right">Owner</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
            <tr>
                <td class="text-center">{{$room->id}}</td>
                <td>{{Str::limit($room->title, 15)}}</td>
                <td>{{Str::limit($room->description, 15)}}</td>
                <td>{{Str::limit($room->address, 15)}}</td>
                <td class="text-right">&dollar; {{$room->price}}</td>
                <td class="text-right">{{$room->qty}}</td>
                <td class="text-right">{{$room->guest}}</td>
                <td class="text-right">{{$room->user_id}}</td>
                <td class="td-actions text-right">
                    <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="modal" data-target="#removeModal{{$room->id}}">
                        <i class="tim-icons icon-simple-remove"></i>
                    </button>
                                        <!-- Modal -->
                    <div class="modal fade" id="removeModal{{$room->id}}" tabindex="-1" role="dialog" aria-labelledby="removeModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="removeModalLabel">Are you sure ?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="tim-icons icon-simple-remove"></i>
                            </button>
                            </div>
                            <div class="modal-body text-warning text-center">
                            You cannot undo this action one confirmed !!
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form id="removed{{$room->id}}" action="{{route('dash.room.destroy', $room)}}" method="POST">
                                @method('DELETE')
                                @csrf
                            <button type="button" class="btn btn-danger" onclick="document.getElementById('removed{{$room->id}}').submit();">Delete</button>
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
    {!! $rooms->links() !!}
</div>
</div>
@endsection