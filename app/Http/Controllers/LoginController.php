<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Check approval
            if (!$user->is_approved && !$user->isSuperAdmin()) {
                Auth::logout();
                return back()->with('error', 'Your account is not yet approved by the Super Admin.');
            }

            // Check ban
            if ($user->is_banned()) {
                Auth::logout();
                return back()->with('error', 'Your account is banned until ' . $user->banned_until->toDayDateTimeString());
            }

            // ✅ Redirect based on role
            if ($user->isSuperAdmin()) {
                return redirect()->route('superadmin.dashboard');
            }

            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard');
            }

            // Default fallback
            return redirect('/');
        }

        return back()->with('error', 'Invalid login details');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'You have been successfully logged out');
    }
}