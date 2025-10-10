<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // View profile
    public function profile()
    {
        $admin = auth()->user();
        return view('admin.profile.my-profile', compact('admin'));
    }

    // Edit Profile
    public function editProfile()
    {
        $admin = auth()->user();
        return view('admin.profile.profile-edit', compact('admin'));
    }

    // Update Profile
    public function updateProfile(Request $request)
    {
        $admin = auth()->user();

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $admin->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $admin->name  = $request->name;
        $admin->email = $request->email;

        // Only update password if filled
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Profile updated successfully.');
    }
}
