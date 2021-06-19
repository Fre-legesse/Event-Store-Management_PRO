@extends('layouts.app')

@section('content')
    <h3>Withdrawal</h3>

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


                <div class="form-group row">
                    List Of Approved Request
                    <input type="text" class="form-control" style="width: 200px; float: right;margin-left: 1000px;"
                           id="searchh" placeholder="Listed Type live search" onkeyup="myFunction()">
                </div>
                <div class="form-group row">
                    <!--          <a href="docAdd.php"><i class="glyphicon glyphicon-plus"></i><span>New</span></a> -->


                    <table class="table" id="table">
                        <thead>
                        <tr>


                            <th scope="col"><strong>Event Name</strong></th>
                            <th scope="col"><strong>Event Type</strong></th>
                            <th scope="col"><strong>Event Location</strong></th>
                            <th scope="col"><strong>Requester</strong></th>
                            <th scope="col"><strong>Return date</strong></th>
                            <th scope="col"><strong>Remaing Date For Return</strong></th>
                            <th scope="col"><strong>First Approval</strong></th>
                            <th scope="col"><strong>Second Approval</strong></th>
                            <th scope="col"><strong>Action</strong></th>


                        </tr>
                        </thead>
                        <tbody>

                        @if(isset($category))
                            @foreach($category as $item)
                                <tr>

                                    <div class="well">
                                        <td>{{ $item->Event_Name }}</td>
                                        <td>{{ $item->Event_Type }}</td>
                                        <td>{{ $item->Location }}</td>
                                        <td>{{ $item->Requester }}</td>
                                        <td>{{ $item->Return_date }}</td>
                                        <td>{{date_diff(date_create_from_format('Y-m-d',$item->Return_date),now())->format('%a')}} days</td>
                                        <td>{{ $item->ApprovalOne }}</td>
                                        <td>{{ $item->ApprovalTwo }}</td>

                                        <td>
                                            <div class="row">
                                                <a style="white-space: nowrap; background-color: red;" type="button"
                                                   href="/withdrawl/{{ $item->EVID }}/test"
                                                   class="btn btn-danger btn-md">Issue</a>
                                            </div>
                                        </td>

                                    </div>
                                </tr>
                            @endforeach


                        @else
                            <td>No Event Found</td>


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
