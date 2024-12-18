<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Correctly aliasing the base User class
use Illuminate\Notifications\Notifiable; // For notifications support

class User extends Authenticatable
{
    use HasFactory, Notifiable; // Using both HasFactory and Notifiable traits

    protected $table = 'users'; // Specifying the associated database table

    protected $fillable = [
        'username',
        'email',
        'password',
        'gender',
        'address',
    ];

    // Hiding columns when the user is serialized, such as for APIs
    protected $hidden = [
        'password', // Allows hiding the password field
        'remember_token', // Hides remember token
    ];

    // Define relationships here if applicable
    public function bookings()
    {
        return $this->hasMany(Booking::class); // Assuming you have a Booking model
    }
}
