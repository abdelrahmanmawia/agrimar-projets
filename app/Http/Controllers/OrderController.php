<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{





    public function create(Request $request, $productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $quantity = $request->input('quantity', 1);
        $totalPrice = $quantity * $product->price;

        $order = Order::create([
            'buyer_id' => Auth::id(),
            'seller_id' => $product->user_id, // Assuming the product has a user_id indicating the seller
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        $order->items()->create([
            'product_id' => $productId,
            'quantity' => $quantity,
            'price' => $product->price,
        ]);

        return redirect()->route('orders.show', $order->id)->with('success', 'Order placed successfully.');
    }

    public function show($id)
    {
        $order = Order::with('items.product')->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    public function userOrders()
    {
        $orders = Order::where('buyer_id', Auth::id())->with('items.product')->get();
        return view('orders.index', compact('orders'));
    }

    public function sellerOrders()
    {
        $orders = Order::where('seller_id', Auth::id())->with('items.product')->get();
        return view('Orders.OrdersToDilliver', compact('orders'));
    }

    public function adminOrders()
    {
        $orders = Order::with('items.product', 'buyer')->get();
        return view('admin.orders.index', compact('orders'));
    }





}
