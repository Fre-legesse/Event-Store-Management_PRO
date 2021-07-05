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


        <form method="post" action="/Category/{{ $Item->STID }}" class="form-horizontal">
            @csrf
            @method('PUT')

            <div class="card-body">
                <h4 class="card-title">Edit Category</h4>
                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-left control-label col-form-label">Company</label>
                    <div class="col-md-9">
                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;"
                                name='Company'>
                            <option value="">Select</option>
                            <option value="AA" {{'AA' == $Item->Company  ? 'selected' : ''}}>Addis Ababa</option>
                            <option value="HW" {{'HW' == $Item->Company  ? 'selected' : ''}}>Hawassa</option>
                            <option value="KM" {{'KM' == $Item->Company  ? 'selected' : ''}}>Kombolcha</option>
                            <option value="RY" {{'RY' == $Item->Company  ? 'selected' : ''}}>Raya</option>
                            <option value="ZB" {{'ZB' == $Item->Company  ? 'selected' : ''}}>Zebidar</option>
                            <option value="ZW" {{'ZW' == $Item->Company  ? 'selected' : ''}}>Ziway</option>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-left control-label col-form-label">Department</label>
                    <div class="col-md-9">

                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;"
                                name='Department'>
                            <option value="">Select</option>
                            <option
                                value="General Management" {{'General Management' == $Item->Department  ? 'selected' : ''}}>
                                General Management
                            </option>
                            <option value="Administration" {{'Administration' == $Item->Department  ? 'selected' : ''}}>
                                Administration
                            </option>
                            <option value="Finance" {{'Finance' == $Item->Department  ? 'selected' : ''}}>Finance
                            </option>
                            <option value="Supply Chain" {{'Supply Chain' == $Item->Department  ? 'selected' : ''}}>
                                Supply Chain
                            </option>
                            <option
                                value="Production and continuous improvement" {{'Production and continuous improvement' == $Item->Department  ? 'selected' : ''}}>
                                Production and continuous improvement
                            </option>
                            <option
                                value="Quality Control" {{'Quality Control' == $Item->Department  ? 'selected' : ''}}>
                                Quality Control
                            </option>
                            <option value="Sales" {{'Sales' == $Item->Department  ? 'selected' : ''}}>Sales</option>
                            <option value="Marketing" {{'General Management' == $Item->Department  ? 'selected' : ''}}>
                                Marketing
                            </option>
                            <option
                                value="Maintenance(Technique)" {{'Maintenance(Technique' == $Item->Department  ? 'selected' : ''}}>
                                Maintenance(Technique)
                            </option>
                            <option value="Industry" {{'Industry' == $Item->Department  ? 'selected' : ''}}>Industry
                            </option>
                            <option value="Method" {{'Method' == $Item->Department  ? 'selected' : ''}}>Method</option>

                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email1" class="col-sm-3 text-left control-label col-form-label">Type</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="email1" name="Type" value="{{ $Item->Type }}">
                    </div>
                </div>
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
@endsection()
