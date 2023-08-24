<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    //


    public function detail($id)
    {
        $product = Product::findOrFail($id);
        $exist_rate = Rate::where('user_id', Auth::id())->where('product_id', $id)->first();


        if (!$product) {
            return redirect('admin')->with('error', 'Product not found.');
        }
        return view('user.detail', compact('product', 'exist_rate'));
    }
}
