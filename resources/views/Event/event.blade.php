@extends('layouts.app')

@section('content')

    <h3>Events</h3>

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
                    <a class="btn btn-lg btn-default" href="Event/create/">Add New</a>
                    <input type="text" class="form-control" style="width: 200px; float: right;margin-left: 1000px;"
                           id="searchh" placeholder="Listed Type live search" onkeyup="myFunction()">
                </div>
                <div class="clearfix"></div>

                <div class="form-group row">
                    <label class="mt-2">Week Filter</label>
                    <div class="col-md-5">
                        <input type="week" id="week" name="week"
                               value="{{isset($year,$week) ? $year.'-W'.$week :''}}"
                               class="form-control" style="height: 36px">
                    </div>
                    <label class="mt-2">Brand Filter</label>
                    <div class="col-md-5">
                        <select name="brand" id="brand" class="form-control" style="height: 36px">
                            @if(isset($chosen_brand))
                                <option selected hidden value="{{$chosen_brand}}">{{$chosen_brand}}</option>
                            @else
                                <option value='' hidden>Choose Brand</option>
                            @endif
                            <option value=''>< Remove Filter ></option>
                            @foreach($brands as $brand)
                                <option value="{{$brand->Brand}}">{{$brand->Brand}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row table-responsive">
                    <!--          <a href="docAdd.php"><i class="glyphicon glyphicon-plus"></i><span>New</span></a> -->


                    <table class="table" id="table">
                        <thead class='thead-light'>
                        <tr>

                            <th scope="col">Event Name</th>
                            <th scope="col">Event Type</th>
                            <th scope="col">Event Location</th>
                            <th scope="col">Responsible(BGI)</th>
                            <th scope="col">Return date</th>
                            {{--                            <th scope="col">Item Requests</th>--}}
                            <th scope="col">Remaining Date For Return</th>
                            <th scope="col">First Approval</th>
                            <th scope="col">Second Approval</th>
                            <th scope="col">Post Status</th>
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
                                        <td>{{ $item->Responsible_person_BGI }}</td>
                                        <td>{{ $item->Return_date }}</td>
                                        {{--                                        <td style='text-align: center;'>--}}
                                        {{--                                            <div class="bs-example">--}}
                                        {{--                                                <div id="myPopovers">--}}

                                        {{--                                                    <a href="#" data-toggle="popover" data-trigger="focus"--}}
                                        {{--                                                       data-html="true" data-placement="top" data-content="--}}
                                        {{--<table class='table'>--}}
                                        {{--                  <thead class='thead-light'>--}}
                                        {{--          <tr>--}}
                                        {{--                    <th scope='col'>Item List</th>--}}

                                        {{--                    <th scope='col'>Quantity</th>--}}
                                        {{--                  </tr>--}}
                                        {{--          </thead>--}}
                                        {{--          <tbody>--}}

                                        {{--                  @php--}}
                                        {{--                                                        $sql11 = $link->prepare("SELECT `reqested_item_lists`.*,events.EVID,events.Company,events.Department FROM `reqested_item_lists` INNER JOIN  events ON events.EVID=`reqested_item_lists`.`Event_ID` WHERE `reqested_item_lists`.`Event_ID`= $item->EVID AND events.Company= '$Company'  and events.Department= '$Department' ");--}}
                                        {{--                                                        $sql11->execute();--}}
                                        {{--                                                       // $result81 = $sql11->fetchAll(\PDO::FETCH_OBJ);--}}
                                        {{--                                                       // $result81row=$sql11->rowCount();--}}

                                        {{--                                                    @endphp--}}

                                        {{--                                                    @php--}}
                                        {{--                                                        while($result81 = $sql11->fetch(\PDO::FETCH_BOTH)) {--}}
                                        {{--                                                                   echo "<tr>--}}
                                        {{--                                                                    ";--}}
                                        {{--                                                           echo "<td>".$result81['ItemCode']."</td>";--}}
                                        {{--                                                           echo "<td>".$result81['Quantity']."</td>";--}}
                                        {{--                                                                    echo  "</tr>";--}}
                                        {{--                                                                  }--}}
                                        {{--                                                    @endphp--}}
                                        {{--                                                        </tbody>--}}
                                        {{--                                                            </table>" title="Requested Items"><i--}}
                                        {{--                                                            class="mdi mdi-view-sequential"></i>--}}
                                        {{--                                                    </a></div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </td>--}}
                                        <td>{{date_diff(date_create_from_format('Y-m-d',$item->Return_date),now())->format('%a')}}
                                            days
                                        </td>

                                        <td>{{ $item->ApprovalOne }}</td>
                                        <td>{{ $item->ApprovalTwo }}</td>
                                        <td>{{ $item->Posted }}</td>

                                        <td>
                                            <div class="row">
                                                @if($item->Posted != 'Posted' && $item->CUID == \Illuminate\Support\Facades\Auth::id() )
                                                    <a style="white-space: nowrap;" type="button"
                                                       href="/Event/{{ $item->EVID }}/itemadd"
                                                       class="btn btn-warning btn-md"><i
                                                            class="mdi mdi-library-plus"></i> Request Items</a>
                                                @elseif($item->Posted === 'Posted' && auth()->user()->hasRole(['Approver_One','Approver_Two']))
                                                    <a style="white-space: nowrap;" type="button"
                                                       href="/Event/{{ $item->EVID }}/itemadd"
                                                       class="btn btn-danger btn-md"><i
                                                            class="mdi mdi-library-plus"></i> Edit</a>
                                                @endif
                                                {{--                                                <a style="white-space: nowrap;" type="button"--}}
                                                {{--                                                   href="/Event/{{ $item->EVID }}/edit" class="btn btn-default btn-sm">Edit</a>--}}

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
                            $('#week').change(function () {
                                if ($('#brand').val() !== '') {
                                    window.location = "/event/filter/" + $(this).val() + '/' + $('#brand').val();
                                } else {
                                    window.location = "/event/filter/" + $(this).val() + '/empty';
                                }
                            })
                            $('#brand').change(function () {
                                if ($('#brand').val() !== '' && $('#week').val() !== '') {
                                    window.location = "/event/filter/" + $('#week').val() + '/' + $(this).val();
                                } else if ($('#brand').val() !== null && $('#week').val() === '') {
                                    window.location = "/event/filter/empty/" + $(this).val();
                                } else {
                                    window.location = "/event/filter/empty/empty";
                                }
                            })

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
                    {{ $event->links("pagination::bootstrap-4") }}
                </div>

            </div>
        </div>
    </div>

@endsection()
