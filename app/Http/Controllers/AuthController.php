<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Region;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect(route('home'))->with('success', 'Login successful');
        } else {
            return redirect(route('login'))->with('error', 'login failed');
        }

    }

    public function register()
    {
        $regions = Region::all();
        return view('auth.register', ['regions' => $regions]);
    }

    public function registerPost(Request $request)
    {
        try {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'phone' => 'required',
            'region_id' => 'required',
        ]);

        $user = new User();
        $user->name = $request->input('fullname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->phone_number = $request->input('phone');
        $user->region_id = $request->input('region');
        if ($user->save()) {
            return redirect(route('login'))->with('success', 'User created successfully');
        }
        return redirect(route('register'))->with('error', 'Something went wrong');

        } catch (\Throwable $th) {
            return redirect(route('register'))->with('error', $th->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }



}
