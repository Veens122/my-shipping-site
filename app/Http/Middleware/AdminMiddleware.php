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
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('admin.login')->with('error', 'Please login first.');
        }

        $user = auth()->user();

        if ($user->role_id == 1) {
            return $next($request);
        }

        if ($user->role_id == 2 && $user->is_approved) {
            return $next($request);
        }

        return redirect()->route('admin.login')->with('error', 'Unauthorized access.');
    }
}
