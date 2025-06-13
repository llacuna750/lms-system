<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;             // 5th update


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
    public function handle(Request $request, Closure $next, ...$roles): Response        // 5th update
    {   
        if (!in_array(Auth::user()->role, $roles)) {
            abort(403, 'Unauthorized');
        }
        return $next($request);
    }
}
