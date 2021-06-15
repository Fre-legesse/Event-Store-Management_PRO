<?php
 
namespace App\Http\Controllers;

use App\Models\stock_item;
use App\Models\stock_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StockitemController extends Controller
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
        //
          $data=DB::table('Stock_items')->paginate(20);
        //   $Stock = Stock_category::all();
        // return view('Item.category')->with('items',$Stock);
        return view('stock.item',['items'=>$data]);
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $category=Stock_category::all();

       return view('stock.itemadd')->with('category',$category);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
        
        'Type' => 'required',     
        'Countable' => 'required',
        
        'Status' => 'required',
        ]); 
        $Name='';
       if(!is_null($request->Size) AND !is_null($request->Fabric) AND !is_null($request->Brand)){ 
        $Name=$request->Size."_".$request->Color."_".$request->Brand."_".$request->Fabric."_".$request->Type;
    }elseif(is_null($request->Fabric) AND $request->Brand=='Null'){
     $Name=$request->Size."_".$request->Color."_".$request->Type;
    }elseif(is_null($request->Fabric) ){
     $Name=$request->Color."_".$request->Brand."_".$request->Size."_".$request->Type;
    }elseif(is_null($request->Color) ){
     $Name=$request->Brand."_".$request->Type;
    }
    else{
        $Name=$request->Color."_".$request->Brand."_".$request->Fabric."_".$request->Size."_".$request->Type;
    }
        $loc=Auth::user()->Location;
        $dep=Auth::user()->Department;
        $request->merge([
        'Item_Code' => $Name,
        'Company' => $loc,
        'Department' => $dep,
]);
        
     
       Stock_item::create($request->all());
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
    }
}
