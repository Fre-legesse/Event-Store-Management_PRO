@extends('layouts.app')

@section('content')
    <h3>Create Colors</h3>
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
        <form method="post" action="/Color" class="form-horizontal">
            @csrf
            <div class="card-body" style="background-color: ">

                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Color</label>
                    <div class="col-md-9">
                        <select class="select2 form-control custom-select demo" id="position-bottom-left"
                                data-position="top right" style="width: 100%; height:36px;" name='Color'>
                            <option value="">Select</option>
                            <option value="BLACK">Black</option>
                            <option value="WHITE">White</option>
                            <option value="RED">Red</option>
                            <option value="GREEN">Green</option>
                            <option value="BLUE">Blue</option>
                            <option value="ORANGE">Orange</option>
                            <option value="YELLOW">Yellow</option>
                            <option value="VANILLA">Vanela</option>
                            <option value="PURPLE">Purple</option>
                            <option value="BROWN">Brown</option>
                            <option value="MAGENTA">Magenta</option>
                            <option value="TAN">Tan</option>
                            <option value="CYAN">Cyan</option>
                            <option value="OLIVE">Olive</option>
                            <option value="MAROON">Maroon</option>
                            <option value="NAVY">Navy</option>
                            <option value="AQUAMARINE">Aquamarine</option>
                            <option value="TURQUOISE">Turquoise</option>
                            <option value="SILVER">Silver</option>
                            <option value="LIME">Lime</option>
                            <option value="TEAL">Teal</option>
                            <option value="INDIGO">Indigo</option>
                            <option value="VIOLET">Violet</option>
                            <option value="PINK">Pink</option>
                            <option value="GRAY">Gray</option>


                        </select>


                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Type</label>
                    <div class="col-md-9">
                        <select class="select2 form-control custom-select" style="width: 40%; height:36px;" name='Type'>
                            <option value="">Select</option>
                            @foreach($category as  $type)
                                <option value="{{ $type->Type}}">{{ $type->Type }}</option>
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
