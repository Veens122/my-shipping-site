@extends('super_admin_layouts.app')

@section('content')



<!-- Banned Users Table -->
<div class="card mt-4">
    <div class="card-header bg-white border-bottom-0">
        <h3 class="h5 mb-0 d-flex align-items-center">
            <i class="fas fa-user-slash text-danger me-2"></i> Banned Users
        </h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Banned Until</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bannedUsers ?? [] as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->banned_until ? $user->banned_until->format('d M Y H:i') : 'Indefinite' }}</td>
                    <td class="d-flex gap-2">
                        <form action="{{ route('superadmin.unbanUser', $user->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-warning btn-sm">Unban</button>
                        </form>
                        <form action="{{ route('superadmin.deleteUser', $user->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to permanently delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">No banned users</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection