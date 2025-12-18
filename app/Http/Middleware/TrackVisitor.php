<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Track unique visitors using IP and User Agent
        $key = 'visitor_' . md5($request->ip() . $request->userAgent());
        
        if (!Cache::has($key)) {
            // Store visitor for 24 hours
            Cache::put($key, true, now()->addDay());
            
            // Increment total visitors counter
            Cache::increment('total_visitors', 1);
        }

        return $next($request);
    }
}
