<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Event_Type;
use App\Models\item_request;
use App\Models\requested_item_list;
use App\Models\Stock;
use App\Models\Stock_brand;
use App\Models\Stock_item;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::guest()) {

            return redirect('/');
        }

        $link = DB::connection()->getPdo();


        $loc = Auth::user()->Location;
        $dep = Auth::user()->Department;
        $data = DB::table('events')
            ->join('item_requests', 'item_requests.Event_id', '=', 'events.EVID')
            ->orderByDesc('events.created_at')
            ->get();


        return view('Event.event', ['event' => $data, 'Company' => $loc, 'Department' => $dep, 'link' => $link, 'brands' => Stock_brand::query()->groupBy('Brand')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {


        $data = Event_Type::all()->sortByDesc('ETID');

        $item = DB::table('stocks')
            ->select('Item', \DB::raw('SUM(Quantity) AS Quantity'))
            ->groupby('Item')
            ->orderByDesc('stocks.updated_at')
            ->get();
        $Stock_category = DB::table('stock_categorys')->get();


        return view('Event.eventadd', ['event' => $data, 'category' => $item, 'Stock_category' => $Stock_category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {

        $link = DB::connection()->getPdo();

        $loc = Auth::user()->Location;
        $dep = Auth::user()->Department;


        $request->merge([
            'Company' => $loc,
            'Department' => $dep,
        ]);

        $Event_id = Event::query()->create($request->all())->EVID;


        $item_request_id = item_request::query()->updateOrCreate(
            [
                'Event_id' => $Event_id,
            ],
            [
                'Company' => $loc,
                'Department' => $dep,
                'Requester' => $request->Requester,
                'Responsible_person_BGI' => $request->Responsible_person_BGI,
                'Phone_Number_BGI' => $request->Phone_Number_BGI,
                'Responsible_person_Client' => $request->Responsible_person_Client,
                'Phone_Number_Client' => $request->Phone_Number_Client,
                'Return_date' => $request->Return_date,
                'Transaction' => 'Withdraw_Event',
                'Transaction_Type' => '0',
                'ApprovalOne' => 'Pending',
                'ApprovalTwo' => 'Not Required',
                'Posted' => $request->post_checkbox ?? 'Not_Posted',
                'CUID' => Auth::id(),
                'UUID' => Auth::id(),
            ])->IRID;

        foreach ($request->requested_quantity as $requested_quantity) {
            foreach ($requested_quantity as $stock_id => $quantity) {
                $stock_item = Stock_item::query()->find(stock::query()->find($stock_id)->Item);
                requested_item_list::query()->create([
                    'Request_ID' => $item_request_id,
                    'Event_ID' => $Event_id,
                    'ItemCode' => $stock_item->SIID,
                    'Stock_ID' => $stock_id,
                    'Quantity' => $quantity,
                    'Qty' => $quantity,
                    'CUID' => auth()->id(),
                    'UUID' => auth()->id(),
                ]);

                if (intval($quantity) > 100 and $stock_item->Type == "PRODUCT") {
                    item_request::query()->find($item_request_id)->update([
                        'ApprovalTwo' => "Pending",
                    ]);
                }
            }
        }

        return redirect('/Event');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
//        dd('Event ID: '.$id);
        $data = Event_Type::all();
        $item = DB::table('stocks')->select('Item', DB::raw('SUM(Quantity) AS Quantity'))->groupby('Item')->get();
        $Event = Event::query()->find($id);
        $requested_list = DB::table('reqested_item_lists')->where('Event_ID', '=', $id)->get();
        $idd = $Event->EVID;
        $itemrequest = item_request::query()->where('Event_id', '=', $id)->get();


        return response()->view('Event.eventedit', ['event' => $data, 'requested_items' => $requested_list, 'RealEvent' => $Event, 'ItemRequest' => $itemrequest[0], 'item' => $item]);
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

        if (Auth::user()->hasRole('Approver_One')) {
            $request->validate([
                'first_approver_status' => 'required',
                'first_approver_quantity_array' => 'required',
            ]);

            foreach ($request->first_approver_quantity_array as $first_approver_quantity_array) {
                foreach ($first_approver_quantity_array as $stock_id => $first_approver_quantity) {
                    requested_item_list::query()->where('Stock_ID', $stock_id)->where('Event_ID', $id)->first()->update([
                        'Approval1Quantity' => $first_approver_quantity,
                        'Qty' => $first_approver_quantity,
                    ]);
                }
            }

            item_request::query()->where('Event_id', $id)->update([
                'ApprovalOne' => $request->first_approver_status,
            ]);

        } elseif (Auth::user()->hasRole('Approver_Two')) {
            $request->validate([
                'second_approver_status' => 'required',
                'second_approver_quantity_array' => 'required',
            ]);

            foreach ($request->second_approver_quantity_array as $second_approver_quantity_array) {
                foreach ($second_approver_quantity_array as $stock_id => $second_approver_quantity) {
                    requested_item_list::query()->where('Stock_ID', $stock_id)->where('Event_ID', $id)->first()->update([
                        'Approval2Quantity' => $second_approver_quantity,
                        'Qty' => $second_approver_quantity,
                    ]);
                }
            }

            item_request::query()->where('Event_id', $id)->update([
                'ApprovalTwo' => $request->second_approver_status,
            ]);

        }

        $link = DB::connection()->getPdo();


        $loc = Auth::user()->Location;
        $dep = Auth::user()->Department;

        $data = Event_Type::all();
        $item = Stock::all();


        return redirect('/event/approve');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $request_id = DB::table('reqested_item_lists')->where('Event_ID', '=', $id)->first()->Request_ID;

        if (Auth::user()->hasRole('Approver_One')) {
            item_request::query()->find($request_id)->update([
                'ApprovalOne' => 'Rejected',
            ]);
        } elseif (Auth::user()->hasRole('Approver_Two')) {
            item_request::query()->find($request_id)->update([
                'ApprovalTwo' => 'Rejected',
            ]);
        }

        return back();
    }

    /**
     * Delete the event.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete_event(Request $request)
    {
//        dd("Event ID: ".$request->event_id);
        Event::query()->find($request->event_id)->delete();
        item_request::query()->where('Event_id','=',$request->event_id)->delete();
        requested_item_list::query()->where('Event_ID','=',$request->event_id)->delete();
        return \response('Successfully Canceled Event!')->redirectTo('/Event');
    }


    public function additem($id)
    {
        $data = Event_Type::all();
        $item = DB::table('stocks')->select('Item', \DB::raw('SUM(Quantity) AS Quantity'))->groupby('Item')->get();
        $Event = Event::query()->find($id);
        $requested_list = DB::table('reqested_item_lists')->join('stock_items', 'stock_items.SIId', 'ItemCode')->where('Event_ID', '=', $id)->get();
        $idd = $Event->EVID;
        $itemrequest = DB::table('item_requests')->where('Event_id', '=', $idd)->get();
        $Stock_category = DB::table('stock_categorys')->get();

        return view('Event.eventitemadd', ['event' => $data, 'category' => $requested_list, 'RealEvent' => $Event, 'ItemRequest' => $itemrequest[0], 'item' => $item, 'Stock_category' => $Stock_category]);
    }


    public function display_approval()
    {
        if (Auth::guest()) {

            return redirect('/');
        }

        $link = DB::connection()->getPdo();

        $loc = Auth::user()->Location;
        $dep = Auth::user()->Department;


        if (Auth::user()->hasRole('Approver_One')) {

            $data = DB::table('events')
                ->join('item_requests', 'item_requests.Event_id', '=', 'events.EVID')
                ->where('Posted', '=', 'Posted')
                ->orderBy('ApprovalOne', 'DESC')
                ->paginate(10);
            return view('Event.approval', ['event' => $data, 'Company' => $loc, 'Department' => $dep, 'link' => $link]);
        } elseif (Auth::user()->hasRole('Approver_Two')) {
            $data = DB::table('events')
                ->join('item_requests', 'item_requests.Event_id', '=', 'events.EVID')
                ->where('Posted', '=', 'Posted')
                ->where('ApprovalOne', '=', 'Approved')
                ->orderBy('ApprovalTwo', 'DESC')
                ->paginate(10);
            return view('Event.approval', ['event' => $data, 'Company' => $loc, 'Department' => $dep, 'link' => $link]);
        }
    }

    /**
     * Approve the specified event
     *
     * @param int $id
     * @return Response
     */
    public function approve($id)
    {
        $request_id = DB::table('reqested_item_lists')->where('Event_ID', '=', $id)->first()->Request_ID;

        if (Auth::user()->hasRole('Approver_One')) {
            item_request::query()->find($request_id)->update([
                'ApprovalOne' => 'Approved',
            ]);
        } elseif (Auth::user()->hasRole('Approver_Two')) {
            item_request::query()->find($request_id)->update([
                'ApprovalTwo' => 'Approved',
            ]);
        }

        return back();
    }

    /**
     * Publish the specified event
     *
     * @param int $item_request_id
     * @param Request $request
     * @return RedirectResponse
     */
    public function publish(Request $request, $item_request_id)
    {
        if ($request->post_checkbox == 'Posted') {
            $item_request = item_request::query()->find($item_request_id);
            $item_request->update([
                'Posted' => 'Posted',
            ]);
        }

        return response()->redirectTo('/Event');
    }

    /**
     * Add item to an event
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function add_item_to_event(Request $request)
    {

        $request->validate([
            'requested_quantity' => 'required|numeric|gt:0|lte:stock_quantity',
        ]);
        return response()->json([
            'item_code' => Stock_item::query()->find(stock::query()->find($request->item_stock_id)->Item)->Item_Code,
            'requested_quantity' => $request->requested_quantity,
            'stock_id' => $request->item_stock_id,
        ]);
    }

//    public function show_currently_ongoing_events()
//    {
//        if (Auth::guest()) {
//
//            return redirect('/');
//        }
//        $loc = Auth::user()->Location;
//        $dep = Auth::user()->Department;
//        $data = DB::table('events')
//            ->join('item_requests', 'item_requests.Event_id', '=', 'events.EVID')
//            ->where('events.Date_To', '<=', now())
//            ->orderByDesc('events.created_at')
//            ->paginate(10);
//
//
//        return view('Event.event_table', ['event' => $data, 'Company' => $loc, 'Department' => $dep, 'brands' => Stock_brand::query()->groupBy('Brand')->get()]);
//    }

    /**
     * @param string $week_data
     * @param string $brand_name
     * @return Response
     */
    public function show_filtered_events(string $week_data, string $brand_name)
    {
        if ($brand_name != 'empty' && $week_data != 'empty') {
            $week = intval(explode('-W', $week_data)[1]);
            $year = intval(explode('-W', $week_data)[0]);
            $link = DB::connection()->getPdo();
            $loc = Auth::user()->Location;
            $dep = Auth::user()->Department;
            $data = DB::table('events')
                ->join('item_requests', 'item_requests.Event_id', '=', 'events.EVID')
                ->join('reqested_item_lists', 'reqested_item_lists.Event_ID', '=', 'events.EVID')
                ->join('stock_items', 'reqested_item_lists.ItemCode', '=', 'stock_items.SIID')
                ->where('Brand', '=', $brand_name)
                ->whereRaw('WEEK(Date_From) <=' . $week . ' and WEEK(Date_To) >=' . $week)
                ->whereRaw('DATE_FORMAT(Date_From,"%Y") <=' . $year . ' and DATE_FORMAT(Date_To,"%Y") >=' . $year)
                ->orderByDesc('events.created_at')
                ->paginate(10);


            return response()->view('Event.event', [
                'event' => $data,
                'Company' => $loc,
                'Department' => $dep,
                'link' => $link,
                'week' => $week,
                'year' => $year,
                'chosen_brand' => $brand_name,
                'brands' => Stock_brand::query()->groupBy('Brand')->get()
            ]);
        } elseif ($brand_name != 'empty' && $week_data == 'empty') {
            $link = DB::connection()->getPdo();
            $loc = Auth::user()->Location;
            $dep = Auth::user()->Department;
            $data = DB::table('events')
                ->join('item_requests', 'item_requests.Event_id', '=', 'events.EVID')
                ->join('reqested_item_lists', 'reqested_item_lists.Event_ID', '=', 'events.EVID')
                ->join('stock_items', 'reqested_item_lists.ItemCode', '=', 'stock_items.SIID')
                ->where('Brand', '=', $brand_name)
                ->orderByDesc('events.created_at')
                ->paginate(10);


            return response()->view('Event.event', [
                'event' => $data,
                'Company' => $loc,
                'Department' => $dep,
                'link' => $link,
                'chosen_brand' => $brand_name,
                'brands' => Stock_brand::query()->groupBy('Brand')->get()
            ]);
        } elseif ($brand_name == 'empty' && $week_data != 'empty') {
            $link = DB::connection()->getPdo();
            $week = intval(explode('-W', $week_data)[1]);
            $year = intval(explode('-W', $week_data)[0]);
            $loc = Auth::user()->Location;
            $dep = Auth::user()->Department;
            $data = DB::table('events')
                ->join('item_requests', 'item_requests.Event_id', '=', 'events.EVID')
                ->join('reqested_item_lists', 'reqested_item_lists.Event_ID', '=', 'events.EVID')
                ->join('stock_items', 'reqested_item_lists.ItemCode', '=', 'stock_items.SIID')
                ->whereRaw('WEEK(Date_From) <=' . $week . ' and WEEK(Date_To) >=' . $week)
                ->whereRaw('DATE_FORMAT(Date_From,"%Y") <=' . $year . ' and DATE_FORMAT(Date_To,"%Y") >=' . $year)
                ->orderByDesc('events.created_at')
                ->paginate(10);


            return response()->view('Event.event', [
                'event' => $data,
                'Company' => $loc,
                'Department' => $dep,
                'link' => $link,
                'week' => $week,
                'year' => $year,
                'brands' => Stock_brand::query()->groupBy('Brand')->get()
            ]);
        } else {
            if (Auth::guest()) {

                return redirect('/');
            }

            $link = DB::connection()->getPdo();
            $loc = Auth::user()->Location;
            $dep = Auth::user()->Department;
            $data = DB::table('events')
                ->join('item_requests', 'item_requests.Event_id', '=', 'events.EVID')
                ->orderByDesc('events.created_at')
                ->paginate(10);


            return \response()->view('Event.event', [
                'event' => $data,
                'Company' => $loc,
                'Department' => $dep,
                'link' => $link,
                'brands' => Stock_brand::query()->groupBy('Brand')->get()]);
        }
    }

    public function show_ongoing_events()
    {
        $loc = Auth::user()->Location;
        $dep = Auth::user()->Department;
        return view('Event.event_table', [
            'event' => Event::query()
                ->join('item_requests', 'item_requests.Event_id', '=', 'events.EVID')
                ->whereRaw('DATE_FORMAT(now(),"%Y-%m-%d") between DATE_FORMAT(Date_From,"%Y-%m-%d") AND DATE_FORMAT(Date_To,"%Y-%m-%d")')
                ->paginate(10),
            'Company' => $loc,
            'Department' => $dep,
            'link' => DB::connection()->getPdo(),
            'brands' => Stock_brand::query()->groupBy('Brand')->get()]);
    }

    public function show_events_this_week()
    {
        $loc = Auth::user()->Location;
        $dep = Auth::user()->Department;
        return view('Event.event_table', [
            'event' => Event::query()
                ->join('item_requests', 'item_requests.Event_id', '=', 'events.EVID')
                ->whereRaw('WEEK(Date_From) <= WEEK(now()) AND WEEK(Date_To) >= WEEK(now()) AND YEAR(Date_To)=YEAR(now())')
                ->paginate(10),
            'Company' => $loc,
            'Department' => $dep,
            'link' => DB::connection()->getPdo(),
            'brands' => Stock_brand::query()->groupBy('Brand')->get()]);
    }

}
