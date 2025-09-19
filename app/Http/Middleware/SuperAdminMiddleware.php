<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If not logged in
        if (!auth()->check()) {
            return redirect()->route('admin.login')->with('error', 'Please log in to access this page.');
        }

        $user = auth()->user();

        // Allow only super admins (role_id = 1)
        if ($user->role_id == 1) {
            return $next($request);
        }

        // If not superadmin, deny access
        return redirect()->route('admin.login')->with('error', 'You do not have access to this page.');
    }
}
