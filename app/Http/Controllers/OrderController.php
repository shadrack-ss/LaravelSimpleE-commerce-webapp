<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Order;

class OrderController extends Controller
{
    //dashboard all_orders
    public function indexdashboard()
    {
        $admin = Auth::user();
        // Get the current date
        $currentDate = Carbon::today();
    
        // Fetch orders placed on the current date
        $orders = DB::table('orders')
            ->whereDate('created_at', $currentDate)
            ->get();
    
        // Get the success message from the session, or default to an empty string if not set
        $message = session('success', '');
    
        return view('dashboard.placed_orders', compact('orders', 'message', 'admin'));
    }

    // dashboard: oreders with pending payment
    public function PendingPayment()
    {

        // Get the current date
        $currentDate = Carbon::today();
        $admin = Auth::user();

        // Fetch orders placed on the current date with pending payment status
        $orders = DB::table('orders')
            ->whereDate('created_at', $currentDate)
            ->where('payment_status', 'pending')
            ->get();

        // Get the success message from the session, or default to an empty string if not set
        $message = session('success', '');

        return view('dashboard.pending', compact('orders', 'message',  'admin'));
    }

    // dashboard: oreders with Complete payment
    public function CompletedPayment()
    {
        // Get the current date
        $currentDate = Carbon::today();
        $admin = Auth::user();

        // Fetch orders placed on the current date with pending payment status
        $orders = DB::table('orders')
            ->whereDate('created_at', $currentDate)
            ->where('payment_status', 'completed')
            ->get();

        // Get the success message from the session, or default to an empty string if not set
        $message = session('success', '');

        return view('dashboard.completed', compact('orders', 'message', 'admin'));
    }

    // user orders
    public function index()
    {
        if (!Auth::check()) {
            return view('orders', ['orders' => [], 'message' => 'Please login to see your orders']);
            
        }
        
        $user_id = Auth::id(); // Get the authenticated user's ID
        $orders = DB::table('orders')->where('user_id', $user_id)->get();
        
   
            $totalWishlistCount = DB::table('wishlists')->where('user_id', $user_id)->count();
            $totalCartCount = DB::table('carts')->where('user_id', $user_id)->count();
        

        return view('orders', compact('orders', 'totalWishlistCount', 'totalCartCount'));
    }

    

    public function update(Request $request)
    {
        $request->validate([
            'order_id' => 'required|integer',
            'payment_status' => 'required|string|max:255'
        ]);

        DB::table('orders')->where('id', $request->order_id)->update([
            'payment_status' => $request->payment_status
        ]);

        return redirect()->route('dashboard.placed_orders')->with('success', 'Payment status updated!');
    }

    public function destroy($id)
    {
        DB::table('orders')->where('id', $id)->delete();
        return redirect()->route('placed_orders')->with('success', 'Order deleted successfully!');
    }

    //dashboard: update-paymentstatus
    public function updatePaymentStatus(Request $request)
    {
        // Validate the request data
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'payment_status' => 'required|in:pending,completed'
        ]);

        // Find the order by ID
        $order = Order::find($request->order_id);

        // Update the payment status
        $order->payment_status = $request->payment_status;
        $order->save();

        // Redirect back with a success message
        return back()->with('message', 'Payment status updated successfully!');
    }

    public function deleteOrder($id)
    {
        // Find the order by ID
        $order = Order::findOrFail($id);

        // Delete the order
        $order->delete();

        // Redirect back with a success message
        return redirect()->back()->with('message', 'Order deleted successfully!');
    }

}
