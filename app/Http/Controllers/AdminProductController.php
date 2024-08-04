<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Wishlist;

class ProductController extends Controller
{
    public function product()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric|min:0|max:9999999999',
            'details' => 'required|string|max:500',
            'image_01' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_02' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_03' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->details = $request->details;

        if ($request->hasFile('image_01')) {
            $product->image_01 = $request->file('image_01')->store('uploaded_img', 'public');
        }
        if ($request->hasFile('image_02')) {
            $product->image_02 = $request->file('image_02')->store('uploaded_img', 'public');
        }
        if ($request->hasFile('image_03')) {
            $product->image_03 = $request->file('image_03')->store('uploaded_img', 'public');
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('message', 'New product added!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            Storage::disk('public')->delete($product->image_01);
            Storage::disk('public')->delete($product->image_02);
            Storage::disk('public')->delete($product->image_03);
            $product->delete();

            Cart::where('pid', $id)->delete();
            Wishlist::where('pid', $id)->delete();

            return redirect()->route('admin.products.index')->with('message', 'Product deleted!');
        } else {
            return redirect()->route('admin.products.index')->with('message', 'Product not found!');
        }
    }
}
