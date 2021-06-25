@extends('layouts.app')

@section('content')
    <h3>Stock Room</h3>

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
                @if(count($Stockroom) >= 1)
                    @foreach($Stockroom as $item)

                        <!-- Column -->
                            <a class="col-md-6 col-lg-3" href="{!! route('show', ['id'=>$item->SRID]) !!}">
                                <div class="card card-hover">

                                    <div class="box bg-cyan text-center">
                                        <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                        <h5 class="text-white">{{ $item->Description  }}</h5>
                                        <h6 class="text-white">{{ $item->Stock_Room  }}</h6>

                                    </div>
                                </div>
                            </a>
                        @endforeach


                    @else
                        <td>No Item Found</td>


                @endif
                <!-- Column -->
                    <!--
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                                <h6 class="text-white">Charts</h6>
                            </div>
                        </div>
                    </div>
                  -->
                    <!-- Column -->


                    <!--          <a href="docAdd.php"><i class="glyphicon glyphicon-plus"></i><span>New</span></a> -->


                </div>
                <div class="d-flex justify-content-left">

                </div>

            </div>
        </div>

@endsection()
