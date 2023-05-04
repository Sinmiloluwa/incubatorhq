<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function index()
    {
        return view('pages.auth.register');
    }

    public function signin()
    {
        return view('pages.auth.login');
    }

    public function signup(Request $request)
    {
        $emails = [
            'babatopeajayi2@gmail.com',
            'tobyajayi99@gmail.com',
            'emmasimons141@gmail.com',
            'blvcksimons@gmail.com'
        ];

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,email',
            'password' => 'required|string',
            'username' => 'required|string',
            'confirmPassword' => 'required|string'
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        if ($request->password != $request->confirmPassword) {
            return Redirect::back()->withErrors(['confirm_passwords' => 'Passwords do not match']);
        }

        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'username' => $request->username,
            'name' => $request->username
        ]);

        if (in_array($request->email, $emails)) {
            UserRole::create([
                'user_id' => $user->id,
                'role_id' => Role::SUPER_ADMIN
            ]);
        }

        session(['user' => $user['name']]);

        return redirect()->to('signin')->with(['user' => $user]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'exists:users,email|required',
            'password' => 'required|string',
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }


        if (auth()->attempt(request()->only(['email', 'password']))) {
            return redirect()->route('home');
        }

        return Redirect::back()->withErrors(['user' => 'Invalid Credentials']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('signin');
    }
}
