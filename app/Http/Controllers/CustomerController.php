<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function login()
    {
        return view('customer_login'); // Make sure this view exists in resources/views
    }
}
