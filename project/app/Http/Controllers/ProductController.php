<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    //
    public function index(Request $request)
    {
        $products = Product::paginate(6);
        $currentPage = $request->input('page', 1);
        if (!is_numeric($currentPage) || $currentPage < 1 || $currentPage > $products->lastPage()) {
            return redirect()->back();
        }
        return view('admin.dashboard', compact('products'));
    }
    public function add()
    {
        $categories = Category::all();
        return view('admin.addproduct', compact('categories'));
    }

    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric|min:0',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $products = new Product();

        if ($request->has('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/product', $filename);

            $products->image = $filename;
        }

        $products->category_id = $request->input('category_id');
        $products->name = $request->input('name');
        $products->description = $request->input('description');
        $products->price = $request->input('price');

        $products->save();
        return redirect()->route('admin')->with('message', 'add successfully');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if (!$product) {
            return redirect('admin')->with('error', 'Product not found.');
        }

        $product->delete();
        return redirect()->route('admin')->with('success', 'Product deleted successfully.');
    }
    public function edits($id)
    {
        $products = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.edit', compact('products', 'categories'));
    }
    public function update($id, Request $request)
    {
        $products = Product::findOrFail($id);

        if ($request->has('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/product', $filename);

            $products->image = $filename;
        }

        $products->category_id = $request->input('category_id');
        $products->name = $request->input('name');
        $products->description = $request->input('description');
        $products->price = $request->input('price');

        $products->update();
        return redirect()->route('admin')->with('message', 'update successfully');
    }
}
