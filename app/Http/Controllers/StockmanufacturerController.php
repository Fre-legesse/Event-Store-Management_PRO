<?php

namespace App\Http\Controllers;

use App\Models\Stock_category;
use App\Models\stock_manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StockmanufacturerController extends Controller
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
        $data=DB::table('Stock_manufacturers')->paginate(3);
        //   $Stock = Stock_category::all();
        // return view('Item.category')->with('items',$Stock);
        return view('Item.categorymanufacturer',['items'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Stock_category::all();
        $Fabric=stock_manufacturer::all();

       return view('Item.categorymanufactureradd')->with('category',$category);
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
        'Manufacturer' => 'required',
        'Type' => 'required',
        ]); 
       $loc=Auth::user()->Location;
        $dep=Auth::user()->Department;
       Stock_manufacturer::create($request->all());
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
    $Item=Stock_manufacturer::find($id);
    return view('Item.categorymanufactureredit',compact('Item','category'));
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
        'Manufacturer' => 'required',
        'Type' => 'required',
        
        ]); 
       
       $update=Stock_manufacturer::find($id);
          //dd($request->all());
       $update->update(['Brand' => $request->Brand]);
       $update->update(['Type' => $request->Type]);
      
       $update->update(['UUID' => $request->UUID]);
       
       return redirect('/Manufacture')->with('message','Update Successfully');
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
         $category= Stock_manufacturer::find($id);
        $category->delete();
        return redirect('/Manufacture')->with('message','Manufacturer Removed');
    }
}
