<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login'); // Assuming there's a login.blade.php in resources/views/auth/
    }

    // Handle login form submission
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // Regenerate session
        $request->session()->regenerate();
        return redirect()->intended('/'); // Redirect after authenticated
    }

    return back()->withErrors(['email' => 'Invalid credentials.'])->onlyInput('email');
}

    // Log out the user
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken(); // Regenerate CSRF token
        return redirect('/')->with('success', 'You have been logged out.');
    }

    
}
