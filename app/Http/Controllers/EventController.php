<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Event_Type;
use App\Models\item_request;
use App\Models\requested_item_list;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class EventController extends Controller
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
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/');
        }

        $link = DB::connection()->getPdo();


        $loc = Auth::user()->Location;
        $dep = Auth::user()->Department;
        $data = DB::table('events')
            ->join('item_requests', 'item_requests.Event_id', '=', 'events.EVID')
            ->orderByDesc('events.created_at')
            ->paginate(10);
        //$data=$dat->paginate(10);
        //   $Stock = Stock_category::all();
        // return view('Item.category')->with('items',$Stock);
        return view('Event.event', ['event' => $data, 'Company' => $loc, 'Department' => $dep, 'link' => $link]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $data = Event_Type::all()->sortByDesc('ETID');
        //  $item = Stock::all();
        $item = DB::table('stocks')
            ->select('Item', \DB::raw('SUM(Quantity) AS Quantity'))
            ->groupby('Item')
            ->orderByDesc('stocks.updated_at')
            ->get();
        //$list=Stock::distinct()
        //dd($requested_list);
        // return view('Item.category')->with('items',$Stock);
        return view('Event.eventadd', ['event' => $data, 'category' => $item]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->Phone_Number);
        $link = DB::connection()->getPdo();

        $loc = Auth::user()->Location;
        $dep = Auth::user()->Department;
        //


        $request->merge([
            'Company' => $loc,
            'Department' => $dep,
        ]);

        $Event_id = Event::create($request->all());
        $id = $Event_id->EVID;

        $request->merge([
            'Phone_Number' => '090909090909',
            'Event_id' => $id,
            'Transaction' => 'Withdraw_Event',
            'Transaction_Type' => '0',
            'ApprovalOne' => 'Pending',
            'ApprovalTwo' => 'Not Required',
        ]);
//        dd($request->all());
        item_request::create([
            'Company' => $loc,
            'Department' => $dep,
            'Event_id' => $id,
            'Requester' => $request->Requester,
            'Responsible_person' => $request->Responsible_person,
            'Phone_Number' => $request->Phone_Number,
            'Return_date' => $request->Return_date,
            'Transaction' => 'Withdraw_Event',
            'Transaction_Type' => '0',
            'ApprovalOne' => 'Pending',
            'ApprovalTwo' => 'Not Required',
            'CUID' => Auth::id(),
            'UUID' => Auth::id(),
        ]);


//        $idd = $request1->IRID;
//
//        $request->merge([
//            'Event_ID' => $id,
//            'Request_ID' => $idd,
//        ]);
//        $item = $request->Quantity;
//        $a = 0;
        /*
        //dd($request->Big_ST__Geogre_Yellow_Metal_Table);
        foreach ($item as $key =>$value) {

        $text=str_replace('.', '_', $key);
        $text=str_replace(' ', '_', $text);
        $test=$key;
        //echo "                                 ".$test.":".$value."<br>";
            if($value[0] != NULL )
            {

                $test=DB::insert('insert into reqested_item_lists (Request_Id,Event_ID,ItemCode,Quantity,CUID,UUID,created_at,updated_at) values(?,?,?,?,?,?,now(),now())',[$idd,$id,$key,$value[0],$request->CUID,$request->UUID]);

              //echo "Record inserted successfully.<br/>";
             // echo '<a href = "/insert">Click Here</a> to go back.';

            }
          //  var_dump($key->Item);
        }
        */
//        $data = DB::table('events')->join('item_requests', 'item_requests.Event_id', '=', 'events.EVID')->paginate(10);
//
//        return response()->view('Event.event')->with(['message' => 'Created Successfully', 'event' => $data, 'Company' => $loc, 'Department' => $dep, 'link' => $link]);
        return redirect('/Event');
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
        $data = Event_Type::all();
        $item = DB::table('stocks')->select('Item', DB::raw('SUM(Quantity) AS Quantity'))->groupby('Item')->get();
        $Event = Event::find($id);
        $requested_list = DB::table('reqested_item_lists')->where('Event_ID', '=', $id)->get();
        $idd = $Event->EVID;
        $itemrequest = DB::table('item_requests')->where('Event_id', '=', $id)->get();

        //  dd($itemrequest[0]);
        // return view('Item.category')->with('items',$Stock);
        return view('Event.eventedit', ['event' => $data, 'requested_items' => $requested_list, 'RealEvent' => $Event, 'ItemRequest' => $itemrequest[0], 'item' => $item]);
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
//        dd($request->all());
        if (Auth::user()->hasRole('Approver_One')) {
            $request->validate([
                'first_approver_status' => 'required',
                'first_approver_quantity_array' => 'required',
            ]);

            foreach ($request->first_approver_quantity_array as $first_approver_quantity_array) {
                foreach ($first_approver_quantity_array as $stock_id => $first_approver_quantity) {
                    requested_item_list::where('Stock_ID', $stock_id)->where('Event_ID', $id)->first()->update([
                        'Approval1Quantity' => $first_approver_quantity,
                        'Qty' => $first_approver_quantity,
                    ]);
                }
            }

            item_request::where('Event_id', $id)->update([
                'ApprovalOne' => $request->first_approver_status,
            ]);

        } elseif (Auth::user()->hasRole('Approver_Two')) {
            $request->validate([
                'second_approver_status' => 'required',
                'second_approver_quantity_array' => 'required',
            ]);
//            dd($request->second_approver_quantity_array);
            foreach ($request->second_approver_quantity_array as $second_approver_quantity_array) {
                foreach ($second_approver_quantity_array as $stock_id => $second_approver_quantity) {
                    requested_item_list::where('Stock_ID', $stock_id)->where('Event_ID', $id)->first()->update([
                        'Approval2Quantity' => $second_approver_quantity,
                        'Qty' => $second_approver_quantity,
                    ]);
                }
            }

            item_request::where('Event_id', $id)->update([
                'ApprovalTwo' => $request->second_approver_status,
            ]);

        }

        $link = DB::connection()->getPdo();


        $loc = Auth::user()->Location;
        $dep = Auth::user()->Department;
        //
        $data = Event_Type::all();
        $item = Stock::all();

//        $update = item_request::where('Event_id', '=', $id);
//        //  dd($request->all());
//        //  $update->update(['ApprovalOne' => $request->ApprovalOne]);
//        if ($request->ApprovalOne != NULL) {
//            $update->update(['ApprovalOne' => $request->ApprovalOne]);
//            $item = $request->Quantity;
//            foreach ($item as $key => $value) {
//
//                $text = str_replace('.', '_', $key);
//                $text = str_replace(' ', '_', $text);
//                $test = $key;
//                //echo "                                 ".$test.":".$value."<br>";
//
//
//                if ($value[0] != NULL) {
//
//                    //$test=DB::update('reqested_item_lists set IssuedQuantity='.$value.',Issued='.$issue[$key].',UUID='.$request->UUID)->where('');
//                    $test = DB::table('reqested_item_lists')
//                        ->where(['Event_ID' => $id, 'ItemCode' => $key])
//                        ->update(['Approval1Quantity' => $value[0], 'UUID' => $request->UUID]);
//                    //echo "Record inserted successfully.<br/>";
//                    // echo '<a href = "/insert">Click Here</a> to go back.';
//
//                }
//                //  var_dump($key->Item);
//            }
//
//        }
//        if ($request->ApprovalTwo != NULL) {
//            $update->update(['ApprovalTwo' => $request->ApprovalTwo]);
//            $item = $request->Quantity;
//            foreach ($item as $key => $value) {
//
//                $text = str_replace('.', '_', $key);
//                $text = str_replace(' ', '_', $text);
//                $test = $key;
////echo "                                 ".$test.":".$value."<br>";
//
//
//                if ($value[0] != NULL) {
//
//                    //$test=DB::update('reqested_item_lists set IssuedQuantity='.$value.',Issued='.$issue[$key].',UUID='.$request->UUID)->where('');
//                    $test = DB::table('reqested_item_lists')
//                        ->where(['Event_ID' => $id, 'ItemCode' => $key])
//                        ->update(['Approval2Quantity' => $value[0], 'UUID' => $request->UUID]);
//                    //echo "Record inserted successfully.<br/>";
//                    // echo '<a href = "/insert">Click Here</a> to go back.';
//
//                }
//                //  var_dump($key->Item);
//            }
//        }
//
//        // $id=$Event_id->EVID;
//        $update->update(['UUID' => $request->UUID]);
//
//        $data = DB::table('events')->join('item_requests', 'item_requests.Event_id', '=', 'events.EVID')->paginate(10);
        //$data=$dat->paginate(10);
        //   $Stock = Stock_category::all();
        // return view('Item.category')->with('items',$Stock);
        return redirect('/event/approve');

        // return view('Event.event');
        // dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request_id = DB::table('reqested_item_lists')->where('Event_ID', '=', $id)->first()->Request_ID;

        if (Auth::user()->hasRole('Approver_One')) {
            item_request::find($request_id)->update([
                'ApprovalOne' => 'Rejected',
            ]);
        } elseif (Auth::user()->hasRole('Approver_Two')) {
            item_request::find($request_id)->update([
                'ApprovalTwo' => 'Rejected',
            ]);
        }

        return back();
    }

    public function additem($id)
    {
        $data = Event_Type::all();
        $item = DB::table('stocks')->select('Item', \DB::raw('SUM(Quantity) AS Quantity'))->groupby('Item')->get();
        $Event = Event::find($id);
        $requested_list = DB::table('reqested_item_lists')->join('stock_items', 'stock_items.SIId', 'ItemCode')->where('Event_ID', '=', $id)->get();
        $idd = $Event->EVID;
        $itemrequest = DB::table('item_requests')->where('Event_id', '=', $idd)->get();
        $Stock_category = DB::table('stock_categorys')->get();
        /*
   $result = DB::table('stocks')->select('Item',\DB::raw('(SUM(stocks.Quantity) - kj.Qty)AS Quantity'))->join(DB::table('reqested_item_lists')->select('Item',\DB::raw('ItemCode','SUM(Qty) AS Qty'))->groupby('Item'))->where([['stocks.Item','=',5]])->groupby('Item')->get();
   */
        /*
       SELECT sum(u.Quantity),kj.Qty,Item  FROM stocks u
      LEFT JOIN(
                 SELECT SUM(Qty) as Qty,ItemCode  FROM reqested_item_lists  GROUP BY ItemCode ) kj on u.Item = kj.ItemCode GROUP BY u.Item
        */
        /*
DB::table('stocks')->select('Item',\DB::raw('(SUM(stocks.Quantity)'))->join(DB::table('requested_item_lists')->select('ItemCode',\DB::raw('(SUM(Qty)'))->groupby('ItemCode'),'requested_item_lists.ItemCode','=','stocks.Item')->groupby('ItemCode')->where([['stocks.Item','=',5]])->groupby('Item')->get();
*/

        /*
        $result =DB::table('stocks')
                ->select('stocks.Item', \DB::raw('SUM(Quantity ) as t'),'k.Qty',\DB::raw('SUM(Quantity - k.Qty) as ssum'))

                ->leftjoin(DB::raw('(SELECT SUM(Qty) as Qty,ItemCode  FROM reqested_item_lists  GROUP BY ItemCode) k'),
                function($join)
                {
                   $join->on('stocks.Item', '=', 'k.ItemCode');
                })

                ->groupby('stocks.Item')
                ->get();


                dd($result);
             */
        //dd($item);

        // dd($itemrequest[0]);
        // return view('Item.category')->with('items',$Stock);
        return view('Event.eventitemadd', ['event' => $data, 'category' => $requested_list, 'RealEvent' => $Event, 'ItemRequest' => $itemrequest[0], 'item' => $item, 'Stock_category' => $Stock_category]);
    }


    public function display_approval()
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/');
        }

        $link = DB::connection()->getPdo();

        $loc = Auth::user()->Location;
        $dep = Auth::user()->Department;

