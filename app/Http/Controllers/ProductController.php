<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Wishlist;


class ProductController extends Controller
{

    //user wishlist
    public function addToWishlist(Request $request)
    {
        // Ensure the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to add products to your wishlist.');
        }

        // Validate the request
        $request->validate([
            'pid' => 'required|exists:products,id',
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);

        // Retrieve authenticated user
        $user = Auth::user();

        // Extract data from the request
        $productId = $request->input('pid');
        $name = $request->input('name');
        $price = $request->input('price');
        $image = $request->input('image');
        $quantity = $request->input('quantity');

        // Create a new Wishlist record
        Wishlist::create([
            'user_id' => $user->id,
            'pid' => $productId,
            'name' => $name,
            'price' => $price,
            'image' => $image,
            'quantity' => $quantity,
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Product added to wishlist successfully!');
    }

    //user add to cart
    public function addToCart(Request $request)
    {
        $user = Auth::user();
    
        // Validate the request
        $request->validate([
            'pid' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'image' => 'required|string',
        ]);
    
        $productId = $request->input('pid');
        $quantity = $request->input('quantity');
        $image = $request->input('image');
    
        // Check if the product already exists in the cart
        $cartItem = Cart::where('user_id', $user->id)
            ->where('pid', $productId)
            ->first();
    
        if ($cartItem) {
            // Check if the quantity requested is more than the available stock
            $product = Product::find($productId);
            if ($product->quantity < ($cartItem->quantity + $quantity)) {
                return redirect()->back()->with('error', 'Insufficient stock for ' . $product->name);
            }
    
            // Update the quantity if the product already exists in the cart
            $cartItem->quantity += $quantity;
            $cartItem->save();
    
            return redirect()->back()->with('success', 'Product quantity updated in cart successfully!');
        } else {
            // Check if the quantity requested is more than the available stock
            $product = Product::find($productId);
            if ($product->quantity < $quantity) {
                return redirect()->back()->with('error', 'Insufficient stock for ' . $product->name);
            }
    
            // Add a new item to the cart
            Cart::create([
                'user_id' => $user->id,
                'pid' => $productId,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'image' => $image,
            ]);
    
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
    }
    
    

    // dashboard products
    public function product()
    {
        $admin = Auth::user();
        $products = Product::all();
        return view('dashboard.products', compact('products', 'admin'));
    }
    
    //dashboard product list and add product form
    public function create(){
        $admin = Auth::user();
        return view('dashboard.add_product', compact('admin'));
    }
    
    // dashboard saving the product
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|string|max:100',
            'category' => 'required|string|max:100',
            'price' => 'required|numeric|min:0|max:9999999999',
            'quantity' => 'required|numeric|min:1|max:9999',
            'details' => 'required|string',
            'image_01' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_02' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_03' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
    
        // Create a new product instance and assign values from the request
        $product = new Product();
        $product->name = $request->name;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->quantity = $request->quantity; // Add quantity field
        $product->details = $request->details;
    
        // Handle file uploads for images
        if ($request->hasFile('image_01')) {
            $file = $request->file('image_01');
            $fileName = "img_01_" . time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('assets/uploaded'), $fileName);
            $product->image_01 = $fileName;
        }
        if ($request->hasFile('image_02')) {
            $file = $request->file('image_02');
            $fileName = "img_02_" . time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('assets/uploaded'), $fileName);
            $product->image_02 = $fileName;
        }
        if ($request->hasFile('image_03')) {
            $file = $request->file('image_03');
            $fileName = "img_03_" . time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('assets/uploaded'), $fileName);
            $product->image_03 = $fileName;
        }
    
        // Save the product to the database
        $product->save();
    
        // Redirect back with a success message
        return redirect()->back()->with('message', 'New product added!');
    }

    //dashboard: delete product
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
    

    //dashboard: edit product details
    public function edit($id)
    {
        $admin = Auth::user();
        $product = Product::findOrFail($id);
        return view('dashboard.update_product', compact('product', 'admin'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
    
        $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric|min:0|max:9999999999',
            'details' => 'required|string|max:500',
            'image_01' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_02' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_03' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
    
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->details = $request->input('details');
    
        if ($request->hasFile('image_01')) {
            $file = $request->file('image_01');
            $fileName = "img_01_" . time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('assets/uploaded'), $fileName);
            Storage::delete('public/assets/uploaded/' . $product->image_01);
            $product->image_01 = $fileName;
        }
    
        if ($request->hasFile('image_02')) {
            $file = $request->file('image_02');
            $fileName = "img_02_" . time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('assets/uploaded'), $fileName);
            Storage::delete('public/assets/uploaded/' . $product->image_02);
            $product->image_02 = $fileName;
        }
    
        if ($request->hasFile('image_03')) {
            $file = $request->file('image_03');
            $fileName = "img_03_" . time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('assets/uploaded'), $fileName);
            Storage::delete('public/assets/uploaded/' . $product->image_03);
            $product->image_03 = $fileName;
        }
    
        $product->save();
    
        return back()->with('message', 'Product updated successfully!');
    }
    
    //dashboard: show product details
    public function show($id)
{
    $admin = Auth::user();
    $product = Product::findOrFail($id);
    return view('dashboard.view_product', compact('product', 'admin'));
}
  
    //user product details
    public function quickView($id)
    {

        $product = Product::findOrFail($id);

        $user_id = Auth::id();
        $totalWishlistCount = DB::table('wishlists')->where('user_id', $user_id)->count();
        $totalCartCount = DB::table('carts')->where('user_id', $user_id)->count();
    
        $relatedProducts = Product::where('category', $product->category)
                                  ->where('id', '!=', $id)
                                  ->take(4) // limit to 4 related products
                                  ->get();
    
        return view('quick_view', compact('product', 'totalWishlistCount', 'totalCartCount', 'relatedProducts'));
    }

    public function showCategory(Request $request)
    {
        $user_id = Auth::id();
        $totalWishlistCount = DB::table('wishlists')->where('user_id', $user_id)->count();
        $totalCartCount = DB::table('carts')->where('user_id', $user_id)->count();
    
        $categoryName = $request->query('category');
        $products = Product::where('category', 'LIKE', '%'.$categoryName.'%')->get();
        $user = Auth::user();
    
        return view('category', compact('products', 'user', 'totalWishlistCount', 'totalCartCount', 'categoryName'));
    }


}
