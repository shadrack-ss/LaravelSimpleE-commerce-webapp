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
use App\Models\MyUsers;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['showLoginForm', 'loginAdmin', 'showRegistrationForm', 'register', 'showLinkRequestForm', 'sendResetLinkEmail']]);
    }

    public function adminRegister(Request $request){
        return view("admin.admin_register");
    }

    public function adminStore(Request $request){
        $admin = new Admin;
        $admin->name= $request->name;
        $admin->password =  Hash::make($request->pass);
        $admin->save();
        return redirect()->back();
    }

    public function adminLoginForm()
    {
        return view('admin.admin_login');
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);
    
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            return redirect()->route('dashboard.home');
        } else {
            return redirect()->back()->withErrors(['message' => 'Incorrect username or password!']);
        }
    }
    

    public function showLoginForm()
    {
        return view('dashboard.login');
    }

    

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('home');
    }

    public function showRegistrationForm()
    {
        return view('dashboard.register');
    }

    public function register(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'specialty' => 'required|string|max:255',
        'skills' => 'required|string|max:255',
        'gender' => 'required|in:Male,Female',
        'birth_date' => 'required|date',
        'phone' => 'required|string|max:15',
        'email' => 'required|string|email|max:255|unique:admins',
        'country' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'profile_pic' => 'nullable|file|image|max:2048',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $admin = new MyUsers();
    $admin->first_name = $request->first_name;
    $admin->surname = $request->surname;
    $admin->specialty = $request->specialty;
    $admin->skills = $request->skills;
    $admin->gender = $request->gender;
    $admin->birth_date = $request->birth_date;
    $admin->phone = $request->phone;
    $admin->email = $request->email;
    $admin->country = $request->country;
    $admin->usertype = $request->usertype;
    $admin->city = $request->city;
    $admin->password = Hash::make($request->password);

    if ($request->hasFile('profile_pic')) {
        $file = $request->file('profile_pic');
        $fileName = "profile_pic" . time() . "_" . $file->getClientOriginalName();
        $file->move(public_path('assets/admin_pics'), $fileName);
        $admin->profile_pic = $fileName;
    }

    $admin->save();

    return redirect()->route('admin-register')->with('success', 'Admin registered successfully.');
}




    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    //show admin proile
    public function profile()
    {
        $admin = Auth::user(); // Fetch the currently authenticated admin
    
        return view('dashboard.profile', compact('admin'));
    }

    public function editProfile()
    {
        $admin = auth()->user(); // or Admin::find(auth()->id());
        return view('dashboard.updateProfile', compact('admin'));
    }
    

    public function message()
    {
        $admin = Auth::user(); // Fetch the currently authenticated admin
        $today = Carbon::today()->toDateString();
        $messages = Message::whereDate('created_at', $today)->get();
    
        return view('dashboard.messages', compact('messages', 'admin'));
    }

    //customers
    public function showUsers()
    {
        $admin = Auth::user();
        // Fetch all users with usertype 'user'
        $users = MyUsers::where('usertype', 'normal')->get();

        // Pass the users data to the view
        return view('dashboard.customers', compact('users','admin'));
    }

    //admins
    public function showAdmins()
    {
        $admin = Auth::user();
        $admins = MyUsers::where('usertype', 'admin')->get(['id', 'first_name', 'surname', 'email', 'phone', 'country', 'city', 'specialty', 'skills', 'gender', 'birth_date', 'profile_pic']);
        return view('dashboard.admins', compact('admins', 'admin'));
    }
    
    // Delete customer
    public function destroy($id)
    {
        $user = MyUsers::find($id);
    
        if ($user) {
            $user->delete();
            return redirect()->route('admin.list')->with('message', 'User deleted successfully!');
        } else {
            return redirect()->route('admin.list')->with('error', 'User not found!');
        }
    }

    //delete admin
    public function deleteUser($id)
    {
        MyUsers::where('id', $id)->delete();
        return redirect()->route('admin.list')->with('message', 'Admin deleted successfully!');
    }

    //update profile
    public function updateProfile(Request $request)
    {
        if (Auth::check()) {
            $admin = Auth::user();
        } else {
            return redirect()->route('login');
        }
    
        /** @var Admin $admin */
        $admin = Auth::user();
    
        // Validate the incoming request data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'specialty' => 'nullable|string|max:255',
            'skills' => 'nullable|string|max:255',
            'gender' => 'required|in:Male,Female',
            'birth_date' => 'nullable|date',
            'phone' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'profile_pic' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        // Update the admin's profile
        $admin->first_name = $validatedData['first_name'];
        $admin->surname = $validatedData['surname'];
        $admin->specialty = $validatedData['specialty'];
        $admin->skills = $validatedData['skills'];
        $admin->gender = $validatedData['gender'];
        $admin->birth_date = $validatedData['birth_date'];
        $admin->phone = $validatedData['phone'];
        $admin->email = $validatedData['email'];
        $admin->country = $validatedData['country'];
        $admin->city = $validatedData['city'];
    
        // Handle profile picture upload
        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = public_path('assets/admin_pics/');
    
            // Create directory if it doesn't exist
            if (!file_exists($filePath)) {
                mkdir($filePath, 0755, true);
            }
    
            // Move the file
            $file->move($filePath, $fileName);
    
            // Delete the old profile picture if it exists
            if ($admin->profile_pic && file_exists($filePath . $admin->profile_pic)) {
                unlink($filePath . $admin->profile_pic);
            }
    
            $admin->profile_pic = $fileName;
        }
    
        $admin->save();
    
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}