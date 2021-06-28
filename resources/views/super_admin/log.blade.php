@extends('layouts.app')

@section('content')
    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-12">
        <div class="x_panel">
            <div class="x_title">
                <h1>Log List</h1>
                <div class="clearfix"></div>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                {!! $dataTable->table() !!}
            </div>
        </div>
    </div>
@endsection
{!! $dataTable->scripts() !!}
{{--Edit Inline Scripts--}}
<link href="{{url('vendors/DataTables/datatables.min.css')}}" type="stylesheet">
<script src="{{url('vendors/DataTables/datatables.min.js')}}"></script>
