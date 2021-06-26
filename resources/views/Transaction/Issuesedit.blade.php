@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <form method="post" action="/Withdrawal/{{ $RealEvent->EVID }}/test" class="form-horizontal">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card" style="background-color: #f2f2f2;">
                    <div class="card-body">
                        <h4 class="card-title">Event Form</h4>

                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-right control-label col-form-label">Event
                                Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="email1" name="Event_Name" placeholder=""
                                       value="{{ $RealEvent->Event_Name }}" disabled style="background-color: white;">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-right control-label col-form-label">Date
                                From</label>
                            <div class="col-sm-2">


                                <input type="text" class="form-control" id="email1" name="Date_From" placeholder=""
                                       value="{{   $newDate = date("m/d/Y", strtotime($RealEvent->Date_From)) }}"
                                       disabled style="background-color: white;">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-right control-label col-form-label">Date To</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="email1" name="Date_To" placeholder=""
                                       value="{{   $newDate = date("m/d/Y", strtotime($RealEvent->Date_To)) }}" disabled
                                       style="background-color: white;">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1"
                                   class="col-sm-3 text-right control-label col-form-label">Location</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="email1" name="Location" placeholder=""
                                       value="{{ $RealEvent->Location }}" disabled style="background-color: white;">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1"
                                   class="col-sm-3 text-right control-label col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="email1" name="Event_Name" placeholder=""
                                          value="{{ $RealEvent->Description }}" disabled cols="5" rows="5"
                                          style="background-color: white;">{{ $RealEvent->Description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Event
                                Type</label>
                            <div class="col-md-9">
                                <select class="select2 form-control custom-select"
                                        style="width: 40%; height:36px;background-color: white;" name='Event_Type'
                                        disabled>
                                    <option value="">Select</option>
                                    @foreach($event as  $type)
                                        <option
                                            value="{{ $type->Type_Name}}" {{$type->Type_Name == $RealEvent->Event_Type  ? 'selected' : ''}} >{{ $type->Type_Name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <input type="hidden" name="CUID" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="UUID" value="{{ Auth::user()->id }}">
                    </div>

                </div>
            </div>

            <div class="col-md-6">
                <div class="card" style="background-color: #f2f2f2;">
                    <div class="card-body">
                        <h4 class="card-title">Request Form</h4>
                        <div class="form-group row">
                            <label for="lname"
                                   class="col-sm-3 text-right control-label col-form-label">Requester</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="email1" name="Requester"
                                       style="width: 450px;background-color: white;"
                                       value="{{ $ItemRequest->Requester }}" disabled>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Responsible
                                Person (BGI)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="email1" name="Responsible_Person_BGI"
                                       style="width: 450px;" value="{{ $ItemRequest->Responsible_person_BGI }}" disabled>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Phone
                                Number (BGI)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="email1" name="Phone_Number_BGI"
                                       style="width: 450px;" value="{{ $ItemRequest->Phone_Number_BGI }}" disabled>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Responsible
                                Person (Client)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="email1" name="Responsible_Person_Client"
                                       style="width: 450px;" value="{{ $ItemRequest->Responsible_person_Client }}" disabled>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Phone
                                Number (Client)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="email1" name="Phone_Number_Client"
                                       style="width: 450px;" value="{{ $ItemRequest->Phone_Number_Client }}" disabled>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-right control-label col-form-label">Return
                                Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="email1" name="Return_date"
                                       style="width: 450px;background-color: white;" disabled>
                            </div>
                        </div>

                        <input type="hidden" name="CUID" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="UUID" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="IRID" value="{{ $ItemRequest->IRID }}">
                    </div>

                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Item Selection Form</h4>
                @foreach($requested_items as $requested_item)
                    <div class="form-group row">
                        <label for="issued_quantity"
                               class="col-sm-3 text-right control-label col-form-label">{{ \App\Models\Stock_item::query()->find($requested_item->ItemCode)->Item_Code }}</label>
                        <div class="col-sm-4">
                            <div class="col-sm-8 col-lg-9">
                                <input type="text" class="form-control"
                                       name="issued_quantity[][{{$requested_item->Stock_ID}}]"
                                       readonly
                                       {{--                                       placeholder="Approved Quantity: {{$requested_item->Approval2Quantity ?? $requested_item->Approval1Quantity}}"--}}
                                       value="{{$requested_item->Approval2Quantity ?? $requested_item->Approval1Quantity}}">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <select name="issued_item[{{$requested_item->Stock_ID}}]"
                                    class="select2 form-control custom-select" style="width: 40%; height:36px;">
                                <option value="">Select</option>
                                <option value=1>Issued
                                </option>
                            </select>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="border-top">
            <div class="card-body">
                <button type="submit" name="Submit" class="btn btn-danger">Issue</button>
            </div>
        </div>

    </form>

@endsection()
