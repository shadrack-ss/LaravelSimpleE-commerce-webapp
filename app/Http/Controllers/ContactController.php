<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        
  
            $user_id = Auth::id();
            $totalWishlistCount = DB::table('wishlists')->where('user_id', $user_id)->count();
            $totalCartCount = DB::table('carts')->where('user_id', $user_id)->count();
        
        return view('contact', compact('totalWishlistCount', 'totalCartCount'));
    }
    

    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20|string',
            'email' => 'required|email|max:50',
            'number' => 'required|digits_between:0,10',
            'msg' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user_id = Auth::id() ?: null;
        $name = $request->input('name');
        $email = $request->input('email');
        $number = $request->input('number');
        $msg = $request->input('msg');

        $existingMessage = Message::where('name', $name)
            ->where('email', $email)
            ->where('number', $number)
            ->where('message', $msg)
            ->first();

        if ($existingMessage) {
            return redirect()->back()->with('message', 'Message already sent!');
        }

        $message = new Message();
        $message->user_id = $user_id;
        $message->name = $name;
        $message->email = $email;
        $message->number = $number;
        $message->message = $msg;
        $message->save();

        return redirect()->back()->with('message', 'Message sent successfully!');
    }
}
