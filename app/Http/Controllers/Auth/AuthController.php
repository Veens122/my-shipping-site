<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function showRegistrationForm()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|confirmed',
        ]);

        // Create new admin
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'role'     => 2,
        ]);

        // Auth::login($user);

        return redirect()->route('admin.login')
            ->with('success', 'Registration successful. Please wait for your account to be approved by the super admin.');
    }


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

            if ($user->role_id == 1) {
                return redirect()->route('admin.dashboard');
            }

            if ($user->role_id == 2 && $user->is_approved) {
                return redirect()->route('admin.dashboard');
            }

            Auth::logout();
            return back()->with('error', 'Your account is not yet approved by the super admin.');
        }

        return back()->with('error', 'Invalid login details.');
    }




    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'You have been successfully logged out');
    }
}
