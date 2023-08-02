<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $categoryAll = Category::all();
        $products = Product::all();

        return view('user.index', compact('products', 'categoryAll'));
    }
    public function searchProducts(Request $request)
    {
        $categories = Category::all();

        $search = $request->input('search');
        $products = Product::where('name', 'like', '%' . $search . '%')->paginate(6);

        return view('user.index', compact('categories', 'products'));
    }
}
