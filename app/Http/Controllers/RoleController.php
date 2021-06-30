<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
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
     * @return RedirectResponse
     */
    public function update(Request $request, int $user_id)
    {
        $sync_roles = [];
        foreach ($request->role_checkbox as $role_name => $status) {
            array_push($sync_roles,$role_name);
        }
        User::query()->find($user_id)->syncRoles($sync_roles);
        return redirect('/super_admin/role');
    }
}
