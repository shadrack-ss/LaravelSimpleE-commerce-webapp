<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;
use App\Models\Message;
use App\Models\User;

class test extends Controller
{
    public function index()
    {
   

        $total_pendings = Order::where('payment_status', 'pending')->sum('total_price');
        $total_completes = Order::where('payment_status', 'completed')->sum('total_price');
        $number_of_orders = Order::count();
        $number_of_products = Product::count();
        $number_of_users = User::count();
        $number_of_admins = Admin::count();
        $number_of_messages = Message::count();

        return view('layoutB', compact('total_pendings', 'total_completes', 'number_of_orders', 'number_of_products', 'number_of_users', 'number_of_admins', 'number_of_messages'));
    }
}
