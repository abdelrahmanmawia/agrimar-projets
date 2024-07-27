<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request The incoming request.
     * @param \Closure $next The next request handler.
     * @return \Symfony\Component\HttpFoundation\Response The response from the next request handler.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && $request->user()->role != 'admin') {
            return redirect()->route('home') ->with('error', 'You are not authorized to access this page');
        }
        return $next($request);
    }
}
