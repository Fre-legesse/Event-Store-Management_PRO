@extends('layouts.try2')


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
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <script src="../../js/ajax-jquery.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
    </div>
    <br>
    <br>
    <h2 style="margin-left: 40px;background-color: yellow;">JOB POSITION : {{ $Title }}</h2>

    <form method="POST" action="/Job/Application/{{$job_id}}" class="form-horizontal"
          style="margin-left: 40px;margin-right: 40px;">
        @csrf


        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row" style="opacity: 0.8;">
                <div class="col-md-6">
                    <div class="card" style="height: 517px;">

                        <div class="card-body">
                            <h3 class="card-title">Personal Information</h3>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-left control-label col-form-label">First
                                    Name</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" id="First_Name"
                                           name="First_Name"
                                           placeholder="First Name Here">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-left control-label col-form-label">Middle
                                    Name</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" id="Middle_Name"
                                           name="Middle_Name"
                                           placeholder="Middle Name Here">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-left control-label col-form-label">Last
                                    Name</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" id="Last_Name" name="Last_Name"
                                           placeholder="Last Name Here">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email1" class="col-sm-3 text-left control-label col-form-label">Birth
                                    Date</label>
                                <div class="col-sm-9">
                                    <input required type="date" class="form-control mydatepicker" id="Birth_Date"
                                           name="Birth_Date" placeholder="mm/dd/yyyy">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email1"
                                       class="col-sm-3 text-left control-label col-form-label">Gender</label>
                                <div class="col-md-9">
                                    <div class="custom-control">
                                        <input required type="radio" class="form-check-input required"
                                               id="Gender_Radio_Male" name="Gender_Radio" value="Male">
                                        <label
                                            for="Gender_Radio_Male">Male</label>
                                    </div>
                                    <div class="custom-control">
                                        <input required type="radio" class="form-check-input required"
                                               id="Gender_Radio_Female" name="Gender_Radio" value="Female">
                                        <label
                                            for="Gender_Radio_Female">Female</label>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email1"
                                       class="col-sm-3 text-left control-label col-form-label">Citizenship</label>
                                <div class="col-md-9">
                                    <select class="select2 form-control custom-select" name="Citizenship"
                                            id="Citizenship"
                                            style="width: 100%; height:36px;">
                                        <option>Select</option>
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value="CA">California</option>
                                            <option value="NV">Nevada</option>
                                            <option value="OR">Oregon</option>
                                            <option value="WA">Washington</option>
                                        </optgroup>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="UT">Utah</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value="AL">Alabama</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TX">Texas</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="WI">Wisconsin</option>
                                        </optgroup>
                                        <optgroup label="Eastern Time Zone">
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="IN">Indiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="OH">Ohio</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WV">West Virginia</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group m-t-20">


                                <label>Do you have a work permit in Ethiopia <small
                                        class="text-muted"></small></label>
                                <label>If not Ethiopian Citizen, are you legally eligible to work in the country? If
                                    Yes, you will be required to present verification of eligibility <small
                                        class="text-muted"></small></label>
                                <div class="custom-control">
                                    <input required type="radio" class="form-check-input required"
                                           id="Work_Permit_Yes"
                                           name="Work_Permit" value="Yes">
                                    <label for="Work_Permit_Yes">Yes</label>
                                </div>
                                <div class="custom-control">
                                    <input required type="radio" class="form-check-input required"
                                           id="Work_Permit_No"
                                           name="Work_Permit" value="No">
                                    <label for="Work_Permit_No">No</label>
                                </div>
                            </div>


                        </div>
                        {{--                            <button type="submit" class="btn btn-success col-lg-12 mb-5">Submit</button>--}}

                    </div>


                </div>

                <div class="col-md-6">
                    <div class="card" style="height: 517px;">
                        <div class="card-body">
                            <h5 class="card-title m-b-0"></h5>

                            <br><br>

                            <div class="form-group">
                                <label for="Mobile_Number_One">Mobile Number 1 <small class="text-muted">(+251)
                                        9-99-99-99-99</small></label>
                                <input required type="text" class="form-control phone-inputmask" id="Mobile_Number_One"
                                       name="Mobile_Number_One"
                                       placeholder="Enter Phone Number">
                            </div>
                            <div class="form-group">
                                <label for="Mobile_Number_Two">Mobile Number 2 <small class="text-muted">(+251)
                                        9-99-99-99-99</small></label>
                                <input required type="text" class="form-control phone-inputmask" id="Mobile_Number_Two"
                                       name="Mobile_Number_Two"
                                       placeholder="Enter Phone Number">
                            </div>

                            <div class="form-group">
                                <label for="Email">Email <small class="text-muted"></small></label>
                                <input required type="email" class="form-control purchase-inputmask" id="Email"
                                       name="Email"
                                       placeholder="Enter Email Address">
                            </div>
                            <div class="form-group">
                                <label>Education Level <small class="text-muted"></small></label>
                                <div class="custom-control">
                                    <input required type="radio" class="form-check-input required"
                                           id="Education_level_Masters"
                                           name="Education_Level">
                                    <label for="Education_level_Masters">Masters</label>
                                </div>
                                <div class="custom-control">
                                    <input required type="radio" class="form-check-input required"
                                           id="Education_level_Degree"
                                           name="Education_Level">
                                    <label for="Education_level_Degree">Degree</label>
                                </div>
                                <div class="custom-control">
                                    <input required type="radio" class="form-check-input required"
                                           id="Education_level_Diploma"
                                           name="Education_Level">
                                    <label for="Education_level_Diploma">Diploma</label>
                                </div>
                                <div class="custom-control">
                                    <input required type="radio" class="form-check-input required"
                                           id="Education_level_Certificate"
                                           name="Education_Level">
                                    <label
                                        for="Education_level_Certificate">Certificate</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-top">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">

                        <div class="card-body">
                            <h4 class="card-title">Education | Post Graduate</h4>

                            <div class="form-group row">
                                <label for="email1"
                                       class="col-sm-3 text-left control-label col-form-label">Qualification</label>
                                <div class="col-md-9">
                                    <div class="custom-control">
                                        <input required type="radio" class="form-check-input required"
                                               id="Qualification_Post_Graduate_MA" name="Qualification_Post_Graduate"
                                               value="MA">
                                        <label
                                            for="Qualification_Post_Graduate_MA">MA</label>
                                    </div>
                                    <div class="custom-control">
                                        <input required type="radio" class="form-check-input required"
                                               id="Qualification_Post_Graduate_MSc" name="Qualification_Post_Graduate"
                                               value="MSc">
                                        <label
                                            for="Qualification_Post_Graduate_MSc">MSc</label>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Field_of_Study_Post_Graduate"
                                       class="col-sm-3 text-left control-label col-form-label">Field of
                                    Study</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control"
                                           id="Field_of_Study_Post_Graduate" name="Field_of_Study_Post_Graduate"
                                           placeholder="Field of Study Here">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-left control-label col-form-label">Name of
                                    University</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control"
                                           id="Name_of_University_Post_Graduate"
                                           name="Name_of_University_Post_Graduate"
                                           placeholder="Name of University Here">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email1"
                                       class="col-sm-3 text-left control-label col-form-label">Country</label>
                                <div class="col-md-9">
                                    <select class="select2 form-control custom-select" name="Country_Post_Graduate"
                                            id="Country_Post_Graduate"
                                            style="width: 100%; height:36px;">
                                        <option>Select</option>
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value="CA">California</option>
                                            <option value="NV">Nevada</option>
                                            <option value="OR">Oregon</option>
                                            <option value="WA">Washington</option>
                                        </optgroup>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="UT">Utah</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value="AL">Alabama</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TX">Texas</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="WI">Wisconsin</option>
                                        </optgroup>
                                        <optgroup label="Eastern Time Zone">
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="IN">Indiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="OH">Ohio</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WV">West Virginia</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Attended_From_Post_Graduate"
                                       class="col-sm-3 text-left control-label col-form-label">Date
                                    Attended From</label>
                                <div class="col-sm-9">
                                    <input required type="date" id="Attended_From_Post_Graduate"
                                           name="Attended_From_Post_Graduate" class="form-control mydatepicker"
                                           placeholder="mm/dd/yyyy">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Dates_Attended_to_Post_Graduate"
                                       class="col-sm-3 text-left control-label col-form-label">Dates
                                    attended To</label>
                                <div class="col-sm-9">
                                    <input required type="date" id="Dates_Attended_to_Post_Graduate"
                                           name="Dates_Attended_Post_Graduate" class="form-control mydatepicker"
                                           placeholder="mm/dd/yyyy">

                                </div>
                            </div>


                        </div>


                    </div>


                </div>

                <div class="col-md-6">
                    <div class="card">

                        <div class="card-body">
                            <h4 class="card-title">Education | Under Graduate</h4>

                            <div class="form-group row">
                                <label for="Qualification_Under_Graduate_BA"
                                       class="col-sm-3 text-left control-label col-form-label">Qualification</label>
                                <div class="col-md-9">
                                    <div class="custom-control">
                                        <input required type="radio" class="form-check-input required"
                                               id="Qualification_Under_Graduate_BA"
                                               name="Qualification_Under_Graduate"
                                               value="BA"
                                        >
                                        <label
                                            for="Qualification_Under_Graduate_BA">BA</label>
                                    </div>
                                    <div class="custom-control">
                                        <input required type="radio" class="form-check-input required"
                                               id="Qualification_Under_Graduate_BSc"
                                               name="Qualification_Under_Graduate"
                                               value="BSc"
                                        >
                                        <label
                                            for="Qualification_Under_Graduate_BSc">BSc</label>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Field_of_Study_Under_Graduate"
                                       class="col-sm-3 text-left control-label col-form-label">Field of
                                    Study</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control"
                                           id="Field_of_Study_Under_Graduate" name="Field_of_Study_Under_Graduate"
                                           placeholder="Field of Study Here">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Name_of_University_Under_Graduate"
                                       class="col-sm-3 text-left control-label col-form-label">Name of
                                    University</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control"
                                           id="Name_of_University_Under_Graduate"
                                           name="Name_of_University_Under_Graduate"
                                           placeholder="Name of University Here">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="Country_Under_Graduate"
                                       class="col-sm-3 text-left control-label col-form-label">Country</label>
                                <div class="col-md-9">
                                    <select class="select2 form-control custom-select" name="Country_Under_Graduate"
                                            id="Country_Under_Graduate"
                                            style="width: 100%; height:36px;">
                                        <option>Select</option>
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value="CA">California</option>
                                            <option value="NV">Nevada</option>
                                            <option value="OR">Oregon</option>
                                            <option value="WA">Washington</option>
                                        </optgroup>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="UT">Utah</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value="AL">Alabama</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TX">Texas</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="WI">Wisconsin</option>
                                        </optgroup>
                                        <optgroup label="Eastern Time Zone">
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="IN">Indiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="OH">Ohio</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WV">West Virginia</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Attended_From_Under_Graduate"
                                       class="col-sm-3 text-left control-label col-form-label">Date
                                    Attended From</label>
                                <div class="col-sm-9">
                                    <input required type="date" id="Attended_From_Under_Graduate"
                                           name="Attended_From_Under_Graduate" class="form-control mydatepicker"
                                           placeholder="mm/dd/yyyy">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Dates_Attended_to_Under_Graduate"
                                       class="col-sm-3 text-left control-label col-form-label">Dates
                                    attended To</label>
                                <div class="col-sm-9">
                                    <input required type="date" id="Dates_Attended_to_Under_Graduate"
                                           name="Dates_Attended_Under_Graduate" class="form-control mydatepicker"
                                           placeholder="mm/dd/yyyy">

                                </div>
                            </div>


                        </div>


                    </div>


                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">

                        <div class="card-body">
                            <h4 class="card-title">Education | Other Technical or Vocational School</h4>

                            <div class="form-group row">
                                <label for="Qualification_Other"
                                       class="col-sm-3 text-left control-label col-form-label">Qualification</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" id="Qualification_Other"
                                           name="Qualification_Other"
                                           placeholder="Qualification Here">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-left control-label col-form-label">Field of
                                    Study</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" id="Field_of_Study_Other"
                                           name="Field_of_Study_Other"
                                           placeholder="Field of Study Here">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-left control-label col-form-label">Name of
                                    University</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" id="Name_of_University_Other"
                                           name="Name_of_University_Other"
                                           placeholder="Name of University Here">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email1"
                                       class="col-sm-3 text-left control-label col-form-label">Country</label>
                                <div class="col-md-9">
                                    <select class="select2 form-control custom-select" name="Country_Other"
                                            id="Country_Other"
                                            style="width: 100%; height:36px;">
                                        <option>Select</option>
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value="CA">California</option>
                                            <option value="NV">Nevada</option>
                                            <option value="OR">Oregon</option>
                                            <option value="WA">Washington</option>
                                        </optgroup>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="UT">Utah</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value="AL">Alabama</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TX">Texas</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="WI">Wisconsin</option>
                                        </optgroup>
                                        <optgroup label="Eastern Time Zone">
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="IN">Indiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="OH">Ohio</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WV">West Virginia</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Attended_From_Other"
                                       class="col-sm-3 text-left control-label col-form-label">Date
                                    Attended From</label>
                                <div class="col-sm-9">
                                    <input required type="date" id="Attended_From_Other" name="Attended_From_Other"
                                           class="form-control mydatepicker" placeholder="mm/dd/yyyy">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Dates_Attended_to_Other"
                                       class="col-sm-3 text-left control-label col-form-label">Dates
                                    attended To</label>
                                <div class="col-sm-9">
                                    <input required type="date" id="Dates_Attended_to_Other"
                                           name="Dates_Attended_Other" class="form-control mydatepicker"
                                           placeholder="mm/dd/yyyy">

                                </div>
                            </div>


                        </div>


                    </div>


                </div>
                <div class="col-md-6">
                    <div class="card">

                        <div class="card-body">
                            <h4 class="card-title">Education | High School</h4>
                            <div class="form-group row">
                                <label for="Institute_Name"
                                       class="col-sm-3 text-left control-label col-form-label">Institute
                                    Name</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" id="Institute_Name_High_School"
                                           name="Institute_Name_High_School"
                                           placeholder="Institute Name Here">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email1"
                                       class="col-sm-3 text-left control-label col-form-label">Country</label>
                                <div class="col-md-9">
                                    <select class="select2 form-control custom-select" name="Country_High_School"
                                            id="Country_High_School"
                                            style="width: 100%; height:36px;">
                                        <option>Select</option>
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value="CA">California</option>
                                            <option value="NV">Nevada</option>
                                            <option value="OR">Oregon</option>
                                            <option value="WA">Washington</option>
                                        </optgroup>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="UT">Utah</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value="AL">Alabama</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TX">Texas</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="WI">Wisconsin</option>
                                        </optgroup>
                                        <optgroup label="Eastern Time Zone">
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="IN">Indiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="OH">Ohio</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WV">West Virginia</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Attended_From_High_School"
                                       class="col-sm-3 text-left control-label col-form-label">Date
                                    Attended From</label>
                                <div class="col-sm-9">
                                    <input required type="date" id="Attended_From_High_School"
                                           name="Attended_From_High_School" class="form-control mydatepicker"
                                           placeholder="mm/dd/yyyy">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Dates_Attended_to_High_School"
                                       class="col-sm-3 text-left control-label col-form-label">Dates
                                    attended To</label>
                                <div class="col-sm-9">
                                    <input required type="date" id="Dates_Attended_to_High_School"
                                           name="Dates_Attended_High_School" class="form-control mydatepicker"
                                           placeholder="mm/dd/yyyy">

                                </div>
                            </div>


                        </div>


                    </div>


                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="card">

                    <div class="card-body">
                        <h4 class="card-title">Other </h4>


                        <div class="form-group row ">


                            <label class="col-sm-3">List of professional license, certifications, computer
                                skills, training, and other skills and abilities you consider the most relevant
                                to the position. <small class="text-muted"></small></label>
                            <div class="col-sm-9">
                                <textarea name="License" class="form-control"></textarea>
                            </div>

                        </div>


                    </div>


                </div>


            </div>

            <div class="col-md-6">
                <div class="card">

                    <div class="card-body">
                        <h4 class="card-title">Language</h4>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-left control-label col-form-label">Ability/
                                English</label>
                            <div class="col-md-9">
                                <div class="custom-control">
                                    <input required type="radio" class="form-check-input required"
                                           id="English_Language_Ability_Fair" name="English_Language_Ability"
                                           value="Fair">
                                    <label
                                        for="English_Language_Ability_Fair">Fair</label>
                                </div>
                                <div class="custom-control">
                                    <input required type="radio" class="form-check-input required"
                                           id="English_Language_Ability_Good" name="English_Language_Ability"
                                           value="Good">
                                    <label
                                        for="English_Language_Ability_Good">Good</label>
                                </div>
                                <div class="custom-control">
                                    <input required type="radio" class="form-check-input required"
                                           id="English_Language_Ability_Very" name="English_Language_Ability"
                                           value="Very">
                                    <label for="English_Language_Ability_Very">Very
                                        Good</label>
                                </div>
                                <div class="custom-control">
                                    <input required type="radio" class="form-check-input required"
                                           id="English_Language_Ability_Excellent" name="English_Language_Ability"
                                           value="Excellent">
                                    <label
                                        for="English_Language_Ability_Excellent">Excellent</label>
                                </div>

                            </div>
                        </div>


                    </div>


                </div>


            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">

                    <div class="card-body">
                        <h4 class="card-title">EXPERIENCE </h4>

                        <div class="form-group row">
                            <label for="Job_Title" class="col-sm-3 text-left control-label col-form-label">Job
                                Title</label>
                            <div class="col-sm-9">
                                <input required type="text" class="form-control" id="Job_Title" name="Job_Title"
                                       placeholder="Job Title Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Employer"
                                   class="col-sm-3 text-left control-label col-form-label">Employer</label>
                            <div class="col-sm-9">
                                <input required type="text" class="form-control" id="Employer" name="Employer"
                                       placeholder="Employer Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-left control-label col-form-label">Describe
                                your major duties/responsibilities</label>
                            <div class="col-sm-9">
                                <textarea id="Duties" name="Duties" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-left control-label col-form-label">Reason(s)
                                for leaving</label>
                            <div class="col-sm-9">
                                    <textarea name="Reason_for_Leaving" id="Reason_for_Leaving"
                                              class="form-control"></textarea>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email1"
                                   class="col-sm-3 text-left control-label col-form-label">Country</label>
                            <div class="col-md-9">
                                <select class="select2 form-control custom-select" name="Country_Experience"
                                        style="width: 100%; height:36px;">
                                    <option>Select</option>
                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                    </optgroup>
                                    <optgroup label="Pacific Time Zone">
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </optgroup>
                                    <optgroup label="Mountain Time Zone">
                                        <option value="AZ">Arizona</option>
                                        <option value="CO">Colorado</option>
                                        <option value="ID">Idaho</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="UT">Utah</option>
                                        <option value="WY">Wyoming</option>
                                    </optgroup>
                                    <optgroup label="Central Time Zone">
                                        <option value="AL">Alabama</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IA">Iowa</option>
                                        <option value="KS">Kansas</option>
                                        <option value="KY">Kentucky</option>
                                        <option value="LA">Louisiana</option>
                                        <option value="MN">Minnesota</option>
                                        <option value="MS">Mississippi</option>
                                        <option value="MO">Missouri</option>
                                        <option value="OK">Oklahoma</option>
                                        <option value="SD">South Dakota</option>
                                        <option value="TX">Texas</option>
                                        <option value="TN">Tennessee</option>
                                        <option value="WI">Wisconsin</option>
                                    </optgroup>
                                    <optgroup label="Eastern Time Zone">
                                        <option value="CT">Connecticut</option>
                                        <option value="DE">Delaware</option>
                                        <option value="FL">Florida</option>
                                        <option value="GA">Georgia</option>
                                        <option value="IN">Indiana</option>
                                        <option value="ME">Maine</option>
                                        <option value="MD">Maryland</option>
                                        <option value="MA">Massachusetts</option>
                                        <option value="MI">Michigan</option>
                                        <option value="NH">New Hampshire</option>
                                        <option value="NJ">New Jersey</option>
                                        <option value="NY">New York</option>
                                        <option value="NC">North Carolina</option>
                                        <option value="OH">Ohio</option>
                                        <option value="PA">Pennsylvania</option>
                                        <option value="RI">Rhode Island</option>
                                        <option value="SC">South Carolina</option>
                                        <option value="VT">Vermont</option>
                                        <option value="VA">Virginia</option>
                                        <option value="WV">West Virginia</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Date_Attended_From_Experience"
                                   class="col-sm-3 text-left control-label col-form-label">Date
                                Attended From</label>
                            <div class="col-sm-9">
                                <input required type="date" class="form-control mydatepicker"
                                       id="Date_Attended_From_Experience" name="Date_Attended_From_Experience"
                                       placeholder="mm/dd/yyyy">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Dates_Attended_to__Experience"
                                   class="col-sm-3 text-left control-label col-form-label">Dates
                                attended To</label>
                            <div class="col-sm-9">
                                <input required type="date" class="form-control mydatepicker"
                                       name="Dates_Attended_to_Experience" id="Dates_Attended_to_Experience"
                                       placeholder="mm/dd/yyyy">

                            </div>
                        </div>


                    </div>


                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card" style="text-align: center;">

                    <div class="card-body">
                        <h4 class="card-title">Achievements, personal qualities and skills</h4>

                        <div class="form-group row" style="margin-left: 300px;margin-right: 300px;">

                            <div class="col-md-12" style="padding-bottom: 25px;">
                                Please use this section to indicate how far you meet each of the competencies
                                required for the post. Indicate specific experience, achievements, knowledge,
                                personal qualities and skills, which you feel are relevant, for this particular
                                post that you, applying for. Please limit your writing for this part to a
                                maximum of 300 words * <br><br>
                                <textarea id="Achievements" name="Achievements" class="form-control"></textarea>
                            </div>
                        </div>


                    </div>


                </div>


            </div>


            <div class="col-lg-12">
                <div class="card" style="text-align: center;">

                    <br>
                    <br>
                    <h4> Signature and Certification</h4>

                    <div class="form-group row" style="margin-left: 300px;margin-right: 300px;">

                        <div class="col-md-12" style="padding-bottom: 25px;">
                            I certify that, to the best of my knowledge and belief, all of the information on
                            this application is true, correct, complete, and made in good faith. I understand
                            that false or fraudulent information on this application may be grounds for not
                            hiring me or termination/dismissal after I begin work, and may be punishable by fine
                            or imprisonment according to the law. <br><br>
                            <div class="custom-control" style="margin-left: 50%;text-align: left;">
                                <input required type="radio" class="form-check-input required"
                                       id="Agreement_Agree" name="Agreement" value="Agree">
                                <label for="Agreement_Agree">I
                                    Agree</label>
                            </div>
                            <div class="custom-control" style="margin-left: 50%;text-align: left;">
                                <input required type="radio" class="form-check-input required"
                                       id="Agreement_Disagree" name="Agreement" value="Disagree">
                                <label for="Agreement_Disagree">I
                                    Disagree</label>
                            </div>
                        </div>
                    </div>


                </div>


            </div>


            <button type="submit" id="Submit_Button" class="btn btn-success col-lg-12 mb-5">Submit</button>
        </div>


    </form>
    <script type="text/javascript">

        $(document).ready(function () {
            $("#Type").change(function (e) {

                var t = $(this).val();
                e.preventDefault();

                $.ajax({
                    method: 'POST',
                    url: "{{ route('ajaxRequest.post') }}",
                    data: {value: t},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        //alert(data.htmlbrand)

                        //var test  = JSON.stringify(data);
                        //alert(data.success);
                        //alert(test)
                        $('#Fabric').html(data.htmlfabric);
                        $('#Color').html(data.htmlcolor);
                        $('#Brand').html(data.htmlbrand);
                        $('#Manufacturer').html(data.htmlmanufacturer);
                    },
                    error: function () {
                        alert('n')

                    }

                });
            });

            $("#Agreement_Agree").click(function () {
                $("#Submit_Button").attr("disabled", false);
            })
            $("#Agreement_Disagree").click(function () {
                $("#Submit_Button").attr("disabled", true);
            })
        })

    </script>
    <script src="../../js/ajax-jquery2.js"></script>
@endsection()
