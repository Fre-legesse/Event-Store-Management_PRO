<?php

namespace App\Http\Controllers;

use App\Models\Event_Type;
use App\Models\Stock;
use App\Models\item_request;
use App\Models\requested_item_list;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ReceivedController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::guest()) {
 //is a guest so redirect
 return redirect('/');
}
        //
$loc=Auth::user()->Location;
$dep=Auth::user()->Department;
$data = Event_Type::all();
         //  $item = Stock::all();
          // $item=DB::table('stocks')->select('Item',\DB::raw('SUM(Quantity) AS Quantity'))->groupby('Item')->get();
        $item=DB::table('item_requests')->join('events','item_requests.Event_type','=','events.EVID')->where(['item_requests.Company'=>$loc,'item_requests.Department'=>$dep,'ApprovalOne'=>'Approve','ApprovalTwo'=>'Approve','Issued'=>'Issued'])->select('*')->get();
            //dd($item);
           //$list=Stock::distinct()
           //dd($requested_list);
           // return view('Item.category')->with('items',$Stock);
        return view('Transaction.Receivedstock',['event'=>$data,'category'=>$item]);
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $loc=Auth::user()->Location;
        $dep=Auth::user()->Department;
        //
        $testStockroom="1";

          
          $data = Event_Type::all();

         $request->merge([
    'Company' => $loc,
    'Department' => $dep,
]);
     
     $itemrequest=$request->IRID; 
     
           $requesttype=DB::table('item_requests')->select('*')->where('IRID','=',$itemrequest)->get();
        
        $Transaction="ReceivedFromEvent";
        
        $TransactionType=1;

        $id= $requesttype[0]->Event_type;

$item = $request->Quantity;
$issue =$request->Issued;
$a=0;
;

//dd($request->Big_ST__Geogre_Yellow_Metal_Table);
foreach ($item as $key =>$value) {
    
$text=str_replace('.', '_', $key);
$text=str_replace(' ', '_', $text);
$test=$key;
//echo "                                 ".$test.":".$value."<br>";


    if($value[0] != NULL )
    {   

        $category1=requested_item_list::find(['Event_ID'=>$id,'ItemCode'=>$key]);
        $category1length=sizeof($category1);
        $value1=0;
        $value2=$value[0];
       // dd($category1[0]->IssuedQuantity);
    //$test=DB::update('reqested_item_lists set IssuedQuantity='.$value.',Issued='.$issue[$key].',UUID='.$request->UUID)->where('');
        if($category1length >0)
        if((int)$value2  < $category1[0]->IssuedQuantity){
            $value1=$category1[0]->IssuedQuantity - $value[0];
        $test=DB::table('reqested_item_lists')
              ->where(['Event_ID'=> $id,'ItemCode'=>$key])
              ->update(['Item_Remaining' => $value1,'UUID' => $request->UUID]);
          }
// - from stock room   Issued   

               $Quan=DB::table('stocks')->where(['Item'=>$key,'Company'=>$loc,'Department'=>$dep])->get(); 
               //dd($Quan); 
               $val=$Quan[0]->Quantity+$value[0];
              $test=DB::table('stocks')
             ->where(['Item'=>$key])
            ->update(['Quantity' => $val,'UUID' => $request->UUID]);
//  To item request
            if($value1 != 0){
             $test=DB::table('item_requests')
             ->where(['IRID'=>$itemrequest])
            ->update(['Issued' => 'HalfReceived']);
           }else{
            $test=DB::table('item_requests')
             ->where(['IRID'=>$itemrequest])
            ->update(['Issued' => 'Received']);
           }
        $test2=DB::insert('insert into stock_movements (Company,Department,Stock_Room,Item,Transaction,Transaction_Type,Quantity,Unit_Price,Order_Number,Project_Code,Date_MVT,Event,Purchase_Date,Remark,CUID,UUID,created_at,updated_at) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,now(),now())',[$loc,$dep,$testStockroom,$key,$Transaction,$TransactionType,$value[0],'0','0','0',now(),$id,now(),'Remark',$request->CUID,$request->UUID]);
      //echo "Record inserted successfully.<br/>";
     // echo '<a href = "/insert">Click Here</a> to go back.';
        
    }
  //  var_dump($key->Item);
}

 $item=DB::table('item_requests')->join('events','item_requests.Event_type','=','events.EVID')->where(['item_requests.Company'=>$loc,'item_requests.Department'=>$dep])->select('*')->get();
            //dd($item);
           //$list=Stock::distinct()
           //dd($requested_list);
        // return view('Item.category')->with('items',$Stock);
        return view('Transaction.Receivedstock',['event'=>$data,'category'=>$item]);
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
     public function test($id){
         $data = Event_Type::all();
           $item=DB::table('stocks')->select('Item',\DB::raw('SUM(Quantity) AS Quantity'))->groupby('Item')->get();
           $Event= Event::find($id);
           $requested_list=DB::table('reqested_item_lists')->join('stock_items','reqested_item_lists.ItemCode','=','stock_items.Item_Code')->where(['stock_items.Status'=>'Returnable','reqested_item_lists.Event_ID'=>$id])->select('*')->get();
           $idd=$Event->EVID;
           $itemrequest= DB::table('item_requests')->where('Event_type','=',$idd)->get();

         //  dd($itemrequest[0]);
        // return view('Item.category')->with('items',$Stock);
        return view('Transaction.Receivededit',['event'=>$data,'category'=>$requested_list,'RealEvent'=>$Event,'ItemRequest'=>$itemrequest[0],'item'=>$item]);
    }
}
