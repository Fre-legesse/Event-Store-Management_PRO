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



                    <form method="post" action="/Eventtype/{{ $event->ETID }}" class="form-horizontal" >
                            	@csrf
                                @method('PUT')

                                <div class="card-body">
                                    <h4 class="card-title">Edit Event Type</h4>
                                   
                                    
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label"> Event Type</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="email1" name="Type_Name" value="{{ $event->Type_Name }}" >
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