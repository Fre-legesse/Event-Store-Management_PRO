@extends('layouts.app')

@section('content')
    <h3>Item List</h3>

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
    <div class="box-content">
        <!-- put your content here -->
        <script type="text/javascript">
            function myFunction() {
                var value = $('#searchh').val();
                $("#table tr").each(function (index) {
                    if (index !== 0) {

                        $row = $(this);


                        var id = $row.find("td:nth-child(2)").text();

                        if (id.indexOf(value) !== 0) {
                            $row.hide();
                        } else {
                            $row.show();
                        }
                    }
                });
            }
        </script>
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Item Registration</h4>
                <div class="form-group row">
                    <a class="btn btn-lg btn-default" href="Item/create/">Add New</a>
                    <input type="text" class="form-control" style="width: 200px; float: right;margin-left: 1300px;"
                           id="searchh" placeholder="Listed Type live search" onkeyup="myFunction()">
                </div>
                <div class="form-group row">
                    <!--          <a href="docAdd.php"><i class="glyphicon glyphicon-plus"></i><span>New</span></a> -->

                    <table class="table" id="table">
                        <thead>
                        <tr>


                            <th scope="col">Item Code</th>

                            <th scope="col">Size</th>
                            <th scope="col">Fabric</th>
                            <th scope="col">Color</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(count($items) >= 1)
                            @foreach($items as $item)
                                <tr>

                                    <div class="well">
                                        <td>{{ $item->Item_Code }}</td>

                                        <td>{{ $item->Size }}</td>
                                        <td>{{ $item->Fabric }}</td>
                                        <td>{{ $item->Color }}</td>
                                        <td>{{ $item->Status }}</td>
                                        <td>
                                            <div class="row">


                                                <a style="white-space: nowrap;" type="button"
                                                   href="Item/{{ $item->SIID }}/edit" class="btn btn-default btn-sm">Edit</a>

                                                <form method="POST" action="/item/delete/{{ $item->SIID }}">
                                                    {{ csrf_field() }}

                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
                                        </td>

                                    </div>
                                </tr>
                            @endforeach


                        @else
                            <td>No Item Found</td>


                        @endif


                        </tbody>
                        <script type="text/javascript">

                            function downloadURI(uri, name) {
                                alert(uri);
                                var link = document.createElement("a");
                                link.download = name;
                                link.href = uri;
                                link.click();
                            }
                        </script>

                    </table>


                </div>


            </div>
        </div>

@endsection()