//        dd(Auth::user()->hasRole('Approver_One'));

        if (Auth::user()->hasRole('Approver_One')) {
//            dd("Hello");
            $data = DB::table('events')
                ->join('item_requests', 'item_requests.Event_id', '=', 'events.EVID')
                ->where('Posted', '=', 'Posted')
                ->orderBy('ApprovalOne', 'DESC')
                ->paginate(10);
            return view('Event.approval', ['event' => $data, 'Company' => $loc, 'Department' => $dep, 'link' => $link]);
        } elseif (Auth::user()->hasRole('Approver_Two')) {
//            dd("World");
            $data = DB::table('events')
                ->join('item_requests', 'item_requests.Event_id', '=', 'events.EVID')
                ->join('reqested_item_lists', 'item_requests.Event_id', '=', 'reqested_item_lists.Event_ID')
                ->join('stock_items', 'reqested_item_lists.ItemCode', '=', 'stock_items.SIID')
                ->where('reqested_item_lists.Approval1Quantity', '>=', 100)
                ->where('Posted', '=', 'Posted')
                ->where('ApprovalTwo', '=', 'Pending')
                ->where('ApprovalOne', '=', 'Approved')
                ->where('stock_items.Type', '=', 'PRODUCT')
                ->orderBy('ApprovalTwo', 'DESC')
                ->paginate(10);
            return view('Event.approval', ['event' => $data, 'Company' => $loc, 'Department' => $dep, 'link' => $link]);
        }
    }

    /**
     * Approve the specified event
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        $request_id = DB::table('reqested_item_lists')->where('Event_ID', '=', $id)->first()->Request_ID;

        if (Auth::user()->hasRole('Approver_One')) {
            item_request::find($request_id)->update([
                'ApprovalOne' => 'Approved',
            ]);
        } elseif (Auth::user()->hasRole('Approver_Two')) {
            item_request::find($request_id)->update([
                'ApprovalTwo' => 'Approved',
            ]);
        }

        return back();
    }

    /**
     * Publish the specified event
     *
     * @param int $item_request_id
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function publish(Request $request, $item_request_id)
    {
//        dd($request->all());
        if ($request->post_checkbox == 'Posted') {
            item_request::find($item_request_id)->update([
                'Posted' => 'Posted',
            ]);
        }

        return response()->redirectTo('/Event');
    }


}
