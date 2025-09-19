<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckBan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->banned_until && Auth::user()->banned_until->future()) {
            Auth::logout();

            return redirect()->route('admin.login')->with('error', 'Your account is banned until ' . Auth::user()->banned_until->toDayDateTimeString());
        }
        return $next($request);
    }
}
