<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class AdminMiddleware
{
    
    public function handle($request, Closure $next)
    {
        if (Auth::guest() || Auth::user()->role != "admin") {
            return redirect("/home");
        }
        return $next($request);
    }
}
