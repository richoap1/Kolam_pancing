<?php

namespace App\Http\Controllers;

use App\Models\User; // Import the User model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Use Auth for authentication

class UserController extends Controller
{
    // Method to show all users (if applicable)
    public function index()
    {
        // Fetch all users (if this functionality is needed)
        $users = User::all();

        // Return the view and pass the users data
        return view('index', compact('users'));
    }

    // Method to show user profile
    public function showProfile(Request $request)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/login'); // Redirect if user is not logged in
        }
        $user = Auth::user(); // Get the currently authenticated user
        return view('profile', ['user' => $user]); // Pass user data to the profile view
    }

    // Method to update user profile
    public function updateProfile(Request $request)
{
    // Validate the input
    $request->validate([
        'username' => 'required|string|max:50',
        'email' => 'required|string|email|max:100|unique:users,email,' . $request->user()->id, // Validate email uniqueness
        'gender' => 'required|in:L,P,J',
        'address' => 'required|string|max:255',
    ]);

    // Fetch the logged-in user directly
    $user = auth()->user(); // Get the authenticated user

    // Update user information if the user exists
    if ($user) {
        $user->username = $request->username;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->address = $request->address;

        // Save changes and check for success
        if ($user->save()) {
            return redirect('/profile')->with('success', 'Profile updated successfully!'); // Redirect to profile page with success message
        } else {
            return redirect('/profile')->with('error', 'Failed to update profile. Please try again.'); // Redirect with error message
        }
    }

    return redirect('/profile')->with('error', 'User not found.'); // Redirect with error message if user not found
}


    public function logout(Request $request)
{
    Auth::logout(); // Log the user out
    $request->session()->invalidate(); // Invalidate the session
    $request->session()->regenerateToken(); // Regenerate CSRF token
    
    return redirect('/login')->with('success', 'You have been logged out.');
}

public function deleteProfile(Request $request)
{
    // Check if the user is authenticated
    if (!Auth::check()) {
        return redirect('/login')->withErrors(['message' => 'You must be logged in to delete your profile.']);
    }

    $user = Auth::user(); // Get the currently authenticated user

    // Delete the user
    $user->delete();

    // Log out the user and invalidate the session
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('success', 'Your profile has been deleted successfully.'); // Redirect to home with message
}

}
