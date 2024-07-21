<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    //

    public function index()
    {
        $products = Product::all();

        return view('products.index', ['products' => $products]);
    }

    public function show()
    {
        return view('products.show');
    }


    public function store(Request $request)
    {

        $data=$request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'quantity' => 'required',

        ]);


        if($request->hasFile('image')) {
            $file = $request->file('image');
            if($file->isValid()) {
                $imagePath = $request->file('image')->store('uploads', 'public');
                $data['image'] = $imagePath;



            $newProduct = new Product();
            $newProduct->name = $data['name'];
            $newProduct->description = $data['description'];
            $newProduct->address = $data['address'];
            $newProduct->price = $data['price'];
            $newProduct->category_id = $data['category_id'];
            $newProduct->image = $data['image'];
            $newProduct->quantity = $data['quantity'];
            $newProduct->user_id = auth()->user()->id;
            $newProduct->save();


         return redirect()->route('products.index')->with('success', 'Product created successfully.');


        }else{
            return redirect()->back()->with('error', 'file is not present.');

        }

        }else{
            return redirect()->back()->with('error', 'no image found.');
        }
    }


    public function create() {
        $categories = \App\Models\Category::all();


        return view('products.create', ['categories' => $categories]);
    }

    public function edit() {

        return view('products.edit');
    }



}
