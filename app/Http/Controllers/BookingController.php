<?php

namespace App\Http\Controllers;

use App\Models\Booking; // Import the Booking model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade for authentication

class BookingController extends Controller
{
    // Show the booking form
    public function showBookingForm(Request $request)
{
    // Ensure the user is authenticated
    if (!Auth::check()) {
        return redirect('/login')->withErrors(['message' => 'You must be logged in to book.']);
    }

    $user = Auth::user(); // Get the authenticated user

    return view('pemesanan', ['user' => $user]); // Pass the user data to the view
}

    // Store user bookings
    public function storeBooking(Request $request)
{
    // Validate user input
    $validatedData = $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|string|email|max:100',
        'date' => 'required|date',
        'time' => 'required',
        'duration' => 'required|string',
        'hourly_option' => 'nullable|string', // Make this optional
    ]);

    // Ensure user is logged in
    if (!Auth::check()) {
        return redirect('/login')->withErrors(['message' => 'You must be logged in to make a booking.']);
    }

    // Calculate price based on the duration type and selected option
    if ($validatedData['duration'] == 'Harian') {
        switch ($validatedData['hourly_option']) {
            case 'per jam':
                $price = 50000; // Price for hourly
                break;
            case 'setengah hari':
                $price = 250000; // Price for half-day
                break;
            case 'sehari penuh':
                $price = 400000; // Price for full-day
                break;
            default:
                return redirect('/pemesanan')->withErrors(['message' => 'Invalid option selected.']);
        }
    } elseif ($validatedData['duration'] == 'Kiloan') {
        $price = 45000; // Price for kiloan, define as needed
    }

    // Create a new booking record with calculated price
    Booking::create([
        'user_id' => Auth::id(), // Get the authenticated user's ID
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'date' => $validatedData['date'],
        'time' => $validatedData['time'],
        'duration' => $validatedData['duration'],
        'hourly_option' => $validatedData['hourly_option'], 
        'price' => $price, // Save the calculated price in DB
    ]);

    return redirect('/')->with('success', 'Booking successful!'); // Redirect after booking
}

    

    // Show booking history for the authenticated user
    public function showHistory(Request $request)
{
    // Check if the user is logged in
    if (!Auth::check()) {
        return redirect('/login')->withErrors(['message' => 'You must be logged in to view your booking history.']);
    }

    $userId = Auth::id(); // Get authenticated user's ID
    
    // Retrieve booking history for the authenticated user
    $bookings = Booking::where('user_id', $userId)->get(); // Fetch all bookings related to the user

    // Pass bookings data to the view
    return view('history', ['bookings' => $bookings]); // Ensure 'history.blade.php' exists
}


public function showInvoice($id, Request $request)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/login')->withErrors(['message' => 'You must be logged in to view your invoice.']);
        }

        // Retrieve the authenticated user's ID
        $userId = Auth::id();

        // Retrieve the booking details for the given ID and user
        $booking = Booking::where('id', $id)->where('user_id', $userId)->first();

        // Check if booking exists
        if (!$booking) {
            return redirect('/history')->withErrors(['message' => 'Booking not found']); // Redirect if not found
        }

        // Load the invoice view with booking data
        return view('invoice', ['booking' => $booking]);
    }
}

