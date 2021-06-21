

@extends('layouts.app')

@section('content')

  <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Transaction</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Transaction</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <a class="col-md-6 col-lg-3" href="{{  url('/Stock') }}">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                <h6 class="text-white">Entry</h6>
                            </div>
                        </div>
                    </a>
                    <!-- Column -->
                    <a class="col-md-6 col-lg-3" href="{{  url('/Received') }}">

                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                                <h6 class="text-white">Receiving Note</h6>
                            </div>
                        </div>

                    </a>
                     <!-- Column -->
                    <a class="col-md-6 col-lg-3" href="{{  url('/Withdrawal') }}">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                                <h6 class="text-white">Withdrawal</h6>
                            </div>
                        </div>
                    </a>
                     <!-- Column -->
                    <a class="col-md-6 col-lg-3" href="{{  url('/restock') }}">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                                <h6 class="text-white">Restock</h6>
                            </div>
                        </div>
                    </a>
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                                <h6 class="text-white">Inventory</h6>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-hover">
                            <div class="box bg-dark text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                                <h6 class="text-white">Transfer</h6>
                            </div>
                        </div>
                    </div>
                </div>

                </div>

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->





@endsection
@section('defalut')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
