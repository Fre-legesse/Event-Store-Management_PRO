@extends('layouts.app')

@section('content')
    <h3>Events</h3>
    <div class="card">
        <div class="card-body">

            <div class="form-group row">
                <input type="text" class="form-control" style="width: 200px; float: right;margin-left: 1000px;"
                       id="searchh" placeholder="Listed Type live search" onkeyup="myFunction()">
            </div>

            <div class="form-group row table-responsive">
                <table class="table" id="table">
                    <thead>
                    <tr>
                        <th scope="col">Event Name</th>
                        <th scope="col">Event Type</th>
                        <th scope="col">Event Location</th>
                        <th scope="col">Requester</th>
                        <th scope="col">Return date</th>
                        <th scope="col">Requested Items</th>
                        <th scope="col">First Approval</th>
                        <th scope="col">Second Approval</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(isset($event))
                        @foreach($event as $item)
                            <tr>

                                <div class="well">
                                    <td>{{ $item->Event_Name }}</td>
                                    <td>{{ $item->Event_Type }}</td>
                                    <td>{{ $item->Location }}</td>
                                    <td>{{ $item->Requester }}</td>
                                    <td>{{ $item->Return_date }}</td>
                                    <td style='text-align: center;'>
                                        <div class="bs-example">
                                            <div id="myPopovers">

                                                <a href="#" data-toggle="popover" data-trigger="focus"
                                                   data-html="true" data-placement="top" data-content="
<table class='table'>
                  <thead>
          <tr>
                    <th scope='col'>Item List</th>

                    <th scope='col'>Quantity</th>
                  </tr>
          </thead>
          <tbody>

                  @php
                                                    $sql11 = $link->prepare("SELECT `reqested_item_lists`.*,events.EVID,events.Company,events.Department FROM `reqested_item_lists` INNER JOIN  events ON events.EVID=`reqested_item_lists`.`Event_ID` WHERE `reqested_item_lists`.`Event_ID`= $item->EVID AND events.Company= '$Company'  and events.Department= '$Department' ");
                                                    $sql11->execute();
                                                   // $result81 = $sql11->fetchAll(\PDO::FETCH_OBJ);
                                                   // $result81row=$sql11->rowCount();

                                                @endphp

                                                @php
                                                    while($result81 = $sql11->fetch(\PDO::FETCH_BOTH)) {
                                                               echo "<tr>
                                                                ";
                                                       echo "<td>".$result81['ItemCode']."</td>";
                                                       echo "<td>".$result81['Quantity']."</td>";
                                                                echo  "</tr>";
                                                              }
                                                @endphp
                                                    </tbody>
                                                        </table>" title="Requested Items"><i
                                                        class="mdi mdi-view-sequential"></i>
                                                </a></div>
                                        </div>
                                    </td>

                                    <td>{{ $item->ApprovalOne }}</td>
                                    <td>{{ $item->ApprovalTwo }}</td>

                                    <td>
                                        <div class="row">
                                            <a style="white-space: nowrap;" type="button"
                                               href="/Event/{{ $item->EVID }}/edit"
                                               class="btn btn-default btn-md"><i
                                                    class="fa fa-list"></i> Detail</a>

                                            <form method="POST" action="/Event/{{ $item->EVID }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger btn-md"><i
                                                        class="mdi mdi-close"></i> Reject
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </div>
                            </tr>
                        @endforeach


                    @else
                        <td>No Event Found</td>
                    @endif


                    </tbody>
                    <script>
                        $(document).ready(function () {
                            $("#myPopovers button").popover({
                                placement: 'auto'
                            });
                        });
                    </script>
                    <style type="text/css">
                        .popover {
                            max-width: 900px;
                            max-height: 1200px;
                        }
                    </style>
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

            @if(isset($event))
                <div class="d-flex justify-content-left">
                    {{ $event->links("pagination::bootstrap-4") }}
                </div>
            @endif
        </div>
    </div>
@endsection
