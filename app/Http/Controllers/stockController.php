<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Stock_item;
use App\Models\Stock_stock_room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class stockController extends Controller
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
        $loc = Auth::user()->Location;
        $dep = Auth::user()->Department;
        $id = Auth::user()->id;
        $data = "";
        $items = DB::table('stock_users')->where('User_ID', $id)->count();
        if ($items >= 1) {
            $data = DB::table('Stock_stock_rooms')->join('stock_users', 'stock_users.Stock_ID', '=', 'Stock_stock_rooms.SRID')->paginate(10);
        } else {
            $data = DB::table('Stock_stock_rooms')->where('Company', $loc)->where('Department', $dep)->paginate(10);
        }
        //   $Stock = Stock_category::all();
        //  return view('Item.category')->with('items',$data);

        return view('stock.stock', ['Stockroom' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $stockid = $id;

        $stockroomtype = Stock_stock_room::where('SRID', '=', $stockid)->get();
        //dd($stockroomtype);
        $test = $stockroomtype[0]->Stock_Room;

        $test2 = explode(" ", $test);
        // dd($test2);
        $items = Stock_item::where('item_Code', 'LIKE', '%' . $test2[0] . '%')->get();
        //  dd($items);
        return view('stock.stockadd', compact('items', 'stockid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //dd($request);
        $request->validate([
            'Type' => 'required',
            'Quantity' => 'required',
        ]);
        $id = $request->Stock_Room;
        $Item = Stock_stock_room::find($id);
        //dd($Item);
        $ItemCom = $Item->Company;
        $ItemDep = $Item->Department;

        $request->merge([
            'Item' => $request->Type,
            'Company' => $ItemCom,
            'Department' => $ItemDep,
        ]);
        if ($request->Countuncount == "Countable") {
//            dd($request->all());
            for ($i = 0; $i < $request->Quantity; $i++) {
//                $row = new Stock();
//                $row->Company = $request->Company;
//                $row->Department = $request->Department;
//                $row->Stock_Room = $request->Stock_Room;
//                $row->CUID = $request->CUID;
//                $row->UUID = $request->UUID;
//                $row->Item = $request->Item;
//                $row->Quantity = 1;
//                $row->Asset_No = $request->input('Asset_No_'.$i);
//                // and so on for your all columns s
//                $row->save();   //at last save into db
                stock::updateOrCreate(
                    [
                        'Stock_Room' => $request->Stock_Room,
                        'Item' => $request->Item,
                    ],
                    [
                        'Company' => $request->Company,
                        'Department' => $request->Department,
                        'CUID' => $request->CUID,
                        'UUID' => $request->UUID,
                        'Quantity' => 1,
                        'Asset_No' => $request->input('Asset_No_' . $i),
                    ]
                );
            }


        } else {
            stock::updateOrCreate(
                [
                    'Stock_Room' => $request->Stock_Room,
                    'Item' => $request->Item,
                ],
                [
//                     $current_quantity + $request->Quantity,
                    'Company' => $request->Company,
                    'Department' => $request->Department,
                    'CUID' => $request->CUID,
                    'UUID' => $request->UUID,
                ]
            )->increment('Quantity',$request->Quantity);
        }
        return redirect('/Stock')->with('message', 'Created Successfully');

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

        $items = DB::table('Stocks')->join('stock_items', 'stock_items.SIID', '=', 'Stocks.Item')->where('Stock_Room', $id)->paginate(10);
        // $data=DB::table('events')->join('item_requests', 'item_requests.Event_id', '=', 'events.EVID')->paginate(10);
        // Check Joins

        return view('stock.stockshow', compact('items', 'id'));
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

}
