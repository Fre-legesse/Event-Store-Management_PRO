<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\item_request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //auth()->user()->getAllPermissions();
        //auth()->user()->getDirectPermissions();

        //$users=User::role('admin')->get();


//    Role::create(['name' => 'User']);
//
//    Permission::create(['name' => 'Normal']);
//
//    $role=Role::findByName('User');
//    $permission=Permission::findByName('Normal');
        //$permission2=Permission::findById(12);

        //$permission5=Permission::findById(13);
        //$permission=Permission::findById(6);

//     $role->givePermissionTo($permission);
        //$role->givePermissionTo($permission2);

        // $role->givePermissionTo($permission5);

        //$role->revokePermissionTo($permission);
        //$role->removeRole($role);
//       auth()->user()->assignRole('User');

        return view('home2', [
            'total_events_count' => Event::count(),
            'active_events_count' => DB::select('SELECT COUNT("events.EVID") AS active_events_count FROM events WHERE now() BETWEEN events.Date_From and events.Date_To')[0]->active_events_count,
            'this_week_events_count' => DB::select('SELECT count("events.EVID") as this_month_events_count FROM events WHERE WEEK(events.Date_From) =  WEEK(now()) OR WEEK(events.Date_To) =  WEEK(now()) ')[0]->this_month_events_count,
            'pending_approval_count' => Auth::user()->hasRole('Approver_One') ? item_request::query()->where('ApprovalOne', '=', 'Pending')->where('Posted', '=', 'Posted')->count() : item_request::query()->where('ApprovalTwo', '=', 'Pending')->where('Posted', '=', 'Posted')->count(),
            'pie_chart_data' => DB::select('SELECT stock_items.Brand as brand,SUM(stocks.Quantity) as total FROM stocks,stock_items WHERE stocks.Item = stock_items.SIID AND stock_items.Type = "PRODUCT" GROUP BY Brand'),
            'unreturned_items_count' => DB::select('SELECT reqested_item_lists.*,COUNT(reqested_item_lists.RILID) as unreturned_items_count FROM reqested_item_lists,item_requests WHERE item_requests.Return_date > DATE_FORMAT(now(),"%Y-%m-%d") AND item_requests.Event_id = reqested_item_lists.Event_ID')[0]->unreturned_items_count,
            'this_week_returnables'=>DB::select('SELECT reqested_item_lists.*,COUNT(reqested_item_lists.RILID) as this_week_returnables FROM reqested_item_lists,item_requests WHERE WEEK(item_requests.Return_date) = WEEK(now()) AND item_requests.Event_id = reqested_item_lists.Event_ID')[0]->this_week_returnables,
        ]);
    }

    public function test()
    {
        return view('home2');
    }
}
