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