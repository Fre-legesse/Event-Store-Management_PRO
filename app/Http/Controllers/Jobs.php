<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Address;
use App\Models\Education;
use App\Models\Experience;
use App\Models\ExperienceDetail;
use App\Models\JobPostAndPersonalInformation;
use App\Models\Language;
use App\Models\OtherInformation;
use App\Models\PersonalInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Jobs extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = DB::table('job_post')->where('JPID', $id)->paginate(10);
        $JopTitle = $data[0]->Job_Title;

        return response()->view('home3', ['category' => $data, 'Title' => $JopTitle,'job_id'=>$id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     ** @param int $job_id
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$job_id)
    {
//        ddd(Input::get("radio"));
//        ddd($request->Work_Permit);

        $person_id = PersonalInformation::create([
            "First_Name" => $request->First_Name,
            "Middle_Name" => $request->Middle_Name,
            "Last_Name" => $request->Last_Name,
            "Date_of_Birth" => $request->Birth_Date,
            "Gender" => $request->Gender_Radio,
            "Legally" => $request->Work_Permit,
            "CDATE" => now(),
            "UDATE" => now(),
        ])->id;

//        ddd($person_id);
        Address::create([
            "PIID" => $person_id,
            "Phone" => $request->Mobile_Number_One,
            "Mobile" => $request->Mobile_Number_Two,
            "E-mail" => $request->Email,
            "Citizenship" => $request->Citizenship,
            "CDATE" => now(),
            "UDATE" => now(),
        ]);

//        ddd($request->Qualification_Under_Graduate);
        Education::create([
            "Qualification" => $request->Qualification_Post_Graduate,
            "Field_of_Study" => $request->Field_of_Study_Post_Graduate,
            "Name_of_University" => $request->Name_of_University_Post_Graduate,
            "Country" => $request->Country_Post_Graduate,
            "From" => $request->Attended_From_Post_Graduate,
            "To" => $request->Dates_Attended_Post_Graduate,
            "CDATE" => now(),
            "UDATE" => now(),
        ]);
        Education::create([
            "Qualification" => $request->Qualification_Under_Graduate,
            "Field_of_Study" => $request->Field_of_Study_Under_Graduate,
            "Name_of_University" => $request->Name_of_University_Under_Graduate,
            "Country" => $request->Country_Under_Graduate,
            "From" => $request->Attended_From_Under_Graduate,
            "To" => $request->Dates_Attended_Under_Graduate,
            "CDATE" => now(),
            "UDATE" => now(),
        ]);
        Education::create([
            "Qualification" => $request->Qualification_Other,
            "Field_of_Study" => $request->Field_of_Study_Other,
            "Name_of_University" => $request->Name_of_University_Other,
            "Country" => $request->Country_Other,
            "From" => $request->Attended_From_Other,
            "To" => $request->Dates_Attended_Other,
            "CDATE" => now(),
            "UDATE" => now(),
        ]);
        Education::create([
            "Qualification" => "High School",
            "Field_of_Study" => "Genderal",
            "Name_of_University" => $request->Institute_Name_High_School,
            "Country" => $request->Country_High_School,
            "From" => $request->Attended_From_High_School,
            "To" => $request->Dates_Attended_High_School,
            "CDATE" => now(),
            "UDATE" => now(),
        ]);

        Language::create([
            "PIID" => $person_id,
            "Language" => "English",
            "Status" => $request->English_Language_Ability,
            "CDATE" => now(),
            "UDATE" => now(),
        ]);

        $experience_id = Experience::create([
            "Job_Title" => $request->Job_Title,
            "From" => $request->Date_Attended_From_Experience,
            "To" => $request->Dates_Attended_to_Experience,
            "Employer" => $request->Employer,
            "Country" => $request->Country_Experience,
            "Reason_for_Leaving" => $request->Reason_for_Leaving,
            "CDATE" => now(),
            "UDATE" => now(),
        ])->id;

        ExperienceDetail::create([
            "EXID" => $experience_id,
            "Duties" => $request->Duties,
            "CDATE" => now(),
            "UDATE" => now(),
        ]);

        OtherInformation::create([
            "PIID" => $person_id,
            "Description" => $request->License,
            "CDATE" => now(),
            "UDATE" => now(),
        ]);

        Achievement::create([
            "PIID" => $person_id,
            "Description" => $request->Achievements,
            "CDATE" => now(),
            "UDATE" => now(),
        ]);

        JobPostAndPersonalInformation::create([
            "JPID"=>$job_id,
            "PIID"=>$person_id,
            "CDATE" => now(),
            "UDATE" => now(),
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }
}
