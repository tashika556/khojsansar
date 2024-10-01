<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   
        public function handle($request, Closure $next)
{
    if (auth()->user() && auth()->user()->role === 'admin') {
        return $next($request);
    }

    return response()->json(['message' => 'Unauthorized access'], 403);
}

    }

