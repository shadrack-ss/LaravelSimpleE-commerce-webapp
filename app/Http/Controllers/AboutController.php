<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function about()
    {
        

            $user_id = Auth::id();
            $totalWishlistCount = DB::table('wishlists')->where('user_id', $user_id)->count();
            $totalCartCount = DB::table('carts')->where('user_id', $user_id)->count();

        return view("about", compact('totalWishlistCount', 'totalCartCount'));
    }
}
