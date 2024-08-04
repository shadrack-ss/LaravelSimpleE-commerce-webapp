<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use App\Models\Message;
use App\Models\MyUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function index()
    {
        $products = Product::limit(6)->get();
        $totalWishlistCount = 0;
        $totalCartCount = 0;

        if (Auth::check()) {
            $user_id = Auth::id();
            $totalWishlistCount = DB::table('wishlists')->where('user_id', $user_id)->count();
            $totalCartCount = DB::table('carts')->where('user_id', $user_id)->count();
        }

        return view('home', compact('products', 'totalWishlistCount', 'totalCartCount'));
    }
    
    public function dashboard() {
        if (Auth::check()) {
            
            $admin = Auth::user();

            $currentDate = Carbon::now()->toDateString();
    
            // Query for today's data
            $total_pendings = Order::whereDate('created_at', $currentDate)
                                    ->where('payment_status', 'pending')
                                    ->sum('total_price');
            
            $total_completes = Order::whereDate('created_at', $currentDate)
                                    ->where('payment_status', 'completed')
                                    ->sum('total_price');
            
            $number_of_orders = Order::whereDate('created_at', $currentDate)->count();
            
            $number_of_products = Product::count();
            
            $number_of_users = MyUsers::where('usertype', 'normal')->count(); 
            $number_of_admins = MyUsers::where('usertype', 'admin')->count(); 
            
            $number_of_messages = Message::whereDate('created_at', $currentDate)->count();
        
            return view('dashboard.home', compact('total_pendings', 'total_completes', 'number_of_orders', 'admin', 'number_of_products', 'number_of_users', 'number_of_admins', 'number_of_messages'));
        }
        else{
        return redirect()->route('login')->with('error', 'You must be logged in to add products to your wishlist.');
        }
    }


    public function layout(){
        if (Auth::check()) {
            
            $admin = Auth::user();

            $currentDate = Carbon::now()->toDateString();
    
            // Query for today's data
            $total_pendings = Order::whereDate('created_at', $currentDate)
                                    ->where('payment_status', 'pending')
                                    ->sum('total_price');
            
            $total_completes = Order::whereDate('created_at', $currentDate)
                                    ->where('payment_status', 'completed')
                                    ->sum('total_price');
            
            $number_of_orders = Order::whereDate('created_at', $currentDate)->count();
            
            $number_of_products = Product::count();
            
            $number_of_users = MyUsers::where('usertype', 'normal')->count(); 
            $number_of_admins = MyUsers::where('usertype', 'admin')->count(); 
            
            $number_of_messages = Message::whereDate('created_at', $currentDate)->count();
        
            return view('dashboard.home', compact('total_pendings', 'admin', 'total_completes', 'number_of_orders', 'number_of_products', 'number_of_users', 'number_of_admins', 'number_of_messages'));
        }
        else{
        return redirect()->route('login')->with('error', 'You must be logged in to add products to your wishlist.');
        }
    }


    public function editprofile(){
        return view("edit_profile");
    }

    public function addcustomer(Request $request){
        return view("add_customer");
    }




}
