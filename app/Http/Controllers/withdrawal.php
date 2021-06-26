<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Event_Type;
use App\Models\item_request;
use App\Models\requested_item_list;
use App\Models\stock;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class withdrawal extends Controller
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
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/');
        }
        //
        $loc = Auth::user()->Location;
        $dep = Auth::user()->Department;
        $data = Event_Type::all();
        //  $item = Stock::all();
        // $item=DB::table('stocks')->select('Item',\DB::raw('SUM(Quantity) AS Quantity'))->groupby('Item')->get();
        $item = DB::table('item_requests')
            ->join('events', 'item_requests.Event_id', '=', 'events.EVID')
            ->join('reqested_item_lists', 'item_requests.Event_id', '=', 'reqested_item_lists.Event_ID')
            ->where(['item_requests.Company' => $loc, 'item_requests.Department' => $dep, 'ApprovalOne' => 'Approved'])
            ->where('ApprovalTwo', '<>', 'Pending')
            ->where('ApprovalTwo', '<>', 'Rejected')
            ->whereNull(['item_requests.Issued', 'reqested_item_lists.Issued'])
            ->groupBy('reqested_item_lists.Event_ID')
            ->select('*')
            ->get();
        //dd($item);
        //$list=Stock::distinct()
        //dd($requested_list);
        // return view('Item.category')->with('items',$Stock);
        return view('Transaction.Issuestock', ['event' => $data, 'category' => $item]);
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
     * @param int $event_id
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $event_id)
    {
//        dd($request->all());
        foreach ($request->issued_item as $stock_id => $issued_status) {
            if ($issued_status !== null) {
                foreach ($request->issued_quantity as $issued_quantity) {
                    if (isset($issued_quantity[$stock_id])) {
                        requested_item_list::query()->where('Stock_ID', $stock_id)->where('Event_ID',$event_id)->first()
                            ->update([
                                'Issued' => $issued_status,
                                'IssuedQuantity' => $issued_quantity[$stock_id],
                            ]);

                        stock::query()->find($stock_id)
                            ->decrement(
                                'Quantity', $issued_quantity[$stock_id],
                            );

                        StockMovement::query()->create([
                            'Company' => Auth::user()->Location,
                            'Department' => Auth::user()->Department,
                            'Stock_Room' => stock::query()->find($stock_id)->Stock_Room,
                            'Item' => $stock_id,
                            'Transaction' => 'Withdrawal',
                            'Transaction_Type' => 0,
                            'Quantity' => $issued_quantity[$stock_id],
                            'Date_MVT' => now()->format('Y-m-d'),
                            'Event' => $event_id,
                            'CUID' => Auth::id(),
                            'UUID' => Auth::id(),
                        ]);
                    }
                }
            }
        }
//        $loc = Auth::user()->Location;
//        $dep = Auth::user()->Department;
//        //
//        $testStockroom = "Stockroom1";
//
//
//        $data = Event_Type::all();
//
//        $request->merge([
//            'Company' => $loc,
//            'Department' => $dep,
//        ]);
//
//        $itemrequest = $request->IRID;
//
//        $requesttype = DB::table('item_requests')->select('*')->where('IRID', '=', $itemrequest)->get();
//
//        $Transaction = $requesttype[0]->Transaction;
//
//        $TransactionType = $requesttype[0]->Transaction_Type;
//
//        $id = $requesttype[0]->Event_id;
//
//        $item = $request->Quantity;
////dd($item);
//        $issue = $request->Issued;
//        $a = 0;;
////dd($request->Big_ST__Geogre_Yellow_Metal_Table);
//        foreach ($item as $key => $value) {
//
//            $text = str_replace('.', '_', $key);
//            $text = str_replace(' ', '_', $text);
//            $test = $key;
////echo "                                 ".$test.":".$value."<br>";
//
//
//            if ($value[0] != NULL and $issue[$key][0] != NULL) {
//
//                //$test=DB::update('reqested_item_lists set IssuedQuantity='.$value.',Issued='.$issue[$key].',UUID='.$request->UUID)->where('');
//                $test = DB::table('reqested_item_lists')
//                    ->where(['Event_ID' => $id, 'ItemCode' => $key])
//                    ->update(['IssuedQuantity' => $value[0], 'Issued' => $issue[$key][0], 'UUID' => $request->UUID]);
//// - from stock room   Issued
//                $Quan = DB::table('stocks')->where(['Item' => $key, 'Company' => $loc, 'Department' => $dep])->get();
//                //dd($Quan);
//                $val = $Quan[0]->Quantity - $value[0];
//                $test = DB::table('stocks')
//                    ->where(['Item' => $key])
//                    ->update(['Quantity' => $val, 'UUID' => $request->UUID]);
////  To item request
//                $test = DB::table('item_requests')
//                    ->where(['IRID' => $itemrequest])
//                    ->update(['Issued' => 'Issued']);
//
//                $test2 = DB::insert('insert into stock_movements (Company,Department,Stock_Room,Item,Transaction,Transaction_Type,Quantity,Unit_Price,Order_Number,Project_Code,Date_MVT,Event,Purchase_Date,Remark,CUID,UUID,created_at,updated_at) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,now(),now())', [$loc, $dep, $testStockroom, $key, $Transaction, $TransactionType, $value[0], '0', '0', '0', now(), $id, now(), 'Remark', $request->CUID, $request->UUID]);
//                //echo "Record inserted successfully.<br/>";
//                // echo '<a href = "/insert">Click Here</a> to go back.';
//
//            }
//            //  var_dump($key->Item);
//        }
//
//        $item = DB::table('item_requests')->join('events', 'item_requests.Event_id', '=', 'events.EVID')->where(['item_requests.Company' => $loc, 'item_requests.Department' => $dep])->select('*')->get();
//        //dd($item);
//        //$list=Stock::distinct()
//        //dd($requested_list);
//        // return view('Item.category')->with('items',$Stock);
        return redirect('/Withdrawal');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function test($id)
    {
        $data = Event_Type::all();
        $item = DB::table('stocks')->select('Item', \DB::raw('SUM(Quantity) AS Quantity'))->groupby('Item')->get();
        $Event = Event::query()->find($id);
        $requested_list = DB::table('reqested_item_lists')->where('Event_ID', '=', $id)->where('Issued', '=', null)->get();
        $idd = $Event->EVID;
        $itemrequest = DB::table('item_requests')->where('Event_id', '=', $idd)->get();

        //  dd($itemrequest[0]);
        // return view('Item.category')->with('items',$Stock);
        return view('Transaction.Issuesedit', ['event' => $data, 'requested_items' => $requested_list, 'RealEvent' => $Event, 'ItemRequest' => $itemrequest[0], 'item' => $item]);
    }
}
