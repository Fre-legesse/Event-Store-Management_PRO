@extends('layouts.app')

@section('content')
<h3>Edit Brand</h3>
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



                    <form method="post" action="/Brand/{{ $Item->SBID }}" class="form-horizontal" >
                            	@csrf
                                @method('PUT')

                                <div class="card-body">
                                    

                                 <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Brand</label>
                                    <div class="col-md-9">
                                     
                         <input type="text" name="Brand" class="form-control" value="{{ $Item->Brand }}">
                                    </div>
                                </div>
                                   
                                   
                                    
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Type</label>
                                         <div class="col-md-9">
                                        <select class="select2 form-control custom-select" style="width: 40%; height:36px;" name='Type'>
                                        <option value="">select</option>
        @foreach($category as  $type)
            <option value="{{ $type->Type}}" {{$type->Type == $Item->Type  ? 'selected' : ''}}>{{ $type->Type }}</option>
        @endforeach
    </select>
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