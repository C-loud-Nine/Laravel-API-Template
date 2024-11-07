<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{

    public function index()
{
    return view('dashboard'); // Ensure this view exists
}

    // Show the registration form
    public function showRegisterForm()
    {
        return view('register'); // Ensure this view exists in resources/views
    }

    // Handle the registration request
    public function register(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'picture' => 'required|file|mimes:jpg,png,jpeg|max:2048'
        ]);

        // Create a new user instance
        $user = new User();
        $user->name = $request->name; // Field must match database column
        $user->email = $request->email; // Field must match database column
        $user->password = Hash::make($request->password); // Hash the password
        $user->type = 'patient'; // Set user type

        // Handle picture upload
        if ($request->file('picture')) {
            $user->picture = $request->file('picture')->store('uploads', 'public'); // Store file
        }

        // Save the user to the database
        $user->save();

        // Redirect to login with success message
        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }

    // Show the login form
    public function showLoginForm()
    {
        return view('login'); // Ensure this view exists in resources/views
    }

    // Handle the login request
    public function login(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
    
        // Attempt to retrieve the user by email
        $user = User::where('email', $request->email)->first();
    
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user); // Log in the user
            return redirect()->route('dashboard')->with('success', 'Login successful.'); // Redirect to dashboard
        } else {
            return redirect()->back()->with('error', 'Invalid email or password.');
        }
    }
    

    // Handle user logout
    public function logout()
    {
        Auth::logout(); // Log out the user
        Session::flush(); // Clear the session
        return redirect()->route('login')->with('success', 'Logged out successfully.'); // Redirect with message
    }
}
