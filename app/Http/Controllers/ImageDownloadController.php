<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Use Storage for file handling

class ImageDownloadController extends Controller
{
    public function downloadImage($filename)
    {
        // Specify the path to the images directory
        $path = storage_path('app/public/images/' . $filename); // Adjust based on where images are stored
        
        // Check if the file exists
        if (!file_exists($path)) {
            return redirect()->back()->withErrors(['message' => 'File not found.']);
        }

        return response()->download($path, $filename); // Downloads the image file
    }
}
