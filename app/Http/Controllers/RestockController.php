<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\item_request;
use App\Models\requested_item_list;
use App\Models\stock;
use App\Models\StockMovement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RestockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response()->view('Restock.restock', [
            'items' => requested_item_list::query()
                ->where('reqested_item_lists.Issued', 1)
                ->where(function (Builder $query) {
                    $query->where('Item_Remaining', '=', null)
                        ->orWhere('Item_Remaining', '!=', 0);
                })
                ->leftJoin('events as events', 'reqested_item_lists.Event_ID', '=', 'events.EVID')
                ->leftJoin('item_requests as item_requests', 'reqested_item_lists.Request_ID', '=', 'item_requests.IRID')
                ->leftJoin('stock_items as stock_items', 'reqested_item_lists.ItemCode', '=', 'stock_items.SIID')
//                ->where('stock_items.Status', 'Returnable')
                ->groupBy('item_requests.Event_ID')
                ->orderByDesc('reqested_item_lists.updated_at')
                ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $event_id
     * @return Response
     */
    public function show($event_id)
    {
        return response()->view('Restock.show_restock', [
            'items' => requested_item_list::query()->where(function (Builder $query) {
                $query->where('Item_Remaining', '!=', 0)
                    ->orWhere('Item_Remaining', '=', null);
            })->where('Event_ID', '=', $event_id)->where('Request_ID', '=', item_request::query()->where('Event_id', $event_id)->first()->IRID)->get(),
            'event' => Event::query()->find($event_id),
            'item_request' => item_request::query()->where('Event_id', $event_id)->first(),
        ]);
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
     * @param int $event_id
     * @return RedirectResponse
     */
    public function update(Request $request, $event_id)
    {
//        dd($request->all());
        if (!empty($request->returned_quantity)) {
            foreach ($request->returned_quantity as $key => $returned_item_array) {
                foreach ($returned_item_array as $stock_id => $item_returned_quantity) {
                    if ($item_returned_quantity !== null) {
                        $requested_item = requested_item_list::query()->where('Event_ID', '=', $event_id)->where('Stock_ID', '=', $stock_id)->first();
                        $item_remaining = $requested_item->Item_Remaining === null
                            ? intval($requested_item->IssuedQuantity) - intval($item_returned_quantity)
                            : intval($requested_item->Item_Remaining) - intval($item_returned_quantity);
                        $image = $request->file('item_image') ? $request->file('item_image')[$key][$stock_id] : null;
                        $requested_item->update([
                            'Item_Remaining' => $item_remaining,
                            'Damage_Status' => $request->damage_status[$key][$stock_id],
                            'Image_Name' => $image !== null ? explode('/',$image->store('damaged_items_photo'))[1] : null,
                            'File_Path' => $image !== null ? $image->getRealPath() : null,
                        ]);

                        stock::query()
                            ->where('Item', $requested_item->ItemCode)
                            ->first()
                            ->increment(
                                'Quantity', $item_returned_quantity,
                            );

                        StockMovement::query()->create([
                            'Company' => Auth::user()->Location,
                            'Department' => Auth::user()->Department,
                            'Stock_Room' => stock::query()->where('Item', $requested_item->ItemCode)->first()->SID,
                            'Item' => $requested_item->ItemCode,
                            'Transaction' => 'Restocking',
                            'Transaction_Type' => 1,
                            'Damage_Status' => $request->damage_status[$key][$stock_id],
                            'Path_Image' => $image !== null ? $image->getRealPath() : null,
                            'Quantity' => $item_returned_quantity,
                            'Date_MVT' => now()->format('Y-m-d'),
                            'Event' => $event_id,
                            'CUID' => Auth::id(),
                            'UUID' => Auth::id(),
                        ]);
                    }
                }
            }
        }

        return response()->redirectTo('/restock')->with(['message' => 'Success!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
