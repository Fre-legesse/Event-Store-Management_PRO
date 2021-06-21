@extends('layouts.app')

@section('content')
    <h4>Restock</h4>
    <div class="card">
        <div class="card-body">
            <div class="form-group row table-responsive">
                <table class="table table-hover" id="table">
                    <thead>
                    <tr>
                        <th scope="col">Item</th>
                        <th scope="col">Type</th>
                        <th scope="col">Fabric</th>
                        <th scope="col">Color</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Remaining Days</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($items))
                        @foreach($items as $item)
                            <tr>
                                <td>{{\App\Models\Stock_item::find($item->ItemCode)->Item_Code}}</td>
                                <td>{{\App\Models\Stock_item::find($item->ItemCode)->Type}}</td>
                                <td>{{\App\Models\Stock_item::find($item->ItemCode)->Fabric}}</td>
                                <td>{{\App\Models\Stock_item::find($item->ItemCode)->Color}}</td>
                                <td>{{\App\Models\Stock_item::find($item->ItemCode)->Brand}}</td>
                                <td>{{$item->IssuedQuantity}}</td>
                                <td>{{date_diff(now(),date_create_from_format('Y-m-d',\App\Models\item_request::find($item->Request_ID)->Return_date))->format('%a')}} days
                                </td>
                                <td>
                                    <div class="row">
                                        <a  type="button"
                                           href="/restock/{{ $item->RILID }}"
                                           class="btn btn-info btn-md">Detail</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    {{--                @if(isset($event))--}}
                    {{--                    @foreach($event as $item)--}}
                    {{--                        <tr>--}}

                    {{--                            <div class="well">--}}
                    {{--                                <td>{{ $item->Event_Name }}</td>--}}
                    {{--                                <td>{{ $item->Event_Type }}</td>--}}
                    {{--                                <td>{{ $item->Location }}</td>--}}
                    {{--                                <td>{{ $item->Requester }}</td>--}}
                    {{--                                <td>{{ $item->Return_date }}</td>--}}
                    {{--                                <td style='text-align: center;'>--}}
                    {{--                                    <div class="bs-example">--}}
                    {{--                                        <div id="myPopovers">--}}

                    {{--                                            <a href="#" data-toggle="popover" data-trigger="focus"--}}
                    {{--                                               data-html="true" data-placement="top" data-content="--}}
                    {{--<table class='table'>--}}
                    {{--                  <thead>--}}
                    {{--          <tr>--}}
                    {{--                    <th scope='col'>Item List</th>--}}

                    {{--                    <th scope='col'>Quantity</th>--}}
                    {{--                  </tr>--}}
                    {{--          </thead>--}}
                    {{--          <tbody>--}}

                    {{--                  @php--}}
                    {{--                                                $sql11 = $link->prepare("SELECT `reqested_item_lists`.*,events.EVID,events.Company,events.Department FROM `reqested_item_lists` INNER JOIN  events ON events.EVID=`reqested_item_lists`.`Event_ID` WHERE `reqested_item_lists`.`Event_ID`= $item->EVID AND events.Company= '$Company'  and events.Department= '$Department' ");--}}
                    {{--                                                $sql11->execute();--}}
                    {{--                                               // $result81 = $sql11->fetchAll(\PDO::FETCH_OBJ);--}}
                    {{--                                               // $result81row=$sql11->rowCount();--}}

                    {{--                                            @endphp--}}

                    {{--                                            @php--}}
                    {{--                                                while($result81 = $sql11->fetch(\PDO::FETCH_BOTH)) {--}}
                    {{--                                                           echo "<tr>--}}
                    {{--                                                            ";--}}
                    {{--                                                   echo "<td>".$result81['ItemCode']."</td>";--}}
                    {{--                                                   echo "<td>".$result81['Quantity']."</td>";--}}
                    {{--                                                            echo  "</tr>";--}}
                    {{--                                                          }--}}
                    {{--                                            @endphp--}}
                    {{--                                                </tbody>--}}
                    {{--                                                    </table>" title="Requested Items"><i--}}
                    {{--                                                    class="mdi mdi-view-sequential"></i>--}}
                    {{--                                            </a></div>--}}
                    {{--                                    </div>--}}
                    {{--                                </td>--}}
                    {{--                                <td>{{date_diff(date_create_from_format('Y-m-d',$item->Return_date),now())->format('%a')}}--}}
                    {{--                                    days--}}
                    {{--                                </td>--}}

                    {{--                                <td>{{ $item->ApprovalOne }}</td>--}}
                    {{--                                <td>{{ $item->ApprovalTwo }}</td>--}}

                    {{--                                <td>--}}
                    {{--                                    <div class="row">--}}

                    {{--                                        <a style="white-space: nowrap;" type="button"--}}
                    {{--                                           href="/Event/{{ $item->EVID }}/itemadd"--}}
                    {{--                                           class="btn btn-warning btn-sm"><i--}}
                    {{--                                                class="mdi mdi-library-plus"></i></a>--}}

                    {{--                                        <a style="white-space: nowrap;" type="button"--}}
                    {{--                                           href="/Event/{{ $item->EVID }}/edit" class="btn btn-default btn-sm">Edit</a>--}}

                    {{--                                        <form method="POST" action="/Event/{{ $item->EVID }}">--}}
                    {{--                                            {{ csrf_field() }}--}}
                    {{--                                            {{ method_field('DELETE') }}--}}

                    {{--                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>--}}
                    {{--                                        </form>--}}
                    {{--                                    </div>--}}
                    {{--                                </td>--}}

                    {{--                            </div>--}}
                    {{--                        </tr>--}}
                    {{--                    @endforeach--}}


                    {{--                @else--}}
                    {{--                    <td>No Event Found</td>--}}


                    {{--                @endif--}}


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
