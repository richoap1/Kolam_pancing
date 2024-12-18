<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ImageDownloadController;
use App\Http\Controllers\Auth\AdminController;

// Landing page
Route::get('/', function () {
    return view('home'); // Loading home.blade.php
})->name('home');

// Fasilitas page
Route::get('/fasilitas', function () {
    return view('fasilitas'); // Loading fasilitas.blade.php
})->name('fasilitas');

// Pricing page
Route::get('/pricing', function () {
    return view('pricing'); // Loading pricing.blade.php
})->name('pricing');

// Registration Routes
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register'); // Show registration form
Route::post('/register', [RegisteredUserController::class, 'store']); // Handle registration request

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); // Show login form
Route::post('/login', [LoginController::class, 'login']); // Handle login submission
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Handle logout

// Booking Routes
Route::get('/pemesanan', [BookingController::class, 'showBookingForm'])->name('bookings.show'); // Show booking form
Route::post('/bookings', [BookingController::class, 'storeBooking'])->name('bookings.store'); // Handle booking submission
Route::get('/history', [BookingController::class, 'showHistory'])->name('bookings.history'); // Show booking history
Route::get('/invoice/{id}', [BookingController::class, 'showInvoice'])->name('invoice.show');
Route::get('/invoice/download/{id}', [BookingController::class, 'downloadInvoice'])->name('invoice.download');
Route::get('/download-image/{filename}', [ImageDownloadController::class, 'downloadImage'])->name('image.download');


// User Profile Routes
Route::get('/profile', [UserController::class, 'showProfile'])->middleware('auth'); // Show user profile
Route::post('/update_profile', [UserController::class, 'updateProfile']); // Handle update profile
Route::delete('/delete_profile', [UserController::class, 'deleteProfile'])->name('delete_profile');


// Product Routes
Route::get('/products', [ProductController::class, 'index'])->middleware('auth'); // Show products, protected by authentication

// Additional Routes
Route::get('/customer/login', [CustomerController::class, 'login'])->name('customer.login'); // Customer login route
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login'); // Route to show admin login form
Route::post('/admin/login', [AdminController::class, 'login']); // Route to handle admin login submission
Route::get('/users', [UserController::class, 'index'])->name('users.index'); // Show all users (admin)
Route::get('/admin', function () {
    return view('admin/admin_dashboard'); // Points to the admin dashboard view
})->middleware('auth');
