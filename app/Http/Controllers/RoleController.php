<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display the role management page
     *
     * @return Response
     */
    public function index()
    {
        return response()->view('super_admin.role_management', [
            'users' => User::with('roles')->get(),
        ]);
    }

    /**
     * Show edit roles form for the specified user
     *
     * @param int $user_id
     * @return Response
     */
    public function edit(int $user_id)
    {
        return \response()->view('super_admin.edit_roles', [
            'user' => User::query()->find($user_id),
            'roles' => Role::get('name'),
        ]);
    }

    /**
     * Show edit roles form for the specified user
     *
     * @param int $user_id
     * @param Request $request
     * @return Response
     */
    public function update(Request $request, int $user_id)
    {
        dd($request->all());
        foreach ($request->role_checkbox as $role) {
            User::query()->find($user_id)->assignRole($role->name);
        }
    }
}
