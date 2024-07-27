<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{

    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $users = User::all();
        return view('admin.dashboard') ->with('products', $products) ->with('categories', $categories) ->with('users', $users);
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users') ->with('users', $users);
    }
}
