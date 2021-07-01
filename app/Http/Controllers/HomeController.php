<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\item_request;
use App\Models\Stock_item;
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


//    Role::query()->create(['name' => 'User']);
//
//    Permission::query()->create(['name' => 'Normal']);
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
            'active_events_count' => Event::query()
                ->join('item_requests', 'item_requests.Event_id', '=', 'events.EVID')
                ->whereRaw('DATE_FORMAT(now(),"%Y-%m-%d") between DATE_FORMAT(Date_From,"%Y-%m-%d") AND DATE_FORMAT(Date_To,"%Y-%m-%d")')
                ->count('EVID'),
            'this_week_events_count' => Event::query()
                ->join('item_requests', 'item_requests.Event_id', '=', 'events.EVID')
                ->whereRaw('WEEK(Date_From) <= WEEK(now()) AND WEEK(Date_To) >= WEEK(now()) AND YEAR(Date_To)=YEAR(now())')
                ->count('EVID'),
            'pending_approval_count' => Auth::user()->hasRole('Approver_One')
                ? item_request::query()->where('ApprovalOne', '=', 'Pending')->where('Posted', '=', 'Posted')->count()
                : item_request::query()->where('ApprovalTwo', '=', 'Pending')->where('ApprovalOne', '=', 'Approved')->where('Posted', '=', 'Posted')->count(),
            'pie_chart_data' => DB::select('SELECT stock_items.Brand as brand,SUM(stocks.Quantity) as total FROM stocks,stock_items WHERE stocks.Item = stock_items.SIID AND stock_items.Type = "PRODUCT" GROUP BY Brand'),
            'unreturned_items_count' => count(Stock_item::query()
                ->join('reqested_item_lists', 'reqested_item_lists.ItemCode', '=', 'stock_items.SIID')
                ->join('item_requests', 'reqested_item_lists.Request_ID', '=', 'item_requests.IRID')
                ->where('reqested_item_lists.Item_Remaining', '<>', 0)
                ->where('reqested_item_lists.Issued', '<=>', 1)
                ->where('item_requests.Return_Date', '>=', now()->format('Y-m-d'))
                ->where('stock_items.Status', '=', 'Returnable')
                ->selectRaw('SUM(Item_Remaining) as Item_Remaining,stock_items.Size,stock_items.Fabric,stock_items.Color,stock_items.Status,stock_items.Item_Code')
                ->groupBy('stock_items.SIID')
                ->get()),
            'this_week_returnables' => Stock_item::query()
                ->join('reqested_item_lists', 'reqested_item_lists.ItemCode', '=', 'stock_items.SIID')
                ->join('item_requests', 'reqested_item_lists.Request_ID', '=', 'item_requests.IRID')
                ->where('reqested_item_lists.Item_Remaining', '<>', 0)
                ->where('reqested_item_lists.Issued', '<=>', 1)
                ->whereRaw('WEEK(item_requests.Return_Date) = WEEK(now())')
                ->where('stock_items.Status', '=', 'Returnable')
                ->count('RILID'),
        ]);
    }

    public function test()
    {
        return view('home2');
    }
}
