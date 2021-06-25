@extends('layouts.app')

@section('content')
    <h4>Restock</h4>
    <div class="card">
        <div class="card-body">
            <div class="form-group row table-responsive">
                <table class="table table-hover" id="table">
                    <thead>
                    <tr>
                        <th scope="col">Event</th>
                        <th scope="col">Requester</th>
                        <th scope="col">Responsible</th>
                        <th scope="col">Return Date</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Remaining Days</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($items))
                        @foreach($items as $item)
                            <tr>
                                <td>{{$item->Event_Name}}</td>
                                <td>{{$item->Requester}}</td>
                                <td>{{$item->Responsible_person}}</td>
                                <td>{{$item->Return_date}}</td>
                                <td>{{$item->Phone_Number}}</td>
                                <td>{{date_diff(now(),date_create_from_format('Y-m-d',\App\Models\item_request::find($item->Request_ID)->Return_date))->format('%a')}} days
                                </td>
                                <td>
                                    <div class="row">
                                        <a  type="button"
                                           href="/restock/{{ $item->RILID }}"
                                           class="btn btn-info btn-md">Detail</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
