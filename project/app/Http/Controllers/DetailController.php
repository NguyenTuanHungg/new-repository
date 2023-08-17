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

        return view('user.detail', compact('product'));
    }
}
