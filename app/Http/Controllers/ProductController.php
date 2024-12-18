<?php

namespace App\Http\Controllers;

use App\Models\Product; // Import the Product model
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Fetch all products from the database
        return view('products.index', compact('products')); // Pass products data to the view
    }

    // Additional methods for handling product actions (create, edit, delete) can be added here
}
?>
