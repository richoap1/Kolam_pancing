<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance; // include the maintenance file if needed
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php'; // autoload composer dependencies

// Bootstrap Laravel and handle the request...
$app = require_once __DIR__.'/../bootstrap/app.php'; // Bootstrap the Laravel app

$request = Request::capture(); // Capture the current request
$response = $app->handle($request); // Handle and return the response
$response->send(); // Send the response back to the client

$app->terminate($request); // Proper termination call
