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

        <script src="../../js/ajax-jquery.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <form method="post" action="/Stock" class="form-horizontal">
            @csrf
            <div class="card-body">
                <h4 class="card-title">Store Items In Stock Room</h4>

                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Item</label>
                    <div class="col-md-9">
                        <select class="select2 form-control custom-select" id="Type" style="width: 40%; height:36px;"
                                name='Type'>
                            <option value="">select</option>
                            @foreach($items as  $type)
                                <option value="{{ $type->SIID}}">{{ $type->Item_Code }} | {{ $type->Asset_No }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Quantity</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" onkeyup="addFields()" id="Quantity" name="Quantity">

                    </div>

                </div>
                <div class="form-group row">
                    <label for="email1" class="col-sm-3 text-right control-label col-form-label"></label>
                    <div class="col-sm-9" id="container">


                    </div>

                </div>
                <input type="hidden" name="Countuncount" id="Countuncount" value="">
                <input type="hidden" name="Stock_Room" value="{{ $stockid }}">
                <input type="hidden" name="CUID" value="{{ Auth::user()->id }}">
                <input type="hidden" name="UUID" value="{{ Auth::user()->id }}">
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript">


        $("#Type").change(function (e) {

            var container = document.getElementById("container");
            // Clear previous contents of the container

            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }

            var t = $(this).val();
            e.preventDefault();

            $.ajax({
                method: 'POST',
                url: " {{ route('ajaxRequest3.Fabric3') }}",
                data: {value: t},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    //alert(data.htmlbrand)

                    //var test  = JSON.stringify(data);
                    //alert(data.success);
                    //   alert(data.htmlfabric)

                    //   $('#Manufacturer').html(data.htmlmanufacturer);
                    if (data.htmlfabric == '' || data.htmlfabric == 'UnCountable') {
                        document.getElementById("Countuncount").value = 0
                    } else {
                        document.getElementById("Countuncount").value = data.htmlfabric
                    }
                },
                error: function () {
                    alert('n')

                }

            });
        });

        function addFields() {
            // Number of inputs to create

            var number = document.getElementById("Quantity").value;
            var Countuncount = document.getElementById("Countuncount").value;
            //alert(Countuncount);
            // Container <div> where dynamic content will be placed
            if (Countuncount == "Countable") {
                var container = document.getElementById("container");
                // Clear previous contents of the container

                while (container.hasChildNodes()) {
                    container.removeChild(container.lastChild);
                }
                for (i = 0; i < number; i++) {
                    // Append a node with a random text
                    container.appendChild(document.createTextNode("Asset Number " + (i + 1) + " "));
                    // Create an <input> element, set its type and name attributes
                    var input = document.createElement("input");
                    input.type = "text";
                    input.name = "Asset_No " + i;
                    input.class = "form-control";
                    input.width = "300px";
                    input.required = "required";
                    container.appendChild(input);
                    // Append a line break
                    container.appendChild(document.createElement("br"));
                    container.appendChild(document.createElement("br"));
                }
            }
        }
    </script>
    <script src="../../js/ajax-jquery2.js"></script>
@endsection()
