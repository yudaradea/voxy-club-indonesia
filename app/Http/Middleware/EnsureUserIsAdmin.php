<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // Jika user terautentikasi, catat role-nya
            Log::info('Filament Access Attempt: User ID ' . Auth::id() . ' with role ' . Auth::user()->role);
        } else {
            // Jika tidak terautentikasi sama sekali
            Log::info('Filament Access Attempt: Guest user, not authenticated.');
        }

        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
