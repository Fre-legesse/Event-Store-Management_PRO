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
        <form method="post" action="/Stock" class="form-horizontal">
            @csrf
            <div class="card-body">
                <h4 class="card-title">Store Items In Stock Room</h4>

                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-left control-label col-form-label">Item</label>
                    <div class="col-md-9">
                        <select class="select2 form-control custom-select" style="width: 40%; height:36px;" name='Type'>
                            <option value="">Select</option>
                            @foreach($items as  $type)
                                <option value="{{ $type->Item_Code}}">{{ $type->Item_Code }}
                                    | {{ $type->Asset_No }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="email1" class="col-sm-3 text-left control-label col-form-label">Quantity</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="Quantity" name="Quantity">
                    </div>
                </div>

                <input type="hidden" name="Stock_Room" value="{{ $stockid }}">
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
