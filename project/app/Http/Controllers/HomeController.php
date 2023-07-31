<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $categoryAll=Category::all();
        $products=Product::all();

        return view('user.index',compact('products','categoryAll'));
    }
}
