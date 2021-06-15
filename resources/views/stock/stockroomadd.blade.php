@extends('layouts.app')

@section('content')
<h3>Create Stock Room</h3>
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
        <form method="post" action="/StockRoom" class="form-horizontal" >
                            	@csrf
            <div class="card-body">
                                    
            <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Site</label>
                                    <div class="col-md-9">
                                        <select   class="select2 form-control custom-select" style="width: 75%; height:36px;" name='Site' id="Site">
                                            <option value="">Select</option>
                                            <option value="AA">Addis Ababa</option>
                                            <option value="HW">Hawassa</option>
                                            <option value="KO">Kombolcha</option>
                                            <option value="RY">Raya</option>
                                            <option value="ZB">Zebidar</option>                                  
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Branch</label>
                                    <div class="col-md-9">
                                        <select   class="select2 form-control custom-select" style="width: 75%; height:36px;" name='Branch' id="Branch">
                                            <option value="">Select</option>
                                            <option value="KR">Kera</option>
                                            <option value="KL">Kaliti</option>
                                            <option value="MC">Maychew</option>
                                            <option value="GU">Gubre</option>
                                                                             
                                        </select>
                                    </div>
                                </div>
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Stock Room Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="email1" name="Stock_Room" placeholder="Short Name Example : SG, CA..">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="email1" name="Description" placeholder="">
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