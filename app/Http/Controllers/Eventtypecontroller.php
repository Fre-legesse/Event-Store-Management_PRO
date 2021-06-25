<?php

namespace App\Http\Controllers;


use App\Models\Event_Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Eventtypecontroller extends Controller
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
        $data = DB::table('event_types')
            ->orderByDesc('Type_Name')
            ->paginate(10);
        //   $Stock = Stock_category::all();
        // return view('Item.category')->with('items',$Stock);
        return view('Event.eventtype', ['event' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Event_Type::all();


        return view('Event.eventtypeadd')->with('event', $category);
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
            'Type_Name' => 'required|unique:event_types,Type_Name',
        ]);

        $loc = Auth::user()->Location;
        $dep = Auth::user()->Department;
        $loc = Auth::user()->Location;
        $dep = Auth::user()->Department;
        $request->merge([
            'Company' => $loc,
            'Department' => $dep,
        ]);
        Event_Type::create($request->all());
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

        $Item = Event_Type::find($id);
        return view('Event.eventtypeedit')->with('event', $Item);
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
            'Type_Name' => 'required',

        ]);

        $update = Event_Type::find($id);
        //dd($request->all());
        $update->update(['Type_Name' => $request->Type_Name]);

        $update->update(['UUID' => $request->UUID]);

        return redirect('/Eventtype')->with('message', 'Update Successfully');
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
        $category = Event_Type::find($id);
        $category->delete();
        return redirect('/Eventtype')->with('message', 'Removed');
    }
}
