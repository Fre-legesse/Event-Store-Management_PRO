@extends('layouts.app')

@section('content')
 <h4 class="card-title">Update Retrunable Date</h4>
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
                    <form method="post" action="/Retrunabledate" class="form-horizontal" >
                            	@csrf
                                <div class="card-body">


                                    <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-left control-label col-form-label">Return with in </label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" id="email1" name="Retrunabledate"  >
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
