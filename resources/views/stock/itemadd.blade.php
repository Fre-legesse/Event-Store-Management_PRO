@extends('layouts.app')

@section('content')
    <div class="card">
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
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <script src="../../js/ajax-jquery.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        </head>
        <form method="post" action="/Item" class="form-horizontal">
            @csrf
            <div class="card-body">
                <h4 class="card-title">Create Item</h4>
                <div class="form-group row">
                    <label for="Type" class="col-sm-3 text-left control-label col-form-label">Item Type</label>
                    <div class="col-md-9">
                        <select class="select2 form-control custom-select" style="width: 75%; height:36px;" name='Type'
                                id="Type">
                            <option value="">Select</option>
                            @foreach($category as $id)
                                <option value="{{ $id->Type }}">
                                    {{ $id->Type }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-left control-label col-form-label">Fabric</label>
                    <div class="col-md-9">
                        <select name="Fabric" id="Fabric" class="select2 form-control custom-select"
                                style="width: 75%; height:36px;">
                            <option value="">Please Select Item Type</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-left control-label col-form-label">Color</label>
                    <div class="col-md-9">
                        <select name="Color" id="Color" class="select2 form-control custom-select"
                                style="width: 75%; height:36px;">
                            <option value="">Please Select Item Type</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-left control-label col-form-label">Brand</label>
                    <div class="col-md-9">
                        <select name="Brand" id="Brand" class="select2 form-control custom-select"
                                style="width: 75%; height:36px;">
                            <option value="">Please Select Item Type</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-left control-label col-form-label">Manufacturer</label>

                    <div class="col-md-9">
                        <select name="Manufacturer" id="Manufacturer" class="select2 form-control custom-select"
                                style="width: 75%; height:36px;">
                            <option value="">Please Select Item Type</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email1" class="col-sm-3 text-left control-label col-form-label">Size</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control col-md-6" id="email1" name="Size"
                               placeholder="example: Big, small, Double Door" max="10">

                    </div>
                </div>
                <div class="form-group row">
                    <label for="email1" class="col-sm-3 text-left control-label col-form-label">Status</label>
                    <div class="col-sm-9">
                        <select name="Status" id="Status" class="select2 form-control custom-select"
                                style="width: 75%; height:36px;">
                            <option value="">Please Select Status</option>
                            <option value="Returnable">Returnable</option>
                            <option value="Non_Returnable">Non Returnable</option>

                        </select>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="email1"
                           class="col-sm-3 text-left control-label col-form-label">Countable/Uncountable</label>
                    <div class="col-sm-9">
                        <select name="Countable" id="Countable" class="select2 form-control custom-select"
                                style="width: 75%; height:36px;">
                            <option value="">Please Select Status</option>
                            <option value="UnCountable">UnCountable</option>
                            <option value="Countable">Countable</option>

                        </select>
                    </div>
                </div>

                <input type="hidden" name="CUID" value="{{ Auth::user()->id }}">
                <input type="hidden" name="UUID" value="{{ Auth::user()->id }}">
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        {{--        <form action="/import/stock_item" method="POST" enctype="multipart/form-data">--}}
        {{--            @csrf--}}
        {{--            <input type="file" name="file">--}}
        {{--            <button type="submit" class="btn btn-primary">Import File</button>--}}
        {{--        </form>--}}
    </div>
    <script>
        $(document).ready(function () {

            $("#Type").change(function (e) {

                var t = $(this).val();
                e.preventDefault();

                $.ajax({
                    method: 'POST',
                    url: "{{ route('ajaxRequest.post') }}",
                    data: {value: t},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        //alert(data.htmlbrand)

                        //var test  = JSON.stringify(data);
                        //alert(data.success);
                        //alert(test)
                        $('#Fabric').html(data.htmlfabric);
                        $('#Color').html(data.htmlcolor);
                        $('#Brand').html(data.htmlbrand);
                        $('#Manufacturer').html(data.htmlmanufacturer);
                    },
                    error: function () {
                        alert('n')
                    }

                });
            });
        })
    </script>
    {{--    <script src="../../js/ajax-jquery2.js"></script>--}}
@endsection()
