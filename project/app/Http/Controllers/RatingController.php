<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    //
    public function rating(Request $request)
    {
        $stars_rated = $request->input('rating');
        $product_id = $request->input('product_id');

        $product_check = Product::where('id', $product_id)->get();
        if ($product_check) {
            $exist_rate = Rate::where('user_id', Auth::id())->where('product_id', $product_id)->first();
            if ($exist_rate) {
                $exist_rate->stars_rated = $stars_rated;
                $exist_rate->update();
            } else {

                Rate::create([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'stars_rated' => $stars_rated,
                ]);
            }
            return redirect()->back()->with('success', 'Successfully created');
        } else {
            return redirect()->back()->with('failure', 'Failed to create product');
        }
    }
}
