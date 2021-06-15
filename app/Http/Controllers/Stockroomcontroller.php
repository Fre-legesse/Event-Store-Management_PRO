<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock_stock_room;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Stockroomcontroller extends Controller
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
        $data=DB::table('Stock_stock_rooms')->paginate(10);
        //   $Stock = Stock_category::all();
        // return view('Item.category')->with('items',$Stock);

        //$data=DB::table('Stock_stock_rooms')->join('department','department.DID','=','Stock_stock_rooms.Department')->join('location','location.Lid','=','Stock_stock_rooms.Company')->select('*')->get()
        //dd($data);
        //$data=$data->paginate(10);
        return view('stock.stockroom',['Stockroom'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$category=Stock_category::all();
        //$Color=stock_color::all();

       return view('stock.stockroomadd');
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
        'Branch' => 'required',
        'Site' => 'required',
        'Stock_Room' => 'required',
        'Description' => 'required',
        ]); 
        $loc=Auth::user()->Location;
        $dep=Auth::user()->Department;
        $Short_Name=$loc.$request->Site.$dep.$request->Branch.$request->Stock_Room;
       $request->merge([
         'Company' => $loc,
        'Department' => $dep,
        'ShortName'=>$Short_Name,
        ]); 
       
       Stock_stock_room::create($request->all());
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
       // $category=Stock_stock_room::all();
//return view('profile_update',compact('profile_data','country_data'));   
    $Item=Stock_stock_room::find($id);
    return view('stock.stockroomedit',compact('Item'));
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
        'Branch' => 'required',
        'Site' => 'required',
        'Stock_Room' => 'required',
        'Description' => 'required',
        ]); 
        $loc=Auth::user()->Location;
        $dep=Auth::user()->Department;
        $Short_Name=$loc.$request->Site.$dep.$request->Branch.$request->Stock_Room;
       $request->merge([
         'Company' => $loc,
        'Department' => $dep,
        'ShortName'=>$Short_Name,
        ]); 
       $update=Stock_stock_room::find($id);
          //dd($request->all());
       $update->update(['Site' => $request->Site]);
       $update->update(['Branch' => $request->Branch]);
       $update->update(['Stock_Room' => $request->Stock_Room]);
       $update->update(['Description' => $request->Description]);
       $update->update(['ShortName' => $request->ShortName]);
       $update->update(['UUID' => $request->UUID]);
       
       return redirect('/StockRoom')->with('message','Update Successfully');
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
         $category= Stock_stock_room::find($id);
        $category->delete();
        return redirect('/StockRoom')->with('message','Color Removed');
    }
}
