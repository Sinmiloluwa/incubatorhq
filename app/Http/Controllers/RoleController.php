<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        dd($user->hasRole('admin','editor'));
    }
}
