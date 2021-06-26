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
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <form method="post" action="/event/publish/{{ $ItemRequest->IRID }}" class="form-horizontal">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Event Form</h4>

                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-right control-label col-form-label">Event
                                Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="email1" name="Event_Name" placeholder=""
                                       value="{{ $RealEvent->Event_Name }}"
                                       style="background-color: white;"
                                       disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-right control-label col-form-label">Date
                                From</label>
                            <div class="col-sm-2">


                                <input type="text" class="form-control" id="email1" name="Date_From"
                                       style="background-color: white;" placeholder=""
                                       value="{{   $newDate = date("m/d/Y", strtotime($RealEvent->Date_From)) }}"
                                       disabled>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-right control-label col-form-label">Date To</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="email1" name="Date_To"
                                       style="background-color: white;" placeholder=""
                                       value="{{   $newDate = date("m/d/Y", strtotime($RealEvent->Date_To)) }}"
                                       disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1"
                                   class="col-sm-3 text-right control-label col-form-label">Location</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="email1" name="Location"
                                       style="background-color: white;" placeholder=""
                                       value="{{ $RealEvent->Location }}" disabled>
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

                        <input type="hidden" id="eventid" value="{{ $RealEvent->EVID }}">
                        <input type="hidden" id="itemrqid" value="{{ $ItemRequest->IRID }}">
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
                        <input type="hidden" name="CUID" id="CUID" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="UUID" id="UUID" value="{{ Auth::user()->id }}">
                    </div>

                </div>
                <div class="card col-lg-12 col-sm-12">
                    <div class="card-body">
                        <h4 class="card-title">Post Form</h4>
                        <div class="form-group row">
                            <label class="col-md-3">Confirm publication when submit: </label>
                            <div class="col-md-9">
                                <div class="form-check mr-sm-2">
                                    @if($ItemRequest->Posted == 'Posted')
                                        <input type="checkbox"
                                               class="form-check-input"
                                               value="Posted"
                                               checked
                                               name="post_checkbox">
                                        <label class="form-check-label mb-0" for="post_checkbox">Publish</label>
                                    @else
                                        <input type="checkbox"
                                               class="form-check-input"
                                               value="Posted"
                                               name="post_checkbox">
                                        <label class="form-check-label mb-0" for="post_checkbox">Publish</label>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Request Form</h4>
                        <div class="form-group row">
                            <label for="lname"
                                   class="col-sm-3 text-right control-label col-form-label">Requester</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="email1" name="Requester"
                                       style="width: 450px;background-color: white;"
                                       value="{{ $ItemRequest->Requester }}" readonly>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Responsible
                                Person (BGI)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="email1" name="Responsible_Person_BGI"
                                       style="width: 450px;background-color: white;"
                                       value="{{ $ItemRequest->Responsible_person_BGI }}" disabled>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Phone
                                Number (BGI)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="email1" name="Phone_Number_BGI"
                                       style="width: 450px;background-color: white;"
                                       value="{{ $ItemRequest->Phone_Number_BGI }}" disabled>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Responsible
                                Person (Client)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="email1" name="Responsible_Person"
                                       style="width: 450px;background-color: white;"
                                       value="{{ $ItemRequest->Responsible_person_Client }}" disabled>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Phone
                                Number (Client)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="email1" name="Phone_Number"
                                       style="width: 450px;background-color: white;"
                                       value="{{ $ItemRequest->Phone_Number_Client }}" disabled>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-right control-label col-form-label">Return
                                Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="email1" name="Return_date"
                                       style="width: 450px;background-color: white;" disabled
                                       value="{{ $ItemRequest->Return_date }}">
                            </div>
                        </div>

                        <input type="hidden" name="CUID" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="UUID" value="{{ Auth::user()->id }}">
                    </div>

                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Select Items</h4>


                        <div class="form-group row">
                            <label for="category1"
                                   class="col-sm-3 text-right control-label col-form-label">Category</label>
                            <div class="col-md-9">
                                <select theme="google" width="400" style="" placeholder="Select Your Favorite"
                                        data-search="true" id="category1" class="form-control">
                                    <option value="" selected hidden>Please Select</option>
                                    @foreach($Stock_category as  $type)
                                        <option value="{{ $type->Type}}">{{ $type->Type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Item
                                List</label>
                            <div class="col-md-9">
                                <select theme="google" width="400" style="" placeholder="Select Your Favorite"
                                        data-search="true" id="itemlist" style="width: 180px;background-color: white;"
                                        required disabled class="form-control">
                                    <option value="">Choose Category First</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="stockqty" class="col-sm-3 text-right control-label col-form-label"> Stock
                                Quantity</label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <input type="number" class="form-control" id="stockqty" name="Return_date"
                                           style="width: 180px;background-color: white;" disabled value="">
                                    <label class="Control-label col-form-label"> &nbsp; Request QTY. &nbsp; </label>
                                    <input type="number" min="1" max="" class="form-control" id="requestQ"
                                           name="requestQ"
                                           style="width: 230px;background-color: white;">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" id="addbtn" class="btn btn-primary"
                                        onclick="additemcall()">Add
                                </button>
                            </div>

                        </div>

                        <script type="text/javascript">

                            $("#category1").change(function (e) {
                                var t = $(this).val();
                                console.log(t);
                                //alert(t);
                                e.preventDefault();

                                $.ajax({
                                    method: 'POST',
                                    url: "{{ route('ajaxRequest2.Fabric2') }}",
                                    data: {value: t},
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success: function (data) {
                                        //  alert(data)

                                        //var test  = JSON.stringify(data);
                                        //alert(data.success);
                                        //alert(test)
                                        $('#itemlist').attr('disabled', false);
                                        $('#itemlist').html(data.htmlappend);


                                    },
                                    error: function (xhr, ajaxOptions, thrownError) {
                                        alert('n')
                                        alert(xhr.status);

                                    }

                                });
                            });

                            $("#itemlist").change(function (e) {

                                var stock_item_id = $(this).val();
                                //alert(t);
                                e.preventDefault();

                                $.ajax({
                                    method: 'POST',
                                    url: "{{ route('ajaxRequest4.Fabric4') }}",
                                    data: {value: stock_item_id},
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success: function (data) {


                                        //var test  = JSON.stringify(data);
                                        //alert(data.success);
                                        //alert(test)
                                        //$('#stockqty').html(data);
                                        document.getElementById('stockqty').value = data
                                        $('#requestQ').attr('max', data)
                                        if (data == '1') {
                                            document.getElementById('requestQ').value = 1;
                                        } else if (data == '0') {
                                            document.getElementById('requestQ').value = 'No Stock';
                                            document.getElementById('requestQ').disabled = true;
                                            document.getElementById('addbtn').disabled = true;
                                        } else {
                                            document.getElementById('requestQ').disabled = false;

                                            document.getElementById('addbtn').disabled = false;
                                        }


                                    },
                                    error: function (xhr, ajaxOptions, thrownError) {
                                        alert('n')
                                        alert(xhr.status);

                                    }

                                });
                            });

                            function additemcall() {

                                var max = document.getElementById('requestQ').getAttribute('max')
                                var QuanitityofItem = document.getElementById('requestQ').value

                                if (parseInt(max) < parseInt(QuanitityofItem)) {
                                    return false;
                                }

                                var t = document.getElementById('requestQ').value
                                var t1 = document.getElementById('itemlist').value
                                var t2 = document.getElementById('eventid').value
                                var t3 = document.getElementById('itemrqid').value
                                var t4 = document.getElementById('CUID').value
                                var t5 = document.getElementById('CUID').value
                                var category = document.getElementById('category1').value

                                //alert(t)


                                $.ajax({
                                    method: 'POST',
                                    url: "{{ route('ajaxRequest5.Fabric5') }}",
                                    data: {
                                        value: t3,
                                        value1: t2,
                                        value2: t1,
                                        value3: t,
                                        value4: t4,
                                        value5: t5,
                                        category: category,
                                    },
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success: function (data) {


                                        //alert(data);
                                        //var test  = JSON.stringify(data);
                                        //alert(data.success);
                                        //alert(test)
                                        //$('#stockqty').html(data);
                                        location.reload();

                                    },
                                    error: function (xhr, ajaxOptions, thrownError) {
                                        alert('n')
                                        alert(xhr.status);

                                    }

                                });


                            }
                        </script>
                        <script src="../../js/ajax-jquery2.js"></script>


                        <input type="hidden" name="CUID" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="UUID" value="{{ Auth::user()->id }}">
                    </div>

                </div>

            </div>

        <!--
<div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Approval</h5>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Approval One</label>
                                    <div class="col-md-9">

                                             <select class="select2 form-control custom-select" style="width: 40%; height:36px;" name='ApprovalOne'>
                                        <option value="">Select</option>
                                        <option value="Approved" {{'Approved' == $ItemRequest->ApprovalOne   ? 'selected' : ''}}>Approved</option>
                                        <option value="Reject" {{'Reject' == $ItemRequest->ApprovalOne   ? 'selected' : ''}}>Reject</option>

                                          </select>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Approval Two</label>
                                    <div class="col-md-9">
                                             <select class="select2 form-control custom-select" style="width: 40%; height:36px;" name='ApprovalTwo'>
                                                <option value="">Select</option>
                                        <option value="Approved" {{'Approved' == $ItemRequest->ApprovalTwo   ? 'selected' : ''}} >Approved</option>
                                        <option value="Reject" {{'Reject' == $ItemRequest->ApprovalTwo   ? 'selected' : ''}}>Reject</option>

                                          </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

-->

        </div>


        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Item Selection Form</h4>
                @foreach($category as  $type)

                    <div class="form-group row">

                        <div class="col-sm-4">
                            <label for="email1"
                                   class="col-sm-6 text-right control-label col-form-label">{{  $type->Item_Code }}</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="email1"
                                   placeholder="Quantity :  {{ $type->Qty }}" disabled>

                        </div>
                        <div class="col-sm-2">


                            <div class="col-sm-2">
                                <button type="button" id="delete_button" class="btn btn-danger"
                                        onclick="delete_requested_item({{$type->Stock_ID}},{{$type->Event_ID}})">Delete
                                </button>
                            </div>

                        </div>
                    </div>

                @endforeach
            </div>

        </div>


        <div class="border-top">
            <div class="card-body">
                <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

    <script>
        function delete_requested_item(stock_id,event_id) {
            $.ajax({
                method: 'POST',
                url: "/item/delete",
                data: {
                    stock_id: stock_id,
                    event_id:event_id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    location.reload();
                }
            });
        }
    </script>

@endsection()
