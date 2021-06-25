@extends('layouts.app')

@section('content')
    <h3>Color Edit</h3>
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


        <form method="post" action="/Color/{{ $Item->SCID }}" class="form-horizontal">
            @csrf
            @method('PUT')

            <div class="card-body">


                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Color</label>
                    <div class="col-md-9">

                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;"
                                name='Color'>
                            <option value="">Select</option>

                            <option value="Black" {{'Black' == $Item->Color   ? 'selected' : ''}}>Black</option>
                            <option value="White" {{'White' == $Item->Color   ? 'selected' : ''}}>White</option>
                            <option value="Red" {{'Red' == $Item->Color   ? 'selected' : ''}}>Red</option>
                            <option value="Green" {{'Green' == $Item->Color   ? 'selected' : ''}}>Green</option>
                            <option value="Blue" {{'Blue' == $Item->Color   ? 'selected' : ''}}>Blue</option>
                            <option value="Orange" {{'Orange' == $Item->Color   ? 'selected' : ''}}>Orange</option>
                            <option value="Yellow" {{'Yellow' == $Item->Color   ? 'selected' : ''}}>Yellow</option>
                            <option value="Green" {{'Green' == $Item->Color   ? 'selected' : ''}}>Green</option>
                            <option value="Purple" {{'Purple' == $Item->Color   ? 'selected' : ''}}>Purple</option>
                            <option value="Brown" {{'Brown' == $Item->Color   ? 'selected' : ''}}>Brown</option>
                            <option value="Magenta" {{'Magenta' == $Item->Color   ? 'selected' : ''}}>Magenta</option>
                            <option value="Tan" {{'Tan' == $Item->Color   ? 'selected' : ''}}>Tan</option>
                            <option value="Cyan" {{'Cyan' == $Item->Color   ? 'selected' : ''}}>Cyan</option>
                            <option value="Olive" {{'Olive' == $Item->Color   ? 'selected' : ''}}>Olive</option>
                            <option value="Maroon" {{'Maroon' == $Item->Color   ? 'selected' : ''}}>Maroon</option>
                            <option value="Navy" {{'Navy' == $Item->Color   ? 'selected' : ''}}>Navy</option>
                            <option value="Aquamarine" {{'Aquamarine' == $Item->Color   ? 'selected' : ''}}>Aquamarine
                            </option>
                            <option value="Turquoise" {{'Turquoise' == $Item->Color   ? 'selected' : ''}}>Turquoise
                            </option>
                            <option value="Silver" {{'Silver' == $Item->Color   ? 'selected' : ''}}>Silver</option>
                            <option value="Lime" {{'Lime' == $Item->Color   ? 'selected' : ''}}>Lime</option>
                            <option value="Teal" {{'Teal' == $Item->Color   ? 'selected' : ''}}>Teal</option>
                            <option value="Indigo" {{'Indigo' == $Item->Color   ? 'selected' : ''}}></option>
                            <option value="Violet" {{'Violet' == $Item->Color   ? 'selected' : ''}}>Violet</option>
                            <option value="Pink" {{'Pink' == $Item->Color   ? 'selected' : ''}}>Pink</option>
                            <option value="Gray" {{'Gray' == $Item->Color   ? 'selected' : ''}}>Gray</option>

                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Type</label>
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
