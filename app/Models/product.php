<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $table = 'products'; // Specify the table name

    protected $fillable = [
        'name', 
        'description', 
        'price', 
        'image_url', // Your image URL field
    ];
    
    // Additional model methods as necessary
}
?>
