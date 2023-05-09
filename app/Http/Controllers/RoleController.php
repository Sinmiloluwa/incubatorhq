<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        // if($user->hasRole('super_admin')) {
            $roles = Role::all();
            $users = User::all();
            return view('pages.roles.index', compact('roles','users'));
        // }
    }

    public function detachUser(Request $request, $user)
    {
        $userRole = DB::table('users_roles')->where('user_id',$user)->where('role_id',$request->roleId)->delete();
        // $userRole->delete();

        return Redirect::route('roles.index')->with('success', 'User detached from role');

    }

    public function attachUser(Request $request, $user)
    {
        dd($request);
        // $role = Role::where('id',)
        dd($user);
    }
}
