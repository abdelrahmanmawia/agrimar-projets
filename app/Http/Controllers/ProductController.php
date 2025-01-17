<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Region;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //

    public function index()
    {

        if(auth()->user()->role == 'admin') {
            $products = Product::all();

            return view('admin.products.index', ['products' => $products]);
        } else {
            $products = Product::all() ->where('user_id', auth()->user()->id);
        }


        return view('products.index', ['products' => $products]);
    }


    public function show($id)
    {
        $product = Product::findOrFail($id);
        $seller = $product->seller;

        return view('products.show', ['product' => $product], ['seller' => $seller]);
    }




    public function store(Request $request)
    {

        $data=$request->validate([
            'name' => 'required',
            'description' => 'required',
            'region_id' => 'required',
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
            $newProduct->region_id = $data['region_id'];
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
        $categories = Category::all();
        $regions = Region::all();

        if(auth()->user()->role == 'admin') {
            return view('admin.products.create', ['categories' => $categories], ['regions' => $regions]);
        }


        return view('products.create', ['categories' => $categories], ['regions' => $regions]);
    }

    public function edit($id) {
        $regions = Region::all();
        // $products = Product::all();
        $product = Product::findorFail($id);
        $categories = Category::all();



        return view('products.edit', compact('product')) ->with('categories', $categories) ->with('regions', $regions);
    }

    public function update(Request $request, $id) {
        $product = Product::findorFail($id);
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'region_id' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'quantity' => 'required',
        ]);

        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->region_id = $data['region_id'];
        $product->price = $data['price'];
        $product->category_id = $data['category_id'];
        if($request->hasFile('image')) {
            $file = $request->file('image');
            if($file->isValid()) {
                $imagePath = $request->file('image')->store('uploads', 'public');
                $product->image = $imagePath;
            }
        }
        $product->quantity = $data['quantity'];
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }


    public function destroy($id){
        $product = Product::findorFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function products() {

        $products = Product::all();
        $categories = Category::all();
        $regions = Region::all();
        return view('products.products', compact('products'), compact('categories')) ->with('regions', $regions);
    }



    public function search(Request $request)
    {
        $query = $request->input('query');
        $categoryId = $request->input('category');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $regionId = $request->input('region');

        $categories = Category::all();
        $regions = Region::all();

        $products = Product::query();

        if ($query) {
            $products->where('name', 'like', '%' . $query . '%')
                     ->orWhere('description', 'like', '%' . $query . '%');
        }

        if ($categoryId) {
            $products->where('category_id', $categoryId);
        }

        if ($minPrice) {
            $products->where('price', '>=', $minPrice);
        }

        if ($maxPrice) {
            $products->where('price', '<=', $maxPrice);
        }

        if ($regionId) {
            $products->where('region_id', $regionId);
        }

        $products = $products->get();

        return view('products.search_results', compact('products'), compact('categories')) ->with('regions', $regions);
    }










};
