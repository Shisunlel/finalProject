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