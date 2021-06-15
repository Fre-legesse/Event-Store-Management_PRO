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
                    <form method="post" action="/Event" class="form-horizontal" >

                            	@csrf
                                <div class="row">
                                <div class="col-md-6">
                                <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Event Form</h4>
                                     <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Event Type</label>
                                    <div class="col-md-9">
                                             <select class="select2 form-control custom-select" style="width: 40%; height:36px;" name='Event_Type'>
                                        <option value="">select</option>
        @foreach($event as  $type)
            <option value="{{ $type->Type_Name}}" >{{ $type->Type_Name }}</option>
        @endforeach
    </select>
                         
                                    </div>
                                </div>
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Event Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="email1" name="Event_Name" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Date From</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" id="email1" name="Date_From" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Date To</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" id="email1" name="Date_To" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Location</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="email1" name="Location" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea type="text" class="form-control" id="email1" name="Description" placeholder="" cols="10" rows="10"></textarea>
                                        </div>
                                    </div>
                                   
                                    <input type="hidden" name="CUID" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="UUID" value="{{ Auth::user()->id }}">
                                </div>
                                
                                 </div>

                             </div>
<div class="col-md-6">
                              <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Request Form</h4>
                                    <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Requester</label>
                                    <div class="col-md-9">
                                         <input type="text" class="form-control" id="email1" name="Requester" style="width: 450px;" >
                         
                                    </div>
                                </div>
                                    <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Responsible Person</label>
                                    <div class="col-md-9">
                                             <input type="text" class="form-control" id="email1" name="Responsible_person" style="width: 450px;" >
                         
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Phone Number</label>
                                    <div class="col-md-9">
                                             <input type="text" class="form-control" id="email1" name="Phone_Number" style="width: 450px;" >
                         
                                    </div>
                                </div>
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Return Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="email1" name="Return_date" style="width: 450px;" >
                                        </div>
                                    </div>
                                    
                                    <input type="hidden" name="CUID" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="UUID" value="{{ Auth::user()->id }}">
                                </div>
                                
                                </div>
                            </div>
                        </div>
                                
                                    <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                            <script type="text/javascript">
                                function test($max,$value,$name){
                                    $one=parseInt($max);
                                    $two=parseInt($value);
 if ($two >= $one)  {
//alert($name)
   document.getElementById($name).value =$one;
   //alert($a)
}
                                }
                            </script>
                          
                       
@endsection()