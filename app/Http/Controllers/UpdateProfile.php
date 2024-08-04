<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\MyUsers;


class UpdateProfile extends Controller
{
    
    public function updateProfile(Request $request)
    {
        /** @var MyUsers $user */
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:20',
            'email' => 'required|string|email|max:50|unique:myusers,email,'. $user->id,
            'old_password' => 'nullable|string|min:8',
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('old_password')) {
            if (!Hash::check($request->old_password, $user->password)) {
                return redirect()->back()->withErrors(['old_password' => 'The old password does not match our records.']);
            }

            $user->password = Hash::make($request->new_password);
        }

        $user->save(); // This should be recognized as a valid method for Eloquent models

        $totalWishlistCount = DB::table('wishlists')->where('user_id', $user->id)->count();
        $totalCartCount = DB::table('carts')->where('user_id', $user->id)->count();

        return redirect()->back()->with('success', 'Profile updated successfully!')->with(compact('totalWishlistCount', 'totalCartCount'));
    }
}
