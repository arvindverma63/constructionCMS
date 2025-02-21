<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if both token and email exist in session
        if (!Session::has('token') || !Session::has('email')) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized access. Please log in.'
            ], 401);
        }

        return $next($request);
    }
}
