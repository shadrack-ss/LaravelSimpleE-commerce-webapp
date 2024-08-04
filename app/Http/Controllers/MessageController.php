<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $admin_id = Auth::id();
        $messages = DB::table('messages')->get();

        return view('admin.messages', compact('messages'));
    }

    public function destroy($id)
    {
        DB::table('messages')->where('id', $id)->delete();

        return redirect()->route('admin.messages')->with('message', 'Message deleted successfully.');
    }
}

