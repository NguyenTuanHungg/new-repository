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
                    // Nếu sản phẩm đã có trong giỏ hàng, chỉ cần cập nhật số lượng
                    $cartItem->quantity += $quantity;
                    $cartItem->save();
                } else {
                    // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới sản phẩm vào giỏ hàng
                    $cartItem = new Cart();
                    $cartItem->product_id = $product_id;
                    $cartItem->quantity = $quantity;
                    $cartItem->user_id = Auth::id();
                    $cartItem->save();
                }
                return redirect()->route('cart')->with('message', 'add');
            }
        } else {
            return redirect()->route('login')->with('message', 'login');
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

    public function removeProduct($id)
    {
        if (Auth::check()) {

            $cartItem = Cart::where('id', $id)->where('user_id', Auth::id())->first();
            if ($cartItem) {
                $cartItem->delete();
                return redirect()->route('cart')->with('message', 'remove');
            }
        }
    }
}
