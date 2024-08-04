<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        if (!$user_id) {
            return redirect()->route('login');
        }

        $totalWishlistCount = DB::table('wishlists')->where('user_id', $user_id)->count();
        $totalCartCount = DB::table('carts')->where('user_id', $user_id)->count();

        $wishlistItems = DB::table('wishlists')->where('user_id', $user_id)->get();
        $grandTotal = $wishlistItems->sum('price');

        return view('wishlist', compact('wishlistItems', 'grandTotal', 'totalWishlistCount', 'totalCartCount'));
    }

    public function delete(Request $request)
    {
        DB::table('wishlists')->where('id', $request->wishlist_id)->delete();
        return redirect()->route('wishlist.index');
    }

    public function deleteAll()
    {
        $user_id = Auth::id();
        DB::table('wishlists')->where('user_id', $user_id)->delete();
        return redirect()->route('wishlist.index');
    }
}
