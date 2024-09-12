<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;



class CartController extends Controller
{
    //
    public function add(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $cart = $this->getCart();

        if ($cart->items->isEmpty()) {
            $cart->seller_id = $product->user_id; // Assuming the product has a user_id indicating the seller
            $cart->save();
        } elseif ($cart->seller_id != $product->user_id) {
            return redirect()->back()->with('error', 'You can only add products from the same seller to the cart.');
        }

        $cartItem = $cart->items()->where('product_id', $id)->first();

        if ($cartItem) {
            $cartItem->quantity++;
            $cartItem->save();
        } else {
            $cart->items()->create([
                'product_id' => $id,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function show()
    {
        $cart = $this->getCart();
        return view('cart', compact('cart'));
    }

    public function delete(Request $request, $id)
    {
        $cart = $this->getCart();

        $cartItem = $cart->items()->find($id);

        if ($cartItem) {
            $cartItem->delete();
        }

        if ($cart->items->isEmpty()) {
            $cart->delete();
        }

        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    private function getCart()
    {
        if (Auth::check()) {
            return Cart::firstOrCreate(['user_id' => Auth::id()], ['seller_id' => null]);
        }

        return Cart::firstOrCreate(['user_id' => null]);
    }
}







