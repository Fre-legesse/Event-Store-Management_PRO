<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock_stock_room;
use App\Models\Stock;
use App\Models\Stock_item;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Withdrawl extends Controller
{
     public function index()
    {
        $loc=Auth::user()->Location;
        $dep=Auth::user()->Department;
        
        $data=DB::table('Stock_stock_rooms')->where('Company',$loc)->where('Department',$dep)->paginate(10);

        //   $Stock = Stock_category::all();
        //  return view('Item.category')->with('items',$data);

        return view('stock.stock',['Stockroom'=>$data]);
    }
     public function withdrawaladd()
    {
        //
    }
}
