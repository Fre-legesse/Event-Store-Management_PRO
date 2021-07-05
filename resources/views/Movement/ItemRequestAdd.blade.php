@extends('layouts.app')

@section('content')

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
    <form method="post" action="/StockRoom" class="form-horizontal">
        @csrf
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Stock Room</h4>
                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-left control-label col-form-label">Stock Room</label>
                    <div class="col-md-9">
                        <select class="select2 form-control custom-select" style="width: 40%; height:36px;" name='Type'>
                            <option value="">Select</option>
                            @foreach($category as  $type)
                                <option
                                    value="{{ $type->Type}}" {{$type->Type == $Item->Type  ? 'selected' : ''}}>{{ $type->Type }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-left control-label col-form-label">Item</label>
                    <div class="col-md-9">
                        <select class="select2 form-control custom-select" style="width: 40%; height:36px;" name='Type'>
                            <option value="">Select</option>
                            @foreach($category as  $type)
                                <option
                                    value="{{ $type->Type}}" {{$type->Type == $Item->Type  ? 'selected' : ''}}>{{ $type->Type }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="email1" class="col-sm-3 text-left control-label col-form-label">Quantity</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="email1" name="Stock_Room"
                               placeholder="example: Table, chair">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email1" class="col-sm-3 text-left control-label col-form-label">Description</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="email1" name="Description"
                               placeholder="example: Table, chair">

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
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Item selection</h4>
                @foreach($category as  $type)
                    <div class="form-group row">
                        <label for="email1" class="col-sm-3 text-left control-label col-form-label">Description</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="email1" name="Description"
                                   placeholder="example: Table, chair">

                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </form>

@endsection()
