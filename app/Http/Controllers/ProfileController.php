<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Region;

use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $regions =  Region::all();
        return view('profile.index' , ['user'=> $user] , ['regions'=>$regions]);
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('profile.show', ['user' => $user]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $regions =  Region::all();
        return view('profile.edit', ['user' => $user] , ['regions'=>$regions]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->region_id = $request->input('region');


        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('profile_images'), $file_name);
            $user->profile_image = $file_name;
        }

        $user->save();
        return redirect(route('profile'))->with('success', 'Profile updated successfully');
    }

}
