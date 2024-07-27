<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all()-> where('buyer_id', auth()->user()->id);
        return view('orders.index', ['orders' => $orders]);
    }



    /**
     * Create a new order.
     *
     * @param  int  $id The ID of the product.
     * @return \Illuminate\View\View The view for creating an order.
     */
    public function create(int $id): \Illuminate\View\View
    {
        $product = Product::FindOrFail($id);

        return view('orders.create')->with('product', $product);
    }

    /**
     * Store a newly created order.
     *
     * @param  \Illuminate\Http\Request  $request The HTTP request.
     * @param  int  $id The ID of the product.
     * @return \Illuminate\Http\RedirectResponse The HTTP redirect response.
     */
    public function store(Request $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $product = Product::FindOrFail($id);
        $request->validate([
            'address' => 'required',
            'quantity' => 'required',
            'product_id' => $product->id,
            'buyer_id' => auth()->user()->id,
            'seller_id' => $product->user_id,
        ]);

        $order = new Order();
        $order->address = $request->address;
        $order->quantity = $request->quantity;
        $order->product_id = $request->product_id;
        $order->buyer_id = auth()->user()->id;
        $order->seller_id = $product->user_id;
        $order->save();

        return redirect()->route('orders.index') ->with('product', $product) ->with('success', 'Order created successfully');
    }

    public function destroy($id){
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully');
    }





}
