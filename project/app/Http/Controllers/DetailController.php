<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    //


    public function detail($id)
    {
        $product = Product::findOrFail($id);


        if (!$product) {
            return redirect('admin')->with('error', 'Product not found.');
        }

        return view('user.detail', compact('product'));
    }
}
