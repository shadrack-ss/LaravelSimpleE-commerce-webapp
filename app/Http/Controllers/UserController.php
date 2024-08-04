<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyUsers;
use App\Models\Product;
use App\Models\UserRegister;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;
use App\Models\message;


class UserController extends Controller
{
    public function userStore()
    {
  
            $user_id = Auth::id();
            $totalWishlistCount = DB::table('wishlists')->where('user_id', $user_id)->count();
            $totalCartCount = DB::table('carts')->where('user_id', $user_id)->count();
        
        return view("user_register", compact('totalWishlistCount', 'totalCartCount'));
    }

    public function userStorage(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|string|email|max:50|unique:myusers,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user instance
        $user = new UserRegister();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // Hash the password

        // Save the user to the database
        $user->save();

        

        return redirect()->back()->with('success', 'Registered successfully, please login!');
    }

    
 
    public function showLoginForm()
    {

            $user_id = Auth::id();
            $totalWishlistCount = DB::table('wishlists')->where('user_id', $user_id)->count();
            $totalCartCount = DB::table('carts')->where('user_id', $user_id)->count();
        return view('login', compact('totalWishlistCount', 'totalCartCount'));
    }

    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|string|email|max:50',
            'password' => 'required|string|min:8',
        ]);
    
        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed
            $user = Auth::user();
            session(['user_id' => $user->id]); // Set user_id in session explicitly
            
            // Check usertype and redirect accordingly
            if ($user->usertype === 'admin') {
                return redirect()->route('dashboard.home');

            } else {
                return redirect()->route('home');
            }
        } else {
            // Authentication failed
            return back()->withErrors(['email' => 'Incorrect email or password.']);
        }
    }
    

    public function home()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $totalWishlistCount = DB::table('wishlists')->where('user_id', $user->id)->count();
            $totalCartCount = DB::table('carts')->where('user_id', $user->id)->count();
            $products = Product::all();

            return view('home', compact('products', 'totalWishlistCount', 'totalCartCount'));
        } else {
            return redirect()->route('login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function showUpdateForm()
    {
        $user = Auth::user();
        if (Auth::check()) {
            $user_id = Auth::id();
            $totalWishlistCount = DB::table('wishlists')->where('user_id', $user_id)->count();
            $totalCartCount = DB::table('carts')->where('user_id', $user_id)->count();
        }
        return view('update_profile', compact('user', 'totalWishlistCount', 'totalCartCount'));
    }

    
}

   


