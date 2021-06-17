<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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


//    Role::create(['name' => 'User']);
//
//    Permission::create(['name' => 'Normal']);
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

        return view('home2');
    }
   public function test(){
        return view('home2');
    }
}
