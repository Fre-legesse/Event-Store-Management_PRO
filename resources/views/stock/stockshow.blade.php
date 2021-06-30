@extends('layouts.app')

@section('content')
    <h3>Items In {{ $items }}</h3>

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

                <h4 class="card-title">Items In Stock</h4>
                <div class="form-group row">
                    <a class="btn btn-lg btn-default" href="{!! route('create', ['id'=>$id]) !!}">Add New</a>
                    <input type="text" class="form-control" style="width: 200px; float: right;margin-left: 1300px;"
                           id="searchh" placeholder="Listed Type live search" onkeyup="myFunction()">
                </div>
                <div class="form-group row">

                    <table class="table" id="table">
                        <thead class='thead-light'>
                        <tr>


                            <th scope="col">Item</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Asset Number</th>
                            <th scope="col">Maximum</th>
                            <th scope="col">Minimum</th>
                            <th scope="col">Reorder Point</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(count($items) >= 1)
                            @foreach($items as $item)
                                <tr>

                                    <div class="well">

                                        <td>{{ $item->Item_Code }}</td>
                                        <td>{{ $item->Quantity }}</td>
                                        <td>{{ $item->Asset_No }}</td>
                                        <td>{{ $item->MAX }}</td>
                                        <td>{{ $item->MIN }}</td>
                                        <td>{{ $item->Reorder_Point }}</td>

                                        <td>
                                            <div class="row">

                                            <!--
            <a style="white-space: nowrap;"  type="button" href="Stock/{{ $item->SID }}/edit" class="btn btn-default btn-sm">Edit</a>

           <form method="POST" action="/Stock/{{ $item->SID }}">
           {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                                <button    type="submit" class="btn btn-danger btn-sm">Delete</button>
                                              </form>
-->
                                            </div>
                                        </td>

                                    </div>
                                </tr>
                            @endforeach
                            <input type="hidden" name="Stock_Room" value="{{ $id }}">

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
                <div class="d-flex justify-content-left">

                </div>

            </div>
        </div>

@endsection()
