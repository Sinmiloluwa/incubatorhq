<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.users.index', compact('users'));
    }

    public function revokeUser(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('info', 'User Revoked');
    }
}
