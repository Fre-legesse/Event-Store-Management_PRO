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
    <form method="post" action="/Event" class="form-horizontal">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Event Form</h4>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-left control-label col-form-label">Event
                                Type</label>
                            <div class="col-md-9">
                                <select required class="select2 form-control custom-select"
                                        style="width: 40%; height:36px;" name='Event_Type'>
                                    <option value="">Select</option>
                                    @foreach($event as  $type)
                                        <option value="{{ $type->Type_Name}}">{{ $type->Type_Name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-left control-label col-form-label">Event
                                Name</label>
                            <div class="col-sm-4">
                                <input required type="text" class="form-control" id="email1" name="Event_Name"
                                       placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-left control-label col-form-label">Date
                                From</label>
                            <div class="col-sm-4">
                                <input required type="date" class="form-control" id="email1" name="Date_From"
                                       placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-left control-label col-form-label">Date To</label>
                            <div class="col-sm-4">
                                <input required type="date" class="form-control" id="email1" name="Date_To"
                                       placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1"
                                   class="col-sm-3 text-left control-label col-form-label">Location</label>
                            <div class="col-sm-4">
                                <input required type="text" class="form-control" id="email1" name="Location"
                                       placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1"
                                   class="col-sm-3 text-left control-label col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="email1" name="Description" placeholder=""
                                          cols="10" rows="10"></textarea>
                            </div>
                        </div>

                        <input required type="hidden" name="CUID" value="{{ Auth::user()->id }}">
                        <input required type="hidden" name="UUID" value="{{ Auth::user()->id }}">
                    </div>

                </div>
                <div class="card col-lg-12 col-sm-12">
                    <div class="card-body">
                        <h4 class="card-title">Post Form</h4>
                        <div class="form-group row">
                            <label class="col-md-6">Confirm publication of this form: </label>
                            <div class="col-md-6">
                                <div class="form-check mr-sm-2">
                                    <input type="checkbox"
                                           class="form-check-input"
                                           id="post_checkbox"
                                           value="Posted"
                                           name="post_checkbox">
                                    <label class="form-check-label mb-0" for="post_checkbox"> Publish</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Requester Form</h4>
                        <div class="form-group row">
                            <label for="Requester"
                                   class="col-sm-3 text-left control-label col-form-label">Requester</label>
                            <div class="col-md-9">
                                <input required type="text" class="form-control" id="email1" name="Requester"
                                       style="width: 450px;" value="{{auth()->user()->name}}" readonly>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-left control-label col-form-label">Responsible
                                Person (BGI)</label>
                            <div class="col-md-9">
                                <input required type="text" class="form-control" id="email1"
                                       name="Responsible_person_BGI"
                                       style="width: 450px;">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-left control-label col-form-label">Phone
                                Number (BGI)</label>
                            <div class="col-md-9">
                                <input required type="tel" maxlength="13" minlength="9"
                                       class="form-control" id="email1" name="Phone_Number_BGI"
                                       style="width: 450px;" placeholder="Eg: 0912345678">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-left control-label col-form-label">Responsible
                                Person (Client Side)</label>
                            <div class="col-md-9">
                                <input required type="text" class="form-control" id="email1"
                                       name="Responsible_person_Client"
                                       style="width: 450px;">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-left control-label col-form-label">Phone
                                Number (Client Side)</label>
                            <div class="col-md-9">
                                <input required type="tel" maxlength="13" minlength="9"
                                       class="form-control" id="email1" name="Phone_Number_Client"
                                       style="width: 450px;" placeholder="Eg: 0912345678">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-left control-label col-form-label">Return
                                Date</label>
                            <div class="col-sm-9">
                                <input required type="date" class="form-control" id="email1" name="Return_date"
                                       style="width: 450px;">
                            </div>
                        </div>

                        <input required type="hidden" name="CUID" value="{{ Auth::user()->id }}">
                        <input required type="hidden" name="UUID" value="{{ Auth::user()->id }}">
                    </div>

                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Select Items</h4>


                        <div class="form-group row">
                            <label for="category1"
                                   class="col-sm-3 text-left control-label col-form-label">Category</label>
                            <div class="col-md-7">
                                <select data-search="true" id="category1" class="select2 form-control">
                                    <option value="" selected hidden>Please Select</option>

                                    @foreach($Stock_category as  $type)
                                        {{debug($type->Type)}}
                                        <option value="{{ $type->Type}}">{{ $type->Type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-left control-label col-form-label">Item
                                List</label>
                            <div class="col-md-7">
                                <select theme="google" width="400" style="" placeholder="Select Your Favorite"
                                        data-search="true" id="itemlist" style="width: 180px;background-color: white;"
                                        required disabled class="select2 form-control">
                                    <option value="">Choose Category First</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="stockqty" class="col-sm-3 text-left control-label col-form-label"> Stock
                                Quantity</label>
                            <div class="col-md-9">
                                <div class="row">
                                    <input type="number" class="form-control" id="stockqty" name="stockqty"
                                           style="width: 180px;background-color: white;" disabled value="">
                                    <label class="Control-label col-form-label"> &nbsp; Request QTY. &nbsp; </label>
                                    <input type="number" min="1" max="" class="form-control col-lg-3" id="requestQ"
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

                        <input type="hidden" name="CUID" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="UUID" value="{{ Auth::user()->id }}">
                    </div>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body" id="item_selection_list">
                <h4 class="card-title">Requested Items</h4>
            </div>

        </div>

        <div class="border-top">
            <div class="card-body">
                <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        $(document).ready(function () {
            function test($max, $value, $name) {
                $one = parseInt($max);
                $two = parseInt($value);
                if ($two >= $one) {
                    document.getElementById($name).value = $one;
                }
            }

            function additemcall() {
                $.ajax({
                    method: 'POST',
                    url: "{{ route('add_item_event_ajax') }}",
                    data: {
                        item_stock_id: $("#itemlist").val(),
                        requested_quantity: $('#requestQ').val(),
                        stock_quantity: $('#stockqty').val(),
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if (document.getElementById('stock_item_' + data['stock_id']) !== null && (parseInt(document.getElementById('stock_item_' + data['stock_id']).value) + parseInt(data['requested_quantity'])) <= parseInt($('#stockqty').val())) {
                            document.getElementById('stock_item_' + data['stock_id']).value = parseInt(document.getElementById('stock_item_' + data['stock_id']).value) + parseInt(data['requested_quantity'])
                        } else if (document.getElementById('stock_item_' + data['stock_id']) !== null && (parseInt(document.getElementById('stock_item_' + data['stock_id']).value) + parseInt(data['requested_quantity'])) > parseInt($('#stockqty').val())) {
                            alert('Requested quantity can not be greater than Stock Quantity.');
                        } else {
                            $('#item_selection_list').append(
                                "<div class=\"form-group row\" id='item_selection_row_" + data['stock_id'] + "'>" +
                                "<div class=\"col-sm-4\" \n" +
                                "                        <label for=\"email1\"\n" +
                                "                               class=\"col-sm-6 text-left control-label col-form-label\">" + data['item_code'] + "</label>\n" +
                                "                    </div>\n" +
                                "                    <div class=\"col-sm-4\">\n" +
                                "                        <input type=\"number\" class=\"form-control\" name='requested_quantity[][" + data['stock_id'] + "]' id='stock_item_" + data['stock_id'] + "'\n" +
                                "                               value=" + data['requested_quantity'] + " readonly>\n" +
                                "\n" +
                                "                    </div>\n" +
                                "                    <div class=\"col-sm-2\">\n" +
                                "\n" +
                                "\n" +
                                "                        <div class=\"col-sm-2\">\n" +
                                "                            <button type=\"button\" id=\"delete_button\" class=\"btn btn-danger\"\n" +
                                "                                    onclick=\"$('#item_selection_row_" + data['stock_id'] + "').remove();\">Delete\n" +
                                "                            </button>\n" +
                                "                        </div>\n" +
                                "\n" +
                                "                    </div>" +
                                "</div>"
                            );
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        if (xhr.status === 422) {
                            alert('Make sure you have entered a Valid request quantity. Should not be empty and should not exceed the stock quantity.');
                        } else {
                            alert(xhr.status);
                        }
                    }

                });

                {{--var max = document.getElementById('requestQ').getAttribute('max')--}}
                {{--var QuanitityofItem = document.getElementById('requestQ').value--}}

                {{--if (parseInt(max) < parseInt(QuanitityofItem)) {--}}
                {{--    return false;--}}
                {{--}--}}

                {{--var t = document.getElementById('requestQ').value--}}
                {{--var t1 = document.getElementById('itemlist').value--}}
                {{--var t2 = document.getElementById('eventid').value--}}
                {{--var t3 = document.getElementById('itemrqid').value--}}
                {{--var t4 = document.getElementById('CUID').value--}}
                {{--var t5 = document.getElementById('CUID').value--}}
                {{--var category = document.getElementById('category1').value--}}

                {{--//alert(t)--}}


                {{--$.ajax({--}}
                {{--    method: 'POST',--}}
                {{--    url: "{{ route('ajaxRequest5.Fabric5') }}",--}}
                {{--    data: {--}}
                //         value: t3,
                //         value1: t2,
                //         value2: t1,
                //         value3: t,
                //         value4: t4,
                //         value5: t5,
                //         category: category,
                {{--    },--}}
                {{--    headers: {--}}
                {{--        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
                {{--    },--}}
                {{--    success: function (data) {--}}


                {{--        //alert(data);--}}
                {{--        //var test  = JSON.stringify(data);--}}
                {{--        //alert(data.success);--}}
                {{--        //alert(test)--}}
                {{--        //$('#stockqty').html(data);--}}
                {{--        location.reload();--}}

                {{--    },--}}
                {{--    error: function (xhr, ajaxOptions, thrownError) {--}}
                {{--        alert('n')--}}
                {{--        alert(xhr.status);--}}

                {{--    }--}}

                {{--});--}}


            }

            $(document).ready(function () {
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
                            alert(thrownError);

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


            })
        })
    </script>


@endsection()
