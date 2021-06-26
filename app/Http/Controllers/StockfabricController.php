<?php

namespace App\Http\Controllers;

use App\Models\Stock_category;
use App\Models\stock_fabric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class StockfabricController extends Controller
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
        $data = DB::table('Stock_fabrics')->paginate(10);
        //   $Stock = Stock_category::all();
        // return view('Item.category')->with('items',$Stock);
        return view('Item.categoryfabric', ['items' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Stock_category::all();
        $Fabric = stock_fabric::all();

        return view('Item.categoryfabricadd')->with('category', $category);
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
        //
        $request->validate([
            'Fabric' => 'required',
            'Type' => [
                'required',
                Rule::unique('stock_fabrics')->where(function ($query) use ($request) {
                    $query->whereFabric($request->Fabric)
                        ->whereType($request->Type);
                }),
            ],
        ]);
        $loc = Auth::user()->Location;
        $dep = Auth::user()->Department;
        $request->merge([
            'Company' => $loc,
            'Department' => $dep,
        ]);
        Stock_fabric::query()->create($request->all());
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
        $Item = Stock_fabric::query()->find($id);
        return view('Item.categoryfabricedit', compact('Item', 'category'));
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
            'Fabric' => 'required',
            'Type' => 'required',

        ]);

        $update = Stock_fabric::query()->find($id);
        //dd($request->all());
        $update->update(['Fabric' => $request->Fabric]);
        $update->update(['Type' => $request->Type]);

        $update->update(['UUID' => $request->UUID]);

        return redirect('/Fabric')->with('message', 'Update Successfully');
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
        $category = Stock_fabric::query()->find($id);
        $category->delete();
        return redirect('/Fabric')->with('message', 'Fabric Material Removed');
    }
}
