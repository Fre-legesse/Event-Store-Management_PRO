<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock_category;
use App\Models\stock_color;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StockcolorController extends Controller
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
        $data=DB::table('Stock_colors')->paginate(3);
        //   $Stock = Stock_category::all();
        // return view('Item.category')->with('items',$Stock);
        return view('Item.categoryColor',['items'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Stock_category::all();
        $Color=stock_color::all();

       return view('Item.categorycoloradd')->with('category',$category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //dd($request);
        //
         $request->validate([
        'Color' => 'required',
        'Type' => 'required',
        ]); 
          $loc=Auth::user()->Location;
        $dep=Auth::user()->Department;
       $request->merge([
         'Company' => $loc,
        'Department' => $dep,
        ]); 
       
       Stock_color::create($request->all());
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
        //
        $category=Stock_category::all();
//return view('profile_update',compact('profile_data','country_data'));   
    $Item=Stock_color::find($id);
    return view('Item.categorycoloredit',compact('Item','category'));
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
        'Color' => 'required',
        'Type' => 'required',
        
        ]); 
       
       $update=Stock_color::find($id);
          //dd($request->all());
       $update->update(['Color' => $request->Color]);
       $update->update(['Type' => $request->Type]);
      
       $update->update(['UUID' => $request->UUID]);
       
       return redirect('/Color')->with('message','Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $category= Stock_color::find($id);
        $category->delete();
        return redirect('/Color')->with('message','Color Removed');
    }
}
