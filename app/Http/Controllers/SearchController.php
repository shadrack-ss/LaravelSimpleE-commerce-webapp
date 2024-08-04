<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index()
    {
        
        
            $user_id = Auth::id();
            $totalWishlistCount = DB::table('wishlists')->where('user_id', $user_id)->count();
            $totalCartCount = DB::table('carts')->where('user_id', $user_id)->count();

        return view('search_page', compact('totalWishlistCount', 'totalCartCount'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'search_box' => 'required|max:100',
        ]);

        $search_box = $request->input('search_box');
        $products = Product::where('name', 'like', "%{$search_box}%")->get();

        $user_id = Auth::id();
        $totalWishlistCount = DB::table('wishlists')->where('user_id', $user_id)->count();
        $totalCartCount = DB::table('carts')->where('user_id', $user_id)->count();

        return view('search_results', compact('products', 'totalWishlistCount', 'totalCartCount'));
    }
}
