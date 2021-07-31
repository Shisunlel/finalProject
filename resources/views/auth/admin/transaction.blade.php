@extends('/auth.admin.layouts.default')
@section('content')
<div class="content">
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Room ID</th>
                <th>Duration</th>
                <th>House Number</th>
                <th>Street</th>
                <th>District</th>
                <th>Commune</th>
                <th>Province</th>
                <th class="text-right">Cost</th>
                <th class="text-right">Total</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transcs as $transc)
            <tr>
                <td class="text-center">{{$transc->rent_id}}</td>
                <td>{{$transc->room_id}}</td>
                <td>{{$transc->duration}}</td>
                <td>{{Str::limit($transc->housenumber, 15)}}</td>
                <td>{{Str::limit($transc->street, 15)}}</td>
                <td>{{Str::limit($transc->district, 15)}}</td>
                <td>{{Str::limit($transc->commune, 15)}}</td>
                <td>{{Str::limit($transc->province, 15)}}</td>
                <td class="text-right">{{$transc->cost}}</td>
                <td class="text-right">{{$transc->total}}</td>
                <td class="td-actions text-right">
                    <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="modal" data-target="#removeModal{{$transc->rent_id}}">
                        <i class="tim-icons icon-simple-remove"></i>
                    </button>
                                        <!-- Modal -->
                    <div class="modal fade" id="removeModal{{$transc->rent_id}}" tabindex="-1" role="dialog" aria-labelledby="removeModalLabel" aria-hidden="true">
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
                            <form id="removed{{$transc->rent_id}}" action="{{route('dash.report.destroy', $transc->rent_id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                            <button type="button" class="btn btn-danger" onclick="document.getElementById('removed{{$transc->rent_id}}').submit();">Delete</button>
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
        {!! $transcs->links() !!}
    </div>
</div>
@endsection