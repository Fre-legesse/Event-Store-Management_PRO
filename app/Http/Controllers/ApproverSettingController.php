<?php

namespace App\Http\Controllers;

use App\Models\ApproverSetting;
use App\Models\Stock_category;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApproverSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response()->view('approver_setting.approver_setting', [
            'item_types' => Stock_category::all(),
            'rules' => ApproverSetting::all(),
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
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_type' => 'required',
            'quantity' => 'required',
        ]);

        ApproverSetting::query()->updateOrCreate(
            [
                'stock_category_id' => $request->item_type,
            ],
            [
                'amount' => $request->quantity,
            ]
        );

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $approver_setting_id
     * @return Response
     */
    public function show(int $approver_setting_id)
    {
        return \response()->view('');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $approver_setting_id
     * @param Request $request
     * @return RedirectResponse
     */
    public function edit(Request $request, int $approver_setting_id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $approver_setting_id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(int $approver_setting_id, Request $request)
    {
        $request->validate([
            'update_quantity' => 'required'
        ]);
        ApproverSetting::query()->find($approver_setting_id)->update([
            'amount' => $request->update_quantity,
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ApproverSetting $approverSetting
     * @return Response
     */
    public function destroy(ApproverSetting $approverSetting)
    {
        //
    }
}
