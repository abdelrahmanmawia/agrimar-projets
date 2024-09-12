<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Region;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('welcome', ['products' => $products]);
    }

    public function profile()
    {
        $user = Auth::user();
        $regions =  Region::all();

        return view('profile' ,['user'=> $user] , ['regions'=>$regions]);
    }
}
