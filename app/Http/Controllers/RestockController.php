<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\item_request;
use App\Models\requested_item_list;
use App\Models\stock;
use App\Models\Stock_stock_room;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->view('Restock.restock', [
            'items' => requested_item_list::where('Issued', 1)->where('Qty','<=>','IssuedQuantity')->get(),
        ]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        debug($id);
        return response()->view('Restock.show_restock', [
            'item' => requested_item_list::find($id),
            'event' => Event::find(requested_item_list::find($id)->Event_ID),
            'item_request' => item_request::where('Event_id', Event::find(requested_item_list::find($id)->Event_ID)->EVID)->first(),
        ]);
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
     * @param int $request_item_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $request_item_id)
    {
//        dd($request->file('item_image'));
        $requested_item = requested_item_list::find($request_item_id);
        $requested_item->update([
            'Item_Remaining' => $requested_item->IssuedQuantity - $request->returned_quantity,
            'Qty'=>$request->returned_quantity,
            'Damage_Status'=> $request->damage_status,
            'Image_Name'=> $request->file('item_image')->getClientOriginalName().'.'.$request->file('item_image')->getClientOriginalExtension(),
            'File_Path'=> $request->file('item_image')->getRealPath(),
        ]);

        stock::where('Item',$requested_item->ItemCode)->first()->increment(
            'Quantity',$request->returned_quantity,
        );

        StockMovement::create([
            'Company'=>Auth::user()->Location,
            'Department'=>Auth::user()->Department,
            'Stock_Room'=>stock::where('Item',$requested_item->ItemCode)->first()->SID,
            'Item'=>$requested_item->ItemCode,
            'Transaction'=> 'Restocking',
            'Transaction_Type'=>1,
            'Damage_Status'=> $request->damage_status,
            'Path_Image'=> $request->file('item_image')->getRealPath(),
            'Quantity'=>$request->returned_quantity,
            'Date_MVT'=>now()->format('Y-m-d'),
            'Event'=>$requested_item->Event_ID,
            'CUID'=>Auth::id(),
            'UUID'=>Auth::id(),
        ]);

        return response()->redirectTo('/restock')->with(['message'=>'Success!']);
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
