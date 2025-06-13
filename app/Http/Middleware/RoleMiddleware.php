<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  // 5th update 

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param mixed ...$roles
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
    if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if (!in_array($user->role, $roles)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}

