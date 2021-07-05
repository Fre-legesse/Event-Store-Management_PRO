@extends('layouts.app')

@section('content')
    <h4>Restock Item</h4>
    <form method="post" action="/restock/{{$event->EVID}}" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card" style="background-color: #f2f2f2;">
                    <div class="card-body">
                        <h4 class="card-title">Event Form</h4>

                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-left control-label col-form-label">Event
                                Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="email1" name="Event_Name" placeholder=""
                                       value="{{ $event->Event_Name }}" disabled style="background-color: white;">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-left control-label col-form-label">Date
                                From</label>
                            <div class="col-sm-2">


                                <input type="text" class="form-control" id="email1" name="Date_From" placeholder=""
                                       value="{{   $newDate = date("m/d/Y", strtotime($event->Date_From)) }}"
                                       disabled style="background-color: white;">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-left control-label col-form-label">Date To</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="email1" name="Date_To" placeholder=""
                                       value="{{   $newDate = date("m/d/Y", strtotime($event->Date_To)) }}" disabled
                                       style="background-color: white;">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1"
                                   class="col-sm-3 text-left control-label col-form-label">Location</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="email1" name="Location" placeholder=""
                                       value="{{ $event->Location }}" disabled style="background-color: white;">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1"
                                   class="col-sm-3 text-left control-label col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="email1" name="Event_Name" placeholder=""
                                          value="{{ $event->Description }}" disabled cols="5" rows="5"
                                          style="background-color: white;">{{ $event->Description }}</textarea>
                            </div>
                        </div>
                        {{--                        <div class="form-group row">--}}
                        {{--                            <label for="lname" class="col-sm-3 text-left control-label col-form-label">Event--}}
                        {{--                                Type</label>--}}
                        {{--                            <div class="col-md-9">--}}
                        {{--                                <select class="select2 form-control custom-select"--}}
                        {{--                                        style="width: 40%; height:36px;background-color: white;" name='Event_Type'--}}
                        {{--                                        disabled>--}}
                        {{--                                    <option value="">Select</option>--}}
                        {{--                                    @foreach($event as  $type)--}}
                        {{--                                        <option--}}
                        {{--                                            value="{{ $type->Type_Name}}" {{$type->Type_Name == $event->Event_Type  ? 'selected' : ''}} >{{ $type->Type_Name }}</option>--}}
                        {{--                                    @endforeach--}}
                        {{--                                </select>--}}

                        {{--                            </div>--}}
                        {{--                        </div>--}}
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
                                   class="col-sm-3 text-left control-label col-form-label">Requester</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="email1" name="Requester"
                                       style="width: 450px;background-color: white;"
                                       value="{{ $item_request->Requester }}" disabled>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-left control-label col-form-label">Responsible
                                Person (BGI)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="email1" name="Responsible_Person_BGI"
                                       style="width: 450px;" value="{{ $item_request->Responsible_person_BGI }}"
                                       disabled>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-left control-label col-form-label">Phone
                                Number (BGI)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="email1" name="Phone_Number_BGI"
                                       style="width: 450px;" value="{{ $item_request->Phone_Number_BGI }}" disabled>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-left control-label col-form-label">Responsible
                                Person (Client)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="email1" name="Responsible_Person_Client"
                                       style="width: 450px;" value="{{ $item_request->Responsible_person_Client }}"
                                       disabled>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-left control-label col-form-label">Phone
                                Number (Client)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="email1" name="Phone_Number_Client"
                                       style="width: 450px;" value="{{ $item_request->Phone_Number_Client }}" disabled>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-left control-label col-form-label">Return
                                Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="email1" name="Return_date"
                                       style="width: 450px;background-color: white;"
                                       value="{{$item_request->Return_date->format('Y-m-d')}}" disabled>
                            </div>
                        </div>

                        <input type="hidden" name="CUID" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="UUID" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="IRID" value="{{ $item_request->IRID }}">
                    </div>

                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Item Restock Form</h4>
                <div class="form-group row">
                    @foreach($items as $item)
                        <label for="issued_quantity"
                               class="col-sm-3 col-lg-3 text-left control-label col-form-label">{{ \App\Models\Stock_item::query()->find($item->ItemCode)->Item_Code }}</label>
                        <div class="col-sm-3 col-lg-2 ">
                            <input type="text" class="form-control"
                                   readonly
                                   value="{{$item->Item_Remaining > 0?$item->Item_Remaining: $item->IssuedQuantity}}">
                        </div>

                        <div class="col-sm-3 col-lg-2 ">
                            <input type="number" class="returned_quantity form-control"
                                   name="returned_quantity[][{{$item->Stock_ID}}]"
                                   onchange="()=>decide_status_requirement({{$item->Stock_ID}})"
                                   min="0"
                                   max="{{$item->Item_Remaining > 0?$item->Item_Remaining: $item->IssuedQuantity}}"
                                   placeholder="Returned Quantity">
                        </div>
                        <div class="col-sm-3 col-lg-2">
                            <select disabled name="damage_status[][{{$item->Stock_ID}}]" class="damage_status form-control">
                                <option hidden selected value="">Choose item status</option>
                                <option value="Good">Good</option>
                                <option value="Damaged">Damaged</option>
                            </select>
                        </div>
                        <div class="col-sm-3 col-lg-2">
                            <input class="item_image form-control" type="file" accept="image/*"
                                   name="item_image[][{{$item->Stock_ID}}]"
                                   disabled
                                   placeholder="Insert the returned item's Picture">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="border-top">
            <div class="card-body">
                <button type="submit" name="Submit" class="btn btn-success">Returned</button>
            </div>
        </div>
    </form>

    <script>
        $('.returned_quantity').each(function (index, item) {
            $('.returned_quantity').keyup(function () {
                if ($(item).val() !== '' && $(item).val() !== '0') {
                    $($('.damage_status')[index]).attr({'required':true, 'disabled':false})
                }else if($(item).val() === '' || $(item).val() === '0'){
                    $($('.damage_status')[index]).attr({'required':false, 'disabled':true})
                    $($('.item_image')[index]).attr({'required':false, 'disabled':true})
                }
            })
            $('.returned_quantity').change(function () {
                if ($(item).val() !== '' && $(item).val() !== '0') {
                    $($('.damage_status')[index]).attr({'required':true, 'disabled':false})
                }else if($(item).val() === '' || $(item).val() === '0'){
                    $($('.damage_status')[index]).attr({'required':false, 'disabled':true})
                    $($('.item_image')[index]).attr({'required':false, 'disabled':true})
                }
            })
        })

        $('.damage_status').each(function (index, item) {
            $('.damage_status').change(function () {
                if ($(item).val() === "Damaged") {
                    $($('.item_image')[index]).attr({'required':true, 'disabled':false})
                }else if($(item).val() === 'Good'){
                    $($('.item_image')[index]).attr({'required':false, 'disabled':true})
                }
            })
        })
    </script>
@endsection
