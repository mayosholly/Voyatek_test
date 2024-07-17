<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Token Middleware
 * 
 * This middleware checks if the request has the required token in the header.
 */
class Token
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the 'token' header is present and its value is 'vg@123'
        if ($request->header('token') !== 'vg@123') {
            // Return a 401 Unauthorized response if the token is invalid
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Allow the request to proceed if the token is valid
        return $next($request);
    }
}
