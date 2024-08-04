<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::limit(6)->get();
        
    
            $user_id = Auth::id();
            $totalWishlistCount = DB::table('wishlists')->where('user_id', $user_id)->count();
            $totalCartCount = DB::table('carts')->where('user_id', $user_id)->count();
     
        return view('shop', compact('products', 'totalWishlistCount', 'totalCartCount'));
    }
}
