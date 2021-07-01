<?php

namespace App\Http\Controllers;

use App\Models\item_request;
use App\Models\requested_item_list;
use App\Models\stock_category;
use App\Models\stock_item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class StockitemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $data = DB::table('Stock_items')->paginate(20);
        //   $Stock = Stock_category::all();
        // return view('Item.category')->with('items',$Stock);
        return view('stock.item', ['items' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $category = Stock_category::all();

        return response()->view('stock.itemadd', [
            'category' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $request->validate([

            'Countable' => 'required',
            'Status' => 'required',
            'Type' => [
                'required',
                Rule::unique('stock_items')->where(function ($query) use ($request) {
                    $query->whereType($request->Type)
                        ->whereFabric($request->Fabric)
                        ->whereColor($request->Color)
                        ->whereSize($request->Size)
                        ->whereBrand($request->Brand);
                }),
            ],
        ]);
        $Name = '';
        if (!is_null($request->Size) and !is_null($request->Fabric) and !is_null($request->Brand)) {
            $Name = $request->Size . "_" . $request->Color . "_" . $request->Brand . "_" . $request->Fabric . "_" . $request->Type;
        } elseif (is_null($request->Fabric) and $request->Brand == 'Null') {
            $Name = $request->Size . "_" . $request->Color . "_" . $request->Type;
        } elseif (is_null($request->Fabric)) {
            $Name = $request->Color . "_" . $request->Brand . "_" . $request->Size . "_" . $request->Type;
        } elseif (is_null($request->Color)) {
            $Name = $request->Brand . "_" . $request->Type;
        } else {
            $Name = $request->Color . "_" . $request->Brand . "_" . $request->Fabric . "_" . $request->Size . "_" . $request->Type;
        }
        $loc = Auth::user()->Location;
        $dep = Auth::user()->Department;
        $request->merge([
            'Item_Code' => $Name,
            'Company' => $loc,
            'Department' => $dep,
        ]);


        Stock_item::query()->create($request->all());
        //dd($request->all());
        return redirect()->back()->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified Item from requested item list.
     *
     * @param Request $request
     * @return Response
     */
    public function destroy(Request $request)
    {
        $requested_item = requested_item_list::query()->where('Stock_ID', $request->stock_id)->where('Event_ID', $request->event_id)->first();
        if (intval($requested_item->Quantity) >= 100) {
            item_request::query()->where('Event_id', '=', $request->event_id)->update([
                'ApprovalTwo' => 'Not Required',
            ]);
        }
        return $requested_item->delete();
    }

    /**
     * Remove the specified item from Stock Items list.
     *
     * @param int $item_id
     * @return RedirectResponse
     */
    public function delete($item_id)
    {
        stock_item::query()->find($item_id)->delete();

        return back();
    }

    public function show_unreturned_items()
    {
        return view('stock.item_table', [
            'items' => Stock_item::query()
                ->join('reqested_item_lists', 'reqested_item_lists.ItemCode', '=', 'stock_items.SIID')
                ->join('item_requests', 'reqested_item_lists.Request_ID', '=', 'item_requests.IRID')
                ->where('reqested_item_lists.Item_Remaining', '<>', 0)
                ->where('reqested_item_lists.Issued', '<=>', 1)
                ->where('item_requests.Return_Date', '>=', now()->format('Y-m-d'))
                ->where('stock_items.Status', '=', 'Returnable')
                ->selectRaw('SUM(Item_Remaining) as Item_Remaining,stock_items.Size,stock_items.Fabric,stock_items.Color,stock_items.Status,stock_items.Item_Code')
                ->groupBy('stock_items.SIID')
                ->orderByDesc('item_requests.Return_Date')
                ->paginate(10),

        ]);
    }

    public function show_this_week_returnables(){
        return view('stock.item_table', [
            'items' => Stock_item::query()
                ->join('reqested_item_lists', 'reqested_item_lists.ItemCode', '=', 'stock_items.SIID')
                ->join('item_requests', 'reqested_item_lists.Request_ID', '=', 'item_requests.IRID')
                ->where('reqested_item_lists.Item_Remaining', '<>', 0)
                ->where('reqested_item_lists.Issued', '<=>', 1)
                ->whereRaw('WEEK(item_requests.Return_Date) = WEEK(now())')
                ->where('stock_items.Status', '=', 'Returnable')
                ->orderByDesc('item_requests.Return_Date')
                ->paginate(10),

        ]);
    }
}
