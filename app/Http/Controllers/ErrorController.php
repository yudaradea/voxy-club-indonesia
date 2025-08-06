<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function __invoke($code)
    {
        $codes = [
            403 => ['title' => 'Forbidden', 'message' => 'You don\'t have permission to access this page.'],
            404 => ['title' => 'Page Not Found', 'message' => 'The page you’re looking for doesn’t exist.'],
            500 => ['title' => 'Server Error', 'message' => 'Something went wrong on our end. We’re working on it.'],
            503 => ['title' => 'Service Unavailable', 'message' => 'We’re temporarily offline for maintenance.'],
        ];

        $error = $codes[$code] ?? ['title' => 'Error', 'message' => 'An unexpected error occurred.'];

        return view('errors.custom', ['code' => $code, 'error' => $error]);
    }
}
