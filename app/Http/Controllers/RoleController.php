<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    /**
     * Display the role management page
     *
     * @return Response
     */
    public function index(){
        return response()->view('super_admin.role_management',[
            'users'=>User::with('roles')->get(),
        ]);
    }

    /**
     * Show edit roles form for the specified user
     *
     * @param int $user_id
     * @return Response
     */
    public function edit(int $user_id){
        return \response()->view('super_admin.edit_roles',[
            'user'=>User::query()->find($user_id),
        ]);
    }
}
