<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock_category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StockcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data=DB::table('Stock_categorys')->paginate(10);
        //   $Stock = Stock_category::all();
        // return view('Item.category')->with('items',$Stock);
        return view('Item.category',['items'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //$Stock = Stock_item::all();
        return view('Item.categoryadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate([
        'Type' => 'required|max:255',
        ]); 
        $loc=Auth::user()->Location;
        $dep=Auth::user()->Department;
       $request->merge([
         'Company' => $loc,
        'Department' => $dep,
        ]); 
       Stock_category::create($request->all());
          //dd($request->all());
       return redirect()->back()->with('message','Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
//$profile_data= DB::table('Stock_category')->select('*')->where('id',$user_id)->first();
        $category=Stock_category::all();
//return view('profile_update',compact('profile_data','country_data'));   
    $Item=Stock_category::find($id);
    return view('Item.categoryedit',compact('Item','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
        'Company' => 'required',
        'Department' => 'required',
        'Type' => 'required|max:255',
        ]); 
       
       $update=Stock_category::find($id);
          //dd($request->all());
       $update->update(['Company' => $request->Company]);
       $update->update(['Department' => $request->Department]);
       $update->update(['Type' => $request->Type]);
       $update->update(['UUID' => $request->UUID]);
       
       return redirect('/Category')->with('message','Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category= Stock_category::find($id);
        $category->delete();
        return redirect('/Category')->with('message','Category Removed');
    }
}