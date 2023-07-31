<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        if (Auth::check()) {
            $pro_check = Product::where('id', $product_id)->first();
            if ($pro_check) {
                $cartItem = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                if ($cartItem) {
                    $cartItem->quantity += $quantity;
                    $cartItem->save();
                } else {
                    $cartItem = new Cart();
                    $cartItem->product_id = $product_id;
                    $cartItem->quantity = $quantity;
                    $cartItem->user_id = Auth::id();

                    $cartItem->save();
                    dd($cartItem);

                    return response()->json(['status' => "Product added to cart successfully."]);
                }
            }
        } else {
            return response()->json(['status' => "Login to continue."]);
        }
    }
    public function shopCart()
    {
        $categoryAll = Category::all();
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $countCart = $cartItems->count();
        $cart = Cart::where('user_id', Auth::id())->get();

        return view('user.cart', compact('categoryAll', 'cart', 'countCart'));
    }
}
