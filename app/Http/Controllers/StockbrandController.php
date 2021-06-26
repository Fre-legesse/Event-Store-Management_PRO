<?php

namespace App\Http\Controllers;

use App\Models\stock_brand;
use App\Models\Stock_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class StockbrandController extends Controller
{
    /* Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = DB::table('Stock_brands')->paginate(10);
        //   $Stock = Stock_category::all();
        // return view('Item.category')->with('items',$Stock);
        return view('Item.categorybrand', ['items' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Stock_category::all();
        $Fabric = stock_brand::all();

        return view('Item.categorybrandadd')->with('category', $category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Type' => 'required',
            'Brand' => [
                'required',
                Rule::unique('stock_brands')->where(function ($query) use ($request) {
                    return $query
                        ->whereType($request->Type)
                        ->whereBrand($request->Brand);
                }),
            ],
        ]);

        $loc = Auth::user()->Location;
        $dep = Auth::user()->Department;
        $request->merge([
            'Company' => $loc,
            'Department' => $dep,
        ]);
        Stock_brand::query()->create(
            [
                'Type' => $request->Type,
                'Brand' => $request->Brand,
                'Company' => Auth::user()->Location,
                'Department' => Auth::user()->Department,
                'CUID' => Auth::id(),
                'UUID' => Auth::id(),
            ]
        );
        //dd($request->all());
        return redirect()->back()->with('message', 'Created Successfully');

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
        $category = Stock_category::all();
//return view('profile_update',compact('profile_data','country_data'));
        $Item = Stock_brand::query()->find($id);
        return view('Item.categorybrandedit', compact('Item', 'category'));
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
        $request->validate([
            'Brand' => 'required',
            'Type' => 'required',

        ]);

        $update = Stock_brand::query()->find($id);
        //dd($request->all());
        $update->update(['Brand' => $request->Brand]);
        $update->update(['Type' => $request->Type]);

        $update->update(['UUID' => $request->UUID]);

        return redirect('/Brand')->with('message', 'Update Successfully');
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
        $category = Stock_brand::query()->find($id);
        $category->delete();
        return redirect('/Brand')->with('message', 'Fabric Material Removed');
    }
}
