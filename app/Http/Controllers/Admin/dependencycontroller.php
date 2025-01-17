<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\ApproverSetting;
use App\Models\item_request;
use App\Models\requested_item_list;
use App\Models\stock;
use App\Models\Stock_brand;
use App\Models\stock_color;
use App\Models\Stock_fabric;
use App\Models\Stock_item;
use App\Models\Stock_manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class dependencycontroller extends Controller
{
    //
    public function Fabric(Request $request)
    {
        /*abort_unless(\Gate::allows('city_access'), 401);

        if (!$request->value) {
            $html = '<option value="">'.trans('global.please Select').'</option>';
        } else {
            $html = '';
            $cities = stock_fabric::query()->where('Type', $request->country_id)->get();
            foreach ($cities as $city) {
                $html .= '<option value="'.$city->Fabric.'">'.$city->Fabric.'</option>';
            }
        }

        return response()->json(['html' => $html]);
        */

        $input = $request->all();

        $category = Stock_fabric::all();
        $htmlfabric = '';
        $htmlcolor = '';
        $htmlbrand = '<option value="Null">Select</option>';
        $htmlmanufacturer = '';
        $fabrics = Stock_fabric::query()->where('Type', $input['value'])->get();
        $colors = stock_color::query()->where('Type', $input['value'])->get();
        $brands = Stock_brand::query()->where('Type', $input['value'])->get();
        $manufacturers = Stock_manufacturer::query()->where('Type', $input['value'])->get();
//return view('profile_update',compact('profile_data','country_data'));
        foreach ($fabrics as $fabric) {

            $htmlfabric .= '<option value="' . $fabric->Fabric . '">' . $fabric->Fabric . '</option>';
        }
        foreach ($colors as $color) {
            $htmlcolor .= '<option value="' . $color->Color . '">' . $color->Color . '</option>';
        }
        foreach ($brands as $brand) {
            $htmlbrand .= '<option value="' . $brand->Brand . '">' . $brand->Brand . '</option>';
        }

        foreach ($manufacturers as $manufacturer) {
            $htmlmanufacturer .= '<option value="' . $manufacturer->Manufacturer . '">' . $manufacturer->Manufacturer . '</option>';
        }
        //
        return response()->json(['htmlfabric' => $htmlfabric, 'htmlcolor' => $htmlcolor, 'htmlmanufacturer' => $htmlmanufacturer, 'htmlbrand' => $htmlbrand]);


    }

    public function Fabric2(Request $request)
    {
//return response()->json('y');

        $input = $request->all();

        $htmlappend = '<option value="">Please Select</option>';
        // return response()->json(htmlfabric);
        //$Type = DB::table('stock_items')->where('Type', '=', $value)->get();
//$Type = DB::table('Stocks')->join('stock_items', 'stock_items.SIID', '=', 'Stocks.Item')->where('stock_items.Type', $input['value'])->paginate(10);
        $items = DB::table('stocks')->join('stock_items', 'Item', '=', 'SIID')->where('stock_items.Type', '=', $input['value'])->orderBy('stock_items.Brand')->get();
//return view('profile_update',compact('profile_data','country_data'));

        foreach ($items as $cat) {

            $htmlappend .= '<option value="' . $cat->SID .'">'.$cat->Brand.' ' . $cat->Item_Code . " | " . $cat->Asset_No . '</option>';
        }


        //

        return response()->json(['htmlappend' => $htmlappend]);


    }

    public function Fabric3(Request $request)
    {


        $input = $request->all();

        $category = Stock_item::query()->where('SIID', $input['value'])->get();
        $co = $category[0]->Countable;
        //dd($category);
        $htmlfabric = '';

        //return response()->json($co);


        //
        return response()->json(['htmlfabric' => $co]);


    }

    public function Fabric4(Request $request)
    {


        $input = $request->all();


        //$htmlappend = '';
        // return response()->json(htmlfabric);
        //$Type = DB::table('stock_items')->where('Type', '=', $value)->get();
//$Type = DB::table('Stocks')->join('stock_items', 'stock_items.SIID', '=', 'Stocks.Item')->where('stock_items.Type', $input['value'])->paginate(10);
//$items=DB::table('Stocks')->join('stock_items', 'stock_items.SIID', '=', 'Stocks.Item')->where(['stock_items.Type'=>$input['value'],])->paginate(10);
//return view('profile_update',compact('profile_data','country_data'));
        #select item to check asset no if no
        if (isset(stock::query()->find($input['value'])->Asset_No)) {
            return 1;
        }
        $item = DB::table('stocks')
            ->select('stocks.Item', \DB::raw('SUM(Quantity ) as t'), 'k.Qty', \DB::raw('SUM(Quantity - k.Qty) as ssum'))
            ->leftjoin(DB::raw('(SELECT SUM(Qty) as Qty,ItemCode  FROM reqested_item_lists  GROUP BY ItemCode) k'),
                function ($join) {
                    $join->on('stocks.Item', '=', 'k.ItemCode');
                })
            ->where('stocks.Item', stock::query()->find($input['value'])->Item)
            ->groupby('stocks.Item')
            ->get();


        if (!empty($item[0])) {

            $Qty1 = $item[0]->t - $item[0]->Qty;
            $a = (string)$Qty1;
        } else {
            $a = (string)1;
        }
        if ($Qty1 < 0) {
            $a = 0;
        }
        // dd($a);

        //
        return $a;


    }

    public function additemstore(Request $request)
    {

        $input = $request->all();
        $id = $input['value1'];
        // return $id;
        // $link = DB::connection()->getPdo();

        $loc = Auth::user()->Location;
        $dep = Auth::user()->Department;
        $rule = ApproverSetting::query()->join('stock_categorys','stock_category_id','=','stock_categorys.STID')->where('stock_categorys.Type','=',$input['category'])->first();
        if (isset($rule) && $input['value3'] < $rule->amount) {
            item_request::query()->where('Event_id', '=', $input['value1'])->first()->update([
                'ApprovalTwo' => 'Not Required',
            ]);
        } elseif (isset($rule) && $input['value3'] >= $rule->amount) {
            item_request::query()->where('Event_id', '=', $input['value1'])->first()->update([
                'ApprovalTwo' => 'Pending',
            ]);
        }

        $item_code = stock::query()->find($input['value2'])->Item;

//        DB::insert('insert into reqested_item_lists (Request_Id,Event_ID,ItemCode,Stock_ID,Quantity,Qty,CUID,UUID,created_at,updated_at) values(?,?,?,?,?,?,?,?,now(),now())', [$input['value'], $input['value1'], $item_code, $input['value2'], $input['value3'], $input['value3'], $input['value4'], $input['value5']]);

        $latest_quantity = requested_item_list::query()->where('Event_ID', $input['value1'])->where('Stock_ID', $input['value2'])->first() !== null
                ? requested_item_list::query()->where('Event_ID', $input['value1'])->where('Stock_ID', $input['value2'])->first()->Quantity + $input['value3']
                : $input['value3'];

        requested_item_list::query()->updateOrCreate(
            [
                'Event_ID' => $input['value1'],
                'Stock_ID' => $input['value2'],
            ],
            [
                'Request_Id' => $input['value'],
                'ItemCode' => $item_code,
                'Quantity' => $latest_quantity,
                'Qty' => $latest_quantity,
                'CUID' => $input['value4'],
                'UUID' => $input['value5'],
            ]
        );

        //dd($item);

        // dd($itemrequest[0]);
        // return view('Item.category')->with('items',$Stock);
        return "K";


    }
}

