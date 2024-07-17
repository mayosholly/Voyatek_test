<?php
namespace App\Http\Middleware;
use Closure;

class TokenMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($request->header('token') !== 'vg@123') {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $next($request);
    }
}