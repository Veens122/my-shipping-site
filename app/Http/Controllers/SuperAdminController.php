<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        $totalUsers = User::count();
        $pendingApprovals = User::where('role_id', 2)->where('is_approved', false)->count();
        $totalShipments = Shipment::count();

        $filter = $request->get('filter', 'all');

        $users = User::query();

        if ($filter === 'pending') {
            $users->where('is_approved', false);
        } elseif ($filter === 'banned') {
            $users->where('banned_until', '>', now());
        } elseif ($filter === 'approved') {
            $users->where('is_approved', true)
                ->where(function ($query) {
                    $query->whereNull('banned_until')
                        ->orWhere('banned_until', '<=', now());
                });
        }

        $users = $users->orderBy('created_at', 'desc')->get();

        return view('superadmin.dashboard', compact(
            'totalUsers',
            'pendingApprovals',
            'totalShipments',
            'users',
            'filter'
        ));
    }

    // Set active days (after which user is auto-banned)
    public function setActiveDays(Request $request, $id)
    {
        $request->validate(['days' => 'required|integer|min:1']);
        $user = User::findOrFail($id);

        $user->update([
            'active_until' => now()->addDays($request->days), // new field in users table
        ]);

        return back()->with('success', "User will remain active for {$request->days} days.");
    }



    // Approve user
    public function approveUser($id)
    {
        $user = User::findOrFail($id);
        $user->update(['is_approved' => true]);

        return redirect()->back()->with('success', 'User approved successfully!');
    }

    public function rejectUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User rejected and deleted successfully!');
    }

    public function users()
    {
        $users = User::where('role_id', 2)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('superadmin.users.index', compact('users'));
    }

    // Ban user for a specific duration
    public function banUser(Request $request, $id)
    {
        $request->validate(['days' => 'required|integer|min:1']);
        $user = User::findOrFail($id);

        $user->update([
            'banned_until' => now()->addDays($request->days)
        ]);

        return back()->with('success', "User banned for '  {$request->days}  days. ");
    }

    // Unban user
    public function unbanUser($id)
    {
        $user = User::findOrFail($id);
        $user->update(['banned_until' => null]);

        return back()->with('success', 'User unbanned successfully!');
    }

    // Delete user
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'User deleted successfully!');
    }
    // View banned users
    public function bannedUsers()
    {
        $bannedUsers = User::where('banned_until', '>', now())
            ->orderBy('banned_until', 'desc')
            ->get();

        return view('superadmin.users.banned-users', compact('bannedUsers'));
    }

    // View pending users
    public function pendingUsers()
    {
        $pendingUsers = User::where('role_id', 2)
            ->where('is_approved', false)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('superadmin.users.pending-users', compact('pendingUsers'));
    }
}
