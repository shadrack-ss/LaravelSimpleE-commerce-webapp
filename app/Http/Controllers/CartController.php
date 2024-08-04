<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class CartController extends Controller
{
    //user cart
        public function index()
    {
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();
        $grand_total = 0;

        $totalWishlistCount = DB::table('wishlists')->where('user_id', $user_id)->count();
        $totalCartCount = DB::table('carts')->where('user_id', $user_id)->count();

        foreach ($carts as $cart) {
            $cart->sub_total = $cart->price * $cart->quantity;
            $grand_total += $cart->sub_total;
        }

        return view('cart', compact('carts', 'grand_total', 'totalWishlistCount', 'totalCartCount'));
    }


    //update the quantity of a product in the cart
    public function updateQuantity(Request $request, $id)
    {
        $cart = Cart::find($id);
        if ($cart) {
            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect()->route('cart')->with('success', 'Cart quantity updated');
        }
        return redirect()->route('cart')->with('error', 'Item not found');
    }


    //delete an item from the cart
    public function delete($id)
    {
        $cart = Cart::find($id);
        if ($cart) {
            $cart->delete();
            return redirect()->route('cart')->with('success', 'Item removed from cart');
        }
        return redirect()->route('cart')->with('error', 'Item not found');
    }


    //delete all items in cart
    public function deleteAll()
    {
        $user_id = Auth::id();
        Cart::where('user_id', $user_id)->delete();
        return redirect()->route('cart')->with('success', 'All items removed from cart');
    }

    //checkout
    public function checkout()
    {
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id', $user_id)->get();
        $grand_total = $cart_items->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        if (Auth::check()) {
            $user_id = Auth::id();
            $totalWishlistCount = DB::table('wishlists')->where('user_id', $user_id)->count();
            $totalCartCount = DB::table('carts')->where('user_id', $user_id)->count();
        }
        return view('checkout', compact('cart_items', 'grand_total', 'totalWishlistCount', 'totalCartCount'));
    }
    // order
    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'number' => 'required|numeric|min:0|max:9999999999',
            'email' => 'required|email|max:50',
            'method' => 'required|string',
            'flat' => 'required|string|max:50',
            'city' => 'required|string|max:50',
            'country' => 'required|string|max:50',
            'pin_code' => 'required|numeric|min:0|max:999999'
        ]);
    
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id', $user_id)->get();
    
        // Log cart items for debugging
      /*  foreach ($cart_items as $item) {
            Log::info('Cart Item: ' . $item->toJson());
        }*/
        if ($cart_items->isEmpty()) {
            return back()->with('message', 'Your cart is empty!');
        }
    
        $address = 'flat no. ' . $request->flat . ', ' . $request->city . ', ' . $request->country . ' - ' . $request->pin_code;
        $total_products = $cart_items->implode('name', ', ');
        $total_price = $cart_items->sum(function ($item) {
            return $item->price * $item->quantity;
        });
    
        DB::beginTransaction();
        try {
            // Create the order
            Order::create([
                'user_id' => $user_id,
                'name' => $request->name,
                'number' => $request->number,
                'email' => $request->email,
                'method' => $request->method,
                'address' => $address,
                'total_products' => $total_products,
                'total_price' => $total_price
            ]);
    
            // Update product quantities
            foreach ($cart_items as $item) {
                Log::info('Processing item with product_id: ' . $item->pid);
                $product = Product::find($item->pid);
    
                if (!$product) {
                    Log::error('Product not found with ID: ' . $item->pid);
                    DB::rollBack();
                    return back()->with('error', 'Product not found: ' . $item->name);
                }
    
                if ($product->quantity < $item->quantity) {
                    DB::rollBack();
                    return back()->with('error', 'Insufficient stock for ' . $product->name);
                }
    
                $product->quantity -= $item->quantity;
                $product->save();
            }
    
            // Clear the cart
            Cart::where('user_id', $user_id)->delete();
    
            DB::commit();
            return back()->with('message', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error placing order: ' . $e->getMessage());
            return back()->with('error', 'There was an error placing your order. Please try again.');
        }
    }
    
}
