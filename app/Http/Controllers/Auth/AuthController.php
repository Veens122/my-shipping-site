<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'password_confirmation' => 'required|string|min:5',
        ]);

        // Create new admin
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password'    => Hash::make($request->password),
            'role_id'     => 2,
            'is_approved' => false,
        ]);

        // Auth::login($user);

        return redirect()->route('admin.login')
            ->with('success', 'Registration successful. Please wait for your account to be approved by the super admin.');
    }
}
