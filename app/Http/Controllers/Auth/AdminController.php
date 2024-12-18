<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Show the admin login form
    public function showLoginForm()
    {
        return view('admin.admin_login'); // Make sure this view file exists
    }

    // Process the login for admins
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to log in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate(); // Regenerate session

            return view('admin.admin_dashboard'); // Redirect to admin dashboard
        }

        // Failed login response
        return back()->withErrors(['email' => 'The provided credentials do not match our records.'])->onlyInput('email');
    }
}
